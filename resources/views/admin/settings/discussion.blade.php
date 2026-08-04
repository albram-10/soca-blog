@extends('admin.layout')

@section('title', 'Pengaturan — Discussion')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan</h1>

    <div class="flex flex-col sm:flex-row gap-6 max-w-3xl">
        @include('admin.settings._tabs', ['active' => 'discussion'])

        <div class="flex-1 min-w-0 bg-white rounded-2xl border border-gray-100">
            <form method="POST" action="{{ route('admin.settings.update', 'discussion') }}">
                @csrf
                @method('PUT')

                <div class="p-6 space-y-4">
                    <label class="flex items-start gap-2 text-sm text-gray-700">
                        <input type="checkbox" name="comments_enabled" value="1" class="rounded border-gray-300 mt-0.5"
                               @checked(old('comments_enabled', $setting->comments_enabled))>
                        <span>
                            Izinkan pengunjung mengirim komentar di artikel
                            <span class="block text-xs text-gray-400">Kalau dimatikan, form komentar tidak akan tampil di halaman artikel.</span>
                        </span>
                    </label>

                    <label class="flex items-start gap-2 text-sm text-gray-700">
                        <input type="checkbox" name="comments_require_approval" value="1" class="rounded border-gray-300 mt-0.5"
                               @checked(old('comments_require_approval', $setting->comments_require_approval))>
                        <span>
                            Komentar harus disetujui admin sebelum tampil
                            <span class="block text-xs text-gray-400">Kalau dimatikan, komentar baru langsung tampil tanpa moderasi.</span>
                        </span>
                    </label>
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
