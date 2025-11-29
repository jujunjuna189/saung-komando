@extends('components.public.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-10">
    <div class="px-5 md:px-20 text-center">
        <h1 class="font-semibold text-xl md:text-[35px]">Galeri Saung Komando</h1>
    </div>
    <div class="mt-12 px-5 md:px-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
            <div class="h-[200px] md:h-[482px] bg-amber-950 rounded-lg md:rounded-4xl overflow-hidden group opacity-0 fade-up-scroll">
                <img src="{{ asset('assets/image/bg-main.jpg') }}"
                    alt=""
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            </div>
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