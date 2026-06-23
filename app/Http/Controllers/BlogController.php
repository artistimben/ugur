<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Post::with('category')->where('is_published', true);

        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('q')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->q . '%')
                  ->orWhere('content', 'LIKE', '%' . $request->q . '%');
            });
        }

        $posts = $query->latest()->paginate(12);
        
        $ads = \App\Models\Advertisement::where('is_active', true)->get();

        return view('blog.index', compact('posts', 'ads'));
    }
    public function show(Request $request, $slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        // Tıklanma sayısını artır (Listeden geliyorsa)
        if ($request->has('ref') && $request->ref == 'list') {
            $post->increment('clicks');
        }

        // Okunma sayısını artır
        $post->increment('views');

        // Tekil okunma kontrolü
        $alreadyViewed = \App\Models\PostView::where('post_id', $post->id)
            ->where('ip_address', $request->ip())
            ->exists();

        if (!$alreadyViewed) {
            $post->increment('unique_views');
        }

        // Okunma günlüğünü kaydet
        \App\Models\PostView::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $ads = \App\Models\Advertisement::where('is_active', true)->get();
        $relatedPosts = \App\Models\Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();
        return view('blog.show', compact('post', 'ads', 'relatedPosts'));
    }

    public function about()
    {
        $page = \App\Models\Page::whereIn('slug', ['hakkimda', 'hakkimda-ugur-kantekin'])->firstOrFail();
        $ads = \App\Models\Advertisement::where('is_active', true)->get();
        return view('pages.hakkimda', compact('page', 'ads'));
    }

    public function contact()
    {
        $ads = \App\Models\Advertisement::where('is_active', true)->get();
        return view('pages.iletisim', compact('ads'));
    }

    public function privacy()
    {
        $ads = \App\Models\Advertisement::where('is_active', true)->get();
        return view('pages.gizlilik', compact('ads'));
    }
    public function random()
    {
        $post = \App\Models\Post::where('is_published', true)->inRandomOrder()->first();
        if (!$post) return redirect()->route('home');
        return redirect()->route('post.show', $post->slug);
    }
}
