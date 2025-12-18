@extends('components.public.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-5 md:py-10">
    <div class="md:mt-12 px-0 md:px-20">
        <div class="bg-white rounded-xl md:rounded-3xl p-7">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl md:text-[35px]">{{ $detail->title }}</h1>
                <div class="flex gap-2">
                    @if($detail->is_free_for_guest == 1)
                    <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EDEFF1] text-[10px] md:text-[14px]">
                        <span class="text-[#E94545] font-semibold">FREE</span><span class="text-regular">untuk tamu menginap</span>
                    </div>
                    @endif
                    @if($detail->is_membership == 1)
                    <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EAC580] text-[10px] md:text-[14px]">
                        <span class="font-semibold">Membership 300rb/bln</span>
                    </div>
                    @endif
                    <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[18px] h-[13px] md:h-[18px]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold text-[10px] md:text-[14px]">{{ $detail->rating }}</span>
                    </div>
                    <div class="flex gap-1 items-center px-2 md:px-2 py-1 md:py-2 rounded-full bg-[#EDEFF1] cursor-pointer" id="shareCopyBtn">
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
                        <div class="image-zoom-container w-full rounded-lg md:rounded-3xl aspect-square md:aspect-auto md:h-128 overflow-hidden">
                            <img id="main-image"
                                src="{{ asset('storage/' . $detail->thumbnails[0]->path) }}"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="hidden md:flex gap-2 mt-3 overflow-x-auto no-scrollbar">

                            @foreach($detail->thumbnails as $i => $val)
                            <img src="{{ asset('storage/' . $val->path ?? '') }}"
                                class="h-28 aspect-video rounded-lg md:rounded-2xl object-cover fade thumb-item cursor-pointer"
                                data-index="{{ $i }}">
                            @endforeach

                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="w-full rounded-lg md:rounded-3xl overflow-hidden relative fade hidden md:flex aspect-video">
                            <iframe
                                class="w-full h-full object-cover"
                                src="https://www.youtube.com/embed/{{ $controller->getYouTubeCode($detail->link) }}?autoplay=1&mute=1&loop=1&playlist={{ $controller->getYouTubeCode($detail->link) }}"
                                frameborder="0"
                                allow="autoplay; encrypted-media"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="flex justify-between mt-3">
                            <h6 class="font-semibold text-lg">Deskripsi</h6>
                            <h6 class="font-semibold text-lg">Fasilitas</h6>
                        </div>
                        <p class="text-justify mt-3">{{ $detail->description }}</p>
                        @if($detail->is_mini_soccer == 1)
                        <div class="mt-3 mb-5">
                            <h6 class="font-semibold text-lg">Cek Jadwal<span class="text-red-500">*</span></h6>
                            <div class="mt-2">
                                <div class="bg-[#92BAF5] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1 open-modal" data-id="modalBooking">
                                    <div class="flex gap-3 items-center justify-center">
                                        <span>Cek Ketersediaan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between flex-wrap space-y-2 md:space-y-0 md:flex-nowrap items-center">
                            <div class="flex flex-col">
                                <h4 class="text-md text-red-600 line-through whitespace-pre">{{ $detail->markup_price ?? '' }}</h4>
                                <h4 class="font-semibold text-lg whitespace-pre">{{ $detail->price }}</h4>
                            </div>
                            <div>
                                <div class="bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1" onclick="scheduleModalOpen()">
                                    <div class="flex gap-3 items-center whitespace-pre">
                                        <span>Pesan Sekarang</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="flex justify-between gap-2 mt-4 flex-wrap md:flex-nowrap">
                            @foreach($detail->specification as $val)
                            <div class="flex gap-2 items-center px-2 py-1 md:px-3 md:py-1.5 rounded-full bg-[#EDEFF1]">
                                <img src="{{ url($val->icon) }}" alt="" class="h-4">
                                <span class="text-[10px] md:text-[12px] whitespace-pre md:hidden">{{ $val->value }}</span>
                                <span class="text-[10px] md:text-[12px] whitespace-pre hidden md:flex">{{ $val->value_md }}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="flex flex-wrap gap-2 justify-evenly md:justify-between my-5">
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
                                <span class="text-[#808391] text-[10px] font-semibold whitespace-pre">32inc+ Smart TV</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex-wrap gap-1 items-center leading-3">
                                <h4 class="text-md text-red-600 line-through whitespace-pre">{{ $detail->markup_price ?? '' }}</h4>
                                <h4 class="font-semibold text-lg whitespace-pre">{{ $detail->price }}</h4>
                            </div>
                            <div>
                                <div class="bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1 open-modal" data-id="modalCheckout">
                                    <div class="flex gap-3 items-center whitespace-pre">
                                        <span>Pesan Sekarang</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-5 md:px-20 mt-5 md:mt-20">
        <h1 class="font-semibold text-xl md:text-[35px] mb-5">Pilihan Terbaik Keluarga</h1>
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
        <div class="relative overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out" id="facility-track">
                @foreach($facility as $val)
                <div class="flex-shrink-0 w-full md:w-1/3 2xl:w-1/4 px-2" data-url="{{ route('facility.detail', ['id' => $val->id]) }}" onclick="window.open(this.dataset.url, '_self')">
                    <div class="rounded-xl md:rounded-4xl overflow-hidden bg-white flex flex-row md:flex-col">
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
                                    <span class="text-[10px] md:text-[14px]">Membership 300rb/bln</span>
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
                                {{ strlen($val->description) > 75 ? substr($val->description, 0, 75) . "..." : $val->description; }}
                            </p>
                            <div class="mt-2 md:mt-5 flex justify-between gap-2 overflow-x-auto no-scrollbar">
                                @foreach($val->specification as $child)
                                <div class="flex gap-2 items-center px-2 py-1 md:px-2 md:py-1.5 rounded-full bg-[#EDEFF1]">
                                    <img src="{{ url($child->icon) }}" alt="" class="h-4">
                                    <span class="text-[10px] md:text-[10px] whitespace-pre md:hidden">{{ $child->value }}</span>
                                    <span class="text-[10px] md:text-[12px] whitespace-pre hidden md:flex">{{ $child->value_md }}</span>
                                </div>
                                @endforeach
                            </div>
                            <div class="md:grow"></div>
                            <div class="flex flex-row justify-between items-center mt-1 md:mt-4">
                                <div class="leading-3">
                                    <p for="price" class="text-[11px] md:text-[14px] text-red-600 line-through whitespace-pre">{{ $val->markup_price ?? '' }}</p>
                                    <p for="price" class="font-semibold text-sm md:text-xl whitespace-pre">{{ $val->price }}</p>
                                </div>
                                <a href="{{ route('facility.detail', ['id' => $val->id]) }}" class="bg-[#AEEF8B] py-1 px-2 md:px-5 md:py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                                    <div class="flex gap-3 items-center text-[10px] md:text-[14px]">
                                        <span class="hidden md:flex">Lihat Detail Fasilitas</span>
                                        <span class="md:hidden flex">Lihat Detail</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Buttons -->
            <button class="absolute top-1/2 -translate-y-1/2 left-0 bg-black/40 text-white w-10 h-10 flex justify-center items-center rounded-full hover:bg-black ml-5 cursor-pointer" id="facility-prev">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            <button class="absolute top-1/2 -translate-y-1/2 right-0 bg-black/40 text-white w-10 h-10 flex justify-center items-center rounded-full hover:bg-black mr-5 cursor-pointer" id="facility-next">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>

        <!-- Dots -->
        <div class="flex justify-center gap-2 mt-14 mb-18" id="facility-dots"></div>
    </div>
    <div class="mt-8 md:mt-14 px-0 md:px-24">
        <div class="bg-white p-3 md:p-7 rounded-lg md:rounded-3xl flex flex-col-reverse md:flex-row gap-5 md:items-center">
            <div class="grow md:pr-20">
                <h5 class="text-xl md:text-3xl font-semibold">Menikmati Senja dan Pagi langsung di kawasan kaki gunung</h5>
                <p class="text-[#808080] mt-6">Menghadirkan suasana yang tenang, hangat, dan penuh keteduhan. Cahaya lembut matahari, udara segar pegunungan, serta pemandangan alami yang terbentang membuat setiap momen terasa lebih dekat dengan alam dan jauh lebih menenangkan.</p>
                <div class="mt-6 flex justify-start">
                    <a href="https://maps.app.goo.gl/WCTHp36moSKsW3TbA" target="_blank" class="bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                        <div class="flex gap-3 items-center">
                            <span>Lihat Lokasi</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="w-full md:grow 2xl:w-[160%]">
                <iframe class="rounded-lg md:rounded-3xl w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2696886817916!2d107.43621367590866!3d-7.0947066695567695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f30628e4c0bf%3A0xa062e8e408652003!2sVilla%20Komando!5e0!3m2!1sid!2sid!4v1763647930577!5m2!1sid!2sid" height="309" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<x-public.modal id="modalCheckout" title="" justify="justify-center md:justify-end">
    <img src="{{ asset('storage/' . $detail->thumbnails[0]->path) }}" alt="" class="w-full h-50 object-cover transition-transform duration-300 group-hover:scale-110 rounded-2xl">
    <div class="flex justify-between items-center mt-3">
        <h3 class="text-lg font-semibold text-gray-800">Formulir Reservasi</h3>
        <button class="text-gray-500 hover:text-gray-700 text-xl close-modal cursor-pointer bg-gray-100 rounded-full px-2" data-id="modalCheckout">&times;</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-1">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Pemesan<span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Fasilitas<span class="text-red-500">*</span></label>
            <input type="text" name="facility" id="facility" value="{{ $detail->title }}" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" readonly>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
            <input type="text" name="telp" id="telp" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow w-full relative">
            <label class="font-semibold text-[12px]">Pilih Tanggal<span class="text-red-500">*</span></label>
            <input type="text" name="date" id="date" placeholder="Pilih tanggal..."
                class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2 cursor-pointer" readonly>

            <input type="text" name="checkin" id="checkin" hidden>
            <input type="text" name="checkout" id="checkout" hidden>

            <div id="calendarPopup" class="hidden absolute bg-white shadow-lg border rounded-xl p-4 mt-2 z-50 right-0"></div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">Jumlah Penginap<span class="text-red-500">*</span></label>
            <div class="px-2 border rounded-xl bg-[#F1F3F6] w-full mt-2">
                <select name="total_guest" id="total_guest" class="py-3 w-full focus:outline-none">
                    <option value="1 Orang">1 Orang</option>
                    <option value="2 Orang">2 Orang</option>
                    <option selected value="3 Orang">3 Orang</option>
                    <option value="4 Orang">4 Orang</option>
                    <option value="5 Orang">5 Orang</option>
                    <option value="6 Orang">6 Orang</option>
                    <option value="7 Orang">7 Orang</option>
                    <option value="8 Orang">8 Orang</option>
                    <option value="9 Orang">9 Orang</option>
                    <option value="10 Orang">10 Orang</option>
                </select>
            </div>
        </div>
        <div class="grow w-full">
            <label for="" class="font-semibold text-[12px]">Extra Bed <i class="text-[#808080]">(Optional)</i></label>
            <div class="px-2 border rounded-xl bg-[#F1F3F6] w-full mt-2">
                <select name="extra_bed" id="extra_bed" class="py-3 w-full focus:outline-none">
                    <option value="">-</option>
                    <option value="1 kasur kecil = 150rb">1 kasur kecil = 150rb</option>
                    <option value="1 kasur besar = 250rb">1 kasur besar = 250rb</option>
                    <option value="2 kasur kecil = 300rb">2 kasur kecil = 300rb</option>
                    <option value="2 kasur besar = 500rb">2 kasur besar = 500rb</option>
                </select>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <label for="" class="font-semibold text-[12px]">Catatan <i class="text-[#808080]">(Optional)</i></label>
        <textarea name="note" id="note" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
    </div>
    <x-slot:footer>
        <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
            <button type="button" onclick="onSubmit()" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" data-id="modalAdd">Pesan Sekarang</button>
        </div>
    </x-slot:footer>
</x-public.modal>
{{-- ============================================================================================= --}}
{{-- Modal booking schedule --}}
<x-public.modal id="modalBooking" title="" footer="false" justify="justify-center md:justify-end" class_container="max-w-2xl">
    <div class="flex justify-between">
        <h1 class="text-xl md:text-2xl font-semibold">
            Kalender Mini Soccer
        </h1>
        <button class="text-gray-500 hover:text-gray-700 text-xl close-modal cursor-pointer bg-gray-100 rounded-full px-2" data-id="modalBooking">&times;</button>
    </div>
    <div class="flex flex-col md:flex-row gap-2 md:items-center md:justify-between mt-4">
        <div class="flex gap-2 w-full md:w-auto md:order-2">
            <button type="button" class="px-4 py-3 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer hover:bg-[#9de07a] transition flex-7 md:flex-none flex justify-center" onclick="scheduleModalOpen()">
                <div class="flex gap-1 items-center">
                    <span class="text-xs md:text-sm whitespace-nowrap">Agendakan Sewa</span>
                </div>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 items-center w-full md:w-auto md:flex md:order-1">
            <div class="px-3 py-2 border rounded-full bg-[#F2F4F7] w-full md:w-auto">
                <select name="filter-month" id="filter-month" class="border-none focus:outline-none bg-transparent w-full" onchange="filterMonthChange(event)">
                    <!-- Generate -->
                </select>
            </div>
            <div id="weekSelector" class="px-3 py-2 border rounded-full bg-[#F2F4F7] w-full md:w-auto">
                <div class="flex gap-2 items-center justify-between whitespace-pre">
                    <span id="weekLabel">Tanggal 08 - 13</span>
                    <div class="flex gap-1 items-center">
                        <svg id="prevWeek" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                        <svg id="nextWeek" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Calender -->
    <div class="w-full overflow-x-auto mt-5" id="calendarWrapper">
        <table class="w-full text-center text-sm" id="calendarTable">
            <thead>
                <tr id="dayHeader" class="bg-white"></tr>
            </thead>
            <tbody id="timeRows"></tbody>
        </table>
    </div>
</x-public.modal>
{{-- ========================= --}}
{{-- Modal Add Mini Soccer =================== --}}
<x-public.modal id="modalAddMiniSoccer" title="" justify="justify-center md:justify-end" class_container="max-w-2xl">
    <img src="{{ asset('storage/' . $detail->thumbnails[0]->path) }}" alt="" class="w-full h-50 object-cover transition-transform duration-300 group-hover:scale-110 rounded-2xl">
    <div class="flex justify-between items-center mt-3">
        <h3 class="text-lg font-semibold text-gray-800">Formulir Mini Soccer</h3>
        <button class="text-gray-500 hover:text-gray-700 text-xl close-modal cursor-pointer bg-gray-100 rounded-full px-2" data-id="modalAddMiniSoccer">&times;</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Pemesan<span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
            <input type="text" name="telp" id="telp" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Tanggal<span class="text-red-500">*</span></label>
            <input type="date" name="date" id="date" class="date-filter border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <!-- Time range -->
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Jam<span class="text-red-500">*</span></label>
            <div id="time-picker" class="relative mt-2">
                <!-- Date display -->
                <input type="text" id="time" readonly
                    placeholder="Pilih tanggal & jam"
                    class="border rounded-lg w-full p-3 bg-gray-100 cursor-pointer" />

                <!-- Hidden -->
                <input type="hidden" id="time_in" name="time_in">
                <input type="hidden" id="time_out" name="time_out">

                <!-- Slot jam muncul setelah pilih tanggal -->
                <div id="hourSlots"
                    class="hidden absolute left-0 mt-1 w-full bg-white border rounded-xl shadow-lg 
        overflow-y-auto max-h-60 z-20 py-2">
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <label for="" class="font-semibold text-[12px]">Catatan <i class="text-[#808080]">(Optional)</i></label>
        <textarea name="note" id="note" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
    </div>
    <x-slot:footer>
        <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
            <button type="button" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" onclick="onSubmitBooking()">Agendakan Sewa</button>
        </div>
    </x-slot:footer>
</x-public.modal>
{{-- ========================================= --}}
@endsection

@section('script')
<script>
    let category = [];
    let categoryActive = "";
    let datePicker;
    $(document).ready(function() {
        getFacility({});
        getReservation({
            header: `filter_month=${new Date().toISOString().slice(0, 7)}`,
        });
        datePicker = initDateRangePicker("#date", "#calendarPopup", "#checkin", "#checkout", [], {
            onNextMonth: ({
                year,
                month
            }) => {
                getReservation({
                    header: `filter_month=${year}-${month}`
                });
            },
            onPrevMonth: ({
                year,
                month
            }) => {
                getReservation({
                    header: `filter_month=${year}-${month}`
                });
            }
        });

        $("#shareCopyBtn").click(function() {
            copyToClipboard(window.location.href, "#shareCopyBtn");
        });
        $('.slider-wrapper').each(function() {
            runSliders(this, 5000);
        });
        // Initial
        initFacilitySlider('facility-track', 'facility-prev', 'facility-next', 'facility-dots');
        getCategory({
            onSuccess: function(response) {
                $.each(response.data, function(i, item) {
                    category.push({
                        id: item.id,
                        value: item.category,
                        category: item.category,
                    });
                });
            }
        });

        $(".image-zoom-container").each(function() {
            setupImageZoomJQ(this, 200);
        });

        // Set default: index 0 aktif
        $(".thumb-item").eq(0).css({
            border: "2px solid #000000",
            borderRadius: "12px"
        });

        // Klik thumbnail
        $(".thumb-item").on("click", function() {
            const newSrc = $(this).attr("src");

            // ganti gambar utama
            $("#main-image").fadeOut(150, function() {
                $(this).attr("src", newSrc).fadeIn(150);
            });

            // reset border semua thumbnail
            $(".thumb-item").css({
                border: "none"
            });

            // tambahkan border ke yang diklik
            $(this).css({
                border: "2px solid #000000",
                borderRadius: "12px"
            });
        });
    });

    function renderFasility({
        value,
        category
    }) {
        const element = `
            <option value="${value}">${category}</option>
        `;

        return element;
    }

    function getFacility({
        header = {},
    }) {
        requestServer({
            url: url + '/api/public/facility/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                $('#modalCheckout #facility_id').empty();
                $.each(response.data, function(i, item) {
                    const element = renderFasility({
                        value: item.id,
                        category: item.title,
                    });
                    $('#modalCheckout #facility_id').append(element);
                });
            },
        });
    }

    function getReservation({
        header = {},
    }) {
        requestServer({
            url: url + '/api/public/reservation/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                let events = [];
                $.each(response.data, function(i, item) {
                    events.push({
                        start: formatDateYMD(item.check_in),
                        end: formatDateYMD(item.check_out),
                    });
                });
                datePicker.updateBookedRanges(events);
            },
        });
    }

    function form() {
        const name = $('#name').val();
        const facilityId = $('#facility').val();
        const telp = $('#telp').val();
        const totalGuest = $('#total_guest').val();
        const status = $('#status').val();
        const checkIn = $('#checkin').val();
        const checkOut = $('#checkout').val();
        const note = $('#note').val();
        const extraBed = $('#extra_bed').val();

        const data = {
            name: name,
            facilityId: facilityId,
            telp: telp,
            totalGuest: totalGuest,
            status: status,
            checkIn: checkIn,
            checkOut: checkOut,
            note: note,
            extraBed: extraBed,
        };

        return data;
    }

    function onSubmit() {
        const data = form();
        // Send WA
        // Validasi sederhana
        if (!data.name || !data.facilityId || !data.checkIn || !data.checkOut) {
            showToast("error", "Silakan isi terlebih dahulu!", "Nama, Fasilitas, Check In dan Check Out wajib diisi!");
            return;
        }

        // Template pesan
        let waMessage = `Hai kak perkenalkan aku ${data.name}%0A`;
        waMessage += `Fasilitas: ${data.facilityId}%0A`;
        waMessage += `Jumlah Orang: ${data.totalGuest}%0A`;
        waMessage += `Check In: *${data.checkIn}%0A`;
        waMessage += `Check Out: *${data.checkOut}%0A`;
        if (data.note) waMessage += `Catatan: ${data.note}%0A`;
        if (data.extraBed) waMessage += `Extra Bed: ${data.extraBed}%0A`;
        waMessage += `%0A%0AMohon di bantu untuk ketersediaannya yaa`;

        // Nomor WhatsApp admin (ganti dengan nomor kamu)
        const waNumber = "6281312876600";

        // Buka WA
        const waUrl = `https://wa.me/${waNumber}?text=${waMessage}`;
        window.open(waUrl, "_blank");
    }

    function renderCategory() {
        $('#filter-category').empty();
        var element = `
            <li class="px-4 py-2 border rounded-full ${categoryActive == "" ? 'bg-black text-white' : ""} cursor-pointer whitespace-pre" onclick="onFilter('')">Semua Fasilitas</li>
        `;
        $('#filter-category').append(element);
        $.each(category, function(i, item) {
            element = `
                <li class="px-4 py-2 border rounded-full ${categoryActive == item.category ? 'bg-black text-white' : ""} cursor-pointer whitespace-pre" onclick="onFilter('${item.category}')">${item.category}</li>
            `;
            $('#filter-category').append(element);
        });
    }

    function onFilter(category) {
        categoryActive = category;
        renderCategory();
        getDataFacilitys({
            header: `category=${category}`,
        });
    }

    function renderFasility(item) {
        let specHtml = "";

        $.each(item.specification, function(i, itemChild) {
            specHtml += `
                <div class="flex gap-2 items-center px-2 py-1 md:px-2 md:py-1.5 rounded-full bg-[#EDEFF1]">
                    <img src="${url + '/' + itemChild.icon}" alt="" class="h-4">
                    <span class="text-[10px] whitespace-pre md:hidden">${itemChild.value}</span>
                    <span class="text-[10px] md:text-[12px] whitespace-pre hidden md:flex">${itemChild.value_md}</span>
                </div>
            `;
        });

        let freeGuest = "";
        if (item.is_free_for_guest == 1) {
            freeGuest = `
                <div class="flex justify-between items-center">
                    <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                        <span class="text-[10px] md:text-[14px]"><strong class="text-red-500">FREE</strong> untuk tamu menginap</span>
                    </div>
                    <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[18px] h-[13px] md:h-[18px]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold text-[10px] md:text-[14px]">${item.rating}</span>
                    </div>
                </div>
            `;
        }

        let membership = "";
        if (item.is_membership == 1) {
            membership = `
                <div class="flex justify-between items-center">
                    <h5 class="text-md md:text-2xl font-semibold">${item.title}</h5>
                    <div class="bg-[#EAC580] flex items-center gap-1 rounded-full px-2 py-1">
                        <span class="text-[10px] md:text-[14px]">Membership 300rb/bln</span>
                    </div>
                </div>
            `;
        } else {
            let rating = "";
            if (item.is_free_for_guest == 0) {
                rating = `
                    <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[18px] h-[13px] md:h-[18px]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold text-[10px] md:text-[14px]">${item.rating}</span>
                    </div>
                `;
            }

            membership = `
                <div class="flex justify-between items-center">
                    <h5 class="text-md md:text-2xl font-semibold">${item.title}</h5>
                    ${rating}
                </div>
            `;
        }

        const facilityDetailBase = "{{ url('/facility/detail') }}";
        const element = `
        <div class="flex-shrink-0 w-full md:w-1/3 2xl:w-1/4 px-2" onclick="window.open('${facilityDetailBase}?id=${item.id}', '_self')">
            <div class="rounded-xl md:rounded-4xl overflow-hidden bg-white flex flex-row md:flex-col">
                <div class="md:h-[405px] w-[90px] md:w-full aspect-square bg-gray-50 overflow-hidden group">
                    <img src="{{ asset('storage/${item.thumbnails?.[0]?.path}') }}" alt="" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                </div>
                <div class="p-3 md:p-5 grow flex flex-col">
                    ${freeGuest}
                    ${membership}
                    <p class="mt-1 md:mt-3 text-[#808080] text-[10px] md:text-[14px]">
                        ${item.description?.length > 75 ? item.description?.substring(0, 75) + "..." : item.description}
                    </p>
                    <div class="mt-2 md:mt-5 flex justify-between gap-2 overflow-x-auto no-scrollbar md:overflow-hidden">
                        ${specHtml}
                    </div>
                    <div class="md:grow"></div>
                    <div class="flex flex-row justify-between items-center mt-1 md:mt-4">
                        <div class="leading-3">
                            <p for="price" class="text-[11px] md:text-[14px] text-red-600 line-through whitespace-pre">${item.markup_price ?? ''}</p>
                            <p for="price" class="font-semibold text-sm md:text-xl whitespace-pre">${item.price}</p>
                        </div>
                        <a href="${facilityDetailBase}?id=${item.id}" class="bg-[#AEEF8B] py-1 px-2 md:px-5 md:py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                            <div class="flex gap-3 items-center text-[10px] md:text-[14px] whitespace-pre">
                                <span class="hidden md:flex">Lihat Detail Fasilitas</span>
                                <span class="md:hidden flex">Lihat Detail</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        `;

        return element;
    }

    function getDataFacilitys({
        header = {},
    }) {
        requestServer({
            url: url + '/api/public/facility/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                $("#facility-track").empty();
                $.each(response.data, function(i, item) {
                    const element = renderFasility(item);
                    $("#facility-track").append(element);
                });
                // Update slider
                initFacilitySlider('facility-track', 'facility-prev', 'facility-next', 'facility-dots');
            },
        });
    }
    // untuk booking mini soccer
    const prefix = "#modalBooking";
    let events = [];
    let reservationsData = [];
    let weeks = []; // array minggu bulan terpilih
    let currentWeekIndex = 0; // index minggu yang aktif
    var dataFilter = {
        month: new Date().getFullYear() + '-' + (parseInt(new Date().getMonth()) + 1),
        date_start: "",
        date_end: "",
        status: "",
    };
    // ================== Calendar Module ==================
    const Calendar = (function() {
        var weekStart = new Date();
        const startHour = 16;
        const endHour = 22;
        const dayNames = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
        var days = [];
        let schedule = []; // bisa diubah dari luar
        let hideTimeout = null;

        function render(prefix) {
            days = [];
            for (let i = 0; i < 7; i++) {
                const d = new Date(weekStart);
                d.setDate(weekStart.getDate() + i);
                days.push({
                    label: dayNames[d.getDay()],
                    date: d.toLocaleDateString("id-ID", {
                        day: "2-digit",
                    })
                });
            }

            const dayHeader = $(prefix + " #dayHeader");
            const timeRows = $(prefix + " #timeRows");

            dayHeader.empty();
            timeRows.empty();

            // Header hari
            dayHeader.append(`<th></th>`);
            days.forEach((d) => {
                dayHeader.append(`
            <th class="py-2 font-semibold text-gray-900">
                ${d.label}<br>
                <span class="text-gray-500">${d.date}</span>
            </th>
        `);
            });

            // Baris jam
            for (let h = startHour; h <= endHour; h++) {
                let hourText = `${String(h).padStart(2, '0')}:00`;
                let row = `<tr><td class="py-3 text-gray-700 font-medium">${hourText}</td>`;

                for (let i = 0; i < days.length; i++) {
                    row += `<td class="border h-12 cell relative" data-day="${i}" data-hour="${h}"></td>`;
                }
                row += "</tr>";
                timeRows.append(row);
            }

            // Highlight schedule (sesuai format baru: time_in / time_out)
            schedule.forEach(item => {
                const startHourInt = parseInt(item.time_in.split(":")[0]);
                const endHourInt = parseInt(item.time_out.toString().split(":")[0] || item.time_out); // bisa number atau string

                for (let h = startHourInt; h <= endHourInt; h++) {
                    $(prefix + ` .cell[data-day="${item.dayIndex}"][data-hour="${h}"]`)
                        .addClass("bg-[#AEEF8B]");
                }
            });
        }

        function initClick(prefix) {
            $(document).on("click", prefix + " .cell", function() {
                const dayIndex = $(this).data("day");
                const hour = $(this).data("hour");
                const day = days[dayIndex];
                const timeText = `${String(hour).padStart(2, '0')}:00`;

                // Clear popup & highlight lain
                $(prefix + " .cell").removeClass("ring-2 ring-blue-600");
                $(prefix + " .popup-info").remove();

                // Highlight cell ini
                $(this).addClass("ring-2 ring-blue-600");

                // Tambah popup
                $(this).append(`
                <div class="popup-info absolute left-1/2 bottom-full mb-1 -translate-x-1/2
                    bg-black/30 text-white text-[10px] px-2 py-1 rounded shadow-lg whitespace-nowrap z-10">
                    ${day.label}, ${day.date}<br>${timeText}
                </div>
            `);

                // Hapus otomatis
                if (hideTimeout) clearTimeout(hideTimeout);
                hideTimeout = setTimeout(() => {
                    $(prefix + " .popup-info").fadeOut(200, function() {
                        $(this).remove();
                        $(prefix + " .cell").removeClass("ring-2 ring-blue-600");
                    });
                }, 1000);
            });
        }

        // Public API
        return {
            init: function(prefix, initialSchedule) {
                schedule = initialSchedule || [];
                render(prefix);
                initClick(prefix);
            },
            updateWeekStart: function(prefix, newWeekStart) {
                weekStart = new Date(newWeekStart);
                render(prefix);
            },
            updateSchedule: function(prefix, newSchedule) {
                schedule = newSchedule;
                render(prefix);
            }
        };
    })();

    // week module====================================================================================
    // Function untuk hitung minggu dalam bulan
    function getWeeksOfMonth(year, month) {
        const weeks = [];
        let firstDay = new Date(year, month, 1);
        let lastDay = new Date(year, month + 1, 0);

        let startDate = new Date(firstDay);
        startDate.setDate(startDate.getDate() - (startDate.getDay() === 0 ? 6 : startDate.getDay() - 1)); // Senin pertama

        while (startDate <= lastDay) {
            let endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + 6);
            if (endDate > lastDay) endDate.setDate(lastDay.getDate());

            weeks.push({
                start: new Date(startDate),
                end: new Date(endDate)
            });
            startDate.setDate(startDate.getDate() + 7);
        }

        return weeks;
    }
    // ==================================================
    // Function utama untuk render week, bisa dipanggil ulang saat bulan berubah
    function renderWeek(year, month, direction = 0) {
        // jika direction != 0, geser minggu
        if (weeks.length === 0 || direction !== 0) {
            currentWeekIndex += direction;
            if (currentWeekIndex < 0) currentWeekIndex = weeks.length - 1;
            if (currentWeekIndex >= weeks.length) currentWeekIndex = 0;
        }

        // kalau bulan berubah, generate minggu baru
        if (!weeks.length || renderWeek.lastMonth !== month || renderWeek.lastYear !== year) {
            weeks = getWeeksOfMonth(year, month);
            currentWeekIndex = 0; // reset ke minggu pertama
            renderWeek.lastMonth = month;
            renderWeek.lastYear = year;
        }

        // render label
        const week = weeks[currentWeekIndex];
        const startDay = String(week.start.getDate()).padStart(2, '0');
        const endDay = String(week.end.getDate()).padStart(2, '0');
        $('#weekLabel').text(`Tanggal ${startDay} - ${endDay}`);
        Calendar.updateWeekStart(prefix, weeks[currentWeekIndex].start);
        dataFilter.date_start = weeks[currentWeekIndex].start;
        dataFilter.date_end = weeks[currentWeekIndex].end;
        getData({
            header: `filter_start=${formatDateYMD(dataFilter.date_start)}&filter_end=${formatDateYMD(dataFilter.date_end)}&status=${dataFilter.status}`,
        });
    }

    // contoh event prev/next
    $('#prevWeek').click(() => renderWeek(renderWeek.lastYear, renderWeek.lastMonth, -1));
    $('#nextWeek').click(() => renderWeek(renderWeek.lastYear, renderWeek.lastMonth, 1));
    // end=============================================================================================
    // Generate month option==============
    function generateMonthOptions() {
        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const $select = $(prefix + ' #filter-month');
        $select.empty();

        const now = new Date();
        const currentYear = now.getFullYear();
        const currentMonth = now.getMonth(); // 0-based

        // Loop dari +12 hingga -11 (24 bulan total), sehingga urutan: paling depan -> paling belakang
        for (let offset = 12; offset >= -11; offset--) {
            const dt = new Date(currentYear, currentMonth + offset, 1);
            const y = dt.getFullYear();
            const m = dt.getMonth(); // 0..11

            const label = `${months[m]} ${y}`;
            const value = `${y}-${String(m + 1).padStart(2, '0')}`;

            $select.append(`<option value="${value}">${label}</option>`);
        }
        $select.val(`${currentYear}-${String(currentMonth + 1).padStart(2, '0')}`);
    }
    // ===================================
    $(document).ready(function() {
        generateMonthOptions();
        Calendar.init(prefix, events);
        renderWeek(new Date().getFullYear(), new Date().getMonth());
        renderWeek(new Date().getFullYear(), new Date().getMonth(), weeks.findIndex(w => new Date() >= new Date(w.start) && new Date() <= new Date(w.end)));
        Calendar.updateWeekStart(prefix, weeks[weeks.findIndex(w => new Date() >= new Date(w.start) && new Date() <= new Date(w.end))].start);
        // Time generate
        initTimePicker("#modalAddMiniSoccer", "#time");

        // toggle dropdown popup
        $("#openPopup").on("click", function(e) {
            e.stopPropagation();
            $("#popupSelect").toggleClass("hidden");
        });

        // pilih opsi
        $(".optionBtn").on("click", function() {
            let selected = $(this).data("value");
            $("#selectedText").text(selected);
            $("#popupSelect").addClass("hidden");
            // For redirect
            if (selected === "Kalender Penginapan") {
                location.href = "{{ route('dashboard.calendar') }}";
            }
        });

        // klik di luar, popup hilang
        $(document).on("click", function() {
            $("#popupSelect").addClass("hidden");
        });
    });

    function scheduleModalOpen() {
        closeModal('modalBooking');
        openModal('modalAddMiniSoccer');
    }

    function getData({
        header = {},
    }) {
        requestServer({
            url: url + '/api/reservation-mini-soccer/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                reservationsData = response.data;
                renderEvents(response.data);
            },
        });
    }

    function renderEvents(data) {
        events = [];
        $.each(data, function(i, item) {
            const dayIndex = getDayIndexByDate(item.date);
            events.push({
                dayIndex: dayIndex,
                time_in: parseTime(item.time_in),
                time_out: parseTime(item.time_out),
            });
        });
        Calendar.updateSchedule(prefix, events);
    }

    function formBooking() {
        const name = $('#modalAddMiniSoccer #name').val();
        const telp = $('#modalAddMiniSoccer #telp').val();
        const status = "Sewa";
        const date = $('#modalAddMiniSoccer #date').val();
        const timeIn = $('#modalAddMiniSoccer #time_in').val();
        const timeOut = $('#modalAddMiniSoccer #time_out').val();
        const note = $('#modalAddMiniSoccer #note').val();

        const data = {
            name: name,
            telp: telp,
            status: status,
            date: date,
            timeIn: timeIn,
            timeOut: timeOut,
            note: note,
        };

        return data;
    }

    function onSubmitBooking() {
        const data = formBooking();
        // Send WA
        // Validasi sederhana
        if (!data.name || !data.date || !data.timeIn || !data.timeOut) {
            showToast("error", "Silakan isi terlebih dahulu!", "Nama, Tanggal, Jam mulai dan Jam selesai wajib diisi!");
            return;
        }

        // Template pesan
        let waMessage = `Hai kak perkenalkan aku ${data.name}%0A`;
        waMessage += `Fasilitas: Mini Soccer%0A`;
        waMessage += `Tanggal: *${formatDayDate(data.date)}%0A`;
        waMessage += `Jam Mulai: *${data.timeIn}%0A`;
        waMessage += `Jam Selesai: *${data.timeOut}%0A`;
        if (data.note) waMessage += `Catatan: ${data.note}%0A`;
        waMessage += `%0A%0AMohon di bantu untuk ketersediaannya yaa`;

        // Nomor WhatsApp admin (ganti dengan nomor kamu)
        const waNumber = "6281312876600";

        // Buka WA
        const waUrl = `https://wa.me/${waNumber}?text=${waMessage}`;
        window.open(waUrl, "_blank");
    }

    // Untuk date =================================================================================================
    $('.date-filter').on('change', function() {
        const value = $(this).val();
        getDataValidateReservation({
            header: `date=${value}`
        });
    });

    function getDataValidateReservation({
        header = {},
    }) {
        requestServer({
            url: url + '/api/public/reservation-mini-soccer/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                var events = [];
                $.each(response.data, function(i, item) {
                    console.log(item);
                    events.push({
                        time_start: item.time_in,
                        time_end: item.time_out,
                    });
                });
                $('#modalAddMiniSoccer #time').val('');
                $('#modalAddMiniSoccer #time_in').val('');
                $('#modalAddMiniSoccer #time_out').val('');
                initTimePicker("#modalAddMiniSoccer", "#time", events);
            },
        });
    }
    // ============================================================================================================
</script>
@endsection