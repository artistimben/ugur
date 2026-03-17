<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UK BLOG - Admin Panel</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link.active { background-color: #374151; border-left: 4px solid #3b82f6; }
        .ck-editor__editable { min-height: 400px; }
    </style>
</head>
<body class="bg-gray-100 antialiased" x-data="{ sidebarOpen: true }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="!sidebarOpen" @click="sidebarOpen = true" class="fixed inset-0 bg-black opacity-50 z-20 lg:hidden"></div>

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="bg-gray-900 text-white w-64 flex-shrink-0 transition-all duration-300 z-30 overflow-y-auto"
               :class="sidebarOpen ? 'ml-0' : '-ml-64 lg:ml-0'">
            <div class="p-6">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold flex items-center space-x-2">
                    <i class="fas fa-rocket text-blue-500"></i>
                    <span>UK BLOG</span>
                </a>
            </div>
            
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" 
                   class="sidebar-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition-colors {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Gösterge Paneli</span>
                </a>
                
                <a href="{{ route('admin.posts.index') }}" 
                   class="sidebar-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition-colors {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt w-5"></i>
                    <span>Yazılar</span>
                </a>
                
                <a href="{{ route('admin.categories.index') }}" 
                   class="sidebar-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition-colors {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fas fa-tags w-5"></i>
                    <span>Kategoriler</span>
                </a>

                <a href="{{ route('admin.advertisements.index') }}" 
                   class="sidebar-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition-colors {{ request()->routeIs('admin.advertisements.*') ? 'active' : '' }}">
                    <i class="fas fa-ad w-5"></i>
                    <span>Reklam Yönetimi</span>
                </a>
                
                <a href="{{ route('profile.edit') }}" 
                   class="sidebar-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition-colors {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <i class="fas fa-user-cog w-5"></i>
                    <span>Profil Ayarları</span>
                </a>

                <div class="pt-4 border-t border-gray-800 mt-4">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition-colors">
                        <i class="fas fa-external-link-alt w-5"></i>
                        <span>Siteyi Gör</span>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center space-x-3 p-3 rounded-lg hover:bg-red-900/30 text-red-400 transition-colors mt-2">
                            <i class="fas fa-sign-out-alt w-5"></i>
                            <span>Çıkış Yap</span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto relative">
            
            <!-- Navbar -->
            <header class="bg-white shadow py-4 px-8 flex justify-between items-center sm:hidden lg:flex sticky top-0 z-10">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600 font-medium">Hoş geldin, {{ auth()->user()->name }}</span>
                    <img src="{{ asset('images/profile.jpg') }}" class="w-10 h-10 rounded-full border" alt="Admin">
                </div>
            </header>

            <div class="p-8 max-w-7xl mx-auto">
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                         class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded shadow-sm flex justify-between items-center">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span class="text-green-800 font-medium">{{ session('success') }}</span>
                        </div>
                        <button @click="show = false" class="text-green-500 hover:text-green-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>
