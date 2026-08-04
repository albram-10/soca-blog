@extends('layouts.app')

@section('content')

    <section class="mb-10 text-center">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-3">
            Blog {{ \App\Models\Setting::current()->site_name }} <span class="text-brand-500">|</span> Tips Cashback & Affiliate Marketing
        </h1>
        <p class="text-gray-600 max-w-xl mx-auto">
            {{ \App\Models\Setting::current()->tagline ?: 'Belanja Shopee dan ShopeeFood pasti dapat cashback.' }}
        </p>
    </section>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        @forelse($posts as $post)
            @include('blog._post-card', ['post' => $post])
        @empty
            <p class="col-span-full text-center text-gray-500">Belum ada artikel yang dipublikasikan.</p>
        @endforelse
    </div>

    <div>
        {{ $posts->links() }}
    </div>

@endsection
