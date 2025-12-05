@extends('components.public.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-5 md:py-10">
    <div class="px-5 md:px-20">
        <h1 class="font-semibold text-xl md:text-[35px]">Kontak Kami</h1>
    </div>
    <div class="my-5 md:my-12 px-0 md:px-20">
        <div class="bg-white p-7 rounded-lg md:rounded-3xl flex flex-col-reverse md:flex-row gap-7 text-[12px]">
            <div class="w-full md:w-[60%]">
                <iframe class="rounded-lg md:rounded-3xl w-full fade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2696886817916!2d107.43621367590866!3d-7.0947066695567695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f30628e4c0bf%3A0xa062e8e408652003!2sVilla%20Komando!5e0!3m2!1sid!2sid!4v1763647930577!5m2!1sid!2sid" height="334" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="grid grid-cols-1 md:grid-cols-3 w-full">
                    <div class="py-7 px-3 text-center fade-up">
                        <div class="flex justify-center">
                            <div class="bg-[#AEEF8B] rounded-full h-10 w-10 flex justify-center items-center">
                                <img src="{{ asset('assets/icon/phone.svg') }}" alt="Phone" class="w-5 h-5">
                            </div>
                        </div>
                        <h6 class="font-semibold mt-3">Nomer Telpon</h6>
                        <p>+62 813-1287-6600</p>
                    </div>
                    <div class="py-7 px-3 text-center fade-up">
                        <div class="flex justify-center">
                            <div class="bg-[#AEEF8B] rounded-full h-10 w-10 flex justify-center items-center">
                                <img src="{{ asset('assets/icon/location.svg') }}" alt="Location" class="w-5 h-5">
                            </div>
                        </div>
                        <h6 class="font-semibold mt-3">Saung Komando Ciwidey</h6>
                        <p>Lebakmuncang, Kec. Ciwidey, Kab. Bandung, Jawa Barat 40973</p>
                    </div>
                    <div class="py-7 px-3 text-center fade-up">
                        <div class="flex justify-center">
                            <div class="bg-[#AEEF8B] rounded-full h-10 w-10 flex justify-center items-center">
                                <img src="{{ asset('assets/icon/email.svg') }}" alt="Email" class="w-5 h-5">
                            </div>
                        </div>
                        <h6 class="font-semibold mt-3">Email Resmi</h6>
                        <p>Kontak@saungkomando.com</p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-[40%] pt-10">
                <h1 class="font-semibold text-4xl text-center">Informasi & Kerjasama</h1>
                <div class="flex gap-5 mt-8">
                    <input type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap" class="border rounded-xl px-5 py-3 w-full placeholder-[#000000] focus:outline-none">
                    <input type="text" name="email" id="email" placeholder="Email Aktif" class="placeholder-[#808080] border rounded-xl px-5 py-3 w-full placeholder-[#000000] focus:outline-none">
                </div>
                <div class="flex gap-5 mt-5">
                    <select name="cooperation" id="cooperation" class="border rounded-xl px-5 py-3 w-full placeholder-[#000000] focus:outline-none">
                        <option value="Kerjasama">Kerjasama</option>
                    </select>
                    <input type="text" name="link" id="link" placeholder="Link Akun  IG/TikTok" class="border rounded-xl px-5 py-3 w-full placeholder-[#000000] focus:outline-none">
                </div>
                <div class="mt-5">
                    <textarea name="message" id="message" rows="5" class="border rounded-xl px-5 py-3 w-full placeholder-[#000000] focus:outline-none">Tulis Pesan</textarea>
                </div>
                <div class="mt-5 space-y-3 md:space-y-0  md:flex md:justify-between">
                    <button type="button" class="bg-[#AEEF8B] px-5 py-3 rounded-full w-full md:w-auto hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                        <div class="flex gap-3 items-center justify-center md:justify-start">
                            <span>Kirim ke WhatsApp Admin</span>
                        </div>
                    </button>
                    <div class="flex gap-3">
                        <div class="bg-black rounded-full h-10 w-10 flex justify-center items-center cursor-pointer transition-all duration-200 hover:-translate-y-1 hover:bg-[#AEEF8B]">
                            <img src="{{ asset('assets/icon/tiktok.svg') }}" alt="Tiktok">
                        </div>
                        <div class="bg-black rounded-full h-10 w-10 flex justify-center items-center cursor-pointer transition-all duration-200 hover:-translate-y-1 hover:bg-[#AEEF8B]">
                            <img src="{{ asset('assets/icon/whatsapp.svg') }}" alt="Whatsapp" class="w-6 h-6">
                        </div>
                        <div class="bg-black rounded-full h-10 w-10 flex justify-center items-center cursor-pointer transition-all duration-200 hover:-translate-y-1 hover:bg-[#AEEF8B]">
                            <img src="{{ asset('assets/icon/instagram.svg') }}" alt="Instagram" class="w-9 h-9">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
