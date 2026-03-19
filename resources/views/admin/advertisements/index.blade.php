@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">Reklam Alanları</h1>
            <p class="text-slate-500 mt-2 text-lg">Sitenizdeki gelir kanallarını ve reklam yerleşimlerini yönetin.</p>
        </div>
        <a href="{{ route('admin.advertisements.create') }}" class="group bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-2xl font-bold shadow-lg shadow-indigo-200 transition-all flex items-center">
            <i class="fas fa-plus mr-2 text-sm group-hover:rotate-90 transition-transform"></i> Yeni Reklam Alanı
        </a>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest border-b border-slate-100">
                        <th class="px-8 py-5">Görsel / Kod</th>
                        <th class="px-8 py-5">Başlık & Hedef</th>
                        <th class="px-8 py-5 text-center">Konum</th>
                        <th class="px-8 py-5 text-center">Durum</th>
                        <th class="px-8 py-5 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($advertisements as $ad)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="w-24 h-16 rounded-xl overflow-hidden bg-slate-100 border border-slate-200/50 flex-shrink-0 shadow-sm">
                                @if($ad->type == 'image')
                                    <img src="{{ \Illuminate\Support\Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-indigo-500 bg-indigo-50">
                                        <i class="fas fa-code text-xl"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">{{ $ad->title ?? 'İsimsiz Reklam' }}</div>
                            @if($ad->link)
                                <div class="text-[11px] text-slate-400 mt-1 font-medium truncate max-w-xs flex items-center">
                                    <i class="fas fa-link mr-1.5 opacity-50"></i> {{ $ad->link }}
                                </div>
                            @else
                                <div class="text-[11px] text-slate-300 mt-1 italic">Yönlendirme linki belirtilmemiş</div>
                            @endif
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="bg-slate-100 text-slate-600 px-3 py-1.5 rounded-lg text-[10px] font-extrabold tracking-wider border border-slate-200 px-3">
                                {{ strtoupper($ad->position) }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            @if($ad->is_active)
                                <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-[10px] font-extrabold tracking-wider border border-emerald-100 ring-4 ring-emerald-50/30 inline-flex items-center">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2 animate-pulse"></span> AKTİF
                                </span>
                            @else
                                <span class="bg-rose-50 text-rose-600 px-3 py-1 rounded-full text-[10px] font-extrabold tracking-wider border border-rose-100 ring-4 ring-rose-50/30 inline-flex items-center">
                                    <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mr-2"></span> PASİF
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end items-center space-x-2">
                                <a href="{{ route('admin.advertisements.edit', $ad->id) }}" class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-amber-500 hover:bg-amber-50 rounded-xl transition-all border border-transparent hover:border-amber-100" title="Düzenle">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                                <form action="{{ route('admin.advertisements.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Bu reklam alanını silmek istediğinize emin misiniz?');">
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
        
        @if($advertisements->hasPages())
        <div class="bg-slate-50/50 px-8 py-6 border-t border-slate-100">
            {{ $advertisements->links() }}
        </div>
        @endif
    </div>
@endsection
