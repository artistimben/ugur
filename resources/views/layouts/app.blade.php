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

    <!-- ─── ANA DRAWER MENÜ (Sol Panel) ──────────────────────── -->
    <div class="cat-overlay" id="catOverlay" onclick="closeCatDrawer()"></div>
    <aside class="cat-drawer" id="catDrawer">
        <div class="cat-drawer-header">
            <span>Menü</span>
            <button class="cat-drawer-close" onclick="closeCatDrawer()" aria-label="Kapat">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="cat-drawer-nav">
            <!-- Ana Linkler -->
            <a href="{{ route('home') }}" class="cat-drawer-link {{ request()->routeIs('home') && !request('category') ? 'active' : '' }}">
                <i class="fas fa-home"></i> <span>Ana Sayfa</span>
            </a>
            <a href="{{ route('about') }}" class="cat-drawer-link {{ request()->routeIs('about') ? 'active' : '' }}">
                <i class="fas fa-user-circle"></i> <span>Hakkımda</span>
            </a>
            <a href="{{ route('contact') }}" class="cat-drawer-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> <span>İletişim</span>
            </a>
            <a href="{{ route('privacy') }}" class="cat-drawer-link {{ request()->routeIs('privacy') ? 'active' : '' }}">
                <i class="fas fa-shield-alt"></i> <span>Gizlilik</span>
            </a>
            <a href="{{ route('post.random') }}" class="cat-drawer-link" style="color: var(--accent-color);">
                <i class="fas fa-dice"></i> <span>Şanslı Konu</span>
            </a>

            <div class="drawer-divider"></div>
            <!-- Categories removed from here -->

            <a href="{{ route('home') }}" class="cat-drawer-link {{ !request('category') && request()->routeIs('home') ? 'active' : '' }}" onclick="closeCatDrawer()">
                <i class="fas fa-th-large"></i>
                <span>Tüm Yazılar</span>
            </a>
            @php
                $drawerIcons = [
                    'dini-bilgiler'      => 'fa-mosque',
                    'cocuk-yetistirme'   => 'fa-child',
                    'aile-iletisimi'     => 'fa-home',
                    'aile-ve-iliskiler'  => 'fa-users',
                    'kisisel-gelisim'    => 'fa-seedling',
                    'manevi-yazilar'     => 'fa-heart',
                    'psikoloji-ve-saglik'=> 'fa-brain',
                    'egitim'             => 'fa-graduation-cap',
                    'teknoloji-ve-toplum'=> 'fa-laptop',
                    'genel'              => 'fa-book-open',
                    'genel-yazilar'      => 'fa-newspaper',
                ];
            @endphp
            @foreach(\App\Models\Category::all() as $cat)
                @php $dIcon = $drawerIcons[$cat->slug] ?? 'fa-book-open'; @endphp
                <a href="{{ route('home', ['category' => $cat->slug]) }}"
                   class="cat-drawer-link {{ request('category') == $cat->slug ? 'active' : '' }}"
                   onclick="closeCatDrawer()">
                    <i class="fas {{ $dIcon }}"></i>
                    <span>{{ $cat->name }}</span>
                </a>
            @endforeach
        </nav>
    </aside>
    <!-- ──────────────────────────────────────────────────────── -->

    <header class="main-header">
        <div class="container header-container" style="justify-content: space-between;">

            <!-- Sol: Logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Uğur Kantekin">
                    UĞUR KANTEKİN
                </a>
            </div>

            <!-- Sağ: Nav Linkleri (Masaüstü) -->
            <div class="header-right">
                <nav class="nav-links" id="desktopNav">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') && !request('category') ? 'active' : '' }}">Ana Sayfa</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Hakkımda</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">İletişim</a>
                    <a href="{{ route('privacy') }}" class="{{ request()->routeIs('privacy') ? 'active' : '' }}">Gizlilik</a>
                    <a href="javascript:void(0);" onclick="toggleCatDrawer()" class="cat-trigger-link"><i class="fas fa-bars"></i> Kategoriler</a>
                    
                    <a href="{{ route('post.random') }}" class="random-post-btn" title="Bugünün Yazısını Keşfet">
                        <i class="fas fa-dice"></i> <span>BUGÜNÜN ŞANSLI KONUSU</span>
                    </a>
                </nav>

                <!-- Mobil Hamburger Menü İkonu -->
                <button class="mobile-menu-toggle" onclick="toggleCatDrawer()" aria-label="Menü">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

        </div>
    </header>

    <!-- Hero section removed -->

    <!-- Side Gutter Ads -->
    @if(isset($ads))
        @php 
            $leftAd  = $ads->where('position', 'left_gutter')->first();
            $rightAd = $ads->where('position', 'right_gutter')->first();
        @endphp

        @if($leftAd)
            <div class="gutter-ad left">
                <span class="ad-label">REKLAM</span>
                @if($leftAd->type == 'script') {!! $leftAd->script_code !!} @else
                    <a href="{{ $leftAd->link }}" target="_blank">
                        <img src="{{ \Illuminate\Support\Str::startsWith($leftAd->image, ['http://', 'https://']) ? $leftAd->image : asset($leftAd->image) }}" onerror="this.onerror=null; this.parentElement.parentElement.style.display='none';">
                    </a>
                @endif
            </div>
        @endif

        @if($rightAd)
            <div class="gutter-ad right">
                <span class="ad-label">REKLAM</span>
                @if($rightAd->type == 'script') {!! $rightAd->script_code !!} @else
                    <a href="{{ $rightAd->link }}" target="_blank">
                        <img src="{{ \Illuminate\Support\Str::startsWith($rightAd->image, ['http://', 'https://']) ? $rightAd->image : asset($rightAd->image) }}" onerror="this.onerror=null; this.parentElement.parentElement.style.display='none';">
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
                    <img src="{{ \Illuminate\Support\Str::startsWith($topAd->image, ['http://', 'https://']) ? $topAd->image : asset($topAd->image) }}" style="max-width: 100%; border-radius: 4px;">
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
        /* ── Ana Menü / Kategori Drawer ── */
        function toggleCatDrawer() {
            const drawer  = document.getElementById('catDrawer');
            const overlay = document.getElementById('catOverlay');
            const isOpen  = drawer.classList.contains('open');
            if (isOpen) {
                closeCatDrawer();
            } else {
                drawer.classList.add('open');
                overlay.classList.add('show');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeCatDrawer() {
            document.getElementById('catDrawer').classList.remove('open');
            document.getElementById('catOverlay').classList.remove('show');
            document.body.style.overflow = '';
        }

        /* ESC ile drawer kapat */
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') { closeCatDrawer(); }
        });
    </script>
</body>
</html>
