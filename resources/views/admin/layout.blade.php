<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | SOCA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="flex min-h-screen">
        <aside class="w-56 bg-gray-900 text-gray-300 flex flex-col">
            <div class="px-5 py-5 flex items-center gap-2 border-b border-gray-800">
                <img src="/images/logo.png" alt="SOCA" class="w-8 h-8 rounded-lg object-cover">
                <span class="font-bold text-white">SOCA Admin</span>
            </div>
            <nav class="flex-1 px-3 py-4 space-y-1 text-sm">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : '' }}">
                    <span aria-hidden="true">🏠</span> Dashboard
                </a>
                <a href="{{ route('admin.posts.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.posts.*') ? 'bg-gray-800 text-white' : '' }}">
                    <span aria-hidden="true">📝</span> Artikel
                </a>
                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.categories.*') ? 'bg-gray-800 text-white' : '' }}">
                    <span aria-hidden="true">🏷️</span> Kategori
                </a>
                <a href="{{ route('admin.comments.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.comments.*') ? 'bg-gray-800 text-white' : '' }}">
                    <span aria-hidden="true">💬</span> Komentar
                    @php($pendingCount = \App\Models\Comment::where('status', 'pending')->count())
                    @if($pendingCount)
                        <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">{{ $pendingCount }}</span>
                    @endif
                </a>
                <a href="{{ route('blog.index') }}" target="_blank"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 hover:text-white transition">
                    <span aria-hidden="true">🔗</span> Lihat Blog
                </a>
                <a href="{{ route('admin.settings.edit') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.settings.*') ? 'bg-gray-800 text-white' : '' }}">
                    <span aria-hidden="true">⚙️</span> Pengaturan
                </a>
            </nav>
            <div class="px-3 py-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-lg hover:bg-gray-800 hover:text-white transition text-sm">
                        Keluar ({{ auth()->user()->name }})
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8">
            @if(session('status'))
                <div class="mb-6 text-sm text-green-700 bg-green-50 border border-green-100 rounded-lg px-4 py-3">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 text-sm text-red-700 bg-red-50 border border-red-100 rounded-lg px-4 py-3">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
