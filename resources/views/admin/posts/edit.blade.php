@extends('admin.layouts.app')

@section('content')
    <div class="mb-10">
        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center text-slate-400 hover:text-indigo-600 font-bold text-xs uppercase tracking-widest mb-4 transition-colors group">
            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i> Listeye Geri Dön
        </a>
        <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">İçeriği Düzenle</h1>
    </div>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        @csrf
        @method('PUT')
        
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-200/60">
                <div class="mb-8">
                    <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">Yazı Başlığı</label>
                    <input type="text" name="title" value="{{ $post->title }}" placeholder="Etkileyici bir başlık yazın..." class="w-full bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-4 text-lg font-medium border" required>
                </div>
                
                <div class="mb-8">
                    <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">Kısa Özet <span class="text-slate-400 font-medium">(Opsiyonel)</span></label>
                    <textarea name="excerpt" rows="3" placeholder="Okuyucuların ilgisini çekecek kısa bir özet..." class="w-full bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-4 border">{{ $post->excerpt }}</textarea>
                </div>

                <div class="editor-wrapper">
                    <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">İçerik</label>
                    <textarea name="content" id="editor">{{ $post->content }}</textarea>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <!-- Publishing Box -->
            <div class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden relative">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-right from-amber-500 to-orange-500"></div>
                <h3 class="font-outfit font-bold text-slate-800 mb-6 flex items-center">
                    <i class="fas fa-pen-nib mr-3 text-amber-500"></i> Yayınlama Ayarları
                </h3>
                
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">Kategori</label>
                    <select name="category_id" class="w-full bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-3.5 border font-medium text-slate-700" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-8 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <label class="flex items-center cursor-pointer group">
                        <div class="relative">
                            <input type="checkbox" name="is_published" value="1" {{ $post->is_published ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </div>
                        <span class="ml-3 text-sm font-bold text-slate-700 group-hover:text-indigo-600 transition-colors">Yayınla</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-4 rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all flex items-center justify-center group">
                    <span>Değişiklikleri Kaydet</span>
                    <i class="fas fa-check-double ml-3 text-xs group-hover:scale-125 transition-transform"></i>
                </button>
                
                <div class="mt-6 pt-6 border-t border-slate-100 flex items-center justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                    <span>ID: #{{ $post->id }}</span>
                    <span>Son Güncelleme: {{ $post->updated_at->diffForHumans() }}</span>
                </div>
            </div>

            <!-- Image Upload Box -->
            <div class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-200/60">
                <h3 class="font-outfit font-bold text-slate-800 mb-6 flex items-center">
                    <i class="fas fa-image mr-3 text-purple-500"></i> Kapak Görseli
                </h3>
                
                <div x-data="{ photoPreview: '{{ $post->image ? (Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image)) : null }}' }" class="space-y-4">
                    <input type="file" name="image" class="hidden" x-ref="photo"
                           @change="
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($event.target.files[0]);
                           ">

                    <div class="relative group cursor-pointer" @click="$refs.photo.click()">
                        <div x-show="!photoPreview" class="w-full h-56 rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 flex flex-col items-center justify-center text-slate-400 group-hover:bg-slate-100 group-hover:border-indigo-300 transition-all">
                            <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <i class="fas fa-cloud-arrow-up text-2xl text-indigo-500"></i>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest">Görsel Yükle</span>
                        </div>

                        <div x-show="photoPreview" x-cloak class="relative h-56 w-full rounded-2xl overflow-hidden shadow-lg border border-slate-200">
                            <img :src="photoPreview" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-[2px]">
                                <span class="bg-white text-slate-900 px-4 py-2 rounded-xl text-xs font-bold">Görseli Değiştir</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-[10px] text-center text-slate-400 font-medium tracking-tight mt-4">Mevcut görseli değiştirmek için üzerine tıklayın.</p>
                </div>
            </div>
        </div>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo' ],
                placeholder: 'İçerik buraya gelecek...'
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
