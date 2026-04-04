@extends('layouts.app')

@section('content')
<article class="single-post">
    <header class="single-post-header">
        <div class="post-category">{{ $post->category ? $post->category->name : 'GENEL' }}</div>
        <h1>{{ $post->title }}</h1>
        <div class="single-post-meta">
            <span>{{ $post->created_at->translatedFormat('d F Y') }}</span>
        </div>
    </header>

    <div class="container">
        <div class="main-column" style="max-width: 900px; margin: 0 auto;">
            @if($post->image)
            @php
                $imagePath = $post->image;
                if ($imagePath && !\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://', 'images/'])) {
                    $imagePath = 'storage/' . $imagePath;
                }
            @endphp
            <div class="single-post-image">
                <img src="{{ \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($imagePath) }}" alt="{{ $post->title }}" style="width: 100%; height: auto;" onerror="this.onerror=null; this.parentElement.classList.add('img-error'); this.outerHTML = '<div class=\'no-image-placeholder\' style=\'height: 400px;\'><i class=\'fas fa-feather-alt\'></i></div>';">
            </div>
            @endif

            <div class="single-post-content" style="min-height: 300px; padding-bottom: 50px;">
                {!! $post->content !!}
            </div>

            <!-- Social Share -->
            <div class="share-section" style="margin-top: 50px; padding: 40px 0; border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color);">
                <span style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: var(--text-muted); display: block; margin-bottom: 24px; text-align: center; font-weight: 700;">Yazıyı Paylaş</span>
                <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
                    @php
                        $shareUrl = urlencode(url()->current());
                        $shareTitle = urlencode($post->title);
                    @endphp
                    <a href="https://api.whatsapp.com/send?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank" class="share-btn whatsapp" title="WhatsApp ile Paylaş">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ $shareUrl }}" target="_blank" class="share-btn twitter" title="Twitter ile Paylaş">
                        <i class="fab fa-twitter"></i> Twitter (X)
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank" class="share-btn linkedin" title="LinkedIn ile Paylaş">
                        <i class="fab fa-linkedin-in"></i> LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>

@if(isset($relatedPosts) && $relatedPosts->count() > 0)
    <div class="container" style="margin-bottom: 80px; margin-top: 80px;">
        <div class="widget">
            <h3 class="widget-title" style="text-align: center; font-family: var(--font-heading); margin-bottom: 40px;">BUNLAR DA İLGİNİZİ ÇEKEBİLİR</h3>
            <div class="blog-grid" style="padding-top: 40px;">
                @foreach($relatedPosts as $rPost)
                <article class="post-card">
                    @php
                        $rImagePath = $rPost->image;
                        if ($rImagePath && !\Illuminate\Support\Str::startsWith($rImagePath, ['http://', 'https://', 'images/'])) {
                            $rImagePath = 'storage/' . $rImagePath;
                        }
                    @endphp
                    <a href="{{ route('post.show', $rPost->slug) }}?ref=list" class="post-image" style="margin-bottom: 20px;">
                        @if($rPost->image)
                        <img src="{{ \Illuminate\Support\Str::startsWith($rPost->image, ['http://', 'https://']) ? $rPost->image : asset($rImagePath) }}" alt="{{ $rPost->title }}" loading="lazy" onerror="this.onerror=null; this.parentElement.classList.add('img-error'); this.outerHTML = '<div class=\'no-image-placeholder\'><i class=\'fas fa-feather-alt\'></i></div>';">
                        @else
                        <div class="no-image-placeholder"><i class="fas fa-feather-alt"></i></div>
                        @endif
                    </a>
                    <div class="post-card-content">
                        <div class="post-category">{{ $rPost->category ? $rPost->category->name : 'GENEL' }}</div>
                        <h3 class="post-title" style="font-size: 18px;">
                            <a href="{{ route('post.show', $rPost->slug) }}?ref=list">{{ $rPost->title }}</a>
                        </h3>
                        <a href="{{ route('post.show', $rPost->slug) }}?ref=list" class="read-more">OKUMAYA DEVAM ET</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection
