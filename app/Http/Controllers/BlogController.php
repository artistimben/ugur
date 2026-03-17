<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $featuredTitles = [
            'SEVGİ… BİLDİĞİMİZ GİBİ Mİ?',
            'AŞAĞILIK KOMPLEKSİ İNSAN DÖVMEYE',
            'BİLGİ VE SEVGİNİN BİRLEŞİMİ',
            'BABA YARASIMI',
            'PROBLEM GENÇLERDE Mİ',
            'ÇEKTİKLERİMİZ HEP KENDİ ELİMİZDEN Mİ'
        ];

        $galleryPosts = \App\Models\Post::where('is_published', true)
            ->where(function($q) use ($featuredTitles) {
                foreach ($featuredTitles as $title) {
                    $q->orWhere('title', 'LIKE', '%' . $title . '%');
                }
            })
            ->get();

        $galleryIds = $galleryPosts->pluck('id');

        $posts = \App\Models\Post::with('category')
            ->where('is_published', true)
            ->whereNotIn('id', $galleryIds)
            ->latest()
            ->paginate(10);

        $bannerPosts = $posts->take(3);
        $sidebarPosts = $posts->take(5);

        $ads = \App\Models\Advertisement::where('is_active', true)->get();

        return view('blog.index', compact('posts', 'bannerPosts', 'sidebarPosts', 'galleryPosts', 'ads'));
    }

    public function show($slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $sidebarPosts = \App\Models\Post::where('is_published', true)->latest()->take(5)->get();
        $ads = \App\Models\Advertisement::where('is_active', true)->get();
        return view('blog.show', compact('post', 'sidebarPosts', 'ads'));
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
}
