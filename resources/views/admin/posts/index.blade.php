@extends('admin.layout')

@section('title', 'Artikel')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Artikel</h1>
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
            + Artikel Baru
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="text-left px-5 py-3">Judul</th>
                    <th class="text-left px-5 py-3">Kategori</th>
                    <th class="text-left px-5 py-3">Status</th>
                    <th class="text-left px-5 py-3">Tanggal</th>
                    <th class="text-right px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($posts as $post)
                    <tr>
                        <td class="px-5 py-3 font-medium text-gray-900">{{ $post->title }}</td>
                        <td class="px-5 py-3 text-gray-600">{{ $post->category->name }}</td>
                        <td class="px-5 py-3">
                            @if($post->published_at)
                                <span class="text-green-700 bg-green-50 text-xs font-semibold px-2 py-1 rounded-full">Publish</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 text-xs font-semibold px-2 py-1 rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="px-5 py-3 text-gray-500">{{ $post->created_at->format('d M Y') }}</td>
                        <td class="px-5 py-3 text-right space-x-2 whitespace-nowrap">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-700 hover:text-blue-800 font-medium">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Hapus artikel ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-8 text-center text-gray-400">Belum ada artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>

@endsection
