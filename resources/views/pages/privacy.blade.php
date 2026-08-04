@extends('layouts.app')

@php($setting = \App\Models\Setting::current())

@section('title', 'Kebijakan Privasi | ' . $setting->site_name)
@section('description', 'Kebijakan privasi ' . $setting->site_name . ' — bagaimana kami mengumpulkan dan menggunakan data pengunjung.')

@section('content')

    <article class="max-w-3xl mx-auto">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-2">Kebijakan Privasi</h1>
        <p class="text-sm text-gray-400 mb-8">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p>

        <div class="prose prose-neutral max-w-none">
            <p>
                Halaman ini menjelaskan bagaimana {{ $setting->site_name }} ("kami") mengumpulkan, menggunakan, dan
                melindungi data pengunjung yang menggunakan blog ini. Dengan mengakses dan menggunakan situs ini,
                Kakak dianggap menyetujui praktik yang dijelaskan di bawah.
            </p>

            <h2>1. Data yang Kami Kumpulkan</h2>
            <p>Saat Kakak menggunakan blog ini, kami dapat mengumpulkan data berikut:</p>
            <ul>
                <li><strong>Data yang Kakak berikan langsung</strong> — misalnya nama dan alamat email saat mengirim komentar di artikel.</li>
                <li><strong>Data teknis</strong> — seperti alamat IP, jenis perangkat/browser, dan halaman yang dikunjungi, yang biasanya terekam otomatis lewat log server atau alat analitik (jika digunakan).</li>
                <li><strong>Cookie</strong> — file kecil yang tersimpan di perangkat Kakak untuk keperluan fungsional dasar situs.</li>
            </ul>

            <h2>2. Bagaimana Kami Menggunakan Data</h2>
            <p>Data yang dikumpulkan digunakan untuk:</p>
            <ul>
                <li>Menampilkan dan memoderasi komentar di artikel.</li>
                <li>Membalas pertanyaan atau permintaan yang Kakak kirimkan ke email administrasi kami.</li>
                <li>Memahami bagaimana pengunjung menggunakan blog ini, untuk perbaikan konten ke depannya.</li>
                <li>Menjaga keamanan situs dan mencegah penyalahgunaan (misalnya spam pada kolom komentar).</li>
            </ul>

            <h2>3. Berbagi Data ke Pihak Ketiga</h2>
            <p>
                Kami tidak menjual data pribadi Kakak ke pihak mana pun. Data hanya dapat dibagikan kepada penyedia
                layanan pihak ketiga yang membantu operasional situs ini (misalnya layanan hosting atau analitik),
                dan hanya sebatas yang diperlukan untuk menjalankan layanan tersebut.
            </p>

            <h2>4. Penyimpanan Data</h2>
            <p>
                Data komentar disimpan selama artikel terkait masih tayang, kecuali Kakak meminta penghapusan.
                Kami menyimpan data seperlunya untuk tujuan yang dijelaskan di kebijakan ini.
            </p>

            <h2>5. Hak Kakak</h2>
            <p>Kakak berhak untuk:</p>
            <ul>
                <li>Meminta salinan data yang kami simpan terkait Kakak.</li>
                <li>Meminta koreksi atau penghapusan data tersebut.</li>
                <li>Menarik persetujuan penggunaan data kapan saja, dengan menghubungi kami.</li>
            </ul>

            <h2>6. Perubahan Kebijakan</h2>
            <p>
                Kebijakan ini dapat diperbarui sewaktu-waktu. Perubahan akan tercermin lewat tanggal
                "Terakhir diperbarui" di bagian atas halaman ini.
            </p>

            <h2>7. Hubungi Kami</h2>
            <p>
                Kalau ada pertanyaan seputar kebijakan privasi ini, silakan hubungi kami di
                @if($setting->admin_email)
                    <a href="mailto:{{ $setting->admin_email }}">{{ $setting->admin_email }}</a>.
                @else
                    email administrasi kami.
                @endif
            </p>

            <hr>
            <p class="text-sm text-gray-400">
                <em>Catatan: Ini adalah draf umum, bukan nasihat hukum. Sesuaikan isinya dengan praktik data yang
                sebenarnya berlaku di SOCA sebelum dipublikasikan secara resmi.</em>
            </p>
        </div>
    </article>

@endsection
