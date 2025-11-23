@extends('components.public.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-20">
    <div class="px-20">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-semibold text-[35px]">Pilihan Terbaik Keluarga</h1>
                <ul class="flex gap-2">
                    <li class="px-4 py-2 border rounded-full bg-black text-white">Semua Fasilitas</li>
                    <li class="px-4 py-2 border rounded-full">Penginapan</li>
                    <li class="px-4 py-2 border rounded-full">Area Terbuka</li>
                    <li class="px-4 py-2 border rounded-full">Olahraga</li>
                </ul>
            </div>
            <div class="text-end text-[20px]">
                <span class="font-bold">Akses Gratis</span> kesemua fasilitas<br />bagi tamu yang menginap.
            </div>
        </div>
    </div>
    <div class="mt-12 px-5">
        <div class="grid grid-cols-3 gap-x-3 gap-y-5">
            <div class="rounded-4xl overflow-hidden bg-white">
                <div class="h-[405px] bg-amber-950">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <h5 class="text-2xl font-semibold">Saung Tabibuya</h5>
                        <div class="flex gap-1 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="font-semibold">4.98</span>
                        </div>
                    </div>
                    <p class="mt-3 text-[#808080]">
                        Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami untuk pengalaman menginap yang menenangkan
                    </p>
                    <div class="mt-5 flex justify-between">
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/person.png') }}" alt="person">
                            <span class="md:text-[10px]">20 Orang</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bedroom.png') }}" alt="bedroom">
                            <span class="md:text-[10px]">03 Kamar Tidur</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bathroom.png') }}" alt="bathroom">
                            <span class="md:text-[10px]">02 Kamar Mandi</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <label for="price" class="font-semibold text-xl">2.5jt/Malam</label>
                        <div class="bg-[#AEEF8B] px-5 py-3 rounded-full">
                            <div class="flex gap-3 items-center">
                                <span>Lihat Detail Fasilitas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-4xl overflow-hidden bg-white">
                <div class="h-[405px] bg-amber-950">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <h5 class="text-2xl font-semibold">Saung Tabibuya</h5>
                        <div class="flex gap-1 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="font-semibold">4.98</span>
                        </div>
                    </div>
                    <p class="mt-3 text-[#808080]">
                        Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami untuk pengalaman menginap yang menenangkan
                    </p>
                    <div class="mt-5 flex justify-between">
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/person.png') }}" alt="person">
                            <span class="md:text-[10px]">20 Orang</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bedroom.png') }}" alt="bedroom">
                            <span class="md:text-[10px]">03 Kamar Tidur</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bathroom.png') }}" alt="bathroom">
                            <span class="md:text-[10px]">02 Kamar Mandi</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <label for="price" class="font-semibold text-xl">2.5jt/Malam</label>
                        <div class="bg-[#AEEF8B] px-5 py-3 rounded-full">
                            <div class="flex gap-3 items-center">
                                <span>Lihat Detail Fasilitas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-4xl overflow-hidden bg-white">
                <div class="h-[405px] bg-amber-950">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <h5 class="text-2xl font-semibold">Saung Tabibuya</h5>
                        <div class="flex gap-1 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="font-semibold">4.98</span>
                        </div>
                    </div>
                    <p class="mt-3 text-[#808080]">
                        Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami untuk pengalaman menginap yang menenangkan
                    </p>
                    <div class="mt-5 flex justify-between">
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/person.png') }}" alt="person">
                            <span class="md:text-[10px]">20 Orang</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bedroom.png') }}" alt="bedroom">
                            <span class="md:text-[10px]">03 Kamar Tidur</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bathroom.png') }}" alt="bathroom">
                            <span class="md:text-[10px]">02 Kamar Mandi</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <label for="price" class="font-semibold text-xl">2.5jt/Malam</label>
                        <div class="bg-[#AEEF8B] px-5 py-3 rounded-full">
                            <div class="flex gap-3 items-center">
                                <span>Lihat Detail Fasilitas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-4xl overflow-hidden bg-white">
                <div class="h-[405px] bg-amber-950">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <h5 class="text-2xl font-semibold">Saung Tabibuya</h5>
                        <div class="flex gap-1 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="font-semibold">4.98</span>
                        </div>
                    </div>
                    <p class="mt-3 text-[#808080]">
                        Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami untuk pengalaman menginap yang menenangkan
                    </p>
                    <div class="mt-5 flex justify-between">
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/person.png') }}" alt="person">
                            <span class="md:text-[10px]">20 Orang</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bedroom.png') }}" alt="bedroom">
                            <span class="md:text-[10px]">03 Kamar Tidur</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bathroom.png') }}" alt="bathroom">
                            <span class="md:text-[10px]">02 Kamar Mandi</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <label for="price" class="font-semibold text-xl">2.5jt/Malam</label>
                        <div class="bg-[#AEEF8B] px-5 py-3 rounded-full">
                            <div class="flex gap-3 items-center">
                                <span>Lihat Detail Fasilitas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-4xl overflow-hidden bg-white">
                <div class="h-[405px] bg-amber-950">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <h5 class="text-2xl font-semibold">Saung Tabibuya</h5>
                        <div class="flex gap-1 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="font-semibold">4.98</span>
                        </div>
                    </div>
                    <p class="mt-3 text-[#808080]">
                        Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami untuk pengalaman menginap yang menenangkan
                    </p>
                    <div class="mt-5 flex justify-between">
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/person.png') }}" alt="person">
                            <span class="md:text-[10px]">20 Orang</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bedroom.png') }}" alt="bedroom">
                            <span class="md:text-[10px]">03 Kamar Tidur</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bathroom.png') }}" alt="bathroom">
                            <span class="md:text-[10px]">02 Kamar Mandi</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <label for="price" class="font-semibold text-xl">2.5jt/Malam</label>
                        <div class="bg-[#AEEF8B] px-5 py-3 rounded-full">
                            <div class="flex gap-3 items-center">
                                <span>Lihat Detail Fasilitas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-4xl overflow-hidden bg-white">
                <div class="h-[405px] bg-amber-950">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <h5 class="text-2xl font-semibold">Saung Tabibuya</h5>
                        <div class="flex gap-1 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="font-semibold">4.98</span>
                        </div>
                    </div>
                    <p class="mt-3 text-[#808080]">
                        Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami untuk pengalaman menginap yang menenangkan
                    </p>
                    <div class="mt-5 flex justify-between">
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/person.png') }}" alt="person">
                            <span class="md:text-[10px]">20 Orang</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bedroom.png') }}" alt="bedroom">
                            <span class="md:text-[10px]">03 Kamar Tidur</span>
                        </div>
                        <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ asset('assets/icon/bathroom.png') }}" alt="bathroom">
                            <span class="md:text-[10px]">02 Kamar Mandi</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <label for="price" class="font-semibold text-xl">2.5jt/Malam</label>
                        <div class="bg-[#AEEF8B] px-5 py-3 rounded-full">
                            <div class="flex gap-3 items-center">
                                <span>Lihat Detail Fasilitas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-14 px-24">
        <div class="bg-white p-7 rounded-3xl flex gap-5 items-center">
            <div class="grow pr-20">
                <h5 class="text-3xl font-semibold">Menikmati Senja dan Pagi langsung di kawasan kaki gunung</h5>
                <p class="text-[#808080] mt-6">Menghadirkan suasana yang tenang, hangat, dan penuh keteduhan. Cahaya lembut matahari, udara segar pegunungan, serta pemandangan alami yang terbentang membuat setiap momen terasa lebih dekat dengan alam dan jauh lebih menenangkan.</p>
                <div class="mt-6 flex justify-start">
                    <div class="bg-[#AEEF8B] px-5 py-3 rounded-full">
                        <div class="flex gap-3 items-center">
                            <span>Lihat Detail Fasilitas</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <iframe class="rounded-3xl" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2696886817916!2d107.43621367590866!3d-7.0947066695567695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f30628e4c0bf%3A0xa062e8e408652003!2sVilla%20Komando!5e0!3m2!1sid!2sid!4v1763647930577!5m2!1sid!2sid" width="610" height="309" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection