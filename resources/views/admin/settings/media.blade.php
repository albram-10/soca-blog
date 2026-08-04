@extends('admin.layout')

@section('title', 'Pengaturan — Media')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan</h1>

    <div class="flex flex-col sm:flex-row gap-6 max-w-3xl">
        @include('admin.settings._tabs', ['active' => 'media'])

        <div class="flex-1 min-w-0 bg-white rounded-2xl border border-gray-100 p-6">
            <p class="text-sm text-gray-600 leading-relaxed">
                Blog SOCA saat ini belum punya pustaka media (upload file) sendiri — gambar cover artikel
                dan site icon diisi lewat URL gambar yang sudah di-hosting di tempat lain (misalnya
                Cloudinary, S3, atau CDN kamu sendiri). Jadi belum ada pengaturan ukuran thumbnail atau
                kompresi gambar seperti di WordPress.
            </p>
            <p class="text-sm text-gray-600 leading-relaxed mt-3">
                Kalau ke depannya kamu butuh upload gambar langsung dari komputer, ini bisa ditambahkan
                sebagai pengembangan lanjutan (pakai Laravel Storage / `php artisan storage:link`).
            </p>
        </div>
    </div>

@endsection
