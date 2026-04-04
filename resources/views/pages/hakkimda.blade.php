@extends('layouts.app')

@section('content')
<div class="container">
    <article class="single-post">
        <header class="single-post-header">
            <h1 class="page-title">{{ $page->title }}</h1>
            <div class="single-post-meta">
                <span>Eğitimci & Yazar</span>
            </div>
        </header>

        <div class="single-post-image about-image-container" style="max-width: 400px; margin: 0 auto; box-shadow: var(--shadow-md);">
            @php
                $aboutImg = $page->image;
                if ($aboutImg && !\Illuminate\Support\Str::startsWith($aboutImg, ['http://', 'https://', 'images/'])) {
                    $aboutImg = 'storage/' . $aboutImg;
                }
            @endphp
            <img src="{{ \Illuminate\Support\Str::startsWith($page->image, ['http://', 'https://']) ? $page->image : asset($aboutImg) }}" alt="{{ $page->title }}" style="width: 100%; height: auto; border-radius: 8px;" onerror="this.onerror=null; this.src='{{ asset('images/profile.jpg') }}';">
        </div>

        <div class="single-post-content about-content" style="max-width: 800px; margin: 50px auto 80px; padding: 0 20px;">
            {!! $page->content !!}
        </div>
    </article>
</div>
@endsection
