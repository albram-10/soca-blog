@extends('layouts.app')

@php($setting = \App\Models\Setting::current())

@section('title', 'Syarat dan Ketentuan | ' . $setting->site_name)
@section('description', 'Syarat dan ketentuan penggunaan blog ' . $setting->site_name . '.')

@section('content')

    <article class="max-w-3xl mx-auto">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-2">Syarat dan Ketentuan</h1>
        <p class="text-sm text-gray-400 mb-8">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p>

        <div class="prose prose-neutral max-w-none">
            <p>
                Dengan mengakses dan menggunakan blog {{ $setting->site_name }}, Kakak dianggap menyetujui syarat
                dan ketentuan berikut. Mohon dibaca dengan saksama sebelum menggunakan situs ini.
            </p>

            <h2>1. Tentang Konten Blog</h2>
            <p>
                Artikel di blog ini berisi tips, panduan, dan informasi umum seputar cashback, belanja online, dan
                affiliate marketing. Konten disediakan untuk tujuan edukasi dan informasi umum, bukan sebagai
                jaminan hasil finansial tertentu.
            </p>

            <h2>2. Bukan Pengganti Informasi Resmi Aplikasi</h2>
            <p>
                Informasi mengenai besaran cashback, syarat pencairan, dan ketentuan program di blog ini bersifat
                panduan umum. Untuk data yang akurat dan berlaku saat ini (misalnya saldo, status pesanan, atau
                jadwal pencairan), rujukan resmi tetap aplikasi/dashboard SOCA, bukan artikel di blog ini.
            </p>

            <h2>3. Aturan Berkomentar</h2>
            <p>Saat mengirim komentar di artikel, Kakak setuju untuk tidak:</p>
            <ul>
                <li>Mengirim spam, promosi produk/layanan lain, atau tautan yang tidak relevan.</li>
                <li>Mengunggah konten yang mengandung ujaran kebencian, pelecehan, atau melanggar hukum.</li>
                <li>Menyamar sebagai pihak lain atau menyebarkan informasi palsu.</li>
            </ul>
            <p>
                Kami berhak memoderasi, menyembunyikan, atau menghapus komentar yang melanggar ketentuan ini tanpa
                pemberitahuan sebelumnya.
            </p>

            <h2>4. Hak Cipta</h2>
            <p>
                Seluruh tulisan, gambar, dan materi lain di blog ini adalah milik {{ $setting->site_name }} kecuali
                dinyatakan lain. Dilarang menyalin, mendistribusikan ulang, atau menggunakan konten blog ini untuk
                tujuan komersial tanpa izin tertulis dari kami.
            </p>

            <h2>5. Batasan Tanggung Jawab</h2>
            <p>
                Kami berupaya menjaga informasi di blog ini tetap akurat dan terkini, namun tidak menjamin
                kelengkapan atau keakuratan 100% setiap saat. {{ $setting->site_name }} tidak bertanggung jawab atas
                kerugian yang timbul dari keputusan yang diambil pembaca berdasarkan konten blog ini.
            </p>

            <h2>6. Tautan ke Situs Lain</h2>
            <p>
                Blog ini mungkin memuat tautan ke situs pihak ketiga (misalnya Shopee, ShopeeFood). Kami tidak
                bertanggung jawab atas konten, kebijakan privasi, atau praktik dari situs pihak ketiga tersebut.
            </p>

            <h2>7. Perubahan Ketentuan</h2>
            <p>
                Syarat dan ketentuan ini dapat diperbarui sewaktu-waktu tanpa pemberitahuan sebelumnya. Perubahan
                akan tercermin lewat tanggal "Terakhir diperbarui" di bagian atas halaman ini.
            </p>

            <h2>8. Hubungi Kami</h2>
            <p>
                Kalau ada pertanyaan seputar syarat dan ketentuan ini, silakan hubungi kami di
                @if($setting->admin_email)
                    <a href="mailto:{{ $setting->admin_email }}">{{ $setting->admin_email }}</a>.
                @else
                    email administrasi kami.
                @endif
            </p>

            <hr>
            <p class="text-sm text-gray-400">
                <em>Catatan: Ini adalah draf umum, bukan nasihat hukum. Sesuaikan isinya dengan kebijakan yang
                sebenarnya berlaku di SOCA sebelum dipublikasikan secara resmi.</em>
            </p>
        </div>
    </article>

@endsection
