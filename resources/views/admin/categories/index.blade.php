@extends('admin.layout')

@section('title', 'Kategori')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Kategori</h1>

    <div class="bg-white rounded-2xl border border-gray-100 p-5 mb-6 max-w-md">
        <h2 class="text-sm font-semibold text-gray-700 mb-3">Tambah Kategori</h2>
        <form method="POST" action="{{ route('admin.categories.store') }}" class="flex gap-2">
            @csrf
            <input type="text" name="name" placeholder="Nama kategori" required
                   class="flex-1 rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                Tambah
            </button>
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden max-w-2xl">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="text-left px-5 py-3">Nama</th>
                    <th class="text-left px-5 py-3">Jumlah Artikel</th>
                    <th class="text-right px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($categories as $category)
                    <tr>
                        <td class="px-5 py-3">
                            <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="flex items-center gap-2">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $category->name }}"
                                       class="rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm py-1">
                                <button type="submit" class="text-blue-700 hover:text-blue-800 text-xs font-medium">Simpan</button>
                            </form>
                        </td>
                        <td class="px-5 py-3 text-gray-600">{{ $category->posts_count }}</td>
                        <td class="px-5 py-3 text-right">
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                  onsubmit="return confirm('Hapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 font-medium text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-5 py-8 text-center text-gray-400">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
