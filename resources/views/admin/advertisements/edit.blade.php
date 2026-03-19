@extends('admin.layouts.app')

@section('content')
    <div class="mb-10">
        <a href="{{ route('admin.advertisements.index') }}" class="inline-flex items-center text-slate-400 hover:text-indigo-600 font-bold text-xs uppercase tracking-widest mb-4 transition-colors group">
            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i> Listeye Geri Dön
        </a>
        <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">Reklamı Düzenle</h1>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden max-w-5xl" x-data="{ adType: '{{ $advertisement->type ?? 'image' }}' }">
        <div class="h-2 bg-gradient-to-r from-amber-500 via-indigo-500 to-emerald-500"></div>
        
        <form action="{{ route('admin.advertisements.update', $advertisement) }}" method="POST" enctype="multipart/form-data" class="p-10 space-y-10">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Title -->
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-slate-700 ml-1 text-slate-400 uppercase tracking-wider text-[11px]">Reklam Başlığı</label>
                    <input type="text" name="title" value="{{ $advertisement->title }}" class="w-full bg-slate-50 border-slate-200/60 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-4 text-slate-800" placeholder="Reklam başlığı">
                    @error('title') <p class="text-rose-500 text-xs font-bold mt-2 ml-1 italic">{{ $message }}</p> @enderror
                </div>

                <!-- Ad Type -->
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-slate-700 ml-1 text-slate-400 uppercase tracking-wider text-[11px]">Reklam Türü</label>
                    <div class="relative">
                        <select name="type" x-model="adType" class="w-full bg-slate-50 border-slate-200/60 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-4 text-slate-800 appearance-none">
                            <option value="image">Görsel (Banner / Resim)</option>
                            <option value="script">Kod / Script (AdSense, Custom HTML)</option>
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Position -->
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-slate-700 ml-1 text-slate-400 uppercase tracking-wider text-[11px]">Görünüm Konumu</label>
                    <div class="relative">
                        <select name="position" class="w-full bg-slate-50 border-slate-200/60 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-4 text-slate-800 appearance-none">
                            <option value="top" {{ $advertisement->position == 'top' ? 'selected' : '' }}>Üst Bar (Geniş Banner)</option>
                            <option value="between" {{ $advertisement->position == 'between' ? 'selected' : '' }}>Ana Sayfa (3. Yazıdan Sonra)</option>
                            <option value="post_bottom" {{ $advertisement->position == 'post_bottom' ? 'selected' : '' }}>Yazı Sonu (İçerik Altı)</option>
                            <option value="sidebar" {{ $advertisement->position == 'sidebar' ? 'selected' : '' }}>Yan Menü (Sağ Sidebar)</option>
                            <option value="left_gutter" {{ $advertisement->position == 'left_gutter' ? 'selected' : '' }}>Sol Boşluk (Masaüstü Sabit)</option>
                            <option value="right_gutter" {{ $advertisement->position == 'right_gutter' ? 'selected' : '' }}>Sağ Boşluk (Masaüstü Sabit)</option>
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-slate-700 ml-1 text-slate-400 uppercase tracking-wider text-[11px]">Yayın Durumu</label>
                    <div class="flex items-center h-[58px] px-4 bg-slate-50 rounded-2xl border border-slate-200/60">
                        <label class="relative inline-flex items-center cursor-pointer group">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ $advertisement->is_active ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:width-5 after:transition-all peer-checked:bg-emerald-500"></div>
                            <span class="ml-3 text-sm font-bold text-slate-600 peer-checked:text-emerald-600 transition-colors uppercase tracking-widest text-[10px]">Aktif / Yayında</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Image Fields -->
            <div x-show="adType === 'image'" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-slate-700 ml-1 text-slate-400 uppercase tracking-wider text-[11px]">Hedef URL</label>
                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-link text-xs"></i>
                        </div>
                        <input type="text" name="link" value="{{ $advertisement->link }}" class="w-full bg-slate-50 border-slate-200/60 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-4 pl-12 text-slate-800" placeholder="https://example.com">
                    </div>
                </div>

                <div class="space-y-3" x-data="{ photoName: null, photoPreview: null }">
                    <label class="block text-sm font-bold text-slate-700 ml-1 text-slate-400 uppercase tracking-wider text-[11px]">Reklam Görseli</label>
                    <div class="relative group">
                        <input type="file" name="image" class="hidden" x-ref="photo" 
                               @change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                               ">
                        
                        <div x-show="!photoPreview" class="relative group cursor-pointer" @click="$refs.photo.click()">
                            @if($advertisement->image)
                                <img src="{{ \Illuminate\Support\Str::startsWith($advertisement->image, ['http://', 'https://']) ? $advertisement->image : Storage::url($advertisement->image) }}" class="rounded-[24px] border-4 border-white shadow-xl max-h-64 mx-auto object-contain bg-slate-50 group-hover:opacity-75 transition-opacity">
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <div class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold shadow-xl">
                                        Görseli Değiştir
                                    </div>
                                </div>
                            @else
                                <div class="border-2 border-dashed border-slate-200 rounded-[32px] p-12 text-center hover:border-indigo-400 hover:bg-indigo-50/30 transition-all">
                                    <i class="fas fa-cloud-arrow-up text-3xl text-indigo-500 mb-4"></i>
                                    <p class="text-slate-500 font-bold">Görsel yüklemek için tıklayın</p>
                                </div>
                            @endif
                        </div>
                        
                        <div x-show="photoPreview" class="relative inline-block w-full">
                            <img :src="photoPreview" class="rounded-[24px] border-4 border-white shadow-2xl max-h-80 mx-auto object-contain bg-slate-50">
                            <button type="button" class="absolute -top-4 -right-4 bg-rose-500 text-white w-10 h-10 rounded-2xl shadow-xl hover:bg-rose-600 transition-colors flex items-center justify-center border-4 border-white" @click="photoPreview = null; photoName = null; $refs.photo.value = ''">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script Fields -->
            <div x-show="adType === 'script'" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-3">
                <label class="block text-sm font-bold text-slate-700 ml-1 text-slate-400 uppercase tracking-wider text-[11px]">Script / HTML Kodları</label>
                <div class="relative">
                    <textarea name="script_code" rows="8" class="w-full bg-slate-900 text-emerald-400 font-mono text-sm leading-relaxed p-6 rounded-2xl focus:ring-4 focus:ring-indigo-500/20 border-none transition-all" placeholder="<!-- AdSense Code Here -->">{{ $advertisement->script_code }}</textarea>
                    <div class="absolute top-4 right-4 text-slate-600">
                        <i class="fas fa-code"></i>
                    </div>
                </div>
                @error('script_code') <p class="text-rose-500 text-xs font-bold mt-2 ml-1 italic">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end pt-10 border-t border-slate-100 gap-6">
                <a href="{{ route('admin.advertisements.index') }}" class="text-slate-400 hover:text-slate-600 font-bold text-sm transition-colors">Vazgeç</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold py-4 px-12 rounded-2xl shadow-xl shadow-indigo-100 transition-all hover:-translate-y-1 flex items-center group">
                    <span>Değişiklikleri Kaydet</span>
                    <i class="fas fa-check-circle ml-3 text-xs group-hover:scale-125 transition-transform"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
