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

        if ($request->has('q')) {
            $query->where('title', 'LIKE', '%' . $request->q . '%')
                  ->orWhere('content', 'LIKE', '%' . $request->q . '%');
        }

        $posts = $query->latest()->paginate(12);
        
        $ads = \App\Models\Advertisement::where('is_active', true)->get();

        return view('blog.index', compact('posts', 'ads'));
    }
    public function show($slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
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
        $galleryImages = \App\Models\Post::where('is_published', true)
            ->whereNotNull('image')
            ->latest()
            ->take(10)
            ->pluck('image');
        $ads = \App\Models\Advertisement::where('is_active', true)->get();
        return view('pages.hakkimda', compact('galleryImages', 'ads'));
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
