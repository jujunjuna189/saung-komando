@extends('components.public.layouts.app3', ['nav_bar' => false])

@section('content')
<div class="h-screen flex justify-center items-center">
    <div class="bg-white rounded-3xl p-10 w-[25rem] shadow-lg">
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
                <button type="button" class="bg-[#AEEF8B] px-5 py-3 w-full rounded-full border text-center cursor-pointer" onclick="window.open('{{ route('dashboard.overview') }}', '_self')">
                    <span>Masuk</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection