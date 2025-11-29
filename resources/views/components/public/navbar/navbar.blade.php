<div class="flex justify-between py-5 px-5 md:px-20 items-center">
    <div class="pr-12 flex justify-start">
        <img src="{{ asset('assets/logo/logo.png') }}" alt="logo" class="h-[55px]">
    </div>
    <div>
        <x-public.navbar.menu />
        <ul class="gap-5 text-[#808080] hidden md:flex">
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
    <div class="items-center hidden md:flex">
        <a href="https://wa.link/u8ov80" target="_blank"
            class="group bg-[#AEEF8B] px-5 py-3 rounded-full hover:bg-black hover:text-white cursor-pointer transition-all duration-200 hover:-translate-y-1">
            <div class="flex gap-3 items-center">
                <img src="{{ asset('assets/icon/headset.png') }}"
                    alt="cs"
                    class="h-[21px] transition duration-200 group-hover:invert">
                <span>Tanya Admin</span>
            </div>
        </a>
    </div>
</div>