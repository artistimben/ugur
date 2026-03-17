@extends('layouts.app')

@section('content')
    <article class="post-card" style="border-bottom: none; text-align: left;">
        
        <header class="entry-header" style="text-align: center; margin-bottom: 30px;">
            <span class="cat-links"><a href="#">{{ $post->category ? $post->category->name : 'Genel Yazılar' }}</a></span>
            <h1 class="entry-title" style="font-size: 36px; margin-bottom: 15px;">{{ mb_strtoupper($post->title, 'UTF-8') }}</h1>
            <div class="entry-meta">
                <span class="byline">Geliştirici: <a href="#">admin</a></span> | 
                <span class="posted-on">güncelleme tarihi: {{ $post->created_at->translatedFormat('F j, Y') }}</span>
            </div>
        </header>

        @if($post->image)
        <div class="img-holder" style="margin-bottom: 30px;">
            <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image) }}" alt="{{ $post->title }}" style="width: 100%; border-radius: 4px;">
        </div>
        @endif
        
        <div class="post-body entry-content">
            {!! nl2br(e($post->content)) !!}
        </div>
        
        <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid var(--border-color); text-align: center;">
            <a href="{{ route('home') }}" style="color: var(--accent); font-weight: bold; font-family: 'Cabin', sans-serif;">&larr; Ana Sayfaya Dön</a>
        </div>
    </article>
@endsection
