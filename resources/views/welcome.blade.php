@extends('layouts.app')

@section('content')
<div class="container">
    <div class="categories-bar">
        <a href="{{ route('home') }}" class="category-tag {{ !request('category') ? 'active' : '' }}">Hepsi</a>
        @php
            $categories = \App\Models\Category::all();
        @endphp
        @foreach($categories as $cat)
            <a href="{{ route('home', ['category' => $cat->slug]) }}" class="category-tag {{ request('category') == $cat->slug ? 'active' : '' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    @if($posts->isEmpty())
        <div style="padding: 100px 0; text-align: center;">
            <p style="color: #999; font-style: italic;">Henüz bu kategoride yazı eklenmedi.</p>
        </div>
    @else
        <div class="blog-grid">
            @foreach($posts as $post)
            <article class="post-card">
                <a href="{{ route('post.show', $post->slug) }}" class="post-image">
                    @if($post->image)
                    <img src="{{ \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image) }}" alt="{{ $post->title }}">
                    @else
                    <div style="background: #f0f0f0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-image" style="color: #ccc; font-size: 40px;"></i>
                    </div>
                    @endif
                </a>
                <div class="post-category">{{ $post->category ? $post->category->name : 'GENEL' }}</div>
                <h2 class="post-title">
                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                </h2>
                <p class="post-excerpt">{{ $post->excerpt }}</p>
                <a href="{{ route('post.show', $post->slug) }}" class="read-more">Devamını Oku</a>
            </article>
            @endforeach
        </div>

        <div class="pagination" style="display: flex; justify-content: center; margin-bottom: 80px;">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
