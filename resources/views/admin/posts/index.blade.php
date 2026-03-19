@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">Tüm Yazılar</h1>
            <p class="text-slate-500 mt-2 text-lg">İçeriklerinizi düzenleyin, yayınlayın veya yönetin.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="group bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-2xl font-bold shadow-lg shadow-indigo-200 transition-all flex items-center">
            <i class="fas fa-plus mr-2 text-sm group-hover:rotate-90 transition-transform"></i> Yeni İçerik Oluştur
        </a>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest border-b border-slate-100">
                        <th class="px-8 py-5">Görsel & Başlık</th>
                        <th class="px-8 py-5 text-center">Durum</th>
                        <th class="px-8 py-5">Kategori</th>
                        <th class="px-8 py-5">Oluşturulma</th>
                        <th class="px-8 py-5 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($posts as $post)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center space-x-4">
                                <div class="w-20 h-14 rounded-xl overflow-hidden bg-slate-100 border border-slate-200/50 flex-shrink-0 shadow-sm">
                                    @if($post->image)
                                        <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <i class="fas fa-image text-xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold text-slate-800 truncate max-w-xs group-hover:text-indigo-600 transition-colors">{{ $post->title }}</div>
                                    <div class="text-[11px] text-slate-400 mt-1 font-medium">{{ Str::limit(strip_tags($post->content), 40) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-center">
                            @if($post->is_published)
                                <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-[10px] font-extrabold tracking-wider border border-emerald-100 ring-4 ring-emerald-50/30">AKTİF</span>
                            @else
                                <span class="bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-[10px] font-extrabold tracking-wider border border-amber-100 ring-4 ring-amber-50/30">TASLAK</span>
                            @endif
                        </td>
                        <td class="px-8 py-5">
                            <span class="text-xs font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200/50">{{ optional($post->category)->name }}</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-xs font-bold text-slate-800">{{ $post->created_at->format('d M, Y') }}</div>
                            <div class="text-[10px] text-slate-400 mt-0.5">{{ $post->created_at->format('H:i') }}</div>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end items-center space-x-2">
                                <a href="{{ route('post.show', $post->slug) }}" target="_blank" class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all border border-transparent hover:border-indigo-100" title="Görüntüle">
                                    <i class="fas fa-external-link-alt text-sm"></i>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-amber-500 hover:bg-amber-50 rounded-xl transition-all border border-transparent hover:border-amber-100" title="Düzenle">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Bu içeriği kalıcı olarak silmek istediğinize emin misiniz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-xl transition-all border border-transparent hover:border-rose-100" title="Sil">
                                        <i class="fas fa-trash-alt text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($posts->hasPages())
        <div class="bg-slate-50/50 px-8 py-6 border-t border-slate-100">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
@endsection/div>
@endsection
