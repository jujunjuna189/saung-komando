@extends('components.public.layouts.app3', ['nav_bar' => false])

@section('content')
<div class="min-h-screen bg-white pt-28 pb-20 px-6 md:px-12">

    <div class="max-w-4xl mx-auto space-y-12">

        <!-- Header -->
        <header class="text-center mb-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                Syarat & Ketentuan
            </h1>
            <p class="text-gray-500 text-sm md:text-base mt-2">
                Terakhir diperbarui: 07 Desember 2025
            </p>
        </header>

        <!-- Terms Section -->
        <section class="bg-white p-8 rounded-3xl shadow-md border border-gray-100">
            <article class="prose prose-gray max-w-none text-sm md:text-base leading-relaxed">

                <p class="text-gray-700">
                    Selamat datang di website Saung Komando Ciwidey. Dengan mengakses atau menggunakan website ini,
                    berarti Anda setuju terhadap ketentuan yang diberlakukan dalam layanan kami.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">1. Informasi Umum</h3>
                <p>Pemilik Usaha: Saung Komando Ciwidey</p>
                <p>Alamat: Cijembel, Lebak Muncang, Ciwidey, Kabupaten Bandung, Jawa Barat 40973</p>

                <h3 class="font-semibold text-gray-900 mt-6">2. Layanan yang Disediakan</h3>
                <p>
                    Kami menyediakan layanan wisata dan fasilitas publik seperti penginapan, kolam renang, gym, offroad,
                    gokarting, camping, serta penyewaan venue. Tamu menginap dapat menggunakan beberapa fasilitas tanpa biaya,
                    sementara tamu non-menginap dikenakan tarif sesuai layanan.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">3. Pemesanan & Pembatalan</h3>
                <ul>
                    <li>Reservasi dilakukan melalui kontak resmi Saung Komando</li>
                    <li>Pembatalan pada bulan yang sama masih dapat direfund</li>
                    <li>Pembatalan di luar bulan reservasi dianggap hangus</li>
                    <li>Down Payment (DP) tidak dapat dikembalikan</li>
                </ul>

                <h3 class="font-semibold text-gray-900 mt-6">4. Check-in & Check-out</h3>
                <ul>
                    <li>Check-in: 13.30 WIB</li>
                    <li>Check-out: 12.00 WIB</li>
                </ul>

                <h3 class="font-semibold text-gray-900 mt-6">5. Kewajiban Pengunjung</h3>
                <p>Pengunjung dilarang membawa barang berbahaya dan wajib menjaga fasilitas.</p>
                <p>
                    Pengunjung yang merusak inventaris karena kelalaian wajib mengganti sesuai nilai barang yang rusak.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">6. Pembayaran</h3>
                <p>Pembayaran dilakukan melalui Transfer / QRIS. Harga dapat berubah sesuai promo atau campaign berjalan.</p>

                <h3 class="font-semibold text-gray-900 mt-6">7. Pengumpulan Data</h3>
                <p>Kami mengumpulkan data berupa nama, email, dan nomor HP untuk keperluan reservasi serta pelayanan.</p>

                <h3 class="font-semibold text-gray-900 mt-6">8. Konten Website</h3>
                <p>Informasi layanan dapat berubah mengikuti kampanye & kebijakan berjalan.</p>

                <h3 class="font-semibold text-gray-900 mt-6">9. Batasan Tanggung Jawab</h3>
                <p>Saung Komando tidak bertanggung jawab atas kerugian yang timbul akibat:</p>
                <ul>
                    <li>Cuaca buruk</li>
                    <li>Gangguan pihak ketiga</li>
                    <li>Force majeure</li>
                    <li>Kelalaian pengunjung</li>
                </ul>

                <h3 class="font-semibold text-gray-900 mt-6">10. Hak Cipta</h3>
                <p>
                    Kunjungan dan penggunaan konten harus mencantumkan sumber resmi Saung Komando.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">11. Hukum yang Berlaku</h3>
                <p>Ketentuan tunduk pada hukum Republik Indonesia.</p>

            </article>
        </section>

    </div>

</div>
@endsection