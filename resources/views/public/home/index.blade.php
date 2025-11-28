@extends('components.public.layouts.app2', ['nav_bar' => false])

@section('content')
<div class="flex">
    <div class="grow">
        <div class="flex justify-between py-5 pl-20 pr-10 items-center">
            <div class="pr-12 flex justify-start">
                <img src="{{ asset('assets/logo/logo.png') }}" alt="logo" class="h-[55px]">
            </div>
            <div>
                <ul class="flex gap-5 text-[#808080]">
                    <li class="hover:text-black cursor-pointer {{ Request::is('/') ? 'text-black' : '' }}">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="hover:text-black cursor-pointer {{ Request::is('facility') ? 'text-black' : '' }}">
                        <a href="{{ route('facility') }}">Fasilitas</a>
                    </li>
                    <li class="hover:text-black cursor-pointer {{ Request::is('gallery') ? 'text-black' : '' }}">
                        <a href="{{ route('gallery') }}">Galeri</a>
                    </li>
                    <li class="hover:text-black cursor-pointer {{ Request::is('contact') ? 'text-black' : '' }}">
                        <a href="{{ route('contact') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-10 pl-20 pr-10">
            <h1 class="font-semibold text-4xl leading-12">#1 Penginapan dan <br />Tempat Wisata di Ciwidey</h1>
            <p class="mt-8 text-[#808391]">Liburan terasa lebih bermakna di tempat di mana udara dingin, suasana tenang, <br />pemandangan hijau, serta fasilitas penginapan yang lengkap. Setiap momen terasa lebih <br />damai, lebih segar, dan juga lebih berkesan.</p>
            <div class="mt-10 flex justify-start">
                <a href="{{ route('facility') }}" class="bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer">
                    <div class="flex gap-3 items-center">
                        <span>Lihat Semua Fasilitas</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="mt-10 flex justify-between gap-10 pl-20 pr-10">
            <div class="text-center">
                <h2 class="text-3xl font-semibold">1500+</h2>
                <span class="text-[#808391]">Penginapan</span>
            </div>
            <div class="text-center">
                <h2 class="text-3xl font-semibold">2500+</h2>
                <span class="text-[#808391]">Pengunjung</span>
            </div>
            <div class="text-center">
                <h2 class="text-3xl font-semibold">800+</h2>
                <span class="text-[#808391]">Review (Google)</span>
            </div>
            <div class="text-center">
                <h2 class="text-3xl font-semibold">13+</h2>
                <span class="text-[#808391]">Fasilitas Nyaman & Seru</span>
            </div>
        </div>
        <div class="mt-10 pl-20 pr-10">
            <div class="bg-white shadow-lg flex gap-5 py-4 pl-5 pr-4 rounded-xl">
                <div class="grow">
                    <span>Check In:</span>
                    <h6 class="font-semibold">15 Nov 2025</h6>
                </div>
                <div class="grow">
                    <span>Check Out:</span>
                    <h6 class="font-semibold">15 Nov 2025</h6>
                </div>
                <div class="grow">
                    <span>Kapasitas</span>
                    <h6 class="font-semibold">02 Orang</h6>
                </div>
                <div class="grow">
                    <span>Kamar Tidur</span>
                    <h6 class="font-semibold">02 Kamar</h6>
                </div>
                <div>
                    <div class="bg-[#AEEF8B] px-5 py-3 rounded-xl">
                        <div class="flex gap-3 items-center">
                            <span>Cari Penginapan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative w-[40%] max-w-[40%] min-w-[40%]">
        <div class="absolute right-20 left-10 top-6 flex justify-end items-center">
            <a href="https://wa.link/u8ov80" target="_blank" class="bg-white px-5 py-3 rounded-full">
                <div class="flex gap-3 items-center">
                    <img src="{{ asset('assets/icon/headset.png') }}" alt="cs" class="h-[21px]">
                    <span>Tanya Admin</span>
                </div>
            </a>
        </div>
        <img src="{{ asset('assets/image/bg-main.jpg') }}" alt="cover-main" class="rounded-bl-4xl w-full h-160 object-cover">
    </div>
</div>
<div class="my-14 px-20">
    <div class="bg-white p-7 rounded-3xl flex gap-5">
        <div class="grow p-5">
            <h5 class="text-3xl font-semibold">Tempat staycation nyaman dengan Udara Sejuk Ciwidey</h5>
            <p class="text-[#808391] mt-6">Saung Komando Ciwidey menghadirkan pengalaman menginap yang dipenuhi hawa pegunungan yang dingin dan bersih. Setiap tamu merasakan ketenangan, kualitas tidur yang lebih baik, dan suasana alam yang membuat tubuh benar-benar rileks.</p>
            <div class="flex gap-10 py-10">
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
            <div class="mt-6 flex gap-5">
                <div class="bg-[#AEEF8B] text-black px-5 py-3 rounded-full">
                    <div class="flex gap-3 items-center">
                        <span>+ FREE Akses Semua Fasiitas Komando</span>
                    </div>
                </div>
                <div class="bg-[#000000] text-white px-5 py-3 rounded-full">
                    <div class="flex gap-3 items-center">
                        <span>Cari Penginapan Sekarang</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ asset('assets/image/image-main2.jpg') }}" alt="" class="w-full rounded-3xl h-full object-cover">
        </div>
    </div>
</div>
<div class="px-20">
    <h1 class="font-semibold text-[35px]">Pilihan Terbaik Keluarga</h1>
    <div class="flex justify-between items-center">
        <ul class="flex gap-2" id="filter-category">
            <!-- generate data -->
        </ul>
        <div>
            <div class="border px-4 py-2 rounded-full hover:bg-black hover:text-white cursor-pointer">
                <a href="{{ route('facility') }}" class="flex gap-3 items-center">
                    <span>Tampilkan Semua</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="mt-12 px-5">
    <div class="grid grid-cols-3 gap-x-3 gap-y-5" id="container-facilitys">
        <!-- Generate Data -->
    </div>
    <div class="flex justify-center items-center mt-5 py-5 gap-3">
        <div class="w-2 h-2 bg-[#000000] rounded-full"></div>
        <div class="w-2 h-2 bg-[#C0C0C0] rounded-full"></div>
        <div class="w-2 h-2 bg-[#C0C0C0] rounded-full"></div>
        <div class="w-2 h-2 bg-[#C0C0C0] rounded-full"></div>
    </div>
</div>
<div class="my-14 px-24">
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
@endsection

@section('script')
<script>
    let category = [];
    let categoryActive = "";
    $(document).ready(function() {
        getCategory({
            onSuccess: function(response) {
                $.each(response.data, function(i, item) {
                    category.push({
                        id: item.id,
                        value: item.category,
                        category: item.category,
                    });
                    renderCategory();
                });
            }
        });
        getData({});
    });

    function renderCategory() {
        $('#filter-category').empty();
        var element = `
            <li class="px-4 py-2 border rounded-full ${categoryActive == "" ? 'bg-black text-white' : ""} cursor-pointer" onclick="onFilter('')">Semua Fasilitas</li>
        `;
        $('#filter-category').append(element);
        $.each(category, function(i, item) {
            element = `
                <li class="px-4 py-2 border rounded-full ${categoryActive == item.category ? 'bg-black text-white' : ""} cursor-pointer" onclick="onFilter('${item.category}')">${item.category}</li>
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
                <div class="flex gap-2 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                    <img src="${url + '/' + itemChild.icon}" alt="" class="h-4">
                    <span class="md:text-[10px]">${itemChild.value}</span>
                </div>
            `;
        });

        let freeGuest = "";
        if (item.is_free_for_guest == 1) {
            freeGuest = `
                <div class="flex justify-between items-center">
                    <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                        <span class="text-[14px]"><strong class="text-red-500">FREE</strong> untuk tamu menginap</span>
                    </div>
                    <div class="flex gap-1 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold">${item.rating}</span>
                    </div>
                </div>
            `;
        }

        let membership = "";
        if (item.is_membership == 1) {
            membership = `
                <div class="flex justify-between items-center">
                    <h5 class="text-2xl font-semibold">${item.title}</h5>
                    <div class="bg-[#EAC580] flex items-center gap-1 rounded-full px-2 py-1">
                        <span class="text-[14px]">Membership 325rb/bln</span>
                    </div>
                </div>
            `;
        } else {
            let rating = "";
            if (item.is_free_for_guest == 0) {
                rating = `
                    <div class="flex gap-1 items-center px-4 py-2 rounded-full bg-[#EDEFF1]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="font-semibold">${item.rating}</span>
                    </div>
                `;
            }

            membership = `
                <div class="flex justify-between items-center">
                    <h5 class="text-2xl font-semibold">${item.title}</h5>
                    ${rating}
                </div>
            `;
        }

        const element = `
            <div class="rounded-4xl overflow-hidden bg-white flex flex-col">
                <div class="h-[405px] bg-amber-950">
                    <img src="{{ asset('storage/${item.thumbnails[0].path}') }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5 grow flex flex-col">
                    ${freeGuest}
                    ${membership}
                    <p class="mt-3 text-[#808080]">
                        ${item.description}
                    </p>
                    <div class="mt-5 flex justify-between">
                        ${specHtml}
                    </div>
                    <div class="grow"></div>
                    <div class="flex justify-between items-center mt-4">
                        <label for="price" class="font-semibold text-xl">${item.price}</label>
                        <div class="bg-[#AEEF8B] px-5 py-3 rounded-full">
                            <div class="flex gap-3 items-center">
                                <span>Lihat Detail Fasilitas</span>
                            </div>
                        </div>
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