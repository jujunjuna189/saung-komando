@extends('components.public.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-5 md:py-10">
    <div class="md:mt-12 px-0 md:px-20">
        <div class="bg-white rounded-xl md:rounded-3xl p-7">
            <div class="md:flex md:justify-between items-center">
                <h1 class="font-semibold text-xl md:text-[35px]">Saung Tabibuya</h1>
                <div class="flex gap-2">
                    <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[18px] h-[13px] md:h-[18px]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold text-[10px] md:text-[14px]">4.45</span>
                    </div>
                    <div class="flex gap-1 items-center px-2 md:px-2 py-1 md:py-2 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-share-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 9h-1a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-8a2 2 0 0 0 -2 -2h-1" />
                            <path d="M12 14v-11" />
                            <path d="M9 6l3 -3l3 3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 md:flex-row gap-5 mt-5">
                <div class="col-span-2">
                    <div>
                        <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="w-full rounded-lg md:rounded-3xl h-full object-cover fade">
                        <div class="hidden md:flex gap-2 mt-3 overflow-x-auto no-scrollbar">
                            <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="h-28 aspect-video rounded-lg md:rounded-2xl object-cover fade">
                            <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="h-28 aspect-video rounded-lg md:rounded-2xl object-cover fade">
                            <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="h-28 aspect-video rounded-lg md:rounded-2xl object-cover fade">
                            <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="h-28 aspect-video rounded-lg md:rounded-2xl object-cover fade">
                            <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="h-28 aspect-video rounded-lg md:rounded-2xl object-cover fade">
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="w-full rounded-lg md:rounded-3xl h-full object-cover fade hidden md:flex">
                        <div class="flex justify-between mt-3">
                            <h6 class="font-semibold text-lg">Deskripsi</h6>
                            <h6 class="font-semibold text-lg">Fasilitas</h6>
                        </div>
                        <p class="text-justify mt-3">Dibangun di atas permukaan air, setiap unit menghadirkan udara segar dan cahaya alami yang mengalir masuk sepanjang hari. Suasana tenang, pemandangan yang menyejukkan, dan kenyamanan ruang yang hangat menjadikan pengalaman menginap.</p>
                        <div class="flex gap-2 justify-between mt-4">
                            <div class="flex gap-2 items-center px-2 py-1 md:px-4 md:py-2 rounded-full bg-[#EDEFF1]">
                                <img src="{{ asset('assets/icon/facility.png') }}" alt="" class="h-4">
                                <span class="text-[10px] whitespace-pre">20 Orang</span>
                            </div>
                            <div class="flex gap-2 items-center px-2 py-1 md:px-4 md:py-2 rounded-full bg-[#EDEFF1]">
                                <img src="{{ asset('assets/icon/facility.png') }}" alt="" class="h-4">
                                <span class="text-[10px] whitespace-pre">20 Orang</span>
                            </div>
                            <div class="flex gap-2 items-center px-2 py-1 md:px-4 md:py-2 rounded-full bg-[#EDEFF1]">
                                <img src="{{ asset('assets/icon/facility.png') }}" alt="" class="h-4">
                                <span class="text-[10px] whitespace-pre">20 Orang</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 justify-evenly md:justify-between my-5">
                            <div class="text-center">
                                <div class="flex justify-center mb-3">
                                    <img src="{{ asset('assets/icon/sofa.svg') }}" alt="Sofa" class="h-10">
                                </div>
                                <span class="text-[#808391] text-[10px] font-semibold whitespace-pre">Furniture Lengkap</span>
                            </div>
                            <div class="text-center">
                                <div class="flex justify-center mb-3">
                                    <img src="{{ asset('assets/icon/mop.svg') }}" alt="Mop" class="h-10">
                                </div>
                                <span class="text-[#808391] text-[10px] font-semibold whitespace-pre">Housekeeping</span>
                            </div>
                            <div class="text-center">
                                <div class="flex justify-center mb-3">
                                    <img src="{{ asset('assets/icon/wifi-router.svg') }}" alt="Wifi Router" class="h-10">
                                </div>
                                <span class="text-[#808391] text-[10px] font-semibold whitespace-pre">Internet Cepat & Stabil</span>
                            </div>
                            <div class="text-center">
                                <div class="flex justify-center mb-3">
                                    <img src="{{ asset('assets/icon/smart-tv.svg') }}" alt="Smart Tv" class="h-10">
                                </div>
                                <span class="text-[#808391] text-[10px] font-semibold whitespace-pre">42” Smart TV</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <del class="text-[#808080] text-[12px]">Rp2.500.000</del>
                                <h4 class="font-semibold text-lg">Rp2.500.000</h4>
                            </div>
                            <div>
                                <div class="bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                                    <div class="flex gap-3 items-center">
                                        <span>Pesan Sekarang</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-5 md:px-20 mt-16">
        <h1 class="font-semibold text-xl md:text-[35px]">Pilihan Terbaik Keluarga</h1>
        <div class="flex justify-between items-center gap-2 overflow-x-auto no-scrollbar">
            <ul class="flex gap-2" id="filter-category">
                <li class="px-4 py-2 border rounded-full bg-black text-white cursor-pointer whitespace-pre" onclick="onFilter('')">Semua Fasilitas</li>
                @foreach($category as $val)
                <li class="px-4 py-2 border rounded-full cursor-pointer whitespace-pre" onclick="onFilter('{{ $val->category }}')">{{$val->category}}</li>
                @endforeach
            </ul>
            <div>
                <div class="border px-4 py-2 rounded-full hover:bg-black hover:text-white cursor-pointer">
                    <a href="{{ route('facility') }}" class="flex gap-3 items-center whitespace-pre">
                        <span>Tampilkan Semua</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-7 md:mt-12 px-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-5" id="container-facilitys">
            @foreach($facility as $val)
            <div class="rounded-xl md:rounded-4xl overflow-hidden bg-white flex flex-row md:flex-col opacity-0 fade-up-scroll">
                <div class="md:h-[405px] w-[90px] md:w-full aspect-square bg-gray-50 overflow-hidden group">
                    <img src="{{ asset('storage/' . $val->thumbnails[0]->path) }}"
                        alt=""
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                </div>
                <div class="p-3 md:p-5 grow flex flex-col">
                    @if($val->is_free_for_guest == 1)
                    <div class="flex justify-between items-center">
                        <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                            <span class="text-[10px] md:text-[14px]"><strong class="text-red-500">FREE</strong> untuk tamu menginap</span>
                        </div>
                        <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EDEFF1]">
                            <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[18px] h-[13px] md:h-[18px]">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="font-semibold text-[10px] md:text-[14px]">{{ $val->rating }}</span>
                        </div>
                    </div>
                    @endif
                    @if($val->is_membership == 1)
                    <div class="flex justify-between items-center">
                        <h5 class="text-md md:text-2xl font-semibold">{{ $val->title }}</h5>
                        <div class="bg-[#EAC580] flex items-center gap-1 rounded-full px-2 py-1">
                            <span class="text-[10px] md:text-[14px]">Membership 325rb/bln</span>
                        </div>
                    </div>
                    @else
                    <div class="flex justify-between items-center">
                        <h5 class="text-md md:text-2xl font-semibold">{{ $val->title }}</h5>
                        @if($val->is_free_for_guest == 0)
                        <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EDEFF1]">
                            <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[18px] h-[13px] md:h-[18px]">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="font-semibold text-[10px] md:text-[14px]">{{ $val->rating }}</span>
                        </div>
                        @endif
                    </div>
                    @endif
                    <p class="mt-1 md:mt-3 text-[#808080] text-[10px] md:text-[14px]">
                        {{ $val->description }}
                    </p>
                    <div class="mt-2 md:mt-5 flex md:justify-between gap-2 overflow-x-auto no-scrollbar md:overflow-hidden">
                        @foreach($val->specification as $child)
                        <div class="flex gap-2 items-center px-2 py-1 md:px-4 md:py-2 rounded-full bg-[#EDEFF1]">
                            <img src="{{ url($child->icon) }}" alt="" class="h-4">
                            <span class="text-[10px] whitespace-pre">{{ $child->value }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="md:grow"></div>
                    <div class="flex flex-row justify-between items-center mt-1 md:mt-4">
                        <label for="price" class="font-semibold text-sm md:text-xl">{{ $val->price }}</label>
                        <div class="bg-[#AEEF8B] py-1 px-2 md:px-5 md:py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                            <div class="flex gap-3 items-center text-[10px] md:text-[14px]">
                                <span class="hidden md:flex">Lihat Detail Fasilitas</span>
                                <span class="md:hidden flex">Lihat Detail</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Container generate -->
        </div>
        <div class="justify-center items-center mt-5 py-5 gap-3 hidden md:flex">
            <div class="w-2 h-2 bg-[#000000] rounded-full"></div>
            <div class="w-2 h-2 bg-[#C0C0C0] rounded-full"></div>
            <div class="w-2 h-2 bg-[#C0C0C0] rounded-full"></div>
            <div class="w-2 h-2 bg-[#C0C0C0] rounded-full"></div>
        </div>
    </div>
    <div class="mt-8 md:mt-14 px-0 md:px-24">
        <div class="bg-white p-3 md:p-7 rounded-lg md:rounded-3xl flex flex-col-reverse md:flex-row gap-5 md:items-center">
            <div class="grow md:pr-20">
                <h5 class="text-xl md:text-3xl font-semibold">Menikmati Senja dan Pagi langsung di kawasan kaki gunung</h5>
                <p class="text-[#808080] mt-6">Menghadirkan suasana yang tenang, hangat, dan penuh keteduhan. Cahaya lembut matahari, udara segar pegunungan, serta pemandangan alami yang terbentang membuat setiap momen terasa lebih dekat dengan alam dan jauh lebih menenangkan.</p>
                <div class="mt-6 flex justify-start">
                    <div class="bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                        <div class="flex gap-3 items-center">
                            <span>Lihat Lokasi</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <iframe class="rounded-lg md:rounded-3xl w-full md:w-[610px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2696886817916!2d107.43621367590866!3d-7.0947066695567695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f30628e4c0bf%3A0xa062e8e408652003!2sVilla%20Komando!5e0!3m2!1sid!2sid!4v1763647930577!5m2!1sid!2sid" height="309" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection