@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Tüm Yazılar</h1>
            <p class="text-gray-500 mt-1">Blog yazılarınızı buradan yönetebilirsiniz.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold shadow-sm transition-all flex items-center">
            <i class="fas fa-plus mr-2 text-sm"></i> Yeni Yazı Ekle
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
                        <th class="px-6 py-4">Görsel</th>
                        <th class="px-6 py-4">Başlık</th>
                        <th class="px-6 py-4 text-center">Durum</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Tarih</th>
                        <th class="px-6 py-4 text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 italic-last-td">
                    @foreach($posts as $post)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="w-16 h-10 rounded-md overflow-hidden bg-gray-100 border">
                                @if($post->image)
                                    <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $post->title }}</div>
                            <div class="text-xs text-gray-400 mt-0.5">{{ Str::limit($post->excerpt, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($post->is_published)
                                <span class="bg-green-100 text-green-700 px-2.5 py-1 rounded-full text-xs font-bold ring-1 ring-green-200">YAYINDA</span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 px-2.5 py-1 rounded-full text-xs font-bold ring-1 ring-yellow-200">TASLAK</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-600 bg-gray-100 px-2 py-1 rounded">{{ optional($post->category)->name }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-medium">
                            {{ $post->created_at->format('d M, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors border border-transparent hover:border-blue-200" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Bu yazıyı silmek istediğinize emin misiniz?');">
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
            {{ $posts->links() }}
        </div>
    </div>
@endsection
