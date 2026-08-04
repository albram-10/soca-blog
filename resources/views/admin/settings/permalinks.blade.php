@extends('admin.layout')

@section('title', 'Pengaturan — Permalinks')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan</h1>

    <div class="flex flex-col sm:flex-row gap-6 max-w-3xl">
        @include('admin.settings._tabs', ['active' => 'permalinks'])

        <div class="flex-1 min-w-0 bg-white rounded-2xl border border-gray-100 p-6">
            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Struktur URL blog SOCA sudah tetap (fixed) dan diatur lewat kode di <code class="bg-gray-100 px-1.5 py-0.5 rounded text-xs">routes/web.php</code>,
                bukan lewat pengaturan di panel admin seperti WordPress. Berikut struktur yang dipakai saat ini:
            </p>
            <ul class="text-sm text-gray-700 space-y-2">
                <li class="flex gap-2"><span class="text-gray-400">Homepage</span> <code class="bg-gray-100 px-1.5 py-0.5 rounded text-xs">/</code></li>
                <li class="flex gap-2"><span class="text-gray-400">Artikel</span> <code class="bg-gray-100 px-1.5 py-0.5 rounded text-xs">/{slug-artikel}</code></li>
                <li class="flex gap-2"><span class="text-gray-400">Kategori</span> <code class="bg-gray-100 px-1.5 py-0.5 rounded text-xs">/category/{slug-kategori}</code></li>
            </ul>
            <p class="text-sm text-gray-600 leading-relaxed mt-4">
                Slug artikel dibuat otomatis dari judul saat kamu menyimpan artikel baru di menu Artikel.
            </p>
        </div>
    </div>

@endsection
