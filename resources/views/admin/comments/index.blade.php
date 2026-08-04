@extends('admin.layout')

@section('title', 'Komentar')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-4">Komentar</h1>

    @if(session('status'))
        <div class="mb-4 text-sm text-green-700 bg-green-50 border border-green-100 rounded-lg px-4 py-3">
            {{ session('status') }}
        </div>
    @endif

    <div class="flex items-center gap-1 text-sm mb-4 text-gray-500">
        @php
            $tabs = [
                'all' => 'Semua',
                'pending' => 'Menunggu',
                'approved' => 'Disetujui',
                'spam' => 'Spam',
                'trash' => 'Sampah',
            ];
        @endphp
        @foreach($tabs as $key => $label)
            <a href="{{ route('admin.comments.index', ['status' => $key]) }}"
               class="px-3 py-1.5 rounded-lg {{ $status === $key ? 'bg-gray-900 text-white font-semibold' : 'hover:text-gray-900' }}">
                {{ $label }} ({{ $counts[$key] }})
            </a>
            @if(!$loop->last)<span class="text-gray-300">|</span>@endif
        @endforeach
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="text-left px-5 py-3">Penulis</th>
                    <th class="text-left px-5 py-3">Komentar</th>
                    <th class="text-left px-5 py-3">Untuk Artikel</th>
                    <th class="text-left px-5 py-3">Tanggal</th>
                    <th class="text-right px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($comments as $comment)
                    <tr>
                        <td class="px-5 py-3 align-top">
                            <div class="font-medium text-gray-900">{{ $comment->name }}</div>
                            <div class="text-xs text-gray-400">{{ $comment->email }}</div>
                            <span class="inline-block mt-1 text-[11px] font-semibold px-2 py-0.5 rounded-full
                                @class([
                                    'bg-yellow-50 text-yellow-700' => $comment->status === 'pending',
                                    'bg-green-50 text-green-700' => $comment->status === 'approved',
                                    'bg-red-50 text-red-700' => $comment->status === 'spam',
                                    'bg-gray-100 text-gray-500' => $comment->status === 'trash',
                                ])">
                                {{ $tabs[$comment->status] ?? $comment->status }}
                            </span>
                        </td>
                        <td class="px-5 py-3 align-top text-gray-700 max-w-xs">{{ $comment->body }}</td>
                        <td class="px-5 py-3 align-top">
                            @if($comment->post)
                                <a href="{{ route('blog.show', $comment->post->slug) }}" target="_blank" class="text-blue-600 hover:text-blue-700">
                                    {{ \Illuminate\Support\Str::limit($comment->post->title, 40) }}
                                </a>
                            @else
                                <span class="text-gray-400">Artikel dihapus</span>
                            @endif
                        </td>
                        <td class="px-5 py-3 align-top text-gray-500">{{ $comment->created_at->format('d M Y') }}</td>
                        <td class="px-5 py-3 align-top text-right">
                            <div class="flex flex-wrap justify-end gap-2">
                                @if($comment->status !== 'approved')
                                    <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="approved">
                                        <button class="text-green-600 hover:text-green-700 text-xs font-medium">Setujui</button>
                                    </form>
                                @endif
                                @if($comment->status !== 'spam')
                                    <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="spam">
                                        <button class="text-orange-600 hover:text-orange-700 text-xs font-medium">Spam</button>
                                    </form>
                                @endif
                                @if($comment->status !== 'trash')
                                    <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="trash">
                                        <button class="text-gray-500 hover:text-gray-700 text-xs font-medium">Sampah</button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Hapus permanen komentar ini?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:text-red-700 text-xs font-medium">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-8 text-center text-gray-400">Tidak ada komentar di kategori ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $comments->links() }}
    </div>

@endsection
