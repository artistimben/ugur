@extends('admin.layouts.app')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.categories.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center mb-4 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Listeye Dön
        </a>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Kategoriyi Düzenle</h1>
        <p class="text-gray-500 mt-1">Kategori ismini ve ayarlarını güncelleyin.</p>
    </div>

    <div class="max-w-2xl bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Adı</label>
                <input type="text" name="name" value="{{ $category->name }}" placeholder="Kategori adı..." class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 border" required>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                <div class="text-xs text-gray-500 flex justify-between">
                    <span>Mevcut URL Uzantısı: <strong>/{{ $category->slug }}</strong></span>
                    <span>Yazı Sayısı: <strong>{{ $category->posts()->count() }}</strong></span>
                </div>
            </div>
            
            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all flex items-center justify-center">
                    <i class="fas fa-sync-alt mr-2"></i> Değişiklikleri Güncelle
                </button>
            </div>
        </form>
    </div>
@endsection
