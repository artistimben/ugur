<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/hakkimda', [BlogController::class, 'about'])->name('about');
Route::get('/iletisim', [BlogController::class, 'contact'])->name('contact');
Route::get('/gizlilik-politikasi', [BlogController::class, 'privacy'])->name('privacy');
Route::get('/yazi/{slug}', [BlogController::class, 'show'])->name('post.show');

Route::get('/import-legacy-posts', function() {
    try {
        $xmlPath = base_path('ugurkantekin.xml');
        if (!file_exists($xmlPath)) return "XML not found at $xmlPath";
        
        $xmlString = file_get_contents($xmlPath);
        $xmlString = str_replace('&nbsp;', ' ', $xmlString);
        $xmlString = str_replace('&amp;nbsp;', ' ', $xmlString);
        
        $xml = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA | LIBXML_RECOVER | LIBXML_NOERROR | LIBXML_NOWARNING | LIBXML_PARSEHUGE);
        
        if (!$xml) return "XML could not be loaded even with recovery.";
        
        // Clear existing posts
        \App\Models\Post::query()->delete();
        
        $importedCount = 0;
        foreach ($xml->item as $item) {
            $id = (string) $item->ID;
            $title = (string) $item->post_title;
            // Decode HTML entities
            $title = html_entity_decode($title, ENT_QUOTES | ENT_XML1, 'UTF-8');
            
            $content = (string) $item->post_content;
            $content = html_entity_decode($content, ENT_QUOTES | ENT_XML1, 'UTF-8');
            $content = preg_replace('/<!-- \/?wp:[^>]+ -->/i', '', $content);
            $content = trim($content);
            
            $categoryName = (string) $item->post_category ?: 'Genel';
            $categoryName = html_entity_decode($categoryName, ENT_QUOTES | ENT_XML1, 'UTF-8');
            
            $excerpt = (string) $item->post_excerpt ?: \Illuminate\Support\Str::limit(strip_tags($content), 150);
            $excerpt = html_entity_decode($excerpt, ENT_QUOTES | ENT_XML1, 'UTF-8');
            
            $image = (string) $item->featured_image;
            $date = (string) $item->post_date;
            
            $category = \App\Models\Category::firstOrCreate(['name' => $categoryName], [
                'slug' => \Illuminate\Support\Str::slug($categoryName)
            ]);
            
            \App\Models\Post::create([
                'id' => $id,
                'title' => $title,
                'slug' => \Illuminate\Support\Str::slug($title) . '-' . $id,
                'content' => $content,
                'excerpt' => $excerpt,
                'category_id' => $category->id,
                'image' => $image,
                'is_published' => true,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
            $importedCount++;
        }
        return "Imported $importedCount legacy posts successfully.";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});
Route::get('/kesfet', [BlogController::class, 'random'])->name('post.random');

// Setup Routes (TEMPORARY - Unprotected for initial server setup)
Route::prefix('setup')->group(function () {
    Route::get('/run-migrations', function() {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return "Migrations ran successfully:<br><pre>" . \Illuminate\Support\Facades\Artisan::output() . "</pre>";
    })->name('run-migrations');
    
    Route::get('/run-seeders', function() {
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        return "Seeders ran successfully:<br><pre>" . \Illuminate\Support\Facades\Artisan::output() . "</pre>";
    })->name('run-seeders');
});

// Admin Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('posts', PostController::class);
    Route::post('posts/bulk-image', [PostController::class, 'bulkImage'])->name('posts.bulk-image');
    Route::resource('categories', CategoryController::class);
    Route::resource('advertisements', \App\Http\Controllers\Admin\AdvertisementController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
});

// Profile Routes (from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
