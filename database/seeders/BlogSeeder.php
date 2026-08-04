<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $tips = Category::firstOrCreate(['slug' => 'tips'], ['name' => 'Tips']);
        $promo = Category::firstOrCreate(['slug' => 'promo'], ['name' => 'Promo']);
        $berita = Category::firstOrCreate(['slug' => 'berita'], ['name' => 'Berita']);

        $posts = [
            [
                'category_id' => $tips->id,
                'title' => '5 Kesalahan Saat Belanja Online yang Bikin Cashback Kamu Hilang',
                'excerpt' => 'Belanja online makin praktis, tapi ada beberapa kebiasaan kecil yang bisa membuat cashback kamu di SOCA tidak tercatat. Yuk kenali penyebabnya.',
                'body' => "Belanja online sudah jadi rutinitas harian banyak orang. Diskon, gratis ongkir, dan promo flash sale membuat siapa pun tergoda untuk checkout lebih sering. Tapi tahukah kamu, tidak semua transaksi otomatis menghasilkan cashback? Ada beberapa kebiasaan kecil yang sering tanpa sadar menggagalkan pencatatan cashback di sistem SOCA.\n\nBerikut kesalahan yang paling sering terjadi dan sebaiknya kamu hindari:\n\n1. Menutup aplikasi Shopee sebelum halaman produk selesai dimuat setelah menempel link dari SOCA. Sesi tracking butuh waktu untuk terekam sepenuhnya di sisi marketplace.\n2. Menggunakan voucher atau kode promo pihak ketiga yang tidak terdaftar sebagai partner SOCA, sehingga transaksi dianggap berasal dari sumber lain.\n3. Checkout melalui aplikasi yang berbeda dari saat link ditempel, misalnya berpindah dari browser ke aplikasi Shopee tanpa membuka ulang link SOCA terlebih dahulu.\n4. Membatalkan pesanan setelah checkout, yang otomatis membatalkan cashback terkait karena marketplace tidak menganggapnya sebagai transaksi sah.\n5. Menunggu terlalu lama antara menempel link dan melakukan pembayaran, sehingga sesi tracking kedaluwarsa sebelum transaksi selesai.\n\nSelain lima hal di atas, ada juga faktor teknis yang perlu diperhatikan. Browser dengan mode private atau incognito terkadang memblokir cookie tracking, sehingga transaksi tidak tercatat dengan baik. Begitu juga dengan aplikasi pemblokir iklan (ad blocker) yang kadang ikut memblokir skrip pelacakan afiliasi.\n\nBagaimana cara memastikan transaksi kamu aman? Setelah menempel link di SOCA, langsung lanjutkan ke proses checkout tanpa membuka tab atau aplikasi lain. Hindari juga menutup jendela browser sebelum halaman produk di Shopee benar-benar terbuka sempurna.\n\nDengan memahami dan menghindari kesalahan-kesalahan ini, kamu bisa memaksimalkan setiap transaksi belanja agar cashback tetap masuk ke akun SOCA kamu setiap saat.",
                'cover_image' => null,
                'published_at' => now()->subDays(1),
            ],
            [
                'category_id' => $promo->id,
                'title' => 'Belanja Online Makin Untung, Kenali Manfaat Cashback Bersama SOCA',
                'excerpt' => 'Cashback bukan sekadar bonus kecil. Kalau dimanfaatkan dengan konsisten, ia bisa jadi tabungan tambahan tiap bulan.',
                'body' => "Belanja online sudah menjadi bagian dari keseharian, mulai dari kebutuhan rumah tangga, pakaian, hingga jajanan lewat ShopeeFood. Di tengah kebiasaan itu, banyak orang belum menyadari bahwa ada cara sederhana untuk membuat setiap transaksi menjadi lebih menguntungkan.\n\nSOCA hadir untuk mengubah kebiasaan belanja itu menjadi sesuatu yang lebih menguntungkan. Setiap kali kamu menempel link produk sebelum checkout, sebagian nilai transaksi akan kembali sebagai cashback ke akun SOCA kamu, tanpa mengubah harga produk sedikit pun.\n\nBeberapa manfaat yang bisa kamu rasakan sebagai pengguna SOCA:\n\n- Cashback terkumpul otomatis tanpa perlu usaha ekstra, cukup tempel link sebelum belanja seperti biasa.\n- Bisa dicairkan ke rekening bank atau e-wallet setelah pesanan dikonfirmasi oleh marketplace.\n- Berlaku untuk banyak kategori produk di Shopee, mulai dari fashion, elektronik, kebutuhan rumah tangga, hingga pesanan makanan di ShopeeFood.\n- Tidak ada biaya keanggotaan atau potongan tambahan apa pun yang dibebankan ke pengguna.\n\nSemakin sering belanja lewat SOCA, semakin besar potensi cashback yang bisa kamu kumpulkan setiap bulannya. Bagi sebagian pengguna, cashback ini bahkan bisa menutupi biaya ongkos kirim atau menjadi tambahan uang jajan bulanan tanpa terasa membebani pengeluaran utama.\n\nYang membuatnya lebih menarik, SOCA juga membuka peluang penghasilan tambahan lewat program referral. Jadi selain berhemat dari belanja sendiri, kamu juga bisa mendapat komisi dengan mengajak orang lain memakai SOCA.\n\nJika kamu sudah terbiasa belanja online setiap bulan, menjadikan SOCA sebagai langkah pertama sebelum checkout adalah kebiasaan kecil yang dampaknya bisa terasa besar dalam jangka panjang.",
                'cover_image' => null,
                'published_at' => now()->subDays(2),
            ],
            [
                'category_id' => $tips->id,
                'title' => 'Jangan Checkout Dulu! Begini Cara Belanja Online Lebih Hemat dengan SOCA',
                'excerpt' => 'Sebelum menekan tombol bayar, ada satu langkah sederhana yang sering dilewatkan banyak orang: menempel link lewat SOCA.',
                'body' => "Belanja online kini jadi gaya hidup, tapi tidak semua orang tahu cara membuat setiap transaksi jadi lebih hemat. Banyak yang langsung checkout begitu menemukan barang incaran, padahal ada satu langkah sederhana yang bisa membuat belanja jadi lebih menguntungkan.\n\nCaranya sederhana. Setiap kali menemukan produk yang ingin dibeli di Shopee, salin link produk tersebut, tempel di aplikasi SOCA, lalu lanjutkan belanja seperti biasa lewat link yang sudah diproses SOCA.\n\nLangkah kecil ini membuat transaksi kamu tercatat sebagai referensi affiliate, sehingga kamu berhak atas cashback dari nilai belanja. Tidak ada biaya tambahan, dan harga produk tetap sama seperti biasa — kamu tidak membayar lebih mahal hanya karena memakai SOCA.\n\nAgar kebiasaan ini lebih mudah dijalankan setiap hari, berikut beberapa tips tambahan:\n\n- Simpan aplikasi SOCA di layar utama HP kamu supaya cepat diakses saat sedang browsing produk.\n- Jadikan menempel link sebagai langkah pertama, bukan langkah terakhir, sebelum membuka aplikasi Shopee.\n- Cek history pesanan di SOCA secara berkala untuk memastikan transaksi sudah tercatat dengan benar.\n- Kalau berbelanja dalam jumlah banyak sekaligus (misalnya belanja bulanan), pastikan setiap produk ditempel linknya satu per satu agar semua tercatat.\n\nBiasakan langkah ini setiap kali akan checkout, dan cashback akan terkumpul dengan sendirinya di history pesanan SOCA kamu. Lama-kelamaan, kebiasaan sederhana ini akan terasa seperti bagian alami dari proses belanja online kamu sehari-hari.",
                'cover_image' => null,
                'published_at' => now()->subDays(3),
            ],
            [
                'category_id' => $tips->id,
                'title' => 'Sering Belanja di Shopee atau ShopeeFood? Coba Cara Ini Biar Lebih Hemat',
                'excerpt' => 'Kebiasaan belanja dan pesan makanan online bisa lebih hemat kalau kamu tahu triknya.',
                'body' => "Berbelanja lewat marketplace dan memesan makanan secara online sudah menjadi bagian dari rutinitas banyak orang saat ini. Mulai dari kebutuhan harian, hingga makan siang yang dipesan lewat aplikasi, semuanya kini bisa dilakukan hanya dengan beberapa ketukan di layar HP.\n\nSayangnya, banyak yang belum menyadari bahwa kebiasaan ini bisa dioptimalkan agar lebih hemat. Salah satu caranya adalah dengan rutin menempel link pesanan lewat SOCA sebelum checkout, baik untuk belanja produk maupun pesan makanan lewat ShopeeFood.\n\nBerikut gambaran sederhana kebiasaan yang bisa kamu terapkan:\n\n- Saat lapar dan ingin pesan makan siang lewat ShopeeFood, salin dulu link resto atau menunya ke SOCA sebelum melanjutkan pemesanan.\n- Saat scroll produk di Shopee dan menemukan barang menarik, jadikan kebiasaan menempel link sebagai langkah refleks sebelum menekan tombol beli.\n- Manfaatkan waktu senggang, misalnya sambil menunggu antrean, untuk mengecek history pesanan dan memastikan cashback sudah tercatat.\n\nDengan begitu, setiap pesanan yang masuk berpotensi menghasilkan cashback yang bisa dicairkan setelah dikonfirmasi oleh marketplace. Semakin konsisten kebiasaan ini dilakukan, semakin terasa juga manfaatnya dalam jangka panjang — apalagi kalau frekuensi belanja dan pesan makanmu cukup tinggi setiap bulannya.\n\nKebiasaan kecil yang konsisten sering kali memberikan hasil yang jauh lebih besar dibanding usaha sesekali yang instan. Menempel link lewat SOCA adalah salah satu contoh nyata dari prinsip itu.",
                'cover_image' => null,
                'published_at' => now()->subDays(4),
            ],
            [
                'category_id' => $tips->id,
                'title' => 'Cara Mencairkan Cashback SOCA, Cepat dan Anti Ribet',
                'excerpt' => 'Sudah kumpulkan cashback tapi belum tahu cara mencairkannya? Ini langkah-langkah lengkapnya.',
                'body' => "Setelah rutin belanja lewat SOCA, langkah selanjutnya yang perlu dipahami adalah cara mencairkan cashback yang sudah terkumpul. Prosesnya sebenarnya cukup sederhana, tapi ada beberapa hal yang perlu diperhatikan agar pencairan berjalan lancar.\n\nSecara umum, alur pencairan cashback di SOCA mengikuti tahapan berikut:\n\n1. Pesanan yang kamu buat lewat link SOCA akan masuk otomatis ke akun sebagai transaksi tertunda (pending).\n2. Setelah dikonfirmasi oleh marketplace, biasanya beberapa hari setelah pesanan diterima, status cashback berubah menjadi tersedia untuk dicairkan.\n3. Buka menu Saldo atau Pendapatan di aplikasi SOCA untuk memeriksa jumlah cashback yang sudah bisa ditarik.\n4. Ajukan penarikan ke rekening bank atau e-wallet yang sudah terdaftar di profil akun kamu.\n5. Tunggu proses verifikasi selesai, dan dana akan masuk ke rekening tujuan.\n\nAgar proses pencairan tidak terhambat, pastikan beberapa hal berikut sudah kamu lakukan sejak awal:\n\n- Daftarkan rekening bank atau e-wallet yang aktif dan atas nama kamu sendiri di menu Daftar Bank.\n- Lengkapi data profil, termasuk nomor telepon dan email yang masih aktif digunakan.\n- Jangan membatalkan pesanan setelah checkout, karena ini akan otomatis membatalkan cashback yang terkait.\n\nKalau cashback belum juga muncul padahal pesanan sudah lama selesai, biasanya penyebabnya ada di sisi marketplace yang belum mengonfirmasi transaksi, bukan dari sistem SOCA. Kesabaran menunggu proses konfirmasi ini adalah bagian normal dari sistem cashback berbasis affiliate.\n\nDengan memahami alur ini, kamu tidak perlu bingung lagi soal kapan dan bagaimana cashback bisa dicairkan menjadi uang yang benar-benar bisa dipakai.",
                'cover_image' => null,
                'published_at' => now()->subDays(6),
            ],
            [
                'category_id' => $berita->id,
                'title' => 'Apa Itu Cashback? Manfaat Tersembunyi untuk Tabungan Jangka Panjang',
                'excerpt' => 'Banyak yang bertanya apa itu cashback dan mengapa fitur ini penting untuk dimanfaatkan setiap kali belanja online.',
                'body' => "Cashback adalah sejumlah nilai yang dikembalikan kepada pembeli setelah melakukan transaksi tertentu. Konsep ini sudah lama dipakai di berbagai platform e-commerce dan layanan finansial, dan kini menjadi bagian penting dari ekosistem belanja online di Indonesia. Di SOCA, cashback ini didapat setiap kali kamu menempel link produk sebelum checkout di Shopee maupun ShopeeFood.\n\nBanyak orang menganggap cashback hanya sebagai bonus kecil, padahal jika dikumpulkan secara konsisten, nilainya bisa menjadi tabungan tambahan yang cukup signifikan dalam jangka panjang. Bayangkan kalau setiap transaksi belanja bulanan disisihkan sebagian kecil kembali ke kantong kamu — dalam setahun, jumlahnya bisa terasa cukup berarti.\n\nBeberapa alasan mengapa cashback layak dimanfaatkan secara serius:\n\n- Tidak membutuhkan usaha besar, cukup kebiasaan menempel link sebelum belanja.\n- Nilainya terakumulasi otomatis dari aktivitas belanja yang memang sudah kamu lakukan sehari-hari.\n- Bisa dicairkan menjadi uang tunai, bukan sekadar poin yang terbatas penggunaannya.\n\nCashback yang terkumpul di SOCA dapat dicairkan ke rekening bank atau e-wallet setelah pesanan dikonfirmasi oleh pihak marketplace, biasanya beberapa hari setelah transaksi selesai. Proses ini memang membutuhkan waktu, karena marketplace perlu memastikan transaksi bersifat final dan tidak dibatalkan atau dikembalikan.\n\nMemahami konsep cashback secara utuh membantu kamu melihatnya bukan sekadar promo sesaat, melainkan kebiasaan finansial kecil yang bisa memberi dampak nyata kalau dilakukan secara konsisten dari waktu ke waktu.",
                'cover_image' => null,
                'published_at' => now()->subDays(10),
            ],
            [
                'category_id' => $berita->id,
                'title' => 'Mengenal SOCA: Aplikasi Cashback & Affiliate untuk Belanja Online',
                'excerpt' => 'SOCA hadir sebagai solusi bagi siapa saja yang ingin belanja online sekaligus mendapatkan komisi dari setiap transaksinya.',
                'body' => "SOCA adalah aplikasi cashback dan affiliate yang memungkinkan penggunanya mendapatkan komisi setiap kali berbelanja online lewat Shopee atau memesan makanan lewat ShopeeFood. Aplikasi ini dirancang untuk siapa saja yang sudah terbiasa belanja online, tanpa perlu mengubah kebiasaan belanja yang sudah ada.\n\nCaranya mudah: cukup tempel link produk atau pesanan ke SOCA, lalu lanjutkan belanja seperti biasa. Sistem SOCA akan mencatat transaksi tersebut dan mengonversinya menjadi cashback yang masuk ke saldo akun kamu setelah pesanan dikonfirmasi oleh marketplace terkait.\n\nBeberapa fitur utama yang tersedia di SOCA:\n\n- Pencatatan cashback otomatis dari transaksi Shopee dan ShopeeFood.\n- Riwayat pesanan yang bisa dipantau kapan saja untuk melihat status cashback.\n- Sistem penarikan saldo ke rekening bank maupun e-wallet.\n- Program keanggotaan berjenjang (membership) dengan manfaat yang bisa meningkat seiring aktivitas.\n\nSelain cashback dari belanja pribadi, SOCA juga menyediakan program referral bagi pengguna yang ingin mengajak teman bergabung dan mendapatkan komisi tambahan dari jaringan yang dibangun. Setiap kali teman yang diajak bergabung mulai aktif bertransaksi, ada potensi komisi tambahan yang mengalir kembali ke akun pengundang.\n\nDengan kombinasi cashback pribadi dan komisi referral ini, SOCA berusaha memposisikan diri sebagai pendamping belanja online sehari-hari yang membuat setiap transaksi terasa lebih bernilai, bukan hanya sekadar transaksi biasa.",
                'cover_image' => null,
                'published_at' => now()->subDays(15),
            ],
            [
                'category_id' => $promo->id,
                'title' => 'Program Referral SOCA: Ajak Teman, Dapat Komisi Tambahan',
                'excerpt' => 'Selain cashback dari belanja sendiri, SOCA juga punya program referral yang bisa jadi sumber penghasilan tambahan.',
                'body' => "Selain cashback dari belanja pribadi, SOCA juga menyediakan program referral yang memungkinkan pengguna mendapatkan komisi tambahan dengan mengajak orang lain bergabung. Program ini cocok untuk kamu yang aktif berbagi rekomendasi belanja ke teman, keluarga, atau followers di media sosial.\n\nSecara sederhana, alur program referral SOCA bekerja seperti ini:\n\n1. Setiap pengguna SOCA memiliki kode referral unik yang bisa ditemukan di menu profil.\n2. Bagikan kode atau link referral tersebut ke teman yang belum menggunakan SOCA.\n3. Saat teman mendaftar menggunakan kode referral kamu dan mulai bertransaksi, sebagian komisi dari aktivitas belanjanya berpotensi mengalir kembali ke akun kamu.\n4. Komisi referral ini terpisah dari cashback belanja pribadi, sehingga keduanya bisa terkumpul secara bersamaan.\n\nBeberapa tips agar program referral lebih efektif:\n\n- Bagikan kode referral ke orang-orang yang memang sudah terbiasa belanja online, terutama di Shopee dan ShopeeFood.\n- Jelaskan cara pakai SOCA secara singkat saat membagikan kode, supaya teman yang diajak tidak bingung di awal.\n- Manfaatkan story atau status di media sosial untuk menjangkau lebih banyak orang sekaligus.\n\nProgram referral ini pada dasarnya adalah cara untuk memperluas manfaat cashback yang sudah kamu rasakan sendiri, sekaligus membuka peluang penghasilan tambahan dari jaringan yang kamu bangun seiring waktu.",
                'cover_image' => null,
                'published_at' => now()->subDays(8),
            ],
        ];

        foreach ($posts as $data) {
            Post::firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                array_merge($data, ['slug' => Str::slug($data['title'])])
            );
        }
    }
}
