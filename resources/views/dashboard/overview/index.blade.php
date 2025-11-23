@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="pr-5 py-5">
    <div class="bg-white rounded-2xl p-5">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-semibold">Overview</h1>
                <p>Selasa, 15 November 2025</p>
            </div>
            <ul class="flex gap-2">
                <li class="px-4 py-2 border rounded-full">
                    <select name="" id="" class="border-none focus:outline-none">
                        <option value="">November 2025</option>
                        <option value="">Desember 2025</option>
                    </select>
                </li>
                <li class="px-4 py-2 border rounded-full">
                    <select name="" id="" class="border-none focus:outline-none">
                        <option value="">Lunas</option>
                    </select>
                </li>
                <li class="px-4 py-2 border rounded-full">
                    <input type="text" placeholder="Filter" class="border-none focus:outline-none placeholder-[#000000] text-center w-20">
                </li>
                <li class="px-4 py-2 border-[#AEEF8B] bg-[#AEEF8B] rounded-full flex items-center">Export To Excel</li>
            </ul>
        </div>
        <div class="mt-5">
            <div class="grid grid-cols-4 gap-2">
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F2F4F7] rounded-lg p-5">
                    <div class="flex justify-between items-center">
                        <h6 class="font-semibold text-lg">Saung Damar</h6>
                        <div class="bg-[#AEEF8B] rounded-full w-7 h-7 p-[6px] flex justify-center items-center">
                            <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                        </div>
                    </div>
                    <hr class="border-[#808080] my-3"/>
                    <div class="flex justify-between">
                        <span class="font-semibold">Yanyan K.</span>
                        <span class="font-semibold text-end">08572220024</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2">
                        <div>
                            <p>Check In :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                        <div class="text-end">
                            <p>Check Out :</p>
                            <p class="font-semibold">15 Nov 2025</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Catatan :</p>
                        <p>1 Kasur Besar, 1 kasur Kecil, 3 Tenda</p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                            <select name="" id="" class="border-none focus:outline-none w-full">
                                <option value="">Lunas</option>
                            </select>
                        </div>
                        <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                            <p>02 Hari</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection