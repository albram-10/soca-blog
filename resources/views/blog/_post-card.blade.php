<article class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">
    <a href="{{ route('blog.show', $post->slug) }}" class="block h-40 bg-gradient-to-br from-brand-100 to-brand-50 flex items-center justify-center">
        @if($post->cover_image)
            <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        @else
            <span class="text-brand-500 font-extrabold text-3xl">SOCA</span>
        @endif
    </a>
    <div class="p-5 flex flex-col flex-1">
        <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
            <a href="{{ route('blog.category', $post->category->slug) }}" class="bg-brand-50 text-brand-600 font-semibold px-2 py-0.5 rounded-full">
                {{ $post->category->name }}
            </a>
            <span>&middot;</span>
            <span>{{ $post->published_at->translatedFormat('d M Y') }}</span>
        </div>
        <h2 class="font-bold text-lg leading-snug text-gray-900 mb-2">
            <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-brand-600 transition">
                {{ $post->title }}
            </a>
        </h2>
        <p class="text-sm text-gray-600 line-clamp-3 flex-1">{{ $post->excerpt }}</p>
        <a href="{{ route('blog.show', $post->slug) }}" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand-600 hover:text-brand-700">
            Baca Selengkapnya
            <span aria-hidden="true">&rarr;</span>
        </a>
    </div>
</article>
