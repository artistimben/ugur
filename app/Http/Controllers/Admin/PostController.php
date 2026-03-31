<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'excerpt' => 'nullable|string',
            'is_published' => 'boolean',
            'image' => 'nullable|image|max:2048'
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $validated['slug'] = $slug;
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        if (empty($validated['excerpt'])) {
            $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);
        }

        Post::create($validated);
        return redirect()->route('admin.posts.index')->with('success', 'Yazı başarıyla eklendi.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'excerpt' => 'nullable|string',
            'is_published' => 'boolean',
            'image' => 'nullable|image|max:2048'
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $validated['slug'] = $slug;
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            if ($post->image && !Str::startsWith($post->image, ['http://', 'https://'])) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        if (empty($validated['excerpt'])) {
            $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);
        }

        $post->update($validated);
        return redirect()->route('admin.posts.index')->with('success', 'Yazı başarıyla güncellendi.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) Storage::disk('public')->delete($post->image);
        $post->delete();
        return back()->with('success', 'Yazı silindi.');
    }

    public function bulkImage(Request $request)
    {
        $request->validate([
            'post_ids' => 'required|string', // JSON array of IDs
            'bulk_image' => 'required|image|max:2048'
        ]);

        $postIds = json_decode($request->post_ids, true);
        if (!is_array($postIds) || empty($postIds)) {
            return back()->withErrors(['post_ids' => 'Lütfen en az bir yazı seçin.']);
        }

        if ($request->hasFile('bulk_image')) {
            $imagePath = $request->file('bulk_image')->store('posts', 'public');
            
            $posts = Post::whereIn('id', $postIds)->get();
            foreach ($posts as $post) {
                if ($post->image && !Str::startsWith($post->image, ['http://', 'https://'])) {
                    Storage::disk('public')->delete($post->image);
                }
                $post->update(['image' => $imagePath]);
            }
        }

        return redirect()->route('admin.posts.index')->with('success', count($postIds) . ' yazıya görsel başarıyla eklendi.');
    }
}
