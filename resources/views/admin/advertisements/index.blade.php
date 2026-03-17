@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Reklam Yönetimi</h1>
            <p class="text-gray-500 mt-1">Sitenizdeki reklam alanlarını buradan yönetebilirsiniz.</p>
        </div>
        <a href="{{ route('admin.advertisements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold shadow-sm transition-all flex items-center">
            <i class="fas fa-plus mr-2 text-sm"></i> Yeni Reklam Ekle
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
                        <th class="px-6 py-4">Görsel</th>
                        <th class="px-6 py-4">Başlık / Link</th>
                        <th class="px-6 py-4 text-center">Konum</th>
                        <th class="px-6 py-4 text-center">Durum</th>
                        <th class="px-6 py-4 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 italic-last-td">
                    @foreach($advertisements as $ad)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <img src="{{ Str::startsWith($ad->image, ['http://', 'https://']) ? $ad->image : Storage::url($ad->image) }}" alt="Reklam" class="w-20 h-20 object-cover rounded-lg border border-gray-100 shadow-sm">
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ $ad->title ?? 'İsimsiz Reklam' }}</div>
                            @if($ad->link)
                                <div class="text-xs text-blue-500 mt-0.5 truncate max-w-xs">{{ $ad->link }}</div>
                            @else
                                <div class="text-xs text-gray-400 mt-0.5 italic">Link Yok</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold border border-gray-200 uppercase">
                                {{ $ad->position }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($ad->is_active)
                                <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-100 flex items-center justify-center w-max mx-auto">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span> Aktif
                                </span>
                            @else
                                <span class="bg-red-50 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-100 flex items-center justify-center w-max mx-auto">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-2"></span> Pasif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('admin.advertisements.edit', $ad->id) }}" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors border border-transparent hover:border-blue-200" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.advertisements.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Bu reklamı silmek istediğinize emin misiniz?');">
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
        
        @if($advertisements->hasPages())
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
            {{ $advertisements->links() }}
        </div>
        @endif
    </div>
@endsection
