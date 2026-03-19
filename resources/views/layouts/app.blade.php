<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UĞUR KANTEKİN – Huzur Kalpte Başlar</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body data-category="{{ request('category', 'genel') }}">
    <!-- Atmospheric Background Layers -->
    <div class="category-decoration">
        <div class="decoration-node" style="top: -10%; left: -10%;"></div>
        <div class="decoration-node" style="bottom: -10%; right: -10%;"></div>
    </div>

    <header class="main-header">
        <div class="container header-container">
            <div class="logo">
                <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 16px;">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Uğur Kantekin" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid var(--accent-color);">
                    UĞUR KANTEKİN
                </a>
            </div>
            
            <nav class="nav-links" id="mainNav">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Ana Sayfa</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Hakkımda</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">İletişim</a>
                <a href="{{ route('privacy') }}" class="{{ request()->routeIs('privacy') ? 'active' : '' }}">Gizlilik</a>
                <a href="{{ route('post.random') }}" class="random-post-btn" title="Bugünün Yazısını Keşfet">
                    <i class="fas fa-dice"></i> <span>Bugünün Şanslı Konusu</span>
                </a>
            </nav>

            <div class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    @if(request()->routeIs('home') && !request('category'))
    <section class="hero-section">
        <div class="container hero-content">
            <h1>Huzur Kalpte Başlar</h1>
            <p>Hayata, insana ve maneviyata dair derinlemesine okumalar.</p>
        </div>
    </section>
    @endif

    <!-- Global Category Bar -->
    <div class="container global-category-bar-wrapper">
        <div class="sidebar-category-list horizontal">
            <a href="{{ route('home') }}" class="sidebar-category-link {{ !request('category') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Hepsi
            </a>
            @foreach(\App\Models\Category::all() as $cat)
                @php 
                    $icons = ['dini-bilgiler' => 'fa-mosque', 'cocuk-yetistirme' => 'fa-child', 'aile-iletisimi' => 'fa-home', 'kisisel-gelisim' => 'fa-seedling', 'manevi-yazilar' => 'fa-heart', 'genel' => 'fa-book-open'];
                    $icon = $icons[$cat->slug] ?? 'fa-book-open';
                @endphp
                <a href="{{ route('home', ['category' => $cat->slug]) }}" class="sidebar-category-link {{ request('category') == $cat->slug ? 'active' : '' }}">
                    <i class="fas {{ $icon }}"></i> {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Side Gutter Ads -->
    @if(isset($ads))
        @php 
            $leftAd = $ads->where('position', 'left_gutter')->first();
            $rightAd = $ads->where('position', 'right_gutter')->first();
        @endphp

        @if($leftAd)
            <div class="gutter-ad left">
                <span class="ad-label">REKLAM</span>
                @if($leftAd->type == 'script') {!! $leftAd->script_code !!} @else
                    <a href="{{ $leftAd->link }}" target="_blank">
                        <img src="{{ \Illuminate\Support\Str::startsWith($leftAd->image, ['http://', 'https://']) ? $leftAd->image : Storage::url($leftAd->image) }}" onerror="this.parentElement.parentElement.style.display='none'">
                    </a>
                @endif
            </div>
        @endif

        @if($rightAd)
            <div class="gutter-ad right">
                <span class="ad-label">REKLAM</span>
                @if($rightAd->type == 'script') {!! $rightAd->script_code !!} @else
                    <a href="{{ $rightAd->link }}" target="_blank">
                        <img src="{{ \Illuminate\Support\Str::startsWith($rightAd->image, ['http://', 'https://']) ? $rightAd->image : Storage::url($rightAd->image) }}" onerror="this.parentElement.parentElement.style.display='none'">
                    </a>
                @endif
            </div>
        @endif
    @endif

    @if(isset($ads) && ($topAd = $ads->where('position', 'top')->first()))
        <div class="container" style="margin: 20px auto; text-align: center;">
            <span class="ad-label">REKLAM</span>
            @if($topAd->type == 'script') {!! $topAd->script_code !!} @else
                <a href="{{ $topAd->link }}" target="_blank">
                    <img src="{{ \Illuminate\Support\Str::startsWith($topAd->image, ['http://', 'https://']) ? $topAd->image : Storage::url($topAd->image) }}" style="max-width: 100%; border-radius: 4px;">
                </a>
            @endif
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="main-footer">
        <div class="container footer-grid">
            <div class="footer-about">
                <h3>UĞUR KANTEKİN</h3>
                <p>Eğitimci ve Yazar. Toplumsal gelişim, aile içi iletişim ve manevi değerler üzerine kaleme aldığım yazılarla huzura giden yolculukta sizlere eşlik ediyorum.</p>
            </div>
            <div class="footer-links">
                <h4>Hızlı Menü</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Yazılarım</a></li>
                    <li><a href="{{ route('about') }}">Hakkımda</a></li>
                    <li><a href="{{ route('contact') }}">İletişim</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Sosyal Medya</h4>
                <ul>
                    <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> Twitter (X)</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                &copy; {{ date('Y') }} UĞUR KANTEKİN. Tüm hakları saklıdır.
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const nav = document.getElementById('mainNav');
            nav.classList.toggle('mobile-active');
        }
    </script>
</body>
</html>
