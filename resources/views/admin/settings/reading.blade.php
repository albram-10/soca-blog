@extends('admin.layout')

@section('title', 'Pengaturan — Reading')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan</h1>

    <div class="flex flex-col sm:flex-row gap-6 max-w-3xl">
        @include('admin.settings._tabs', ['active' => 'reading'])

        <div class="flex-1 min-w-0 bg-white rounded-2xl border border-gray-100">
            <form method="POST" action="{{ route('admin.settings.update', 'reading') }}">
                @csrf
                @method('PUT')

                <div class="grid sm:grid-cols-3 gap-4 p-6 items-start">
                    <label class="text-sm font-semibold text-gray-700 pt-2">Artikel per Halaman</label>
                    <div class="sm:col-span-2">
                        <input type="number" name="posts_per_page" min="1" max="24"
                               value="{{ old('posts_per_page', $setting->posts_per_page) }}"
                               class="w-28 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                        <p class="text-xs text-gray-400 mt-1.5">
                            Jumlah artikel yang ditampilkan per halaman di homepage blog dan halaman kategori.
                        </p>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-100">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
