@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="pr-5 py-5">
    <div class="bg-white rounded-2xl p-5">
        <div class="">
            <h1 class="text-2xl font-semibold">Kode Promo</h1>
        </div>
        <div class="mt-5">
            <div class="flex justify-between items-center">
                <div class="px-4 py-2 border rounded-full bg-[#F2F4F7]">
                    <select name="" id="" class="border-none focus:outline-none">
                        <option value="">November 2025</option>
                    </select>
                </div>
                <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer open-modal" data-id="modalAdd">
                    <div class="flex gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        <span>Tambah Kode</span>
                    </div>
                </button>
            </div>
        </div>
        <table class="w-full mt-7">
            <thead class="bg-[#F2F4F7]">
                <tr>
                    <td class="py-3 px-3 font-semibold rounded-l-xl text-center">#</td>
                    <td class="py-3 px-3 font-semibold text-start">Fasilitas</td>
                    <td class="py-3 px-3 font-semibold text-start">Kode</td>
                    <td class="py-3 px-3 font-semibold text-start">Diskon</td>
                    <td class="py-3 px-3 font-semibold text-start">Normal</td>
                    <td class="py-3 px-3 font-semibold text-start">Promo</td>
                    <td class="py-3 px-3 font-semibold text-start">Periode</td>
                    <td class="py-3 px-3 font-semibold rounded-r-xl text-center">Hapus</td>
                </tr>
            </thead>
            <tbody class="[&>tr:nth-child(even)]:bg-[#F2F4F7]">
                <tr>
                    <td class="py-3 px-3 text-center rounded-l-xl">01</td>
                    <td class="py-3 px-3">Saung Damar</td>
                    <td class="py-3 px-3">Lebaran</td>
                    <td class="py-3 px-3">20%</td>
                    <td class="py-3 px-3">3.500.000</td>
                    <td class="py-3 px-3">2.500.000</td>
                    <td class="py-3 px-3">18 Nov-28 Des</td>
                    <td class="py-3 px-3 rounded-r-xl">
                        <div class="flex justify-center">
                            <div class="w-7 h-7 p-2 flex justify-center items-center bg-[#D8E0ED] rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </div>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td class="py-3 px-3 text-center rounded-l-xl">03</td>
                    <td class="py-3 px-3">Saung Damar</td>
                    <td class="py-3 px-3">Lebaran</td>
                    <td class="py-3 px-3">20%</td>
                    <td class="py-3 px-3">3.500.000</td>
                    <td class="py-3 px-3">2.500.000</td>
                    <td class="py-3 px-3">18 Nov-28 Des</td>
                    <td class="py-3 px-3 rounded-r-xl">
                        <div class="flex justify-center">
                            <div class="w-7 h-7 p-2 flex justify-center items-center bg-[#D8E0ED] rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="py-3 px-3 text-center rounded-l-xl">04</td>
                    <td class="py-3 px-3">Saung Damar</td>
                    <td class="py-3 px-3">Lebaran</td>
                    <td class="py-3 px-3">20%</td>
                    <td class="py-3 px-3">3.500.000</td>
                    <td class="py-3 px-3">2.500.000</td>
                    <td class="py-3 px-3">18 Nov-28 Des</td>
                    <td class="py-3 px-3 rounded-r-xl">
                        <div class="flex justify-center">
                            <div class="w-7 h-7 p-2 flex justify-center items-center bg-[#D8E0ED] rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="py-3 px-3 text-center rounded-l-xl">05</td>
                    <td class="py-3 px-3">Saung Damar</td>
                    <td class="py-3 px-3">Lebaran</td>
                    <td class="py-3 px-3">20%</td>
                    <td class="py-3 px-3">3.500.000</td>
                    <td class="py-3 px-3">2.500.000</td>
                    <td class="py-3 px-3">18 Nov-28 Des</td>
                    <td class="py-3 px-3 rounded-r-xl">
                        <div class="flex justify-center">
                            <div class="w-7 h-7 p-2 flex justify-center items-center bg-[#D8E0ED] rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="py-3 px-3 text-center rounded-l-xl">06</td>
                    <td class="py-3 px-3">Saung Damar</td>
                    <td class="py-3 px-3">Lebaran</td>
                    <td class="py-3 px-3">20%</td>
                    <td class="py-3 px-3">3.500.000</td>
                    <td class="py-3 px-3">2.500.000</td>
                    <td class="py-3 px-3">18 Nov-28 Des</td>
                    <td class="py-3 px-3 rounded-r-xl">
                        <div class="flex justify-center">
                            <div class="w-7 h-7 p-2 flex justify-center items-center bg-[#D8E0ED] rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Add -->
<x-dashboard.modal id="modalAdd" title="Tambah Promo" btn_text="Tambah Promo">
    <div class="grid grid-cols-1 gap-2">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Kode Promo<span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" placeholder="Masukan Kode" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="flex gap-2 mt-3">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Fasilitas<span class="text-red-500">*</span></label>
            <select name="" id="" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="">Penginapan</option>
            </select>
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Periode<span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="">
            <label for="" class="font-semibold text-[12px]">Diskon<span class="text-red-500">*</span></label>
            <select name="" id="" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="">20%</option>
            </select>
        </div>
    </div>
    <x-slot:footer>
        <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
            <button class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer">Tambah Promo</button>
        </div>
    </x-slot:footer>
</x-dashboard.modal>
@endsection