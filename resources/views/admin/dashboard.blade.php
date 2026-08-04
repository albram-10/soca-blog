@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Dashboard</h1>

    <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-8 flex items-center justify-between gap-6 flex-wrap">
        <div>
            <h2 class="text-lg font-bold text-gray-900 mb-1">Selamat datang di Admin SOCA 👋</h2>
            <p class="text-sm text-gray-500 max-w-md">
                Kelola artikel dan kategori blog SOCA di sini. Tambahkan artikel baru, atur status
                publish, atau rapikan kategori tanpa perlu menyentuh database sama sekali.
            </p>
            <a href="{{ route('admin.posts.create') }}" class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                + Tulis Artikel Baru
            </a>
        </div>
        <div class="w-32 h-24 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center text-blue-500 font-extrabold text-2xl shrink-0">
            SOCA
        </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-2xl border border-gray-100 p-5">
            <p class="text-xs text-gray-500 mb-1">Total Artikel</p>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 p-5">
            <p class="text-xs text-gray-500 mb-1">Published</p>
            <p class="text-2xl font-bold text-green-600">{{ $stats['published'] }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 p-5">
            <p class="text-xs text-gray-500 mb-1">Draft</p>
            <p class="text-2xl font-bold text-gray-500">{{ $stats['draft'] }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 p-5">
            <p class="text-xs text-gray-500 mb-1">Kategori</p>
            <p class="text-2xl font-bold text-blue-600">{{ $stats['categories'] }}</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-sm font-semibold text-gray-700">Artikel Terbaru</h2>
            <a href="{{ route('admin.posts.index') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">Lihat semua &rarr;</a>
        </div>
        <table class="w-full text-sm">
            <tbody class="divide-y divide-gray-100">
                @forelse($recentPosts as $post)
                    <tr>
                        <td class="px-5 py-3 font-medium text-gray-900">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="hover:text-blue-600">{{ $post->title }}</a>
                        </td>
                        <td class="px-5 py-3 text-gray-500">{{ $post->category->name }}</td>
                        <td class="px-5 py-3">
                            @if($post->published_at)
                                <span class="text-green-700 bg-green-50 text-xs font-semibold px-2 py-1 rounded-full">Publish</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 text-xs font-semibold px-2 py-1 rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="px-5 py-3 text-gray-400 text-right">{{ $post->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-5 py-8 text-center text-gray-400">Belum ada artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
