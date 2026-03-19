@extends('admin.layouts.app')

@section('content')
    <div class="mb-10">
        <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">Hoş Geldiniz, {{ explode(' ', auth()->user()->name)[0] }} 👋</h1>
        <p class="text-slate-500 mt-2 text-lg">İşte blogunuzun bugünkü genel görünümü.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200/60 hover:shadow-xl hover:shadow-indigo-500/5 transition-all group overflow-hidden relative">
            <div class="relative z-10 flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-file-lines text-xl"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Yazılar</span>
            </div>
            <div class="relative z-10">
                <div class="text-4xl font-outfit font-extrabold text-slate-900 leading-none">{{ \App\Models\Post::count() }}</div>
                <div class="text-xs text-slate-400 mt-2 font-medium">Toplam blog içeriği</div>
            </div>
            <div class="absolute -right-4 -bottom-4 text-indigo-500/5 text-8xl group-hover:scale-125 transition-transform">
                <i class="fas fa-file-lines"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200/60 hover:shadow-xl hover:shadow-emerald-500/5 transition-all group overflow-hidden relative">
            <div class="relative z-10 flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-circle-check text-xl"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Aktif</span>
            </div>
            <div class="relative z-10">
                <div class="text-4xl font-outfit font-extrabold text-slate-900 leading-none">{{ \App\Models\Post::where('is_published', true)->count() }}</div>
                <div class="text-xs text-slate-400 mt-2 font-medium">Yayında olan içerik</div>
            </div>
            <div class="absolute -right-4 -bottom-4 text-emerald-500/5 text-8xl group-hover:scale-125 transition-transform">
                <i class="fas fa-circle-check"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200/60 hover:shadow-xl hover:shadow-amber-500/5 transition-all group overflow-hidden relative">
            <div class="relative z-10 flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-pen-nib text-xl"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Taslak</span>
            </div>
            <div class="relative z-10">
                <div class="text-4xl font-outfit font-extrabold text-slate-900 leading-none">{{ \App\Models\Post::where('is_published', false)->count() }}</div>
                <div class="text-xs text-slate-400 mt-2 font-medium">Bekleyen taslaklar</div>
            </div>
            <div class="absolute -right-4 -bottom-4 text-amber-500/5 text-8xl group-hover:scale-125 transition-transform">
                <i class="fas fa-pen-nib"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200/60 hover:shadow-xl hover:shadow-purple-500/5 transition-all group overflow-hidden relative">
            <div class="relative z-10 flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-layer-group text-xl"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kategori</span>
            </div>
            <div class="relative z-10">
                <div class="text-4xl font-outfit font-extrabold text-slate-900 leading-none">{{ \App\Models\Category::count() }}</div>
                <div class="text-xs text-slate-400 mt-2 font-medium">Düzenlenmiş başlıklar</div>
            </div>
            <div class="absolute -right-4 -bottom-4 text-purple-500/5 text-8xl group-hover:scale-125 transition-transform">
                <i class="fas fa-layer-group"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Recent Posts -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <h3 class="font-outfit font-bold text-slate-800 text-lg tracking-tight">Son Yayınlar</h3>
                    <a href="{{ route('admin.posts.index') }}" class="text-indigo-600 text-xs font-bold uppercase tracking-widest hover:text-indigo-700 transition-colors">Yazıları Yönet</a>
                </div>
                <div class="divide-y divide-slate-100">
                    @forelse(\App\Models\Post::with('category')->latest()->take(5)->get() as $post)
                        <div class="px-8 py-5 flex items-center justify-between hover:bg-slate-50 transition-colors group">
                            <div class="flex items-center space-x-5">
                                <div class="w-16 h-12 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0 border border-slate-200/50 group-hover:scale-105 transition-transform">
                                    @if($post->image)
                                        <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold text-slate-800 leading-snug truncate group-hover:text-indigo-600 transition-colors">{{ $post->title }}</h4>
                                    <div class="flex items-center mt-1 space-x-3 text-xs text-slate-400">
                                        <span class="bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">{{ optional($post->category)->name }}</span>
                                        <span>•</span>
                                        <span class="flex items-center"><i class="far fa-clock mr-1 text-[10px]"></i> {{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @if($post->is_published)
                                    <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]"></div>
                                @else
                                    <div class="w-2 h-2 rounded-full bg-amber-400 shadow-[0_0_10px_rgba(251,191,36,0.5)]"></div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center">
                            <div class="w-20 h-20 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-folder-open text-3xl"></i>
                            </div>
                            <p class="text-slate-400 font-medium">Henüz bir yazı eklenmemiş.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right Side column -->
        <div class="space-y-8">
            <!-- Quick Actions -->
            <div class="bg-white rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-outfit font-bold text-slate-800 text-lg tracking-tight">Hızlı İşlemler</h3>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('admin.posts.create') }}" class="flex items-center p-4 bg-indigo-50 text-indigo-700 rounded-2xl hover:bg-indigo-600 hover:text-white transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-plus text-sm"></i>
                        </div>
                        <span class="font-bold tracking-tight">Yeni Yazı Yaz</span>
                    </a>
                    
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center p-4 bg-purple-50 text-purple-700 rounded-2xl hover:bg-purple-600 hover:text-white transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-tags text-sm"></i>
                        </div>
                        <span class="font-bold tracking-tight">Kategorileri Yönet</span>
                    </a>

                    <a href="{{ route('admin.advertisements.index') }}" class="flex items-center p-4 bg-rose-50 text-rose-700 rounded-2xl hover:bg-rose-600 hover:text-white transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-ad text-sm"></i>
                        </div>
                        <span class="font-bold tracking-tight">Reklamları Düzenle</span>
                    </a>
                </div>
            </div>

            <!-- Promotion Card -->
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-[32px] p-8 text-white shadow-2xl shadow-indigo-200 relative overflow-hidden group">
                <div class="relative z-10">
                    <h4 class="font-outfit font-extrabold text-2xl mb-3">UK BLOG Pro</h4>
                    <p class="text-indigo-100 text-sm leading-relaxed mb-6">Unutmayın: Okuyucularınız için görsel kalite, içerik kalitesi kadar önemlidir.</p>
                    <a href="{{ route('home') }}" target="_blank" class="px-6 py-3 bg-white text-indigo-600 font-bold rounded-xl hover:shadow-xl transition-all inline-flex items-center group/btn">
                        Siteye Göz At
                        <i class="fas fa-arrow-right ml-2 text-xs group-hover/btn:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
                <div class="absolute -left-10 -top-10 w-40 h-40 bg-indigo-400/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>
            </div>
        </div>
    </div>
@endsection
