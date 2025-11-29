<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="preload" as="image" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.ico') }}" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Saung Komando') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #F2F4F7;
            font-size: 14px;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body style="scroll-behavior: smooth;" x-data="{ mobileMenuOpen: false }">
    <div class="app">
        <!-- Mobile Header -->
        <div class="md:hidden flex justify-between items-center p-5 bg-[#F2F4F7]">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo" class="h-10">
            <button @click="mobileMenuOpen = true" class="focus:outline-none bg-black text-white rounded p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        <a href="{{ route('dashboard.calendar') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/calendar') ? 'bg-[#AEEF8B]' : '' }}">
                            <img src="{{ asset('assets/icon/calendar.svg') }}" alt="Calendar">
                            <span>Kalender</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.promotion') }}" class="flex items-center gap-3 w-full border rounded-xl px-4 py-4 {{ Request::is('dashboard/promotion') ? 'bg-[#AEEF8B]' : '' }}">
                            <img src="{{ asset('assets/icon/coupon.svg') }}" alt="Kode Promo">
                            <span>Kode Promo</span>
                        </a>
                    </li>
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

        <main>
            <div class="flex">
                <div class="hidden md:block">
                    <x-dashboard.sidebar.sidebar />
                </div>
                <div class="grow">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Custome Js -->
<script src="{{ asset('assets/script/notification.js') }}"></script>
<script src="{{ asset('assets/script/script.js') }}"></script>
<script>
    let url = "<?= url('') ?>";
    let token = "<?= Illuminate\Support\Facades\Session::token() ?>";
    let auth_user = <?= json_encode(Illuminate\Support\Facades\Auth::user()) ?>;

    $(document).ready(function() {
        // Buka modal
        $('.open-modal').on('click', function() {
            const id = $(this).data('id');
            const modal = $('#' + id);
            const box = modal.find('> div');

            modal.removeClass('hidden').addClass('flex');
            setTimeout(() => {
                modal.removeClass('opacity-0');
                box.removeClass('scale-95');
                box.removeClass('-mx-[100px]');
                box.addClass('mx-4');
            }, 10); // small delay to trigger animation
        });

        // Tutup modal
        $('.close-modal').on('click', function() {
            const id = $(this).data('id');
            closeModal(id);
        });
    });

    function closeModal(id) {
        const modal = $('#' + id);
        const box = modal.find('> div');

        modal.addClass('opacity-0');
        box.addClass('scale-95');
        box.removeClass('mx-4');
        box.addClass('-mx-[100px]');

        setTimeout(() => {
            modal.removeClass('flex').addClass('hidden');
        }, 300); // delay sesuai durasi animasi
    }
</script>
@stack('scripts')
@yield('script')

</html>
