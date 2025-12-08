<!-- Mobile Header -->
<div class="md:hidden flex justify-between items-center p-5 bg-[#F2F4F7]">
    <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo" class="h-10">
    <button @click="mobileMenuOpen = true" class="focus:outline-none bg-black text-white rounded p-2">
        <svg xmlns="https://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</div>

<!-- Mobile Sidebar Overlay -->
<div x-show="mobileMenuOpen"
    class="fixed inset-0 z-50 flex justify-start items-start"
    style="display: none;">

    <!-- Backdrop -->
    <div x-show="mobileMenuOpen"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/50"
        @click="mobileMenuOpen = false"></div>

    <!-- Sidebar Panel -->
    <div x-show="mobileMenuOpen"
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="bg-white w-full h-full p-5 relative overflow-y-auto z-10">

        <div class="flex justify-between items-center mb-8">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo" class="h-10">
            <button @click="mobileMenuOpen = false" class="focus:outline-none bg-black text-white rounded p-2">
                <svg xmlns="https://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <ul class="space-y-4">
            <li>
                <a href="{{ route('dashboard.overview') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/overview') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/overview.svg') }}" alt="Overview">
                    <span>Overview</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.facility') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/facility') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/facility.svg') }}" alt="Facility">
                    <span>Fasilitas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.calendar') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/calendar') || Request::is('dashboard/calendar-mini-soccer') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/calendar.svg') }}" alt="Calendar">
                    <span>Kalender</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.gallery') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/gallery') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/gallery.svg') }}" alt="Update Gallery">
                    <span>Update Galeri</span>
                </a>
            </li>
            <!-- <li>
                <a href="{{ route('dashboard.promotion') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/promotion') ? 'bg-[#AEEF8B]' : '' }}">
                    <img src="{{ asset('assets/icon/coupon.svg') }}" alt="Kode Promo">
                    <span>Kode Promo</span>
                </a>
            </li> -->
            <li>
                <a href="{{ route('login') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4">
                    <img src="{{ asset('assets/icon/profile.svg') }}" alt="Logout">
                    <span>Logout</span>
                </a>
            </li>
        </ul>

        <div class="mt-8">
            <div class="bg-[#E54F4F] rounded-xl py-3 text-center text-white font-bold text-xl">
                PENTING!
            </div>
            <p class="mt-4 text-center text-sm">Data pada dashboard dilarang disebarluaskan, kecuali untuk kebutuhan laporan internal</p>
        </div>
    </div>
</div>