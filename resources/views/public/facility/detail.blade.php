@extends('components.public.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-5 md:py-10">
    <div class="md:mt-12 px-0 md:px-20">
        <div class="bg-white rounded-xl md:rounded-3xl p-7">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl md:text-[35px]">{{ $detail->title }}</h1>
                <div class="flex gap-2">
                    <div class="flex gap-1 items-center px-2 md:px-4 py-1 md:py-2 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E] w-[13px] md:w-[18px] h-[13px] md:h-[18px]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold text-[10px] md:text-[14px]">{{ $detail->rating }}</span>
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
                        <img id="main-image"
                            src="{{ asset('storage/' . isset($detail->thumbnails[0]) ? $detail->thumbnails[0]->path : '') }}"
                            class="w-full rounded-lg md:rounded-3xl aspect-square md:aspect-auto md:h-128 object-cover fade">

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
                        <div class="w-full rounded-lg md:rounded-3xl h-64 md:h-96 overflow-hidden relative fade hidden md:flex">
                            <iframe 
                                class="w-full h-full object-cover"
                                src="https://www.youtube.com/embed/{{ $controller->getYouTubeCode($detail->link) }}?autoplay=1&mute=1&controls=0&loop=1&playlist={{ $controller->getYouTubeCode($detail->link) }}"
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
                        <div class="flex justify-between gap-2 mt-4 flex-wrap">
                            @foreach($detail->specification as $val)
                            <div class="flex gap-2 items-center px-2 py-1 md:px-3 md:py-1.5 rounded-full bg-[#EDEFF1]">
                                <img src="{{ url($val->icon) }}" alt="" class="h-4">
                                <span class="text-[10px] md:text-[12px] whitespace-pre md:hidden">{{ $val->value }}</span>
                                <span class="text-[10px] md:text-[12px] whitespace-pre hidden md:flex">{{ $val->value_md }}</span>
                            </div>
                            @endforeach
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
                            <div class="flex flex-row flex-wrap gap-1 items-center">
                                <h4 class="font-semibold text-lg whitespace-pre">{{ $detail->price }}</h4>
                                <h4 class="text-md text-red-600 line-through whitespace-pre">{{ $detail->markup_price ?? '' }}</h4>
                            </div>
                            <div>
                                <div class="bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1 open-modal" data-id="modalCheckout">
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
                <div class="flex-shrink-0 w-full md:w-1/3 2xl:w-1/4 px-2">
                    <div class="rounded-xl md:rounded-4xl overflow-hidden bg-white flex flex-row md:flex-col">
                        <div class="md:h-[405px] w-[90px] md:w-full aspect-square bg-gray-50 overflow-hidden group">
                            <img src="{{ asset('storage/' . isset($val->thumbnails[0]) ? $val->thumbnails[0]->path : '') }}"
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
                                <div class="flex flex-wrap flex-row items-center gap-1">
                                    <label for="price" class="font-semibold text-sm md:text-xl whitespace-pre">{{ $val->price }}</label>
                                    <label for="price" class="text-[11px] md:text-[14px] text-red-600 line-through whitespace-pre">{{ $val->markup_price ?? '' }}</label>
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
            <button class="absolute top-1/2 -translate-y-1/2 left-0 bg-black/40 text-white w-8 h-8 flex justify-center items-center rounded-full hover:bg-black ml-5 cursor-pointer" id="facility-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
            </button>
            <button class="absolute top-1/2 -translate-y-1/2 right-0 bg-black/40 text-white w-8 h-8 flex justify-center items-center rounded-full hover:bg-black mr-5 cursor-pointer" id="facility-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
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

<x-public.modal id="modalCheckout" title="Tambah Reservasi" footer="false" justify="justify-center md:justify-end">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Pemesan<span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Fasilitas<span class="text-red-500">*</span></label>
            <select name="facility_id" id="facility_id" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <!-- From data facility -->
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
            <input type="text" name="telp" id="telp" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow w-full">
            <label for="" class="font-semibold text-[12px]">Extra Bed <i class="text-[#808080]">(Optional)</i></label>
            <input type="text" name="extra_bed" id="extra_bed" placeholder="1 Kasur Besar = 250rb" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">Jumlah Penginap<span class="text-red-500">*</span></label>
            <input type="number" name="total_guest" id="total_guest" placeholder="0" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="">
            <label for="" class="font-semibold text-[12px]">Pembayaran<span class="text-red-500">*</span></label>
            <select name="status" id="status" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="DP">DP</option>
                <option value="Lunas">Lunas</option>
                <option value="Dilokasi">Dilokasi</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Check In<span class="text-red-500">*</span></label>
            <input type="date" name="check_in" id="check_in" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Check Out<span class="text-red-500">*</span></label>
            <input type="date" name="check_out" id="check_out" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="mt-3">
        <label for="" class="font-semibold text-[12px]">Catatan <i class="text-[#808080]">(Optional)</i></label>
        <textarea name="note" id="note" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
    </div>
    <div class="mt-3">
        <button type="button" onclick="onSubmit()" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer w-full" data-id="modalAdd">Tambah Reservasi</button>
    </div>
</x-public.modal>
@endsection

@section('script')
<script>
    let category = [];
    let categoryActive = "";
    $(document).ready(function() {
        getFacility({});
        $('.slider-wrapper').each(function () {
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
            url: url + '/api/facility/show',
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

    function form() {
        const name = $('#name').val();
        const facilityId = $('#facility_id').val();
        const telp = $('#telp').val();
        const totalGuest = $('#total_guest').val();
        const status = $('#status').val();
        const checkIn = $('#check_in').val();
        const checkOut = $('#check_out').val();
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
        const formData = new FormData();
        formData.append('name', data.name);
        formData.append('facility_id', data.facilityId);
        formData.append('telp', data.telp);
        formData.append('total_guest', data.totalGuest);
        formData.append('status', data.status);
        formData.append('check_in', data.checkIn);
        formData.append('check_out', data.checkOut);
        formData.append('note', data.note);
        formData.append('extra_bed', data.extraBed);
        // Save
        requestServer({
            url: url + '/api/reservation/create',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({
                    header: `filter_month=${dataFilter.month}&facility_id=${dataFilter.facility}&status=${dataFilter.status}`,
                });
                closeModal('modalAdd');
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
        <div class="flex-shrink-0 w-full md:w-1/3 2xl:w-1/4 px-2">
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
                        <div class="flex flex-wrap flex-row items-center gap-1">
                            <label for="price" class="font-semibold text-sm md:text-xl whitespace-pre">${item.price}</label>
                            <label for="price" class="text-[11px] md:text-[14px] text-red-600 line-through whitespace-pre">${item.markup_price ?? ''}</label>
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
</script>
@endsection
