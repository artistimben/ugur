<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Yönetici Girişi - UK BLOG</title>

    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    },
                    animation: {
                        blob: "blob 7s infinite",
                    },
                    keyframes: {
                        blob: {
                            "0%": {
                                transform: "translate(0px, 0px) scale(1)",
                            },
                            "33%": {
                                transform: "translate(30px, -50px) scale(1.1)",
                            },
                            "66%": {
                                transform: "translate(-20px, 20px) scale(0.9)",
                            },
                            "100%": {
                                transform: "translate(0px, 0px) scale(1)",
                            },
                        },
                    },
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .bg-pattern {
            background-color: #f1f5f9;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="antialiased h-full bg-slate-50 bg-pattern flex items-center justify-center relative overflow-hidden selection:bg-indigo-500 selection:text-white">

    <!-- Decorative Elements -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute top-[20%] right-[-5%] w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob" style="animation-delay: 2s;"></div>
    <div class="absolute bottom-[-20%] left-[20%] w-80 h-80 bg-sky-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob" style="animation-delay: 4s;"></div>

    <div class="w-full max-w-[420px] px-6 relative z-10">
        
        <!-- Login Card -->
        <div class="glass-panel p-8 sm:p-10 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.06)] relative overflow-hidden">
            
            <!-- Top Gradient Line -->
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-sky-500"></div>

            <!-- Logo Area -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-indigo-600 to-purple-600 shadow-lg shadow-indigo-500/30 mb-4 transform hover:rotate-6 transition-transform">
                    <i class="fas fa-feather-pointed text-white text-2xl"></i>
                </div>
                <h1 class="font-outfit text-2xl font-extrabold text-slate-900 tracking-tight uppercase">UK PANEL</h1>
                <p class="text-[11px] font-bold text-indigo-600 uppercase tracking-[0.2em] mt-2">Yönetici Girişi</p>
            </div>
            
            <x-auth-session-status class="mb-5 text-sm font-medium text-emerald-700 bg-emerald-50 p-3 rounded-xl border border-emerald-200/60 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">E-posta Adresi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fas fa-envelope text-sm"></i>
                        </div>
                        <input id="email" 
                               class="block w-full pl-11 pr-4 py-3.5 text-sm font-medium rounded-xl border-slate-200 bg-white/60 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder-slate-400 shadow-sm" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required autofocus autocomplete="username" 
                               placeholder="ornek@admin.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-rose-500 font-medium" />
                </div>

                <!-- Password -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Şifre</label>
                        @if (Route::has('password.request'))
                            <a class="text-[11px] font-bold text-indigo-600 hover:text-indigo-700 transition-colors" href="{{ route('password.request') }}">
                                Şifremi Unuttum
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fas fa-lock text-sm"></i>
                        </div>
                        <input id="password" 
                               class="block w-full pl-11 pr-4 py-3.5 text-sm font-medium rounded-xl border-slate-200 bg-white/60 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder-slate-400 shadow-sm"
                               type="password"
                               name="password"
                               required autocomplete="current-password" 
                               placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-rose-500 font-medium" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center pt-2">
                    <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500/30 outline-none transition-all cursor-pointer" name="remember">
                    <label for="remember_me" class="ml-2.5 block text-xs font-semibold text-slate-600 cursor-pointer select-none">
                        Oturumumu açık tut
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 rounded-xl text-sm font-bold text-white bg-slate-900 hover:bg-indigo-600 active:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 transition-all duration-300 shadow-lg shadow-indigo-500/20 group">
                        <span>Panele Giriş Yap</span>
                        <i class="fas fa-arrow-right ml-2 opacity-70 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to Site -->
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-indigo-600 transition-colors bg-white/80 hover:bg-white px-5 py-2.5 rounded-full shadow-sm backdrop-blur-md">
                <i class="fas fa-arrow-left mr-2"></i>
                Siteye Geri Dön
            </a>
        </div>

    </div>

</body>
</html>
