@extends('layouts.app')

@section('content')
@php
    $currentCategory = request('category') ? \App\Models\Category::where('slug', request('category'))->first() : null;
    $categories = \App\Models\Category::all();
    
    // Category Specific Customizations
    $config = [
        'dini-bilgiler' => ['quote' => '“Gönül, gönül verilerek alınır.”', 'author' => 'Hz. Mevlana', 'accent' => '#1b4332', 'icon' => 'fa-mosque'],
        'cocuk-yetistirme' => ['quote' => '“Çocuklar her şeyi görürler.”', 'author' => 'Maria Montessori', 'accent' => '#2a6f97', 'icon' => 'fa-child'],
        'aile-iletisimi' => ['quote' => '“Huzurlu bir aile cennetin yansımasıdır.”', 'author' => 'Anonim', 'accent' => '#bc4749', 'icon' => 'fa-home'],
        'kisisel-gelisim' => ['quote' => '“Dün olduğun kişiden daha iyi ol.”', 'author' => 'Gelişim Notları', 'accent' => '#4361ee', 'icon' => 'fa-seedling'],
        'manevi-yazilar' => ['quote' => '“Kalpten çıkan söz kalbe gider.”', 'author' => 'Hz. Ali', 'accent' => '#7209b7', 'icon' => 'fa-heart'],
        'genel' => ['quote' => '“Bilgi, paylaşıldıkça çoğalan tek hazinedir.”', 'author' => 'Uğur Kantekin', 'accent' => '#c2a35d', 'icon' => 'fa-book-open']
    ];

    $catConfig = ($currentCategory && isset($config[$currentCategory->slug])) ? $config[$currentCategory->slug] : $config['genel'];
@endphp

<div class="container main-wrapper">
    <!-- Center Column -->
    <div class="main-column" style="min-height: 800px;">
        @if($currentCategory)
            <div style="margin: 40px 0 60px; padding-bottom: 40px; border-bottom: 1px solid var(--border-color);">
                <div style="display: flex; align-items: center; gap: 20px; color: {{ $catConfig['accent'] }}; margin-bottom: 16px;">
                    <i class="fas {{ $catConfig['icon'] }}" style="font-size: 24px;"></i>
                    <span style="text-transform: uppercase; font-weight: 700; letter-spacing: 3px; font-size: 12px;">{{ $currentCategory->name }}</span>
                </div>
                <h1 style="font-size: 48px; margin-bottom: 16px;">{{ $currentCategory->name }} Üzerine Seçkiler</h1>
            </div>
        @endif

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
                            <img src="{{ \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($imagePath) }}" alt="{{ $post->title }}" loading="lazy" onerror="this.parentElement.classList.add('img-error'); this.style.display='none'; this.parentElement.innerHTML += '<div class=\'no-image-placeholder\'><i class=\'fas fa-feather-alt\'><\/i><\/div>'">
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

        <div style="margin-top: 100px; padding: 100px 60px; background: {{ $catConfig['accent'] }}; color: white; border-radius: 4px; text-align: center; position: relative; overflow: hidden;">
            <i class="fas fa-quote-left" style="position: absolute; top: 40px; left: 40px; font-size: 80px; opacity: 0.1;"></i>
            <p style="font-family: var(--font-heading); font-size: 28px; font-style: italic; margin-bottom: 32px; position: relative;">{{ $catConfig['quote'] }}</p>
            <span style="font-size: 14px; text-transform: uppercase; letter-spacing: 4px; opacity: 0.8;">— {{ $catConfig['author'] }}</span>
        </div>
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
