@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Kategoriler</h1>
            <p class="text-gray-500 mt-1">Yazıların hangi sayfalarda/kategorilerde olacağını buradan yönetebilirsiniz.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold shadow-sm transition-all flex items-center">
            <i class="fas fa-plus mr-2 text-sm"></i> Yeni Kategori Ekle
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
                        <th class="px-6 py-4">Kategori Adı</th>
                        <th class="px-6 py-4 text-center">Yazı Sayısı</th>
                        <th class="px-6 py-4 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 italic-last-td">
                    @foreach($categories as $cat)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $cat->name }}</div>
                            <div class="text-xs text-gray-400 mt-0.5">/{{ $cat->slug }}</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-bold border border-blue-100">
                                {{ $cat->posts()->count() }} Yazı
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('admin.categories.edit', $cat->id) }}" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors border border-transparent hover:border-blue-200" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Bu kategoriyi silmek istediğinize emin misiniz? Bu kategoriye ait tüm yazılar silinebilir!');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors border border-transparent hover:border-red-200" title="Sil">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
