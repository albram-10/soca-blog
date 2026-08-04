@extends('admin.layout')

@section('title', 'Pengaturan — General')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan</h1>

    <div class="flex flex-col sm:flex-row gap-6 max-w-3xl">
        @include('admin.settings._tabs', ['active' => 'general'])

        <div class="flex-1 min-w-0 bg-white rounded-2xl border border-gray-100">
            <form method="POST" action="{{ route('admin.settings.update', 'general') }}">
                @csrf
                @method('PUT')

                <div class="divide-y divide-gray-100">
                    <div class="grid sm:grid-cols-3 gap-4 p-6 items-start">
                        <label class="text-sm font-semibold text-gray-700 pt-2">Nama Situs</label>
                        <div class="sm:col-span-2">
                            <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name) }}" required
                                   class="w-full max-w-sm rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-3 gap-4 p-6 items-start">
                        <label class="text-sm font-semibold text-gray-700 pt-2">Tagline</label>
                        <div class="sm:col-span-2">
                            <input type="text" name="tagline" value="{{ old('tagline', $setting->tagline) }}"
                                   class="w-full max-w-sm rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                            <p class="text-xs text-gray-400 mt-1.5">Tampil di homepage blog dan meta description.</p>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-3 gap-4 p-6 items-start">
                        <label class="text-sm font-semibold text-gray-700 pt-2">Site Icon (URL)</label>
                        <div class="sm:col-span-2">
                            <input type="url" name="site_icon" value="{{ old('site_icon', $setting->site_icon) }}" placeholder="https://.../icon.png"
                                   class="w-full max-w-sm rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                            <p class="text-xs text-gray-400 mt-1.5">Favicon di tab browser. Idealnya persegi, minimal 512×512 px.</p>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-3 gap-4 p-6 items-start">
                        <label class="text-sm font-semibold text-gray-700 pt-2">Alamat Situs (URL)</label>
                        <div class="sm:col-span-2">
                            <input type="url" name="site_url" value="{{ old('site_url', $setting->site_url) }}" placeholder="https://blog.socacuan.com"
                                   class="w-full max-w-sm rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-3 gap-4 p-6 items-start">
                        <label class="text-sm font-semibold text-gray-700 pt-2">Email Administrasi</label>
                        <div class="sm:col-span-2">
                            <input type="email" name="admin_email" value="{{ old('admin_email', $setting->admin_email) }}" placeholder="support@socacuan.com"
                                   class="w-full max-w-sm rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
