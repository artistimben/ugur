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
            <img src="{{ \Illuminate\Support\Str::startsWith($page->image, ['http://', 'https://', '/wp-content']) ? $page->image : asset($aboutImg) }}" alt="{{ $page->title }}" style="width: 100%; height: auto; border-radius: 8px;" onerror="this.onerror=null; this.src='{{ asset('images/profile.jpg') }}';">
        </div>

        <div class="single-post-content about-content" style="max-width: 800px; margin: 50px auto 80px; padding: 0 20px;">
            @php
                $sections = json_decode($page->content, true);
            @endphp

            @if($sections && isset($sections['intro_quote']))
                <p style="font-size: 24px; font-family: 'Playfair Display', serif; font-style: italic; color: #1a1a1a; line-height: 1.6; margin-bottom: 48px; border-left: 4px solid #c2a35d; padding-left: 32px;">
                    "{{ $sections['intro_quote'] }}"
                </p>

                <p>{{ $sections['bio_1'] }}</p>

                <div style="margin: 60px 0; padding: 40px; background: #fdfdfd; border: 1px solid #f0f0f0; border-radius: 8px; text-align: center; position: relative;">
                    <i class="fas fa-quote-left" style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 32px; color: #c2a35d; background: white; padding: 10px;"></i>
                    <p style="font-family: 'Playfair Display', serif; font-size: 20px; font-style: italic; color: #1a1a1a; margin-bottom: 0; line-height: 1.8;">
                        "{{ $sections['middle_quote'] }}"
                    </p>
                </div>

                <p>{{ $sections['bio_2'] }}</p>

                <h2 style="font-family: 'Playfair Display', serif; font-size: 32px; margin: 60px 0 24px; color: #1a1a1a;">{{ $sections['section_2_title'] }}</h2>
                <p>{{ $sections['section_2_text'] }}</p>

                <h2 style="font-family: 'Playfair Display', serif; font-size: 32px; margin: 60px 0 24px; color: #1a1a1a;">{{ $sections['section_3_title'] }}</h2>
                <p>{{ $sections['section_3_text'] }}</p>

                <div style="margin-top: 100px; padding-top: 60px; border-top: 1px solid #eeeeee; text-align: center;">
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 20px; margin-bottom: 32px; letter-spacing: 3px; color: #c2a35d; font-weight: 700;">{{ $sections['footer_title'] }}</h3>
                    <p style="font-size: 15px; color: #666; line-height: 2; max-width: 600px; margin: 0 auto;">
                        {{ $sections['footer_text'] }}
                    </p>
                    <div style="margin-top: 40px; color: #c2a35d;">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
            @else
                {!! $page->content !!}
            @endif
        </div>
    </article>
</div>
@endsection
