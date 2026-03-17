@extends('admin.layouts.app')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Hoş Geldiniz, {{ auth()->user()->name }} 👋</h1>
        <p class="text-gray-500 mt-1">İşte bugün blogunuzda olup bitenler.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                    <i class="fas fa-file-alt text-xl"></i>
                </div>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Toplam Yazı</span>
            </div>
            <div class="text-3xl font-extrabold text-gray-900">{{ \App\Models\Post::count() }}</div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-50 text-green-600 rounded-xl">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Yayında</span>
            </div>
            <div class="text-3xl font-extrabold text-gray-900">{{ \App\Models\Post::where('is_published', true)->count() }}</div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-yellow-50 text-yellow-600 rounded-xl">
                    <i class="fas fa-edit text-xl"></i>
                </div>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Taslaklar</span>
            </div>
            <div class="text-3xl font-extrabold text-gray-900">{{ \App\Models\Post::where('is_published', false)->count() }}</div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-50 text-purple-600 rounded-xl">
                    <i class="fas fa-tags text-xl"></i>
                </div>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Kategoriler</span>
            </div>
            <div class="text-3xl font-extrabold text-gray-900">{{ \App\Models\Category::count() }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Posts -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-extrabold text-gray-800 tracking-tight">Son Yazılar</h3>
                    <a href="{{ route('admin.posts.index') }}" class="text-blue-600 text-sm font-bold hover:underline">Tümünü Gör</a>
                </div>
                <div class="divide-y divide-gray-50">
                    @forelse(\App\Models\Post::with('category')->latest()->take(5)->get() as $post)
                        <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-lg bg-gray-100 overflow-hidden flex-shrink-0 border">
                                    @if($post->image)
                                        <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 leading-tight">{{ $post->title }}</h4>
                                    <p class="text-xs text-gray-400 mt-1">{{ optional($post->category)->name }} • {{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div>
                                @if($post->is_published)
                                    <span class="text-[10px] font-bold bg-green-100 text-green-700 px-2 py-0.5 rounded-full uppercase">Yayında</span>
                                @else
                                    <span class="text-[10px] font-bold bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full uppercase">Taslak</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-10 text-center text-gray-400 italic">
                            Henüz yazı eklenmemiş.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-extrabold text-gray-800 tracking-tight">Hızlı İşlemler</h3>
                </div>
                <div class="p-6 space-y-4">
                    <a href="{{ route('admin.posts.create') }}" class="flex items-center p-3 bg-blue-50 text-blue-700 rounded-xl hover:bg-blue-100 transition-colors group">
                        <div class="w-10 h-10 rounded-lg bg-white shadow-sm flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                            <i class="fas fa-plus"></i>
                        </div>
                        <span class="font-bold">Yeni Yazı Yaz</span>
                    </a>
                    
                    <a href="{{ route('admin.categories.create') }}" class="flex items-center p-3 bg-purple-50 text-purple-700 rounded-xl hover:bg-purple-100 transition-colors group">
                        <div class="w-10 h-10 rounded-lg bg-white shadow-sm flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                            <i class="fas fa-folder-plus"></i>
                        </div>
                        <span class="font-bold">Yeni Kategori Ekle</span>
                    </a>

                    <a href="{{ route('profile.edit') }}" class="flex items-center p-3 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors group">
                        <div class="w-10 h-10 rounded-lg bg-white shadow-sm flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <span class="font-bold">Bilgilerimi Güncelle</span>
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
                <div class="relative z-10">
                    <h4 class="font-extrabold text-xl mb-2 italic">UK BLOG</h4>
                    <p class="text-gray-400 text-sm mb-4">Yazılarınızı yayınlamadan önce mutlaka taslak olarak kaydedip kontrol edin.</p>
                    <a href="{{ route('home') }}" target="_blank" class="text-xs font-bold uppercase tracking-widest bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors inline-block">Siteye Git</a>
                </div>
                <i class="fas fa-quote-right absolute -bottom-4 -right-4 text-8xl text-white opacity-5"></i>
            </div>
        </div>
    </div>
@endsection
