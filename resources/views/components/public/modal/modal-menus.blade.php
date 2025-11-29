@props([
'id' => 'modal-id',
'title' => 'Saung Komando',
])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 opacity-0 transition-opacity duration-300">
    <div class="bg-white absolute top-0 left-0 right-0 transition-transform duration-300">
        <!-- Header -->
        <div class="flex justify-between items-center px-4 py-3 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
            <button class="text-gray-500 hover:text-gray-700 text-xl close-modal cursor-pointer" data-id="{{ $id }}">&times;</button>
        </div>

        <!-- Body -->
        <div>
            <ul class="flex flex-col text-base font-medium">
                <li class="cursor-pointer border-y border-slate-100 {{ Request::is('/') ? 'bg-gray-100' : '' }}" onclick="">
                    <a class="py-4 px-4 inline-block w-full" href="{{ route('home') }}">Home</a>
                </li>
                <li class="cursor-pointer border-y border-slate-100 {{ Request::is('facility') ? 'bg-gray-100' : '' }}" onclick="">
                    <a class="py-4 px-4 inline-block w-full" href="{{ route('facility') }}">Fasilitas</a>
                </li>
                <li class="cursor-pointer border-y border-slate-100 {{ Request::is('gallery') ? 'bg-gray-100' : '' }}" onclick="">
                    <a class="py-4 px-4 inline-block w-full" href="{{ route('gallery') }}">Galeri</a>
                </li>
                <li class="cursor-pointer border-y border-slate-100 {{ Request::is('contact') ? 'bg-gray-100' : '' }}" onclick="">
                    <a class="py-4 px-4 inline-block w-full" href="{{ route('contact') }}">Kontak</a>
                </li>
            </ul>
        </div>
        <div class="w-full p-3">
            <button onclick="window.open('https://wa.link/u8ov80', '_blank')" target="_blank" class="bg-[#AEEF8B] px-5 py-3 rounded-full w-full">
                <div class="flex gap-3 items-center justify-center">
                    <img src="{{ asset('assets/icon/headset.png') }}" alt="cs" class="h-[21px]">
                    <span>Tanya Admin</span>
                </div>
            </button>
        </div>
    </div>
</div>