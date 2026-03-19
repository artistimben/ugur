@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">Kategoriler</h1>
            <p class="text-slate-500 mt-2 text-lg">Yazılarınızı düzenli tutmak için kategorileri yönetin.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="group bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-2xl font-bold shadow-lg shadow-indigo-200 transition-all flex items-center">
            <i class="fas fa-plus mr-2 text-sm group-hover:rotate-90 transition-transform"></i> Yeni Kategori Ekle
        </a>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest border-b border-slate-100">
                        <th class="px-8 py-5">Kategori Adı</th>
                        <th class="px-8 py-5">Slug / URL</th>
                        <th class="px-8 py-5 text-center">Yazı Sayısı</th>
                        <th class="px-8 py-5 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($categories as $category)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-500 flex items-center justify-center font-bold text-lg group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                    {{ substr($category->name, 0, 1) }}
                                </div>
                                <span class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">{{ $category->name }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="text-xs font-mono bg-slate-100 text-slate-500 px-2 py-1 rounded-lg border border-slate-200/50">{{ $category->slug }}</span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-[10px] font-extrabold tracking-wider border border-emerald-100">
                                {{ $category->posts_count ?? $category->posts()->count() }} İÇERİK
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end items-center space-x-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-amber-500 hover:bg-amber-50 rounded-xl transition-all border border-transparent hover:border-amber-100" title="Düzenle">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?');">
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
        
        @if($categories->hasPages())
        <div class="bg-slate-50/50 px-8 py-6 border-t border-slate-100">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
@endsection
