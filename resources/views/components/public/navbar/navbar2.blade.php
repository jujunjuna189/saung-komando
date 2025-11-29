<div class="flex justify-between py-5 px-5 md:pl-20 md:pr-10 items-center">
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
</div>