@extends('admin.layouts.app')

@section('content')
    <div class="mb-8 font-all">
        <a href="{{ route('admin.posts.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center mb-4 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Listeye Dön
        </a>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Yazıyı Düzenle</h1>
    </div>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf
        @method('PUT')
        
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Yazı Başlığı</label>
                    <input type="text" name="title" value="{{ $post->title }}" placeholder="Başlığı buraya yazın..." class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 border" required>
                </div>
                
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Özet (Listing sayfalarında görünür)</label>
                    <textarea name="excerpt" rows="3" placeholder="Yazı hakkında kısa bir özet..." class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 border">{{ $post->excerpt }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">İçerik</label>
                    <textarea name="content" id="editor">{{ $post->content }}</textarea>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b">Yayın Ayarları</h3>
                
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                    <select name="category_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_published" value="1" {{ $post->is_published ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm font-bold text-gray-700">Yayınla</span>
                    </label>
                </div>

                <hr class="my-4">

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 shadow-md transition-all">
                    Değişiklikleri Kaydet
                </button>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b">Öne Çıkan Görsel</h3>
                
                <div x-data="{ photoName: null, photoPreview: '{{ $post->image ? (Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : Storage::url($post->image)) : null }}' }" class="text-center">
                    <input type="file" name="image" class="hidden" x-ref="photo"
                           @change="
                                photoName = $event.target.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($event.target.files[0]);
                           ">

                    <div class="mt-2" x-show="! photoPreview">
                        <div class="w-full h-48 rounded-lg border-2 border-dashed border-gray-300 flex flex-col items-center justify-center text-gray-400">
                            <i class="fas fa-cloud-upload-alt text-4xl mb-2"></i>
                            <span class="text-xs uppercase tracking-wider font-bold">Görsel Seç</span>
                        </div>
                    </div>

                    <div class="mt-2" x-show="photoPreview">
                        <img :src="photoPreview" class="w-full h-48 object-cover rounded-lg shadow-inner">
                    </div>

                    <button type="button" class="mt-4 px-4 py-2 bg-gray-800 text-white text-xs font-bold uppercase tracking-widest rounded-md hover:bg-gray-700 w-full" 
                            @click.prevent="$refs.photo.click()">
                        {{ $post->image ? 'Görseli Değiştir' : 'Yüklemek İçin Tıklayın' }}
                    </button>
                </div>
                <p class="text-[10px] text-gray-400 mt-4 text-center">Önerilen boyut: 1200x800px. Maks: 2MB.</p>
            </div>
            
            <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-between text-xs text-gray-500 border border-gray-100 italic font-medium">
                <span>Eklenme: {{ $post->created_at->format('d.m.Y') }}</span>
                <span>ID: #{{ $post->id }}</span>
            </div>
        </div>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
