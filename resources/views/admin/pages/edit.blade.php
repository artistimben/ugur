@extends('admin.layouts.app')

@section('content')
    <div class="mb-10">
        <a href="{{ route('admin.pages.index') }}" class="inline-flex items-center text-slate-400 hover:text-indigo-600 font-bold text-xs uppercase tracking-widest mb-4 transition-colors group">
            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i> Listeye Geri Dön
        </a>
        <h1 class="text-4xl font-outfit font-extrabold text-slate-900 tracking-tight">Sayfayı Düzenle</h1>
    </div>

    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        @csrf
        @method('PUT')
        
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-200/60">
                <div class="mb-8">
                    <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">Sayfa Başlığı</label>
                    <input type="text" name="title" value="{{ $page->title }}" class="w-full bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-4 text-lg font-medium border" required>
                </div>
                
                @if($page->slug == 'hakkimda')
                    @php
                        $sections = json_decode($page->content, true) ?? [];
                    @endphp
                    <div class="space-y-6">
                        <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center"><i class="fas fa-quote-left mr-2 text-indigo-500"></i> Giriş Alıntısı</h4>
                            <textarea name="about_sections[intro_quote]" rows="3" class="w-full rounded-xl border-slate-200 p-4">{{ $sections['intro_quote'] ?? '' }}</textarea>
                        </div>

                        <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center"><i class="fas fa-align-left mr-2 text-indigo-500"></i> Biyografi Metni (Paragraf 1)</h4>
                            <textarea name="about_sections[bio_1]" rows="5" class="w-full rounded-xl border-slate-200 p-4">{{ $sections['bio_1'] ?? '' }}</textarea>
                        </div>

                        <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 text-center">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center justify-center"><i class="fas fa-quote-right mr-2 text-indigo-500"></i> Orta Alıntı (Kutucuk İçi)</h4>
                            <textarea name="about_sections[middle_quote]" rows="3" class="w-full rounded-xl border-slate-200 p-4 text-center">{{ $sections['middle_quote'] ?? '' }}</textarea>
                        </div>

                        <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center"><i class="fas fa-align-left mr-2 text-indigo-500"></i> Biyografi Metni (Paragraf 2)</h4>
                            <textarea name="about_sections[bio_2]" rows="5" class="w-full rounded-xl border-slate-200 p-4">{{ $sections['bio_2'] ?? '' }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                                <h4 class="font-bold text-slate-800 mb-4">Bölüm 2 Başlık</h4>
                                <input type="text" name="about_sections[section_2_title]" value="{{ $sections['section_2_title'] ?? '' }}" class="w-full rounded-xl border-slate-200 p-3">
                                <h4 class="font-bold text-slate-800 my-4">Bölüm 2 Metin</h4>
                                <textarea name="about_sections[section_2_text]" rows="5" class="w-full rounded-xl border-slate-200 p-4">{{ $sections['section_2_text'] ?? '' }}</textarea>
                            </div>
                            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                                <h4 class="font-bold text-slate-800 mb-4">Bölüm 3 Başlık</h4>
                                <input type="text" name="about_sections[section_3_title]" value="{{ $sections['section_3_title'] ?? '' }}" class="w-full rounded-xl border-slate-200 p-3">
                                <h4 class="font-bold text-slate-800 my-4">Bölüm 3 Metin</h4>
                                <textarea name="about_sections[section_3_text]" rows="5" class="w-full rounded-xl border-slate-200 p-4">{{ $sections['section_3_text'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="p-6 bg-indigo-50/50 rounded-2xl border border-indigo-100">
                            <h4 class="font-bold text-indigo-900 mb-4 flex items-center"><i class="fas fa-heart mr-2"></i> Teşekkür Bölümü</h4>
                            <input type="text" name="about_sections[footer_title]" value="{{ $sections['footer_title'] ?? '' }}" class="w-full rounded-xl border-slate-200 p-3 mb-4">
                            <textarea name="about_sections[footer_text]" rows="4" class="w-full rounded-xl border-slate-200 p-4">{{ $sections['footer_text'] ?? '' }}</textarea>
                        </div>
                    </div>
                @else
                    <div class="editor-wrapper">
                        <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">İçerik (HTML desteklenir)</label>
                        <textarea name="content" id="editor" rows="20" class="w-full bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all p-4 border">{{ $page->content }}</textarea>
                    </div>
                @endif
            </div>
        </div>

        <div class="space-y-8">
            <!-- Publishing Box -->
            <div class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-200/60 overflow-hidden relative">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-right from-amber-500 to-orange-500"></div>
                <h3 class="font-outfit font-bold text-slate-800 mb-6 flex items-center">
                    <i class="fas fa-save mr-3 text-amber-500"></i> Kaydet
                </h3>
                
                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-4 rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all flex items-center justify-center group">
                    <span>Değişiklikleri Kaydet</span>
                    <i class="fas fa-check-double ml-3 text-xs group-hover:scale-125 transition-transform"></i>
                </button>
            </div>

            <!-- Image Upload Box -->
            <div class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-200/60">
                <h3 class="font-outfit font-bold text-slate-800 mb-6 flex items-center">
                    <i class="fas fa-image mr-3 text-purple-500"></i> Sayfa Görseli
                </h3>
                
                <div x-data="{ photoPreview: '{{ $page->image ? (Str::startsWith($page->image, ['http://', 'https://', 'images/']) ? asset($page->image) : Storage::url($page->image)) : null }}' }" class="space-y-4">
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
                </div>
            </div>
        </div>
    </form>
@endsection
