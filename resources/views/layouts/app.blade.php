<!DOCTYPE html>
<html lang="id">
@php($setting = \App\Models\Setting::current())
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $setting->site_name . ' | ' . ($setting->tagline ?: 'Tips Cashback & Affiliate Marketing'))</title>
    <meta name="description" content="@yield('description', $setting->tagline ?: 'Belanja Shopee dan ShopeeFood pasti dapat cashback bersama SOCA.')">
    @if($setting->site_icon)
        <link rel="icon" href="{{ $setting->site_icon }}">
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            700: '#1e40af',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <header class="bg-white border-b sticky top-0 z-40">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('blog.index') }}" class="flex items-center gap-2">
                <img src="/images/logo.png" alt="{{ $setting->site_name }}" class="w-9 h-9 rounded-xl object-cover">
                <span class="font-extrabold text-xl tracking-tight text-gray-900">{{ $setting->site_name }}<span class="text-brand-500">.</span></span>
            </a>
            <nav class="hidden sm:flex items-center gap-6 text-sm font-medium text-gray-600">
                @foreach(\App\Models\Category::withCount('posts')->get() as $cat)
                    <a href="{{ route('blog.category', $cat->slug) }}" class="hover:text-brand-600 transition">{{ $cat->name }}</a>
                @endforeach
            </nav>
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="hidden sm:inline text-sm font-semibold text-gray-500 hover:text-brand-600 transition">
                    Login Admin
                </a>
                <a href="https://app.socacuan.com" class="bg-brand-500 hover:bg-brand-600 text-white text-sm font-semibold px-4 py-2 rounded-full transition">
                    Buka SOCA
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-10" id="main">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="max-w-5xl mx-auto px-4 py-10 grid sm:grid-cols-3 gap-8 text-sm">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <img src="/images/logo.png" alt="{{ $setting->site_name }}" class="w-8 h-8 rounded-lg object-cover">
                    <span class="font-extrabold text-lg text-white">SOCA</span>
                </div>
                <p class="text-gray-400">{{ $setting->tagline ?: 'Belanja Shopee dan ShopeeFood pasti dapat cashback bersama SOCA.' }}</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Tautan</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="https://app.socacuan.com" class="hover:text-white">Get Started</a></li>
                    <li><a href="https://docs.socacuan.com" class="hover:text-white">Panduan</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-white">Blog</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Legal</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="https://socacuan.com/informasi/#kebijakan" class="hover:text-white">Kebijakan Privasi</a></li>
                    <li><a href="https://socacuan.com/informasi/#syarat" class="hover:text-white">Syarat & Ketentuan</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 py-4 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} Blog SOCA. Dibangun dengan Laravel.
        </div>
    </footer>
</body>
</html>