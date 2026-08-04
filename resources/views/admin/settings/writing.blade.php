@extends('admin.layout')

@section('title', 'Pengaturan — Writing')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan</h1>

    <div class="flex flex-col sm:flex-row gap-6 max-w-3xl">
        @include('admin.settings._tabs', ['active' => 'writing'])

        <div class="flex-1 min-w-0 bg-white rounded-2xl border border-gray-100">
            <form method="POST" action="{{ route('admin.settings.update', 'writing') }}">
                @csrf
                @method('PUT')

                <div class="grid sm:grid-cols-3 gap-4 p-6 items-start">
                    <label class="text-sm font-semibold text-gray-700 pt-2">Kategori Default</label>
                    <div class="sm:col-span-2">
                        <select name="default_category_id" class="w-full max-w-sm rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                            <option value="">— Tidak diatur —</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('default_category_id', $setting->default_category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-400 mt-1.5">
                            Kategori yang otomatis terpilih saat membuat artikel baru di panel admin.
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
