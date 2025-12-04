@extends('components.public.layouts.app2', ['nav_bar' => false])

@section('content')
<div class="flex">
    <div class="grow">
        <x-public.navbar.navbar2 />
        <div class="mt-5 md:mt-10 px-5 md:pl-20 md:pr-10">
            <h1 class="font-semibold text-2xl md:text-4xl md:leading-12 fade-up">#1 Penginapan dan <br />Tempat Wisata di Ciwidey</h1>
            <p class="mt-5 md:mt-8 text-[#808391] fade-up">Liburan terasa lebih bermakna di tempat di mana udara dingin, suasana tenang, <br />pemandangan hijau, serta fasilitas penginapan yang lengkap. Setiap momen terasa lebih <br />damai, lebih segar, dan juga lebih berkesan.</p>
            <div class="mt-5 md:mt-10 flex justify-start">
                <a href="{{ route('facility') }}" class="bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                    <div class="flex gap-3 items-center">
                        <span>Lihat Semua Fasilitas</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="mt-10 grid grid-cols-2 md:flex md:justify-between gap-10 px-5 md:pl-20 md:pr-10">
            <div class="text-center">
                <h2 class="counter text-2xl md:text-3xl font-semibold" data-count="1500">0</h2>
                <span class="text-[#808391]">Penginapan</span>
            </div>
            <div class="text-center">
                <h2 class="counter text-2xl md:text-3xl font-semibold" data-count="2500">0</h2>
                <span class="text-[#808391]">Pengunjung</span>
            </div>

            <div class="text-center">
                <h2 class="counter text-2xl md:text-3xl font-semibold" data-count="800">0</h2>
                <span class="text-[#808391]">Review (Google)</span>
            </div>

            <div class="text-center">
                <h2 class="counter text-2xl md:text-3xl font-semibold" data-count="13">0</h2>
                <span class="text-[#808391]">Fasilitas Nyaman & Seru</span>
            </div>
        </div>
        <div class="mt-10 px-5 md:pl-20 md:pr-10">
            <div class="bg-white shadow-lg grid grid-cols-2 md:flex md:items-center p-3 md:py-1 md:px-1 rounded-xl relative dropdown-container">
                <div class="grow hover:bg-gray-100 py-3 pl-4 pr-3 dropdown-btn" onclick="toggleDropdown('calendar')">
                    <span>Check In:</span>
                    <h6 class="font-semibold" id="checkinDisplay">{{ \Carbon\Carbon::now()->locale('id')->format('d M y') }}</h6>
                </div>
                <div class="w-px h-10 bg-black hidden md:flex"></div>
                <div class="grow hover:bg-gray-100 py-3 pl-4 pr-3 dropdown-btn" onclick="toggleDropdown('calendar')">
                    <span>Check Out:</span>
                    <h6 class="font-semibold" id="checkoutDisplay">{{ \Carbon\Carbon::now()->locale('id')->addDays()->format('d M y') }}</h6>
                </div>
                <div class="w-px h-10 bg-black hidden md:flex"></div>
                <div class="grow hover:bg-gray-100 py-3 pl-4 pr-3">
                    <span>Kapasitas</span>
                    <div class="md:w-[150px]">
                        <x-public.field.select-input default="2 Orang" id="select_orang" :options="[
                            ['value' => '1 Orang', 'display' => '1 Orang'],
                            ['value' => '2 Orang', 'display' => '2 Orang'],
                            ['value' => '3 Orang', 'display' => '3 Orang'],
                            ['value' => '4 Orang', 'display' => '4 Orang'],
                            ['value' => '5 Orang', 'display' => '5 Orang']
                        ]" class_container="border-none text-semibold px-[0px] pr-10 py-[0px] md:w-full" class_list="w-[100px] md:w-auto md:right-10" />
                    </div>
                </div>
                <div class="w-px h-10 bg-black hidden md:flex"></div>
                <div class="grow hover:bg-gray-100 py-3 pl-4 pr-3">
                    <span>Kamar Tidur</span>
                    <div class="md:w-[150px]">
                        <x-public.field.select-input default="2 Kamar Tidur" id="select_kamar" :options="[
                            ['value' => '1 Kamar Tidur', 'display' => '1 Kamar Tidur'],
                            ['value' => '2 Kamar Tidur', 'display' => '2 Kamar Tidur'],
                            ['value' => '3 Kamar Tidur', 'display' => '3 Kamar Tidur']
                        ]" class_container="border-none text-semibold px-[0px] pr-10 py-[0px] md:w-full" class_list="w-[150px] md:w-auto md:right-10" />
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="relative md:px-3">
                        <div class="bg-[#AEEF8B] px-5 py-3 rounded-xl hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1 dropdown-btn" onclick="toggleDropdown('search')">
                            <div class="flex gap-3 justify-center items-center">
                                <span>Cari Penginapan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dropdown calendar -->
                <x-public.calendar.calendar2 />
                <!-- Dropdown Menu -->
                <div id="dropdown-search" class="dropdown-menu hidden absolute right-0 top-52 md:top-22 left-0 bg-white shadow-lg rounded-xl p-4 z-10 flex-col gap-2 w-full border border-slate-100">
                    <div class="md:flex justify-between">
                        <div class="p-2">
                            <h6 class="grow md:text-lg">Rekomendasi Terbaik</h6>
                        </div>
                        <div class="w-full md:w-auto">
                            <a href="{{ route('facility') }}" class="bg-[#AEEF8B] inline-block md:flex px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                                <div class="flex gap-3 items-center text-[12px] md:text-[14px]">
                                    <span>Lihat Semua Fasilitas</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- list -->
                    <div id="dropdown-list" class="grid grid-cols-1 md:grid-cols-2 gap-x-3 gap-y-5 mt-3 bg-gray-300 p-2 md:p-3 rounded-lg md:rounded-xl"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative w-[40%] max-w-[40%] min-w-[40%] hidden md:flex fade">
        <div class="absolute right-20 left-10 top-6 flex justify-end items-center">
            <a href="https://wa.link/u8ov80" target="_blank"
                class="group bg-white px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                <div class="flex gap-3 items-center">
                    <img src="{{ asset('assets/icon/headset.png') }}"
                        alt="cs"
                        class="h-[21px] transition duration-200 group-hover:invert">
                    <span>Tanya Admin</span>
                </div>
            </a>
        </div>
        <img src="{{ asset('assets/image/bg-main.jpg') }}" alt="cover-main" class="rounded-bl-4xl w-full h-160 object-cover">
    </div>
</div>
<div class="my-5 md:my-14 px-0 md:px-20">
    <div class="bg-white p-3 md:p-7 rounded-lg md:rounded-3xl flex flex-col-reverse md:flex-row gap-5">
        <div class="grow p-2 md:p-5">
            <h5 class="text-xl md:text-3xl font-semibold">Tempat staycation nyaman dengan Udara Sejuk Ciwidey</h5>
            <p class="text-[#808391] mt-6">Saung Komando Ciwidey menghadirkan pengalaman menginap yang dipenuhi hawa pegunungan yang dingin dan bersih. Setiap tamu merasakan ketenangan, kualitas tidur yang lebih baik, dan suasana alam yang membuat tubuh benar-benar rileks.</p>
            <div class="grid grid-cols-2 md:flex gap-10 py-10">
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <img src="{{ asset('assets/icon/sofa.svg') }}" alt="Sofa" class="h-16">
                    </div>
                    <span class="text-[#808391]">Furniture Lengkap</span>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <img src="{{ asset('assets/icon/mop.svg') }}" alt="Mop" class="h-16">
                    </div>
                    <span class="text-[#808391]">Housekeeping</span>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <img src="{{ asset('assets/icon/wifi-router.svg') }}" alt="Wifi Router" class="h-16">
                    </div>
                    <span class="text-[#808391]">Internet Cepat & Stabil</span>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <img src="{{ asset('assets/icon/smart-tv.svg') }}" alt="Smart Tv" class="h-16">
                    </div>
                    <span class="text-[#808391]">42” Smart TV</span>
                </div>
            </div>
            <div class="mt-6 space-y-2 md:space-y-0 md:flex gap-5">
                <div class="bg-[#AEEF8B] text-black px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                    <div class="flex gap-3 items-center justify-center text-center">
                        <span>+ FREE Akses Semua Fasilitas Komando</span>
                    </div>
                </div>
                <div class="bg-[#000000] text-white px-5 py-3 rounded-full hover:bg-[#AEEF8B] hover:text-black cursor-pointer transition-all duration-200 hover:-translate-y-1">
                    <div class="flex gap-3 items-center justify-center text-center">
                        <span>Cari Penginapan Sekarang</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="w-full rounded-lg md:rounded-3xl h-full object-cover fade">
        </div>
    </div>
</div>
<div class="px-5 md:px-20">
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
                    <label for="price" class="font-semibold text-sm md:text-xl">{{ $val->price }}</label>
                    <a href="{{ route('facility.detail', ['id' => $val->id]) }}" class="bg-[#AEEF8B] py-1 px-2 md:px-5 md:py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                        <div class="flex gap-3 items-center text-[10px] md:text-[14px]">
                            <span class="hidden md:flex">Lihat Detail Fasilitas</span>
                            <span class="md:hidden flex">Lihat Detail</span>
                        </div>
                    </a>
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
<div class="my-8 md:my-14 px-0 md:px-24">
    <div class="bg-white p-3 md:p-7 rounded-lg md:rounded-3xl flex flex-col-reverse md:flex-row gap-5 md:items-center">
        <div class="w-full md:flex-1 md:pr-20">
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
        <div class="w-full md:flex-1">
            <iframe class="rounded-lg md:rounded-3xl w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2696886817916!2d107.43621367590866!3d-7.0947066695567695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f30628e4c0bf%3A0xa062e8e408652003!2sVilla%20Komando!5e0!3m2!1sid!2sid!4v1763647930577!5m2!1sid!2sid" height="309" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let category = [];
    let categoryActive = "";
    $(document).ready(function() {
        startCounter();
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
    });

    function toggleDropdown(id) {
        const dropdown = $(`#dropdown-${id}`);

        $('.dropdown-menu').not(dropdown).addClass('hidden');
        dropdown.toggleClass('hidden');
        const isOpen = !dropdown.hasClass('hidden');

        if (isOpen) {
            getFacility();
        }
    }

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.dropdown-menu, .dropdown-btn').length) {
            $('.dropdown-menu').addClass('hidden');
        }
    });

    function renderFilterFasility(item) {
        let specHtml = "";

        $.each(item.specification, function(i, itemChild) {
            specHtml += `
                <div class="flex gap-2 items-center px-2 py-1 md:py-1.5 rounded-full bg-[#EDEFF1] overflow-hidden">
                    <img src="${url + '/' + itemChild.icon}" alt="" class="h-4">
                    <span class="text-[10px] whitespace-pre md:hidden">${itemChild.value}</span>
                    <span class="text-[10px] md:text-[14px] lg:text-[11px] whitespace-pre hidden lg:flex">${itemChild.value_md}</span>
                </div>
            `;
        });

        let freeGuest = "";
        if (item.is_free_for_guest == 1) {
            freeGuest = `
                <div class="flex justify-between items-center">
                    <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                        <span class="text-[10px]">
                            <strong class="text-red-500">FREE</strong> untuk tamu menginap
                        </span>
                    </div>
                    <div class="flex gap-1 items-center px-2 py-1 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[16px] h-[13px] md:h-[16px]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold text-[10px]">${item.rating}</span>
                    </div>
                </div>
            `;
        }

        let membership = "";
        if (item.is_membership == 1) {
            membership = `
                <div class="flex justify-between items-center">
                    <h5 class="text-md font-semibold">${item.title}</h5>
                    <div class="bg-[#EAC580] flex items-center gap-1 rounded-full px-2 py-1">
                        <span class="text-[10px]">Membership 325rb/bln</span>
                    </div>
                </div>
            `;
        } else {
            let rating = "";
            if (item.is_free_for_guest == 0) {
                rating = `
                    <div class="flex gap-1 items-center px-2 py-1 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[16px] h-[13px] md:h-[16px]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold text-[10px]">${item.rating}</span>
                    </div>
                `;
            }

            membership = `
                <div class="flex justify-between items-center">
                    <h5 class="text-md font-semibold">${item.title}</h5>
                    ${rating}
                </div>
            `;
        }

        const element = `
            <div class="rounded-xl overflow-hidden bg-white flex flex-row">
                <div class="w-[90px] aspect-square bg-gray-50 overflow-hidden group">
                    <img src="{{ asset('storage/${item.thumbnails[0].path}') }}"
                        alt=""
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                </div>

                <div class="p-3 grow flex flex-col">
                    ${freeGuest}
                    ${membership}

                    <p class="mt-1 text-[#808080] text-[10px]">
                        ${item.description.length > 75 ? item.description.substring(0, 75) + "..." : item.description}
                    </p>

                    <div class="mt-2 flex justify-between gap-2 overflow-x-auto no-scrollbar">
                        ${specHtml}
                    </div>

                    <div class="flex flex-row justify-between items-center mt-1">
                        <label class="font-semibold text-sm">${item.price}</label>
                        <a href="{{ route('facility.detail', ['id' => $val->id]) }}"
                            class="bg-[#AEEF8B] py-1 px-2 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                            <div class="flex gap-3 items-center text-[10px]">
                                <span>Lihat Detail</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        `;

        return element;
    }

    // Search render facility
    function getFacility() {
        let params = new URLSearchParams();
        params.append('check_in', $('#checkinDisplay').text());
        params.append('check_out', $('#checkoutDisplay').text());
        params.append('specs[]', $('#select_orang .selected-text').text());
        params.append('specs[]', $('#select_kamar .selected-text').text());
        requestServer({
            url: url + '/api/facility/show',
            type: "GET",
            data: params.toString(),
            onLoader: false,
            onSuccess: function(response) {
                $("#dropdown-search #dropdown-list").empty();
                $.each(response.data, function(i, item) {
                    const element = renderFilterFasility(item);
                    $("#dropdown-search #dropdown-list").append(element);
                });
            },
        });
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
        getData({
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
                        <span class="text-[10px] md:text-[14px]">Membership 325rb/bln</span>
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

        const element = `
            <div class="rounded-xl md:rounded-4xl overflow-hidden bg-white flex flex-row md:flex-col">
                <div class="md:h-[405px] w-[90px] md:w-full aspect-square bg-gray-50 overflow-hidden group">
                    <img src="{{ asset('storage/${item.thumbnails[0].path}') }}" alt="" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                </div>
                <div class="p-3 md:p-5 grow flex flex-col">
                    ${freeGuest}
                    ${membership}
                    <p class="mt-1 md:mt-3 text-[#808080] text-[10px] md:text-[14px]">
                        ${item.description.length > 75 ? item.description.substring(0, 75) + "..." : item.description}
                    </p>
                    <div class="mt-2 md:mt-5 flex justify-between gap-2 overflow-x-auto no-scrollbar md:overflow-hidden flex-wrap">
                        ${specHtml}
                    </div>
                    <div class="md:grow"></div>
                    <div class="flex flex-row justify-between items-center mt-1 md:mt-4">
                        <label for="price" class="font-semibold text-sm md:text-xl">${item.price}</label>
                        <a href="{{ route('facility.detail', ['id' => $val->id]) }}" class="bg-[#AEEF8B] py-1 px-2 md:px-5 md:py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
                            <div class="flex gap-3 items-center text-[10px] md:text-[14px]">
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

    function getData({
        header = {},
    }) {
        requestServer({
            url: url + '/api/facility/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                $("#container-facilitys").empty();
                $.each(response.data.slice(0, 3), function(i, item) {
                    const element = renderFasility(item);
                    $("#container-facilitys").append(element);
                });
            },
        });
    }
</script>
@endsection