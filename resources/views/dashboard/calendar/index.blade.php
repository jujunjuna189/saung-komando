@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="pr-5 py-5">
    <div class="flex gap-2">
        <div class="bg-white rounded-2xl p-5 grow">
            <div class="">
                <h1 class="text-2xl font-semibold">Kalender Penginapan</h1>
            </div>
            <div class="mt-5">
                <div class="flex gap-2 items-center">
                    <div class="px-4 py-2 border rounded-full bg-[#F2F4F7]">
                        <select name="" id="" class="border-none focus:outline-none">
                            <option value="">November 2025</option>
                        </select>
                    </div>
                    <div class="px-4 py-2 border rounded-full bg-[#F2F4F7]">
                        <select name="" id="" class="border-none focus:outline-none">
                            <option value="">Saung Damar</option>
                        </select>
                    </div>
                    <div class="px-4 py-2 rounded-full bg-[#92BAF5] border-[#92BAF5]">
                        <div class="flex gap-1 items-center">
                            <span>Export To Excel</span>
                        </div>
                    </div>
                    <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer open-modal" data-id="modalAdd">
                        <div class="flex gap-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            <span>Tambah Reservasi</span>
                        </div>
                    </button>
                </div>
            </div>
            <div class="mt-7">
                <div id="calendar" class="w-full"></div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 w-[18rem]">
            <h4 class="font-semibold text-2xl">List Pesanan</h4>
            <div class="mt-5 flex gap-2">
                <div class="px-4 py-2 border rounded-lg bg-[#F2F4F7] grow">
                    <select name="" id="" class="border-none focus:outline-none w-full">
                        <option value="">Lunas</option>
                    </select>
                </div>
                <div class="px-4 py-2 border rounded-lg bg-[#F2F4F7] flex items-center justify-center">
                    <span>Filter</span>
                </div>
            </div>
            <div class="mt-4 overflow-y-auto max-h-[41rem] space-y-3">
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
                            <select name="" id="" class="border-none focus:outline-none">
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
                            <select name="" id="" class="border-none focus:outline-none">
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
                            <select name="" id="" class="border-none focus:outline-none">
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

<!-- Add -->
<x-dashboard.modal id="modalAdd" title="Tambah Reservasi" footer="false">
    <div class="grid grid-cols-2 gap-2">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Pemesan<span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" placeholder="Masukan Pemesan" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Fasilitas<span class="text-red-500">*</span></label>
            <select name="" id="" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="">Saung Damar</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div>
            <label for="" class="font-semibold text-[12px]">Jumlah Penginap<span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="">
            <label for="" class="font-semibold text-[12px]">Pembayaran<span class="text-red-500">*</span></label>
            <select name="" id="" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="">Lunas</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-2 mt-3">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Check In<span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" placeholder="Masukan Pemesan" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Check Out<span class="text-red-500">*</span></label>
            <select name="" id="" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="">Saung Damar</option>
            </select>
        </div>
    </div>
    <div class="mt-3">
        <label for="" class="font-semibold text-[12px]">Catatan <i class="text-[#808080]">(Optional)</i></label>
        <textarea name="description" id="description" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
    </div>
    <div class="mt-3">
        <div class="flex gap-2 items-end">
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">Extra Bed <i class="text-[#808080]">(Optional)</i></label>
                <input type="text" name="title" id="title" placeholder="1 Kasur Besar = 250rb" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
            </div>
            <button class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" data-id="modalAdd">Tambah Reservasi</button>
        </div>
    </div>
</x-dashboard.modal>
@endsection

@section('script')
<script>
    let currentYear = 2025;
    let currentMonth = 10; // November (0 = Jan)
    let startDate = null;
    let endDate = null;

    function renderCalendar() {
        const calendar = document.getElementById("calendar");
        calendar.innerHTML = "";

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();
        const prevMonthDays = new Date(currentYear, currentMonth, 0).getDate();

        const grid = document.createElement("div");
        grid.className = "grid grid-cols-7 border border-[#D8E0ED] p-4 bg-white";

        // Header hari
        const days = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
        days.forEach(d => {
            const el = document.createElement("div");
            el.className = "text-center font-semibold py-2";
            el.innerHTML = d;
            grid.appendChild(el);
        });

        // Tambahkan tanggal bulan sebelumnya (disabled + abu)
        for (let i = 0; i < firstDay; i++) {
            const num = prevMonthDays - (firstDay - 1) + i;
            const el = document.createElement("div");

            el.className =
                "h-24 border border-[#D8E0ED] flex items-start justify-end p-3 text-lg text-gray-400 bg-gray-100";

            el.innerHTML = num;
            grid.appendChild(el);
        }

        // Tanggal bulan ini
        for (let d = 1; d <= totalDays; d++) {
            const dateObj = new Date(currentYear, currentMonth, d);
            const el = document.createElement("div");

            el.className =
                "h-24 border border-[#D8E0ED] flex items-start justify-end p-3 text-lg cursor-pointer hover:bg-[#AEEF8B] transition";

            // Highlight range
            if (startDate && endDate && dateObj >= startDate && dateObj <= endDate) {
                el.classList.add("bg-blue-400", "text-white");
            }

            if (startDate && dateObj.getTime() === startDate.getTime()) {
                el.classList.add("bg-blue-600", "text-white");
            }

            if (endDate && dateObj.getTime() === endDate.getTime()) {
                el.classList.add("bg-blue-600", "text-white");
            }

            el.innerHTML = d;
            el.onclick = () => selectDate(dateObj);

            grid.appendChild(el);
        }

        // Tanggal bulan sesudahnya (supaya grid utuh 6 minggu)
        const totalCells = firstDay + totalDays;
        const nextDaysNeeded = 42 - totalCells; // 6 minggu × 7 hari = 42 cell

        for (let i = 1; i <= nextDaysNeeded; i++) {
            const el = document.createElement("div");

            el.className =
                "h-24 border border-[#D8E0ED] flex items-start justify-end p-3 text-lg text-gray-400 bg-gray-100";

            el.innerHTML = i;
            grid.appendChild(el);
        }

        calendar.appendChild(grid);
    }

    function selectDate(selected) {
        if (!startDate) {
            startDate = selected;
            endDate = null;
        }
        else if (startDate && !endDate) {
            if (selected < startDate) {
                endDate = startDate;
                startDate = selected;
            } else {
                endDate = selected;
            }
        }
        else if (startDate && endDate) {
            if (selected < startDate) {
                startDate = selected;
            } else if (selected > endDate) {
                endDate = selected;
            } else {
                startDate = selected;
                endDate = null;
            }
        }

        renderCalendar();
    }

    renderCalendar();
</script>
@endsection
