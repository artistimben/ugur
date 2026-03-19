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

    <div class="container main-wrapper">
        <div class="main-column">
            @if($post->image)
            <div class="single-post-image">
                <img src="{{ \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image) }}" alt="{{ $post->title }}" style="width: 100%; height: auto;">
            </div>
            @endif

            <div class="single-post-content">
                {!! $post->content !!}
            </div>

            <!-- Social Share -->
            <div class="share-section" style="margin-top: 80px; padding: 40px 0; border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color);">
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

            @if($ads->where('position', 'post_bottom')->first())
                @php $ad = $ads->where('position', 'post_bottom')->first(); @endphp
                <div class="ad-container" style="margin: 60px auto; max-width: 800px; text-align: center; background: var(--section-bg); padding: 30px; border-radius: 4px;">
                    <span style="font-size: 10px; color: #999; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 10px;">Reklam</span>
                    @if($ad->type == 'script')
                        {!! $ad->script_code !!}
                    @else
                        <a href="{{ $ad->link }}" target="_blank">
                            <img src="{{ \Illuminate\Support\Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" style="max-width: 100%; height: auto; border-radius: 4px;" onerror="this.parentElement.parentElement.style.display='none'">
                        </a>
                    @endif
                </div>
            @endif
        </div>

        <!-- Sidebar Column for Ads -->
        @if($ads->where('position', 'sidebar')->count() > 0)
        <aside class="sidebar-column" style="width: 320px; display: flex; flex-direction: column; gap: 40px; flex-shrink: 0;">
            @foreach($ads->where('position', 'sidebar') as $ad)
                <div class="sidebar-ad-widget" style="background: white; padding: 20px; border-radius: 4px; border: 1px solid var(--border-color);">
                    <span style="font-size: 10px; color: #999; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 15px;">Reklam</span>
                    @if($ad->type == 'script')
                        {!! $ad->script_code !!}
                    @else
                        <a href="{{ $ad->link }}" target="_blank">
                            <img src="{{ \Illuminate\Support\Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" style="width: 100%; border-radius: 4px;">
                        </a>
                    @endif
                </div>
            @endforeach
        </aside>
        @endif
    </div>
</article>

@if(isset($relatedPosts) && $relatedPosts->count() > 0)
    <div class="container" style="margin-bottom: 80px; margin-top: 80px;">
        <div class="widget">
            <h3 class="widget-title">BUNLAR DA İLGİNİZİ ÇEKEBİLİR</h3>
            <div class="blog-grid" style="padding-top: 40px; grid-template-columns: repeat(3, 1fr);">
                @foreach($relatedPosts as $rPost)
                <article class="post-card">
                    <a href="{{ route('post.show', $rPost->slug) }}" class="post-image">
                        @if($rPost->image)
                        <img src="{{ \Illuminate\Support\Str::startsWith($rPost->image, ['http://', 'https://']) ? $rPost->image : Storage::url($rPost->image) }}" alt="{{ $rPost->title }}">
                        @endif
                    </a>
                    <div class="post-category">{{ $rPost->category ? $rPost->category->name : 'GENEL' }}</div>
                    <h3 class="post-title" style="font-size: 20px;">
                        <a href="{{ route('post.show', $rPost->slug) }}">{{ $rPost->title }}</a>
                    </h3>
                    <a href="{{ route('post.show', $rPost->slug) }}" class="read-more">Devamını Oku</a>
                </article>
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection
