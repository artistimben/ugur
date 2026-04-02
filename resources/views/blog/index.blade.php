@extends('layouts.app')

@section('content')
@php
    $currentCategory = request('category') ? \App\Models\Category::where('slug', request('category'))->first() : null;
    $categories = \App\Models\Category::all();
    
    $drawerIcons = [
        'dini-bilgiler'      => 'fa-mosque',
        'cocuk-yetistirme'   => 'fa-child',
        'aile-ve-iliskiler'  => 'fa-users',
        'kisisel-gelisim'    => 'fa-seedling',
        'manevi-yazilar'     => 'fa-heart',
        'psikoloji-ve-saglik'=> 'fa-brain',
        'egitim'             => 'fa-graduation-cap',
        'teknoloji-ve-toplum'=> 'fa-laptop',
        'genel-yazilar'      => 'fa-newspaper',
    ];
    $catIcon = ($currentCategory && isset($drawerIcons[$currentCategory->slug])) ? $drawerIcons[$currentCategory->slug] : 'fa-book-open';
@endphp

<div class="container main-wrapper">
    <!-- Center Column -->
    <div class="main-column" style="min-height: 800px;">
        <div style="margin: 40px 0 60px; padding-bottom: 20px; border-bottom: 1px solid var(--border-color);">
            @if($currentCategory)
                <div style="display: flex; align-items: center; gap: 15px; color: var(--accent-color); margin-bottom: 10px;">
                    <i class="fas {{ $catIcon }}" style="font-size: 20px;"></i>
                    <span style="text-transform: uppercase; font-weight: 700; letter-spacing: 2px; font-size: 11px;">{{ $currentCategory->name }}</span>
                </div>
            @endif
            <h1 style="font-size: 36px; margin-bottom: 10px;">{{ $currentCategory ? $currentCategory->name : 'Yazılarım' }}</h1>
            <p style="color: #666;">Hayata, insana ve maneviyata dair derinlemesine okumalar.</p>
        </div>

        <div class="blog-grid">
            @foreach($posts as $post)
                <article class="post-card">
                    @php
                        $imagePath = $post->image;
                        if ($imagePath && !\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://', 'images/'])) {
                            $imagePath = 'storage/' . $imagePath;
                        }
                    @endphp
                    <a href="{{ route('post.show', $post->slug) }}" class="post-image">
                        @if($post->image)
                            <img src="{{ \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($imagePath) }}" alt="{{ $post->title }}" loading="lazy" onerror="this.onerror=null; this.parentElement.classList.add('img-error'); this.outerHTML = '<div class=\'no-image-placeholder\'><i class=\'fas fa-feather-alt\'></i></div>';">
                        @else
                            <div class="no-image-placeholder">
                                <i class="fas fa-feather-alt"></i>
                            </div>
                        @endif
                    </a>
                    <div class="post-card-content">
                        <div class="post-category">{{ $post->category ? $post->category->name : 'GENEL' }}</div>
                        <h2 class="post-title">
                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="post-excerpt">{{ $post->excerpt }}</p>
                        <a href="{{ route('post.show', $post->slug) }}" class="read-more">Okumaya Devam Et</a>
                    </div>
                </article>

                @if($loop->iteration == 3 && $ads->where('position', 'between')->first())
                    @php 
                        $ad = $ads->where('position', 'between')->first(); 
                        $adImage = $ad->image;
                        if ($adImage && !\Illuminate\Support\Str::startsWith($adImage, ['http://', 'https://', 'images/'])) {
                            $adImage = 'storage/' . $adImage;
                        }
                    @endphp
                    <div class="ad-space" style="grid-column: 1 / -1; margin: 30px 0; background: var(--section-bg); padding: 40px; border-radius: 4px; text-align: center;">
                        <span style="font-size: 10px; color: #999; text-transform: uppercase; display: block; margin-bottom: 15px;">Reklam</span>
                        @if($ad->type == 'script') {!! $ad->script_code !!} @else
                            <a href="{{ $ad->link }}" target="_blank">
                                <img src="{{ \Illuminate\Support\Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : asset($adImage) }}" style="max-width: 100%; border-radius: 4px;" onerror="this.parentElement.parentElement.style.display='none'">
                            </a>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>

        @if($posts->hasPages())
        <div class="pagination-wrapper">
            {{ $posts->appends(request()->query())->links('vendor.pagination.premium') }}
        </div>
        @endif

        <!-- Quote section removed -->
    </div>

    <!-- Sidebar Column for Ads -->
    @if($ads->where('position', 'sidebar')->count() > 0)
    <aside class="sidebar-column" style="width: 320px; display: flex; flex-direction: column; gap: 40px; flex-shrink: 0;">
        @foreach($ads->where('position', 'sidebar') as $ad)
            @php
                $sideAdImage = $ad->image;
                if ($sideAdImage && !\Illuminate\Support\Str::startsWith($sideAdImage, ['http://', 'https://', 'images/'])) {
                    $sideAdImage = 'storage/' . $sideAdImage;
                }
            @endphp
            <div class="sidebar-ad-widget" style="background: white; padding: 20px; border-radius: 4px; border: 1px solid var(--border-color);">
                <span style="font-size: 10px; color: #999; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 15px;">Reklam</span>
                @if($ad->type == 'script')
                    {!! $ad->script_code !!}
                @else
                    <a href="{{ $ad->link }}" target="_blank">
                        <img src="{{ \Illuminate\Support\Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : asset($sideAdImage) }}" style="width: 100%; border-radius: 4px;">
                    </a>
                @endif
            </div>
        @endforeach
    </aside>
    @endif
</div>
@endsection
