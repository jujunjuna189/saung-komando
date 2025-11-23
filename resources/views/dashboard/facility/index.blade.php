@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="pr-5 py-5">
    <div class="bg-white rounded-2xl p-5">
        <div class="">
            <h1 class="text-2xl font-semibold">Fasilitas Saung Komando</h1>
        </div>
        <div class="mt-5">
            <div class="flex justify-between items-center">
                <div class="px-4 py-2 border rounded-full bg-[#F2F4F7]">
                    <select name="" id="" class="border-none focus:outline-none">
                        <option value="">Penginapan</option>
                    </select>
                </div>
                <div class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B]">
                    <div class="flex gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        <span>Tambah Fasilitas</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 p-5 bg-[#D8E0ED] rounded-xl">
            <div class="grid grid-cols-3 gap-2">
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-2 flex gap-3">
                    <img src="{{ asset('assets/image/image-villa.jpg') }}" alt="" class="w-[100px] rounded-xl h-full object-cover">
                    <div class="grow">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">Saung Tabibuya</h5>
                            <div class="bg-[#F2F4F7] flex gap-1 rounded-full px-2 py-1 items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <span class="text-[12px]">4.95</span>
                            </div>
                        </div>
                        <p class="text-[#808080] text-[10px]">Dibangun di atas air, setiap unit menghadirkan udara segar dan cahaya alami...</p>
                        <div class="flex gap-2 justify-between my-1">
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/person.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">Orang</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/bathroom.png') }}" alt="" class="h-3">
                                <span class="text-[10px]">02 KM</span>
                            </div>
                            <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1">
                                <img src="{{ asset('assets/icon/facility.svg') }}" alt="" class="h-3">
                                <span class="text-[10px]">03 KT</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold">2.5jt/Malam</h5>
                            <div class="rounded-full bg-[#AEEF8B] text-[12px] px-3 py-1">Lihat Detail</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection