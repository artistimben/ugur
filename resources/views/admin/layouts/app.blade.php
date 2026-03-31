<!DOCTYPE html>
<html lang="tr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UK BLOG - Yönetim Paneli</title>
    
    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
        .sidebar-link.active { background: linear-gradient(to right, #0ea5e9, #6366f1); color: white; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); }
        .sidebar-link:not(.active):hover { background: rgba(255, 255, 255, 0.05); }
        .ck-editor__editable { min-height: 400px; border-radius: 0 0 12px 12px !important; }
        .ck-toolbar { border-radius: 12px 12px 0 0 !important; border-bottom: none !important; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 antialiased h-full overflow-hidden" x-data="{ sidebarOpen: window.innerWidth >= 1024, mobileSidebarOpen: false }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="mobileSidebarOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileSidebarOpen = false" 
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 lg:hidden" x-cloak></div>

    <div class="flex h-full overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 text-slate-300 transform transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0"
               :class="mobileSidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            
            <div class="flex flex-col h-full">
                <!-- Sidebar Header -->
                <div class="px-8 py-8 flex items-center justify-between">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center group-hover:rotate-6 transition-transform shadow-lg shadow-indigo-500/30">
                            <i class="fas fa-feather-pointed text-white text-lg"></i>
                        </div>
                        <span class="text-xl font-outfit font-extrabold tracking-tight text-white uppercase">UK Panel</span>
                    </a>
                    <button @click="mobileSidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 px-4 py-4 space-y-1.5 overflow-y-auto">
                    <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-2">Genel</div>
                    
                    <a href="{{ route('admin.dashboard') }}" 
                       class="sidebar-link flex items-center space-x-3 p-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home-alt w-5 text-center group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Gösterge Paneli</span>
                    </a>
                    
                    <div class="pt-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-2">İçerik Yönetimi</div>

                    <a href="{{ route('admin.posts.index') }}" 
                       class="sidebar-link flex items-center space-x-3 p-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper w-5 text-center group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Yazılar</span>
                    </a>
                    
                    <a href="{{ route('admin.categories.index') }}" 
                       class="sidebar-link flex items-center space-x-3 p-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="fas fa-shapes w-5 text-center group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Kategoriler</span>
                    </a>
                    
                    <div class="pt-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-2">Pazarlama</div>

                    <a href="{{ route('admin.advertisements.index') }}" 
                       class="sidebar-link flex items-center space-x-3 p-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.advertisements.*') ? 'active' : '' }}">
                        <i class="fas fa-bullhorn w-5 text-center group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Reklam Yönetimi</span>
                    </a>
                    
                    <div class="pt-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-2">Sistem</div>

                    <a href="{{ route('profile.edit') }}" 
                       class="sidebar-link flex items-center space-x-3 p-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="fas fa-user-gear w-5 text-center group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Profil Ayarları</span>
                    </a>
                </nav>

                <!-- Sidebar Footer -->
                <div class="p-4 bg-slate-950/30">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 p-3.5 rounded-xl text-slate-400 hover:text-white transition-colors hover:bg-white/5 mb-2">
                        <i class="fas fa-eye w-5"></i>
                        <span class="font-medium">Siteyi Gör</span>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center space-x-3 p-3.5 rounded-xl text-rose-400 hover:text-rose-300 transition-colors hover:bg-rose-500/10">
                            <i class="fas fa-power-off w-5"></i>
                            <span class="font-medium">Oturumu Kapat</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto relative flex flex-col">
            
            <!-- Navbar -->
            <header class="h-20 glass sticky top-0 z-30 flex items-center justify-between px-6 lg:px-10 border-b border-slate-200/60">
                <div class="flex items-center space-x-4">
                    <button @click="mobileSidebarOpen = true" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors">
                        <i class="fas fa-bars-staggered"></i>
                    </button>
                    <div class="hidden md:flex items-center text-slate-400 text-sm">
                        <span class="hover:text-indigo-600 transition-colors cursor-default capitalize">{{ str_replace('.', ' / ', request()->route()->getName()) }}</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-6">
                    <div class="hidden sm:flex flex-col items-end">
                        <span class="text-sm font-bold text-slate-800">{{ auth()->user()->name ?? 'Yönetici' }}</span>
                        <span class="text-[10px] font-bold text-indigo-500 uppercase tracking-tighter">Yönetici</span>
                    </div>
                    <div class="relative group">
                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-indigo-500 to-purple-500 p-0.5 shadow-lg group-hover:scale-105 transition-transform">
                            <img src="{{ asset('images/profile.jpg') }}" class="w-full h-full rounded-[14px] object-cover bg-white" alt="Profile">
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6 lg:p-10 flex-1 max-w-[1600px] mx-auto w-full">
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                         class="fixed bottom-10 right-10 z-50 transform"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="translate-y-20 opacity-0"
                         x-transition:enter-end="translate-y-0 opacity-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         x-cloak>
                        <div class="bg-slate-900 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center space-x-4 border border-slate-700/50">
                            <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-xs"></i>
                            </div>
                            <span class="font-medium">{{ session('success') }}</span>
                            <button @click="show = false" class="text-slate-400 hover:text-white transition-colors">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>

            <!-- Global Footer -->
            <footer class="py-6 px-10 border-t border-slate-200 text-slate-400 text-xs flex justify-between items-center bg-white/50">
                <div>&copy; {{ date('Y') }} UK Blog Yönetim. Tüm Hakları Saklıdır.</div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-indigo-600 transition-colors">Destek</a>
                    <a href="#" class="hover:text-indigo-600 transition-colors">Sürüm 2.1.0</a>
                </div>
            </footer>
        </main>
    </div>

</body>
</html>
