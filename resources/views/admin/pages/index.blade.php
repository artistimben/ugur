@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">Sayfa Yönetimi</h1>
            <p class="text-slate-500 mt-2 text-lg">Statik sayfalarınızın (Hakkımda, vb.) içeriğini yönetin.</p>
        </div>
        <a href="{{ route('admin.pages.create') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all font-bold flex items-center group">
            <i class="fas fa-plus mr-3 text-xs group-hover:rotate-90 transition-transform"></i> Yeni Sayfa Ekle
        </a>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden relative">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest border-b border-slate-100">
                        <th class="px-8 py-5">Görsel & Başlık</th>
                        <th class="px-8 py-5">Slug</th>
                        <th class="px-8 py-5 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($pages as $page)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center space-x-4">
                                <div class="w-20 h-14 rounded-xl overflow-hidden bg-slate-100 border border-slate-200/50 flex-shrink-0 shadow-sm">
                                    @if($page->image)
                                        <img src="{{ Str::startsWith($page->image, ['http://', 'https://', 'images/']) ? asset($page->image) : Storage::url($page->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <i class="fas fa-image text-xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold text-slate-800 truncate max-w-xs group-hover:text-indigo-600 transition-colors">{{ $page->title }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                             <span class="text-xs font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200/50">{{ $page->slug }}</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end items-center space-x-2">
                                <a href="{{ route('admin.pages.edit', $page->id) }}" class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-amber-500 hover:bg-amber-50 rounded-xl transition-all border border-transparent hover:border-amber-100" title="Düzenle">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
