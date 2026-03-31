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

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden relative">
        <div id="bulk-action-bar" class="hidden bg-indigo-50 border-b border-indigo-100 px-8 py-4 flex justify-between items-center transition-all duration-300">
            <span class="text-sm font-bold text-indigo-800"><span id="selected-count">0</span> yazı seçildi</span>
            <button onclick="document.getElementById('bulkImageModal').classList.remove('hidden')" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs px-4 py-2 rounded-xl font-bold shadow-sm transition-colors">
                <i class="fas fa-image mr-1"></i> Toplu Görsel Ata
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="postsTable">
                <thead>
                    <tr class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest border-b border-slate-100">
                        <th class="px-6 py-5 w-10 text-center">
                            <input type="checkbox" id="selectAll" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        </th>
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
                        <td class="px-6 py-5 text-center">
                            <input type="checkbox" value="{{ $post->id }}" class="post-checkbox w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        </td>
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

    <!-- Bulk Image Modal -->
    <div id="bulkImageModal" class="hidden fixed inset-0 bg-slate-900/50 z-[100] flex items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-[32px] shadow-2xl p-8 max-w-md w-full mx-4 border border-slate-200">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-xl font-outfit font-bold text-slate-800">Toplu Görsel Ata</h3>
                <button onclick="document.getElementById('bulkImageModal').classList.add('hidden')" class="w-8 h-8 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-full transition-colors"><i class="fas fa-times"></i></button>
            </div>
            <p class="text-slate-500 text-sm mb-6">Seçilen <span id="modal-selected-count" class="font-bold text-indigo-600">0</span> yazıya ortak bir görsel yüklenecek.</p>
            
            <form action="{{ route('admin.posts.bulk-image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="post_ids" id="post_ids_input">
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Görsel Seçin</label>
                    <input type="file" name="bulk_image" required accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-colors cursor-pointer border border-slate-200 rounded-xl">
                </div>
                
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('bulkImageModal').classList.add('hidden')" class="px-5 py-3 text-sm font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors">İptal</button>
                    <button type="submit" class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-indigo-200 transition-colors flex items-center">
                        <i class="fas fa-upload mr-2"></i> Görselleri Ata
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script for Bulk Checkbox Logic -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.post-checkbox');
        const bulkActionBar = document.getElementById('bulk-action-bar');
        const selectedCount = document.getElementById('selected-count');
        const modalSelectedCount = document.getElementById('modal-selected-count');
        const postIdsInput = document.getElementById('post_ids_input');

        function updateSelection() {
            const selected = Array.from(checkboxes).filter(cb => cb.checked).map(cb => cb.value);
            if(selected.length > 0) {
                bulkActionBar.classList.remove('hidden');
            } else {
                bulkActionBar.classList.add('hidden');
            }
            selectedCount.textContent = selected.length;
            modalSelectedCount.textContent = selected.length;
            postIdsInput.value = JSON.stringify(selected);
            selectAll.checked = selected.length === checkboxes.length && checkboxes.length > 0;
        }

        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = selectAll.checked);
            updateSelection();
        });

        checkboxes.forEach(cb => cb.addEventListener('change', updateSelection));
    });
    </script>
@endsection
