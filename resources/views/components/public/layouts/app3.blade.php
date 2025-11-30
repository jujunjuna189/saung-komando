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

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">
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

<body style="scroll-behavior: smooth;">
    <div class="app">
        <main>
            @yield('content')
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Custome Js -->
<script src="{{ asset('assets/script/notification.js') }}"></script>
<script src="{{ asset('assets/script/script.js') }}"></script>
<script>
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
            }, 10); // small delay to trigger animation
        });

        // Tutup modal
        $('.close-modal').on('click', function() {
            const id = $(this).data('id');
            const modal = $('#' + id);
            const box = modal.find('> div');

            modal.addClass('opacity-0');
            box.addClass('scale-95');

            setTimeout(() => {
                modal.removeClass('flex').addClass('hidden');
            }, 300); // delay sesuai durasi animasi
        });
    });
</script>
@stack('scripts')
@yield('script')

</html>