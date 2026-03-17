@extends('layouts.app')

@section('content')

    <!-- Top Advertisements -->
    @foreach($ads->where('position', 'top') as $ad)
    <div class="horizontal-ad" style="margin-bottom: 40px; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
        @if($ad->type === 'script')
            {!! $ad->script_code !!}
        @else
            @if($ad->link)
                <a href="{{ Str::startsWith($ad->link, ['http://', 'https://', '/']) ? $ad->link : 'http://' . $ad->link }}" target="_blank" style="display: block;">
                    <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Reklam" style="width: 100%; height: auto; display: block;">
                </a>
            @else
                <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Reklam" style="width: 100%; height: auto; display: block;">
            @endif
        @endif
    </div>
    @endforeach

    @forelse($posts as $index => $post)
        <article class="post-card">
            @if($post->image)
            <div class="img-holder">
                <a href="{{ route('post.show', $post->slug) }}">
                    <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image) }}" alt="{{ $post->title }}">
                </a>
            </div>
            @endif
            
            <header class="entry-header">
                <span class="cat-links"><a href="#">{{ $post->category ? $post->category->name : 'Genel Yazılar' }}</a></span>
                <h2 class="entry-title"><a href="{{ route('post.show', $post->slug) }}">{{ mb_strtoupper($post->title, 'UTF-8') }}</a></h2>
                <div class="entry-meta">
                    <span class="byline">Geliştirici: <a href="#">admin</a></span> | 
                    <span class="posted-on">güncelleme tarihi: {{ $post->created_at->translatedFormat('F j, Y') }}</span>
                </div>
            </header>
            
            <div class="entry-content">
                <p>{{ Str::limit(strip_tags($post->content), 300) }}</p>
            </div>
        </article>

        <!-- In-between Advertisements (Every 2 posts) -->
        @if(($index + 1) % 2 == 0)
            @php
                $betweenAds = $ads->where('position', 'between');
                $adToDisplay = $betweenAds->skip(($index + 1) / 2 - 1)->first();
            @endphp
            @if($adToDisplay)
            <div class="horizontal-ad" style="margin: 40px 0; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                @if($adToDisplay->type === 'script')
                    {!! $adToDisplay->script_code !!}
                @else
                    @if($adToDisplay->link)
                        <a href="{{ Str::startsWith($adToDisplay->link, ['http://', 'https://', '/']) ? $adToDisplay->link : 'http://' . $adToDisplay->link }}" target="_blank" style="display: block;">
                            <img src="{{ Str::startsWith($adToDisplay->image, ['http://', 'https://']) ? $adToDisplay->image : Storage::url($adToDisplay->image) }}" alt="Reklam" style="width: 100%; height: auto; display: block;">
                        </a>
                    @else
                        <img src="{{ Str::startsWith($adToDisplay->image, ['http://', 'https://']) ? $adToDisplay->image : Storage::url($adToDisplay->image) }}" alt="Reklam" style="width: 100%; height: auto; display: block;">
                    @endif
                @endif
            </div>
            @endif
        @endif
    @empty
        <p>Henüz yazı eklenmedi.</p>
    @endforelse

    <!-- Pagination Links -->
    <div class="pagination-wrapper" style="margin-top: 60px; margin-bottom: 20px;">
        {{ $posts->links() }}
    </div>
@endsection
