@extends('components.public.layouts.app', ['nav_bar' => false])

@section('content')
<div class="pt-5 pb-20 md:py-20">
    <div class="px-5 md:px-20">
        <div class="md:flex md:justify-between md:items-center">
            <div>
                <h1 class="font-semibold text-center md:text-start text-xl md:text-[35px]">Pilihan Terbaik Keluarga</h1>
                <div class="text-center my-3 md:text-end md:text-[20px] md:hidden flex gap-1">
                    <span><span class="font-bold">Akses Gratis</span> kesemua fasilitas bagi tamu yang menginap.</span>
                </div>
                <div class="flex overflow-x-auto no-scrollbar">
                    <ul class="flex gap-2" id="filter-category">
                        <li class="px-4 py-2 border rounded-full bg-black text-white cursor-pointer whitespace-pre" onclick="onFilter('')">Semua Fasilitas</li>
                        @foreach($category as $val)
                        <li class="px-4 py-2 border rounded-full cursor-pointer whitespace-pre" onclick="onFilter('{{ $val->category }}')">{{$val->category}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="text-end text-[20px] hidden md:block">
                <span class="font-bold">Akses Gratis</span> kesemua fasilitas<br />bagi tamu yang menginap.
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
                        <a href="{{ route('facility.detail') }}" class="bg-[#AEEF8B] py-1 px-2 md:px-5 md:py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
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
                });
            }
        });
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
                        <svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
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
                        <svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#F4C01E]">
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
                <div class="h-[405px] bg-gray-50">
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
                $.each(response.data, function(i, item) {
                    const element = renderFasility(item);
                    $("#container-facilitys").append(element);
                });
            },
        });
    }
</script>
@endsection