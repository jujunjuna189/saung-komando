@extends('components.public.layouts.app3', ['nav_bar' => false])

@section('content')
<div class="mt-20 md:mt-0 md:h-screen px-2 md:px-0 flex justify-center md:items-center">
    <div class="bg-white rounded-lg md:rounded-3xl p-10 w-100 shadow-lg">
        <div class="flex justify-center mt-5">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo Saung Komando" class="h-20">
        </div>
        <div class="mt-10">
            <div>
                <input type="text" name="username" id="username" placeholder="Masukan Username" class="border rounded-full px-5 py-3 w-full">
            </div>
            <div class="mt-4">
                <input type="password" name="password" id="password" placeholder="Masukan Password" class="border rounded-full px-5 py-3 w-full">
            </div>
            <div class="mt-6 mb-1 w-full">
                <button type="button" class="bg-[#AEEF8B] px-5 py-3 w-full rounded-full border text-center cursor-pointer btn-login">
                    <span>Masuk</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        // akun fix (bisa ditambah)
        const accounts = [{
                username: "admin",
                password: "admin123"
            },
            {
                username: "staff",
                password: "12345"
            },
        ];

        $(".btn-login").on("click", function() {
            let user = $("#username").val().trim();
            let pass = $("#password").val().trim();

            // cek kosong
            if (!user || !pass) {
                showToast("error", "Gagal", "Username dan password wajib diisi!");
                return;
            }

            // cek akun
            const match = accounts.find(a => a.username === user && a.password === pass);

            if (match) {
                // redirect
                window.location.href = "{{ route('dashboard.overview') }}";
            } else {
                showToast("error", "Gagal", "Username atau password salah!");
            }
        });

    });
</script>
@endsection