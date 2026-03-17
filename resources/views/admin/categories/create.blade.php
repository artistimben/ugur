@extends('admin.layouts.app')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.categories.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center mb-4 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Listeye Dön
        </a>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Yeni Kategori Ekle</h1>
        <p class="text-gray-500 mt-1">Yazılarınızı gruplandırmak için yeni bir sayfa/kategori oluşturun.</p>
    </div>

    <div class="max-w-2xl bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Adı</label>
                <input type="text" name="name" placeholder="Örn: Teknoloji, Yaşam, Gezi..." class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 border" required autofocus>
                <p class="text-xs text-gray-400 mt-2 italic">Not: Girdiğiniz isim otomatik olarak URL dostu (slug) hale getirilecektir.</p>
            </div>
            
            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i> Kategoriyi Kaydet
                </button>
            </div>
        </form>
    </div>
@endsection
