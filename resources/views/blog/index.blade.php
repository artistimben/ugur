@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Main Content -->
    <div class="main-column" style="min-height: 800px;">
        <div class="blog-grid">
            @foreach($posts as $post)
                <article class="post-card">
                    @php
                        $imagePath = $post->image;
                        if ($imagePath && !\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://', 'images/'])) {
                            $imagePath = 'storage/' . $imagePath;
                        }
                    @endphp
                    <a href="{{ route('post.show', $post->slug) }}?ref=list" class="post-image">
                        @if($post->image)
                            <img src="{{ \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://', '/wp-content']) ? $post->image : asset($imagePath) }}" alt="{{ $post->title }}" loading="lazy" onerror="this.onerror=null; this.parentElement.classList.add('img-error'); this.outerHTML = '<div class=\'no-image-placeholder\'><i class=\'fas fa-feather-alt\'></i></div>';">
                        @else
                            <div class="no-image-placeholder">
                                <i class="fas fa-feather-alt"></i>
                            </div>
                        @endif
                    </a>
                    <div class="post-card-content">
                        <div class="post-category">{{ $post->category ? $post->category->name : 'GENEL' }}</div>
                        <h2 class="post-title">
                            <a href="{{ route('post.show', $post->slug) }}?ref=list">{{ $post->title }}</a>
                        </h2>
                        <p class="post-excerpt">{{ $post->excerpt }}</p>
                        <a href="{{ route('post.show', $post->slug) }}?ref=list" class="read-more">OKUMAYA DEVAM ET</a>
                    </div>
                </article>
            @endforeach
        </div>

        @if($posts->hasPages())
        <div class="pagination-wrapper">
            {{ $posts->appends(request()->query())->links('vendor.pagination.premium') }}
        </div>
        @endif
    </div>
</div>
@endsection
