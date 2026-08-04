@extends('layouts.app')

@section('title', $post->title . ' | Blog SOCA')
@section('description', $post->excerpt)

@section('content')

    <article class="max-w-3xl mx-auto">

        <div class="mb-6">
            <a href="{{ route('blog.category', $post->category->slug) }}" class="bg-brand-50 text-brand-600 font-semibold text-xs px-2 py-1 rounded-full">
                {{ $post->category->name }}
            </a>
        </div>

        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-4 leading-snug">
            {{ $post->title }}
        </h1>

        <div class="flex items-center gap-3 text-sm text-gray-500 mb-8">
            <span class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center font-bold text-xs">
                {{ strtoupper(substr($post->author_name, 0, 1)) }}
            </span>
            <span>{{ $post->author_name }}</span>
            <span>&middot;</span>
            <span>{{ $post->published_at->translatedFormat('d F Y') }}</span>
        </div>

        @if($post->cover_image)
            <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-2xl mb-8">
        @else
            <div class="w-full h-56 rounded-2xl bg-gradient-to-br from-brand-100 to-brand-50 flex items-center justify-center mb-8">
                <span class="text-brand-500 font-extrabold text-4xl">SOCA</span>
            </div>
        @endif

        <div class="prose prose-neutral max-w-none">
            @if(strip_tags($post->body) !== $post->body)
                {{-- Content saved from the WYSIWYG editor already contains HTML markup --}}
                {!! $post->body !!}
            @else
                {{-- Legacy plain-text content (seeded before the editor was added) --}}
                @foreach(explode("\n\n", $post->body) as $paragraph)
                    @if(str_starts_with(trim($paragraph), '-') || str_starts_with(trim($paragraph), '1.'))
                        <ul class="list-disc pl-5 space-y-1 mb-4">
                            @foreach(preg_split('/\n/', trim($paragraph)) as $item)
                                <li>{{ ltrim($item, "-1234567890. ") }}</li>
                            @endforeach
                        </ul>
                    @else
                    <p class="mb-4 leading-relaxed">{{ $paragraph }}</p>
                @endif
            @endforeach
            @endif
        </div>

        <div class="mt-10 p-6 rounded-2xl bg-brand-50 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-gray-800 font-semibold text-center sm:text-left">
                Mulai kumpulkan cashback dari setiap belanja Shopee & ShopeeFood kamu.
            </p>
            <a href="https://app.socacuan.com" class="whitespace-nowrap bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-full transition">
                Buka SOCA
            </a>
        </div>
    </article>

    @if($related->count())
        <section class="max-w-3xl mx-auto mt-14">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Artikel Terkait</h2>
            <div class="grid sm:grid-cols-3 gap-6">
                @foreach($related as $relatedPost)
                    @include('blog._post-card', ['post' => $relatedPost])
                @endforeach
            </div>
        </section>
    @endif

    <section class="max-w-3xl mx-auto mt-14">
        <h2 class="text-lg font-bold text-gray-900 mb-4">
            Komentar @if($comments->count())({{ $comments->count() }})@endif
        </h2>

        @if(session('status'))
            <div class="mb-6 text-sm text-green-700 bg-green-50 border border-green-100 rounded-lg px-4 py-3">
                {{ session('status') }}
            </div>
        @endif

        <div class="space-y-5 mb-8">
            @forelse($comments as $comment)
                <div class="flex gap-3">
                    <span class="w-9 h-9 shrink-0 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center font-bold text-xs">
                        {{ strtoupper(substr($comment->name, 0, 1)) }}
                    </span>
                    <div class="bg-white border border-gray-100 rounded-2xl px-4 py-3 flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="font-semibold text-sm text-gray-900">{{ $comment->name }}</span>
                            <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-gray-700">{{ $comment->body }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500">Belum ada komentar. Jadilah yang pertama berkomentar di artikel ini.</p>
            @endforelse
        </div>

        @php($settingForComments = \App\Models\Setting::current())
        @if($settingForComments->comments_enabled)
            <div class="bg-white border border-gray-100 rounded-2xl p-5">
                <h3 class="text-sm font-semibold text-gray-800 mb-3">Tulis Komentar</h3>

                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 bg-red-50 border border-red-100 rounded-lg px-3 py-2">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('comments.store', $post) }}" class="space-y-3">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-3">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama" required
                               class="w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500 text-sm">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required
                               class="w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500 text-sm">
                    </div>
                    <textarea name="body" rows="3" placeholder="Tulis komentar kamu..." required
                              class="w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500 text-sm">{{ old('body') }}</textarea>
                    <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white text-sm font-semibold px-5 py-2 rounded-lg transition">
                        Kirim Komentar
                    </button>
                </form>
            </div>
        @else
            <p class="text-sm text-gray-400">Komentar sedang ditutup untuk artikel ini.</p>
        @endif
    </section>

@endsection
