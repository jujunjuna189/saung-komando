<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="preload" as="image" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.ico') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Saung Komando') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #F2F4F7;
            font-size: 14px;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .select2-container--default .select2-selection--multiple {
            border: none !important;
            box-shadow: none !important;
            background-color: transparent;
        }
    </style>
</head>

<body style="scroll-behavior: smooth;" x-data="{ mobileMenuOpen: false }">
    <div class="app">
        <x-dashboard.sidebar.mobile-sidebar />
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                box.addClass('md:mx-4');
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