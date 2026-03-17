<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UĞUR KANTEKİN &#8211; Huzur Kalpte Başlar</title>
    
    <!-- Design Fonts aligned with original site -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="home blog wp-custom-logo hfeed rightsidebar blog-layout-two">
    <!-- Floating Background Atmosphere -->
    <div class="background-atmosphere">
        <div class="smoke-shape smoke-1"></div>
        <div class="smoke-shape smoke-2"></div>
        <div class="smoke-shape smoke-3"></div>
    </div>

    <!-- Particle System -->
    <div class="particle-system">
        <div class="dot" style="top:20%; left:10%; --duration:5s; --opacity:0.6;"></div>
        <div class="dot" style="top:40%; left:80%; --duration:8s; --opacity:0.4;"></div>
        <div class="dot" style="top:70%; left:30%; --duration:6s; --opacity:0.8;"></div>
        <div class="dot" style="top:10%; left:90%; --duration:10s; --opacity:0.3;"></div>
        <div class="dot" style="top:60%; left:50%; --duration:7s; --opacity:0.5;"></div>
        <div class="dot" style="top:85%; left:15%; --duration:5s; --opacity:0.7;"></div>
        <div class="dot" style="top:30%; left:40%; --duration:9s; --opacity:0.2;"></div>
        <div class="dot" style="top:15%; left:65%; --duration:12s; --opacity:0.5;"></div>
        <div class="dot" style="top:55%; left:95%; --duration:4s; --opacity:0.6;"></div>
        <div class="dot" style="top:90%; left:75%; --duration:11s; --opacity:0.4;"></div>
        <div class="dot" style="top:5%; left:25%; --duration:15s; --opacity:0.3;"></div>
        <div class="dot" style="top:45%; left:5%; --duration:6s; --opacity:0.7;"></div>
    </div>

    <div id="page" class="site">
        <header id="masthead" class="site-header">

            <!-- Middle Bar / Branding -->
            <div class="header-inner">
                <div class="container">
                    <div class="site-branding">
                        <div class="profile-img-holder">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/profile.jpg') }}" alt="Uğur Kantekin">
                            </a>
                        </div>
                        <h1 class="brand-name"><a href="{{ route('home') }}">UĞUR KANTEKİN</a></h1>
                        <p class="brand-subtitle">Huzur Kalpte Başlar</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar / Navigation -->
            <div class="header-bottom">
                <div class="container relative-container">
                    <button class="mobile-menu-trigger" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars"></i>
                    </button>
                    <ul class="main-nav" id="mainNav">
                        <li class="mobile-only-logo"><h2 style="color: white; margin-bottom: 20px;">MENÜ</h2></li>
                        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Ana Sayfa</a></li>
                        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Hakkımda</a></li>
                        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">İletişim</a></li>
                        <li><a href="{{ route('privacy') }}" class="{{ request()->routeIs('privacy') ? 'active' : '' }}">Gizlilik Politikası</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <script>
            function toggleMobileMenu() {
                const nav = document.getElementById('mainNav');
                nav.classList.toggle('show');
                const icon = document.querySelector('.mobile-menu-trigger i');
                if (nav.classList.contains('show')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                const nav = document.getElementById('mainNav');
                const trigger = document.querySelector('.mobile-menu-trigger');
                if (!nav.contains(event.target) && !trigger.contains(event.target) && nav.classList.contains('show')) {
                    toggleMobileMenu();
                }
            });
        </script>

        <!-- Featured Slider instead of Banner (Matching Reference) -->
        @if(request()->routeIs('home') && isset($galleryPosts))
        <div class="banner featured-slider-section">
            <div class="container">
                <div class="home-about-section" style="margin-bottom: 0; text-align: center;">
                    <h2 class="slider-main-title">HAKKIMDA SEÇKİLER</h2>
                    
                    <div class="featured-slider-wrapper">
                        <button class="slider-btn btn-prev" onclick="scrollSlider(-1)"><i class="fas fa-chevron-left"></i></button>
                        <div class="about-slider" id="featuredSlider">
                            @foreach($galleryPosts as $gPost)
                                <article class="featured-card">
                                    @if($gPost->image)
                                    <div class="img-holder">
                                        <img src="{{ \Illuminate\Support\Str::startsWith($gPost->image, ['http://', 'https://']) ? $gPost->image : Storage::url($gPost->image) }}" alt="{{ $gPost->title }}">
                                    </div>
                                    @endif
                                    
                                    <div class="card-content-overlay">
                                        <span class="overlay-cat">{{ $gPost->category ? mb_strtoupper($gPost->category->name, 'UTF-8') : 'GENEL YAZILAR' }}</span>
                                        <h2 class="overlay-title">
                                            <a href="{{ route('post.show', $gPost->slug) }}">{{ mb_strtoupper($gPost->title, 'UTF-8') }}</a>
                                        </h2>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <button class="slider-btn btn-next" onclick="scrollSlider(1)"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let autoScrollInterval;
            const slider = document.getElementById('featuredSlider');

            function scrollSlider(direction) {
                if (!slider) return;
                const scrollAmount = slider.offsetWidth > 600 ? slider.offsetWidth / 3 : slider.offsetWidth / 1.5;
                const maxScroll = slider.scrollWidth - slider.clientWidth;
                
                // Infinite loop logic
                if (direction === 1 && slider.scrollLeft >= maxScroll - 50) {
                    slider.scrollTo({ left: 0, behavior: 'smooth' });
                } else if (direction === -1 && slider.scrollLeft <= 10) {
                    slider.scrollTo({ left: maxScroll, behavior: 'smooth' });
                } else {
                    slider.scrollBy({
                        left: direction * scrollAmount,
                        behavior: 'smooth'
                    });
                }
            }

            function startAutoScroll() {
                stopAutoScroll();
                autoScrollInterval = setInterval(() => {
                    scrollSlider(1);
                }, 4000); // 4 seconds interval for better readability
            }

            function stopAutoScroll() {
                if (autoScrollInterval) {
                    clearInterval(autoScrollInterval);
                }
            }

            function resetAutoScroll() {
                stopAutoScroll();
                startAutoScroll();
            }

            // Start on load after a small delay to ensure DOM is ready
            document.addEventListener('DOMContentLoaded', () => {
                setTimeout(startAutoScroll, 1000);
            });
            
            // Pause on hover
            slider.addEventListener('mouseenter', stopAutoScroll);
            slider.addEventListener('mouseleave', startAutoScroll);

            // Manual click resets the timer
            document.querySelectorAll('.slider-btn').forEach(btn => {
                btn.addEventListener('click', resetAutoScroll);
            });
        </script>
        @endif

        @php
            $allAds = $ads ?? \App\Models\Advertisement::where('is_active', true)->get();
            $leftGutterAds = $allAds->where('position', 'left_gutter');
            $rightGutterAds = $allAds->where('position', 'right_gutter');
        @endphp

        <!-- Gutter Ads -->
        @foreach($leftGutterAds as $ad)
        <div class="gutter-ad left-gutter">
            @if($ad->type === 'script')
                {!! $ad->script_code !!}
            @else
                @if($ad->link)
                    <a href="{{ Str::startsWith($ad->link, ['http://', 'https://', '/']) ? $ad->link : 'http://' . $ad->link }}" target="_blank">
                        <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Ad">
                    </a>
                @else
                    <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Ad">
                @endif
            @endif
        </div>
        @endforeach

        @foreach($rightGutterAds as $ad)
        <div class="gutter-ad right-gutter">
            @if($ad->type === 'script')
                {!! $ad->script_code !!}
            @else
                @if($ad->link)
                    <a href="{{ Str::startsWith($ad->link, ['http://', 'https://', '/']) ? $ad->link : 'http://' . $ad->link }}" target="_blank">
                        <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Ad">
                    </a>
                @else
                    <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Ad">
                @endif
            @endif
        </div>
        @endforeach

        <main id="main" class="site-main">
            <div class="container content-area">
                <div class="main-column">
                    @yield('content')
                </div>
                
                <aside class="sidebar-column">
                    <!-- Search Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Ara</h3>
                        <form role="search" method="get" class="search-form" action="{{ route('home') }}">
                            <input type="search" placeholder="Arama yapın..." name="q" value="{{ request('q') }}">
                            <input type="submit" value="Ara">
                        </form>
                    </div>
                    
                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget widget_recent_entries">
                        <h3 class="widget-title">Geçmiş Yazılarım</h3>
                        <ul>
                            @php
                                $recentPostsSidebar = $sidebarPosts ?? \App\Models\Post::where('is_published', true)->latest()->take(5)->get();
                            @endphp
                            @foreach($recentPostsSidebar as $rp)
                            <li>
                                <div class="recent-post-info">
                                    <h4 class="recent-post-title"><a href="{{ route('post.show', $rp->slug) }}">{{ mb_strtoupper($rp->title, 'UTF-8') }}</a></h4>
                                    <span style="font-size: 13px; color: #999; font-style: italic; font-family: 'EB Garamond', serif;">{{ $rp->created_at->format('d M, Y') }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Sidebar Advertisements -->
                    @php
                        $sidebarAds = ($ads ?? \App\Models\Advertisement::where('is_active', true)->where('position', 'sidebar')->get())->where('position', 'sidebar');
                    @endphp
                    @foreach($sidebarAds as $ad)
                    <div class="sidebar-widget advertisement-widget" style="margin-top: 30px;">
                        @if($ad->title)
                            <h3 class="widget-title">{{ $ad->title }}</h3>
                        @endif
                        <div class="ad-container" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05); transition: transform 0.3s ease;">
                            @if($ad->type === 'script')
                                {!! $ad->script_code !!}
                            @else
                                @if($ad->link)
                                    <a href="{{ Str::startsWith($ad->link, ['http://', 'https://', '/']) ? $ad->link : 'http://' . $ad->link }}" target="_blank" style="display: block;">
                                        <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Reklam" style="width: 100%; height: auto; display: block; filter: brightness(0.95); transition: filter 0.3s ease;" onmouseover="this.style.filter='brightness(1)'" onmouseout="this.style.filter='brightness(0.95)'">
                                    </a>
                                @else
                                    <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Reklam" style="width: 100%; height: auto; display: block; filter: brightness(0.95); transition: filter 0.3s ease;" onmouseover="this.style.filter='brightness(1)'" onmouseout="this.style.filter='brightness(0.95)'">
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                </aside>
            </div>
        </main>

        <footer class="site-footer">
            <div class="container">
                <p>&copy; {{ date('Y') }} UĞUR KANTEKİN. Tüm hakları saklıdır. | Huzur Kalpte Başlar</p>
            </div>
        </footer>
    </div>
    
</body>
</html>
