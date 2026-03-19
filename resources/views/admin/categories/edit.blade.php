@extends('admin.layouts.app')

@section('content')
    <div class="mb-10">
        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center text-slate-400 hover:text-indigo-600 font-bold text-xs uppercase tracking-widest mb-4 transition-colors group">
            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i> Listeye Geri Dön
        </a>
        <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">Kategoriyi Düzenle</h1>
    </div>

    <div class="max-w-3xl bg-white p-10 rounded-[32px] shadow-sm border border-slate-200/60 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-right from-amber-500 to-indigo-500"></div>
        
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-10">
                <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">Kategori Adı</label>
                <input type="text" name="name" value="{{ $category->name }}" placeholder="Örn: Çocuk Yetiştirme" class="w-full bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-5 text-xl font-medium border" required>
            </div>

            <div class="flex items-center pt-8 border-t border-slate-100">
                <button type="submit" class="bg-indigo-600 text-white font-bold py-4 px-12 rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all flex items-center group">
                    <span>Değişiklikleri Kaydet</span>
                    <i class="fas fa-check-circle ml-3 text-xs group-hover:scale-125 transition-transform"></i>
                </button>
                <a href="{{ route('admin.categories.index') }}" class="ml-6 text-slate-400 hover:text-slate-600 font-bold text-sm">Vazgeç</a>
            </div>
            
            <div class="mt-6 pt-6 border-t border-slate-50 text-[10px] font-bold text-slate-300 uppercase tracking-widest flex justify-between">
                <span>Kategori ID: #{{ $category->id }}</span>
                <span>Slug: {{ $category->slug }}</span>
            </div>
        </form>
    </div>
@endsection
