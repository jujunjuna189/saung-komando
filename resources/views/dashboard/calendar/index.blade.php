@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-3 md:px-5 md:py-5">
    <div class="flex flex-col xl:flex-row gap-4">
        <div class="bg-white md:rounded-2xl p-4 md:p-5 w-full min-w-0 xl:flex-7">
            <div class="flex flex-col gap-4">
                <h1 class="text-xl md:text-2xl font-semibold">Kalender Penginapan</h1>

                <div class="flex flex-col md:flex-row gap-2 md:items-center md:justify-between">
                    <div class="flex gap-2 w-full md:w-auto md:order-2">
                        <div class="px-4 py-2 rounded-full bg-[#92BAF5] border-[#92BAF5] cursor-pointer hover:bg-[#7da8e8] transition flex-3 md:flex-none flex justify-center">
                            <div class="flex gap-1 items-center">
                                <span class="text-xs md:text-sm whitespace-nowrap">Export To Excel</span>
                            </div>
                        </div>
                        <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer hover:bg-[#9de07a] transition open-modal flex-7 md:flex-none flex justify-center" data-id="modalAdd">
                            <div class="flex gap-1 items-center">
                                <svg xmlns="https://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                <span class="text-xs md:text-sm whitespace-nowrap">Tambah Reservasi</span>
                            </div>
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-2 items-center w-full md:w-auto md:flex md:order-1">
                        <div class="px-3 py-2 border rounded-full bg-[#F2F4F7] w-full md:w-auto">
                            <select name="filter-month" id="filter-month" class="border-none focus:outline-none bg-transparent w-full" onchange="filterMonthChange(event)">
                                <!-- Generate -->
                            </select>
                        </div>
                        <div class="px-3 py-2 border rounded-full bg-[#F2F4F7] w-full md:w-auto">
                            <select name="filter-facility" id="filter-facility" class="border-none focus:outline-none bg-transparent w-full" onchange="filterFacilityChange(event)">
                                <!-- Genrate -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-reverse md:flex-col">
                <div class="mt-4 overflow-x-auto">
                    <div id="calendar" class="w-full flex-wrap"></div>
                </div>
                <div class="mt-5 md:mt-3 flex flex-wrap justify-end md:justify-end gap-4 text-xs font-medium">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded bg-green-300"></div>
                        <span>Lunas</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded bg-orange-300"></div>
                        <span>Baru DP</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded bg-blue-300"></div>
                        <span>Di Lokasi</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 w-full xl:flex-3 shrink-0">
            <h4 class="font-semibold text-xl md:text-2xl">List Pesanan</h4>
            <div class="mt-5 flex gap-2">
                <div class="px-4 py-2 border rounded-lg bg-[#F2F4F7] grow">
                    <select name="" id="" class="border-none focus:outline-none w-full bg-transparent" onchange="filterStatusChange(event)">
                        <option value="">Semua</option>
                        <option value="DP">DP</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Dilokasi">Dilokasi</option>
                    </select>
                </div>
                <button type="button" onclick="filterStatus()" class="px-4 py-2 border rounded-lg bg-[#F2F4F7] flex items-center justify-center hover:bg-slate-200 transition">
                    <span class="text-xs md:text-base">Filter</span>
                </button>
            </div>
            <div class="mt-4 overflow-y-auto max-h-[600px] space-y-3 pr-1" id="container-reservation">
                <!-- Container of reservation -->
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<x-dashboard.modal id="modalAdd" title="Tambah Reservasi" justify="justify-center md:justify-end">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Pemesan<span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Fasilitas<span class="text-red-500">*</span></label>
            <select name="facility_id" id="facility_id" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <!-- From data facility -->
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
            <input type="text" name="telp" id="telp" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow w-full">
            <label for="" class="font-semibold text-[12px]">Extra Bed <i class="text-[#808080]">(Optional)</i></label>
            <select name="extra_bed" id="extra_bed" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="">-</option>
                <option value="1 kasur kecil = 150rb">1 kasur kecil = 150rb</option>
                <option value="1 kasur besar = 250rb">1 kasur besar = 250rb</option>
                <option value="2 kasur kecil = 300rb">2 kasur kecil = 300rb</option>
                <option value="2 kasur besar = 500rb">2 kasur besar = 500rb</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">Jumlah Penginap<span class="text-red-500">*</span></label>
            <input type="number" name="total_guest" id="total_guest" placeholder="0" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="">
            <label for="" class="font-semibold text-[12px]">Pembayaran<span class="text-red-500">*</span></label>
            <select name="status" id="status" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="DP">DP</option>
                <option value="Lunas">Lunas</option>
                <option value="Dilokasi">Dilokasi</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Check In<span class="text-red-500">*</span></label>
            <input type="date" name="check_in" id="check_in" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Check Out<span class="text-red-500">*</span></label>
            <input type="date" name="check_out" id="check_out" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="mt-3">
        <label for="" class="font-semibold text-[12px]">Catatan <i class="text-[#808080]">(Optional)</i></label>
        <textarea name="note" id="note" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
    </div>
    <x-slot:footer>
        <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
            <button type="button" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" onclick="onSubmit()">Tambah Reservasi</button>
        </div>
    </x-slot:footer>
</x-dashboard.modal>

<!-- Edit -->
<x-dashboard.modal id="modalEdit" title="Edit Reservasi" justify="justify-center md:justify-end">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Pemesan<span class="text-red-500">*</span></label>
            <input type="text" name="name" id="edit-name" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Fasilitas<span class="text-red-500">*</span></label>
            <select name="facility_id" id="edit-facility_id" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <!-- From data facility -->
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
            <input type="text" name="telp" id="edit-telp" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow w-full">
            <label for="" class="font-semibold text-[12px]">Extra Bed <i class="text-[#808080]">(Optional)</i></label>
            <select name="extra_bed" id="edit-extra_bed" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="">-</option>
                <option value="1 kasur kecil = 150rb">1 kasur kecil = 150rb</option>
                <option value="1 kasur besar = 250rb">1 kasur besar = 250rb</option>
                <option value="2 kasur kecil = 300rb">2 kasur kecil = 300rb</option>
                <option value="2 kasur besar = 500rb">2 kasur besar = 500rb</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">Jumlah Penginap<span class="text-red-500">*</span></label>
            <input type="number" name="total_guest" id="edit-total_guest" placeholder="0" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="">
            <label for="" class="font-semibold text-[12px]">Pembayaran<span class="text-red-500">*</span></label>
            <select name="status" id="edit-status" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="DP">DP</option>
                <option value="Lunas">Lunas</option>
                <option value="Dilokasi">Dilokasi</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Check In<span class="text-red-500">*</span></label>
            <input type="date" name="check_in" id="edit-check_in" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Check Out<span class="text-red-500">*</span></label>
            <input type="date" name="check_out" id="edit-check_out" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="mt-3">
        <label for="" class="font-semibold text-[12px]">Catatan <i class="text-[#808080]">(Optional)</i></label>
        <textarea name="note" id="edit-note" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
    </div>
    <x-slot:footer>
        <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
            <button type="button" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" onclick="onUpdate()">Simpan Perubahan</button>
        </div>
    </x-slot:footer>
</x-dashboard.modal>

<!-- Delete -->
<x-dashboard.modal id="modalDelete" title="Hapus Reservasi" footer="false" justify="justify-center md:justify-center">
    <div class="text-center md:text-left">
        <p>Apakah anda yakin ingin menghapus data ini?</p>
    </div>
    <div class="mt-5 flex gap-2 justify-end">
        <button type="button" class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 transition close-modal" data-id="modalDelete">Batal</button>
        <button type="button" onclick="onDelete()" class="px-4 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600 transition">Hapus</button>
    </div>
</x-dashboard.modal>
@endsection

@section('script')
<script>
    const now = new Date();
    let currentYear = now.getFullYear();
    let currentMonth = now.getMonth();
    let startDate = null;
    let endDate = null;

    let events = [];
    let reservationsData = [];
    let currentEditId = null;
    let currentDeleteId = null;

    const categoryColor = {
        A: "bg-green-300",
        B: "bg-blue-300",
        C: "bg-orange-300",
    };

    function dateDiff(start, end) {
        const date1 = new Date(start);
        const date2 = new Date(end);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        return diffDays;
    }

    function getCountdown(date) {
        const today = new Date();
        const checkIn = new Date(date);
        // Set to midnight for accurate day calculation
        today.setHours(0, 0, 0, 0);
        checkIn.setHours(0, 0, 0, 0);
        const diffTime = checkIn - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        if (diffDays > 0) {
            return `H-${diffDays}`;
        } else if (diffDays === 0) {
            return 'Hari H';
        } else {
            return `H+${Math.abs(diffDays)}`;
        }
    }

    function renderCalendar() {
        const calendar = document.getElementById("calendar");
        calendar.innerHTML = "";

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();
        const prevMonthDays = new Date(currentYear, currentMonth, 0).getDate();

        const grid = document.createElement("div");
        grid.className = "grid grid-cols-7 border border-[#D8E0ED] p-1 md:p-4 bg-white w-full";

        // Header hari
        const days = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
        days.forEach(d => {
            const el = document.createElement("div");
            el.className = "text-center font-semibold py-2 text-xs md:text-base";
            el.innerHTML = d;
            grid.appendChild(el);
        });

        // Tambahkan tanggal bulan sebelumnya (disabled + abu)
        for (let i = 0; i < firstDay; i++) {
            const num = prevMonthDays - (firstDay - 1) + i;
            const el = document.createElement("div");

            el.className =
                "h-16 md:h-24 border border-[#D8E0ED] flex items-start justify-end p-1 md:p-3 text-xs md:text-lg text-gray-400 bg-gray-100";

            el.innerHTML = num;
            grid.appendChild(el);
        }

        // Tanggal bulan ini
        for (let d = 1; d <= totalDays; d++) {
            const dateObj = new Date(currentYear, currentMonth, d);
            const dateStr = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
            const el = document.createElement("div");

            el.className =
                "h-16 md:h-24 border border-[#D8E0ED] flex items-start justify-end p-1 md:p-3 text-xs md:text-lg cursor-pointer hover:bg-gray-200 transition relative";

            events.forEach(ev => {

                const inDate = new Date(ev.check_in);
                const outDate = new Date(ev.check_out);

                // Jika tanggal ini berada di rentang check_in → check_out
                if (dateObj >= inDate && dateObj <= outDate) {

                    // beri warna kategori
                    if (ev.category && categoryColor[ev.category]) {
                        el.classList.add(categoryColor[ev.category]);
                    }

                    // check IN
                    if (dateStr === ev.check_in) {
                        const badge = document.createElement("span");
                        badge.className = "absolute bottom-1 left-1 bg-green-600 text-white text-[8px] md:text-[10px] font-semibold px-1 rounded";
                        badge.innerHTML = "IN";
                        el.appendChild(badge);
                    }

                    // check OUT
                    if (dateStr === ev.check_out) {
                        const badge = document.createElement("span");
                        badge.className = "absolute bottom-1 left-1 bg-red-600 text-white text-[8px] md:text-[10px] font-semibold px-1 rounded";
                        badge.innerHTML = "OUT";
                        el.appendChild(badge);
                    }
                }
            });

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
                "h-16 md:h-24 border border-[#D8E0ED] flex items-start justify-end p-1 md:p-3 text-xs md:text-lg text-gray-400 bg-gray-100";

            el.innerHTML = i;
            grid.appendChild(el);
        }

        calendar.appendChild(grid);
    }

    function selectDate(selected) {
        startDate = selected;
        endDate = null;

        renderCalendar();

        // Filter List
        const selectedStr = selected.getFullYear() + '-' + String(selected.getMonth() + 1).padStart(2, '0') + '-' + String(selected.getDate()).padStart(2, '0');

        const filteredData = reservationsData.filter(item => {
            const checkInStr = String(item.check_in).substring(0, 10);
            const checkOutStr = String(item.check_out).substring(0, 10);
            const match = selectedStr >= checkInStr && selectedStr <= checkOutStr;
            return match;
        });

        $('#container-reservation').empty();
        if (filteredData.length > 0) {
            $.each(filteredData, function(i, item) {
                const element = renderReservation(item);
                $('#container-reservation').append(element);
            });
        } else {
            $('#container-reservation').html('<div class="text-center text-gray-500 py-5">Tidak ada reservasi pada tanggal ini</div>');
        }
    }

    function rerenderCalendar(date) {
        const parts = date.split('-');
        currentYear = parseInt(parts[0]);
        currentMonth = parseInt(parts[1]) - 1;

        renderCalendar();
    }

    renderCalendar();
</script>
<script>
    $(document).ready(function() {
        generateMonthOptions();
        getFacility({});
        getData({});

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown-container').length) {
                $('.dropdown-menu').addClass('hidden');
            }
        });
    });

    function toggleDropdown(id) {
        // Hide all other dropdowns
        $('.dropdown-menu').not(`#dropdown-${id}`).addClass('hidden');
        // Toggle current
        $(`#dropdown-${id}`).toggleClass('hidden');
    }

    function renderFasility({
        value,
        category
    }) {
        const element = `
            <option value="${value}">${category}</option>
        `;

        return element;
    }

    function renderReservation(item) {
        const element = `
            <div class="bg-[#F2F4F7] rounded-lg p-5 relative">
                <div class="flex justify-between items-center">
                    <h6 class="font-semibold text-base md:text-lg">${item.facility?.title ?? ""}</h6>
                    <div class="relative dropdown-container">
                        <div class="flex justify-end items-center cursor-pointer p-1 rounded-full hover:bg-gray-200 transition" onclick="toggleDropdown('${item.id}')">
                            <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                        </div>
                        <!-- Dropdown Menu -->
                        <div id="dropdown-${item.id}" class="dropdown-menu hidden absolute right-0 top-8 bg-white shadow-lg rounded-xl p-2 z-10 flex flex-col gap-2 min-w-[150px] border border-slate-100">
                            <button class="bg-[#F2F4F7] hover:bg-slate-200 text-slate-800 font-semibold py-2 px-4 rounded-lg text-sm w-full text-left transition" onclick="editData('${item.id}')">
                                Edit Reservasi
                            </button>
                            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg text-sm w-full text-left transition" onclick="deleteData('${item.id}')">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <hr class="border-[#808080] my-3" />
                <div class="flex justify-between text-sm md:text-base">
                    <span class="font-semibold">${item.name}</span>
                    <span class="font-semibold text-end">${item.telp}</span>
                </div>
                <div class="mt-3 grid grid-cols-2 text-sm md:text-base">
                    <div>
                        <p>Check In :</p>
                        <p class="font-semibold">${dateFormat(item.check_in)}</p>
                    </div>
                    <div class="text-end">
                        <p>Check Out :</p>
                        <p class="font-semibold">${dateFormat(item.check_out)}</p>
                    </div>
                </div>
                <div class="mt-3 text-sm md:text-base">
                    <p>Catatan :</p>
                    <p>${item.note ?? '-'}</p>
                </div>
                <div class="mt-3 flex gap-2 text-sm md:text-base">
                    <div class="px-4 py-2 border rounded-xl flex-[7] ${item.status == 'Lunas' ? 'bg-green-300 border-green-300' : item.status == 'DP' ? 'bg-orange-300 border-orange-300' : 'bg-blue-300 border-blue-300'}">
                        <select name="" id="" class="border-none focus:outline-none w-full bg-transparent" onchange="updateStatus('${item.id}', this.value)">
                            <option value="DP" ${item.status == 'DP' ? 'selected' : ''}>DP</option>
                            <option value="Lunas" ${item.status == 'Lunas' ? 'selected' : ''}>Lunas</option>
                            <option value="Dilokasi" ${item.status == 'Dilokasi' ? 'selected' : ''}>Dilokasi</option>
                        </select>
                    </div>
                    <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED] flex-[3]">
                        <p>${getCountdown(item.check_in)}</p>
                    </div>
                </div>
            </div>
        `;

        return element;
    }

    function generateMonthOptions() {
        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const $select = $('#filter-month');
        $select.empty();

        const now = new Date();
        const currentYear = now.getFullYear();
        const currentMonth = now.getMonth(); // 0-based

        // Loop dari +12 hingga -11 (24 bulan total), sehingga urutan: paling depan -> paling belakang
        for (let offset = 12; offset >= -11; offset--) {
            const dt = new Date(currentYear, currentMonth + offset, 1);
            const y = dt.getFullYear();
            const m = dt.getMonth(); // 0..11

            const label = `${months[m]} ${y}`;
            const value = `${y}-${String(m + 1).padStart(2, '0')}`;

            $select.append(`<option value="${value}">${label}</option>`);
        }
        $select.val(`${currentYear}-${String(currentMonth + 1).padStart(2, '0')}`);
    }

    var dataFilter = {
        month: "",
        facility: "",
        status: "",
    };

    function filterMonthChange(target) {
        dataFilter.month = target.target.value;
        getData({
            header: `filter_month=${dataFilter.month}&facility_id=${dataFilter.facility}&status=${dataFilter.status}`,
        });
        // Render calendar month
        rerenderCalendar(target.target.value);
    }

    function filterFacilityChange(target) {
        dataFilter.facility = target.target.value;
        getData({
            header: `filter_month=${dataFilter.month}&facility_id=${dataFilter.facility}&status=${dataFilter.status}`,
        });
    }

    function filterStatusChange(target) {
        dataFilter.status = target.target.value;
    }

    function filterStatus() {
        getData({
            header: `filter_month=${dataFilter.month}&facility_id=${dataFilter.facility}&status=${dataFilter.status}`,
        });
    }

    function getFacility({
        header = {},
    }) {
        requestServer({
            url: url + '/api/facility/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                $('#modalAdd #facility_id').empty();
                $('#modalEdit #edit-facility_id').empty();
                $('#filter-facility').empty();
                var element = renderFasility({
                    value: "",
                    category: "Semua"
                });
                $('#filter-facility').append(element);
                $.each(response.data, function(i, item) {
                    const element = renderFasility({
                        value: item.id,
                        category: item.title,
                    });
                    $('#modalAdd #facility_id').append(element);
                    $('#modalEdit #edit-facility_id').append(element);
                    $('#filter-facility').append(element);
                });
            },
        });
    }

    function getData({
        header = {},
    }) {
        requestServer({
            url: url + '/api/reservation/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                reservationsData = response.data;
                renderEvents(response.data);
                $('#container-reservation').empty();
                $.each(response.data, function(i, item) {
                    const element = renderReservation(item);
                    $('#container-reservation').append(element);
                });
            },
        });
    }

    function renderEvents(data) {
        events = [];
        $.each(data, function(i, item) {
            events.push({
                check_in: item.check_in,
                check_out: item.check_out,
                category: item.status == "Lunas" ? "A" : item.status == "DP" ? "C" : item.status == "Dilokasi" ? "B" : "",
            });
        });
        renderCalendar();
    }

    function getFormData(prefix = "") {
        const name = $('#' + prefix + 'name').val();
        const facilityId = $('#' + prefix + 'facility_id').val();
        const telp = $('#' + prefix + 'telp').val();
        const totalGuest = $('#' + prefix + 'total_guest').val();
        const status = $('#' + prefix + 'status').val();
        const checkIn = $('#' + prefix + 'check_in').val();
        const checkOut = $('#' + prefix + 'check_out').val();
        const note = $('#' + prefix + 'note').val();
        const extraBed = $('#' + prefix + 'extra_bed').val();

        const data = {
            name: name,
            facilityId: facilityId,
            telp: telp,
            totalGuest: totalGuest,
            status: status,
            checkIn: checkIn,
            checkOut: checkOut,
            note: note,
            extraBed: extraBed,
        };

        return data;
    }

    function form() {
        return getFormData("");
    }

    function openModal(id) {
        const modal = $('#' + id);
        const box = modal.find('> div');

        modal.removeClass('hidden').addClass('flex');
        setTimeout(() => {
            modal.removeClass('opacity-0');
            box.removeClass('scale-95');
            box.removeClass('-mx-[100px]');
            box.addClass('md:mx-4');
        }, 10);
    }

    function editData(id) {
        currentEditId = id;
        const item = reservationsData.find(x => x.id == id);
        if (!item) return;

        $('#edit-name').val(item.name);
        $('#edit-facility_id').val(item.facility_id);
        $('#edit-telp').val(item.telp);
        $('#edit-total_guest').val(item.total_guest);
        $('#edit-status').val(item.status);
        $('#edit-check_in').val(item.check_in.split(' ')[0]);
        $('#edit-check_out').val(item.check_out.split(' ')[0]);
        $('#edit-note').val(item.note);
        $('#edit-extra_bed').val(item.extra_bed);

        // Hide dropdown
        $('.dropdown-menu').addClass('hidden');

        openModal('modalEdit');
    }

    function onUpdate() {
        const data = getFormData("edit-");
        const formData = new FormData();
        formData.append('id', currentEditId);
        formData.append('name', data.name);
        formData.append('facility_id', data.facilityId);
        formData.append('telp', data.telp);
        formData.append('total_guest', data.totalGuest);
        formData.append('status', data.status);
        formData.append('check_in', data.checkIn);
        formData.append('check_out', data.checkOut);
        formData.append('note', data.note);
        formData.append('extra_bed', data.extraBed);

        // Save
        requestServer({
            url: url + '/api/reservation/update',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({
                    header: `filter_month=${dataFilter.month}&facility_id=${dataFilter.facility}&status=${dataFilter.status}`,
                });
                closeModal('modalEdit');
            },
        });
    }

    function updateStatus(id, newStatus) {
        const item = reservationsData.find(x => x.id == id);
        if (!item) return;

        const formData = new FormData();
        formData.append('id', id);
        formData.append('name', item.name);
        formData.append('facility_id', item.facility_id);
        formData.append('telp', item.telp);
        formData.append('total_guest', item.total_guest);
        formData.append('status', newStatus);
        // Ensure date format matches what the API expects (YYYY-MM-DD)
        formData.append('check_in', item.check_in.split(' ')[0]);
        formData.append('check_out', item.check_out.split(' ')[0]);
        formData.append('note', item.note || '');
        formData.append('extra_bed', item.extra_bed || '');

        requestServer({
            url: url + '/api/reservation/update',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", "Status berhasil diperbarui");
                getData({
                    header: `filter_month=${dataFilter.month}&facility_id=${dataFilter.facility}&status=${dataFilter.status}`,
                });
            },
        });
    }

    function deleteData(id) {
        currentDeleteId = id;
        $('.dropdown-menu').addClass('hidden');
        openModal('modalDelete');
    }

    function onDelete() {
        const formData = new FormData();
        formData.append('id', currentDeleteId);

        requestServer({
            url: url + '/api/reservation/delete',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({
                    header: `filter_month=${dataFilter.month}&facility_id=${dataFilter.facility}&status=${dataFilter.status}`,
                });
                closeModal('modalDelete');
            },
        });
    }

    function onSubmit() {
        const data = form();
        const formData = new FormData();
        formData.append('name', data.name);
        formData.append('facility_id', data.facilityId);
        formData.append('telp', data.telp);
        formData.append('total_guest', data.totalGuest);
        formData.append('status', data.status);
        formData.append('check_in', data.checkIn);
        formData.append('check_out', data.checkOut);
        formData.append('note', data.note);
        formData.append('extra_bed', data.extraBed);
        // Save
        requestServer({
            url: url + '/api/reservation/create',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({
                    header: `filter_month=${dataFilter.month}&facility_id=${dataFilter.facility}&status=${dataFilter.status}`,
                });
                closeModal('modalAdd');
            },
        });
    }
</script>
@endsection