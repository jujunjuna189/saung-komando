@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="px-3 py-3 md:px-5 md:py-5">
    <div class="flex flex-col xl:flex-row gap-4">
        <div class="bg-white rounded-2xl p-4 md:p-5 grow w-full min-w-0">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <h1 class="text-xl md:text-2xl font-semibold">Kalender Penginapan</h1>

                    <div class="flex gap-2 w-full md:w-auto justify-between">
                        <div class="px-4 py-2 rounded-full bg-[#92BAF5] border-[#92BAF5] cursor-pointer hover:bg-[#7da8e8] transition">
                            <div class="flex gap-1 items-center">
                                <span class="text-xs md:text-sm font-semibold">Export To Excel</span>
                            </div>
                        </div>
                        <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer hover:bg-[#9de07a] transition open-modal" data-id="modalAdd">
                            <div class="flex gap-1 items-center">
                                <svg xmlns="https://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                <span class="text-xs md:text-sm font-semibold">Tambah Reservasi</span>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 items-center">
                    <div class="px-3 py-2 border rounded-full bg-[#F2F4F7] w-full">
                        <select name="filter-month" id="filter-month" class="border-none focus:outline-none bg-transparent w-full" onchange="filterMonthChange(event)">
                            <!-- Generate -->
                        </select>
                    </div>
                    <div class="px-3 py-2 border rounded-full bg-[#F2F4F7] w-full">
                        <select name="filter-facility" id="filter-facility" class="border-none focus:outline-none bg-transparent w-full" onchange="filterFacilityChange(event)">
                            <option value="">Saung Damar</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Legend -->
            <!-- Legend -->
            <div class="mt-6 flex flex-wrap justify-between md:justify-end gap-4 text-xs font-medium">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded bg-green-300"></div>
                    <span>Lunas</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded bg-yellow-300"></div>
                    <span>Baru DP</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded bg-blue-300"></div>
                    <span>Di Lokasi</span>
                </div>
            </div>

            <div class="mt-4 overflow-x-auto">
                <div id="calendar" class="w-full flex-wrap"></div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 w-full xl:w-[24rem] shrink-0">
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
                    <span class="font-semibold text-xs md:text-base">Filter</span>
                </button>
            </div>
            <div class="mt-4 overflow-y-auto max-h-[600px] space-y-3 pr-1" id="container-reservation">
                <!-- Container of reservation -->
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<x-dashboard.modal id="modalAdd" title="Tambah Reservasi" footer="false" justify="justify-center md:justify-end">
    <div class="grid grid-cols-2 gap-2">
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
    <div class="grid grid-cols-2 gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
            <input type="text" name="telp" id="telp" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow w-full">
            <label for="" class="font-semibold text-[12px]">Extra Bed <i class="text-[#808080]">(Optional)</i></label>
            <input type="text" name="extra_bed" id="extra_bed" placeholder="1 Kasur Besar = 250rb" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-2 mt-3">
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
    <div class="grid grid-cols-2 gap-2 mt-3">
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
    <div class="mt-3">
        <button type="button" onclick="onSubmit()" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer w-full" data-id="modalAdd">Tambah Reservasi</button>
    </div>
</x-dashboard.modal>
@endsection

@section('script')
<script>
    let currentYear = 2025;
    let currentMonth = 10; // November (0 = Jan)
    let startDate = null;
    let endDate = null;

    let events = [];

    const categoryColor = {
        A: "bg-green-300",
        B: "bg-blue-300",
        C: "bg-yellow-300",
    };

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
                "h-16 md:h-24 border border-[#D8E0ED] flex items-start justify-end p-1 md:p-3 text-xs md:text-lg cursor-pointer hover:bg-[#AEEF8B] transition relative";

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
        if (!startDate) {
            startDate = selected;
            endDate = null;
        } else if (startDate && !endDate) {
            if (selected < startDate) {
                endDate = startDate;
                startDate = selected;
            } else {
                endDate = selected;
            }
        } else if (startDate && endDate) {
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

    function rerenderCalendar(date) {
        const dateData = new Date(date);
        currentYear = dateData.getFullYear();
        currentMonth = dateData.getMonth();

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
                            <button class="bg-[#F2F4F7] hover:bg-slate-200 text-slate-800 font-semibold py-2 px-4 rounded-lg text-sm w-full text-left transition">
                                Edit Reservasi
                            </button>
                            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg text-sm w-full text-left transition">
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
                    <p>${item.note}</p>
                </div>
                <div class="mt-3 flex gap-2 text-sm md:text-base">
                    <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                        <select name="" id="" class="border-none focus:outline-none w-full bg-transparent">
                            <option value="${item.status}">${item.status}</option>
                            <option value="DP">DP</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Dilokasi">Dilokasi</option>
                        </select>
                    </div>
                    <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED]">
                        <p>${dateDiff(item.check_in, item.check_out)} Hari</p>
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

    function form() {
        const name = $('#name').val();
        const facilityId = $('#facility_id').val();
        const telp = $('#telp').val();
        const totalGuest = $('#total_guest').val();
        const status = $('#status').val();
        const checkIn = $('#check_in').val();
        const checkOut = $('#check_out').val();
        const note = $('#note').val();
        const extraBed = $('#extra_bed').val();

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
