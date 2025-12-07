@extends('components.public.layouts.app3', ['nav_bar' => false])

@section('content')
<div class="min-h-screen bg-white pt-28 pb-20 px-6 md:px-12">

    <div class="max-w-4xl mx-auto">

        <!-- Header -->
        <header class="text-center space-y-3 mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-snug">
                Kebijakan Privasi
            </h1>
            <p class="text-gray-500 text-sm md:text-base">
                Terakhir diperbarui: 07 Desember 2025
            </p>
        </header>

        <!-- Privacy Section -->
        <section class="bg-white p-8 rounded-3xl shadow-md border border-gray-100">
            <article class="prose prose-gray max-w-none text-sm md:text-base leading-relaxed">

                <p class="text-gray-700">
                    Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda saat menggunakan website Saung Komando.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">1. Data yang Dikumpulkan</h3>
                <p>Kami dapat mengumpulkan data seperti:</p>
                <ul>
                    <li>Nama lengkap</li>
                    <li>Email</li>
                    <li>Nomor HP</li>
                </ul>

                <h3 class="font-semibold text-gray-900 mt-6">2. Penggunaan Data</h3>
                <p>Data digunakan untuk:</p>
                <ul>
                    <li>Memproses reservasi & konfirmasi</li>
                    <li>Komunikasi layanan pelanggan</li>
                    <li>Keperluan operasional internal</li>
                </ul>

                <h3 class="font-semibold text-gray-900 mt-6">3. Keamanan Data</h3>
                <p>
                    Kami menerapkan langkah keamanan standar untuk melindungi data dari akses yang tidak sah serta memastikan integritas informasi tetap terjaga.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">4. Berbagi Data</h3>
                <p>
                    Kami tidak menjual, menyewakan, atau mendistribusikan data pribadi kepada pihak ketiga kecuali diwajibkan oleh hukum.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">5. Cookies & Tracking</h3>
                <p>
                    Website ini menggunakan cookies dan layanan analitik untuk meningkatkan pengalaman pengguna serta mendukung kampanye pemasaran.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">6. Promosi & Marketing</h3>
                <p>
                    Saung Komando dapat mengirimkan informasi promo melalui WhatsApp atau Email. Anda dapat berhenti berlangganan kapan saja.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">7. Hak Pengguna</h3>
                <p>
                    Pengguna berhak meminta perubahan atau penghapusan data pribadi, serta menolak penggunaan data untuk keperluan marketing.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">8. Penyimpanan Data</h3>
                <p>Data disimpan selama masih dibutuhkan atau sesuai ketentuan hukum yang berlaku.</p>

                <h3 class="font-semibold text-gray-900 mt-6">9. Kebijakan Anak</h3>
                <p>
                    Kami tidak mengumpulkan data anak di bawah 18 tahun tanpa persetujuan orang tua.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">10. Perubahan Kebijakan</h3>
                <p>
                    Kebijakan Privasi dapat diperbarui sewaktu-waktu dan perubahan akan diumumkan pada halaman ini.
                </p>

                <h3 class="font-semibold text-gray-900 mt-6">11. Kontak Resmi</h3>
                <p>
                    Untuk pertanyaan mengenai privasi, silakan hubungi kami:<br>
                    <span class="font-semibold">Saung Komando Ciwidey</span><br>
                    Cijembel, Lebak Muncang, Ciwidey<br>
                    Email: kontak@saungkomando.com<br>
                    WhatsApp: (+62) 813-1287-6600
                </p>

            </article>
        </section>

    </div>

</div>
@endsection