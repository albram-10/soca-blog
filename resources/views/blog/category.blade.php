@extends('layouts.app')

@section('title', $category->name . ' | Blog SOCA')
@section('description', 'Artikel seputar ' . $category->name . ' dari Blog SOCA.')

@section('content')

    <section class="mb-10">
        <p class="text-sm text-brand-600 font-semibold mb-1">Kategori</p>
        <h1 class="text-3xl font-extrabold text-gray-900">{{ $category->name }}</h1>
    </section>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        @forelse($posts as $post)
            @include('blog._post-card', ['post' => $post])
        @empty
            <p class="col-span-full text-center text-gray-500">Belum ada artikel di kategori ini.</p>
        @endforelse
    </div>

    <div>
        {{ $posts->links() }}
    </div>

@endsection
