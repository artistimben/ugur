@extends('admin.layouts.app')

@section('content')
    <div class="mb-8">
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
            <a href="{{ route('admin.advertisements.index') }}" class="hover:text-blue-600 transition-colors">Reklamlar</a>
            <i class="fas fa-chevron-right text-[10px]"></i>
            <span class="text-gray-900 font-medium">Yeni Reklam</span>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Yeni Reklam Ekle</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-4xl" x-data="{ adType: 'image' }">
        <form action="{{ route('admin.advertisements.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700">Reklam Başlığı (Opsiyonel)</label>
                    <input type="text" name="title" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all placeholder-gray-400" placeholder="Örn: Yaz İndirimi">
                    @error('title') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Ad Type -->
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700">Reklam Türü</label>
                    <select name="type" x-model="adType" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all">
                        <option value="image">Görsel (Banner/Resim)</option>
                        <option value="script">Kod / Script (AdSense vb.)</option>
                    </select>
                    @error('type') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Position -->
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700">Görünüm Konumu</label>
                    <select name="position" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all">
                        <option value="sidebar">Yan Menü (Sağ Sidebar)</option>
                        <option value="left_gutter">Sol Dış Boşluk (Sabit)</option>
                        <option value="right_gutter">Sağ Dış Boşluk (Sabit)</option>
                        <option value="top">Sayfa Üstü (Geniş Banner)</option>
                        <option value="between">Yazı Arası (Sadece Ana Sayfa)</option>
                    </select>
                    @error('position') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700">Durum</label>
                    <div class="flex items-center mt-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:width-5 after:transition-all peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-700 uppercase">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Image Based Ad Fields -->
            <div x-show="adType === 'image'" class="space-y-6">
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700">Reklam Linki (Opsiyonel)</label>
                    <input type="text" name="link" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all placeholder-gray-400" placeholder="https://example.com veya /hakkimda">
                    <p class="text-xs text-gray-400">Harici link (http...) veya site içi yol (/iletisim) girebilirsiniz.</p>
                </div>

                <div class="space-y-2" x-data="{ photoName: null, photoPreview: null }">
                    <label class="block text-sm font-bold text-gray-700">Reklam Görseli</label>
                    <div class="relative">
                        <input type="file" name="image" class="hidden" x-ref="photo"
                               @change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                               ">
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center hover:border-blue-400 transition-colors cursor-pointer"
                             @click="$refs.photo.click()"
                             x-show="!photoPreview">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500">Görsel yüklemek için tıklayın</p>
                        </div>
                        
                        <div x-show="photoPreview" class="relative w-full max-w-md mx-auto">
                            <img :src="photoPreview" class="rounded-xl border shadow-lg max-h-64 mx-auto">
                            <button type="button" class="absolute -top-3 -right-3 bg-red-500 text-white w-8 h-8 rounded-full shadow-lg" @click="photoPreview = null; photoName = null; $refs.photo.value = ''">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @error('image') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Script Based Ad Fields -->
            <div x-show="adType === 'script'" class="space-y-2">
                <label class="block text-sm font-bold text-gray-700">Script / Kod</label>
                <textarea name="script_code" rows="6" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all font-mono text-sm" placeholder="<script>...</script> veya HTML kodu"></textarea>
                <p class="text-xs text-gray-400">AdSense veya diğer reklam platformlarının kodlarını buraya yapıştırabilirsiniz.</p>
                @error('script_code') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end pt-6 border-t border-gray-100 gap-4">
                <a href="{{ route('admin.advertisements.index') }}" class="px-6 py-2.5 rounded-lg font-bold text-gray-500 hover:bg-gray-50 transition-all border border-gray-200">Vazgeç</a>
                <button type="submit" class="px-8 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/20 transition-all transform hover:-translate-y-0.5">
                    Kaydet
                </button>
            </div>
        </form>
    </div>
@endsection
