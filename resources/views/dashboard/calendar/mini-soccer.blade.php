<div id="mini-soccer" style="display: none;">
    <div class="py-3 md:px-5 md:py-5">
        <div class="flex flex-col xl:flex-row gap-4">
            <div class="bg-white md:rounded-2xl p-4 md:p-5 w-full min-w-0 xl:flex-7">
                <div class="flex flex-col gap-4">
                    <h1 class="text-xl md:text-2xl font-semibold">Kalender Mini Soccer</h1>

                    <div class="flex flex-col md:flex-row gap-2 md:items-center md:justify-between">
                        <div class="flex gap-2 w-full md:w-auto md:order-2">
                            <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer hover:bg-[#9de07a] transition open-modal flex-7 md:flex-none flex justify-center" data-id="modalAddMiniSoccer">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="https://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    <span class="text-xs md:text-sm whitespace-nowrap">Tambah Sewa</span>
                                </div>
                            </button>
                        </div>

                        <div class="grid grid-cols-2 gap-2 items-center w-full md:w-auto md:flex md:order-1">
                            <div class="px-3 py-2 border rounded-full bg-[#F2F4F7] w-full md:w-auto">
                                <select name="filter-month" id="filter-month" class="border-none focus:outline-none bg-transparent w-full" onchange="filterMonthChange(event)">
                                    <!-- Generate -->
                                </select>
                            </div>
                            <div id="weekSelector" class="px-3 py-2 border rounded-full bg-[#F2F4F7] w-full md:w-auto">
                                <div class="flex gap-2 items-center whitespace-pre">
                                    <span id="weekLabel">Tanggal 08 - 13</span>
                                    <div class="flex gap-1 items-center">
                                        <svg id="prevWeek" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M15 6l-6 6l6 6" />
                                        </svg>
                                        <svg id="nextWeek" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 6l6 6l-6 6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Calender -->
                    <div class="w-full overflow-x-auto mt-10" id="calendarWrapper">

                        <table class="w-full text-center text-sm" id="calendarTable">
                            <thead>
                                <tr id="dayHeader" class="bg-white"></tr>
                            </thead>
                            <tbody id="timeRows"></tbody>
                        </table>

                        <div class="flex justify-between">
                            <!-- Legend -->
                            <div class="flex items-center gap-2 mt-4 ml-26">
                                <span class="w-4 h-4 bg-[#AEEF8B] rounded"></span>
                                <span class="text-sm text-gray-700">Di Sewa</span>
                            </div>

                            <!-- Export Button -->
                            <div class="flex justify-end mt-4">
                                <button id="btnExport" class="bg-[#A9C8FF] text-gray-900 px-5 py-2 rounded-full hover:bg-blue-600 hover:text-white transition">
                                    Export to Excel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-5 w-full xl:flex-3 shrink-0">
                <h4 class="font-semibold text-xl md:text-2xl">List Pesanan</h4>
                <div class="mt-5 flex gap-2">
                    <div class="px-4 py-2 border rounded-lg bg-[#F2F4F7] grow">
                        <select name="" id="" class="border-none focus:outline-none w-full bg-transparent" onchange="filterStatusChange(event)">
                            <option value="">Disewa</option>
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
    <x-dashboard.modal id="modalAddMiniSoccer" title="Tambah Sewa" justify="justify-center md:justify-end">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">Nama Pemesan<span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
            </div>
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
                <input type="text" name="telp" id="telp" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">Tanggal<span class="text-red-500">*</span></label>
                <input type="date" name="date" id="date" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
            </div>
            <!-- Time range -->
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">Jam<span class="text-red-500">*</span></label>
                <div id="time-picker" class="relative mt-2">
                    <!-- Date display -->
                    <input type="text" id="time" readonly
                        placeholder="Pilih tanggal & jam"
                        class="border rounded-lg w-full p-3 bg-gray-100 cursor-pointer" />

                    <!-- Hidden -->
                    <input type="hidden" id="time_in" name="time_in">
                    <input type="hidden" id="time_out" name="time_out">

                    <!-- Slot jam muncul setelah pilih tanggal -->
                    <div id="hourSlots"
                        class="hidden absolute left-0 mt-1 w-full bg-white border rounded-xl shadow-lg 
           overflow-y-auto max-h-60 z-20 py-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <label for="" class="font-semibold text-[12px]">Catatan <i class="text-[#808080]">(Optional)</i></label>
            <textarea name="note" id="note" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
        </div>
        <x-slot:footer>
            <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
                <button type="button" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" onclick="onSubmit()">Tambah Sewa</button>
            </div>
        </x-slot:footer>
    </x-dashboard.modal>

    <!-- Edit -->
    <x-dashboard.modal id="modalEditMiniSoccer" title="Edit Reservasi" justify="justify-center md:justify-end">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">Nama Pemesan<span class="text-red-500">*</span></label>
                <input type="text" name="name" id="edit-name" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
            </div>
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">No WhatsApp<span class="text-red-500">*</span></label>
                <input type="text" name="telp" id="edit-telp" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">Tanggal<span class="text-red-500">*</span></label>
                <input type="date" name="date" id="edit-date" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
            </div>
            <!-- Time range -->
            <div class="grow">
                <label for="" class="font-semibold text-[12px]">Jam<span class="text-red-500">*</span></label>
                <div id="time-picker" class="relative mt-2">
                    <!-- Date display -->
                    <input type="text" id="edit-time" readonly
                        placeholder="Pilih tanggal & jam"
                        class="border rounded-lg w-full p-3 bg-gray-100 cursor-pointer" />

                    <!-- Hidden -->
                    <input type="hidden" id="edit-time_in" name="time_in">
                    <input type="hidden" id="edit-time_out" name="time_out">

                    <!-- Slot jam muncul setelah pilih tanggal -->
                    <div id="hourSlots"
                        class="hidden absolute left-0 mt-1 w-full bg-white border rounded-xl shadow-lg 
           overflow-y-auto max-h-60 z-20 py-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <label for="" class="font-semibold text-[12px]">Catatan <i class="text-[#808080]">(Optional)</i></label>
            <textarea name="edit-note" id="edit-note" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
        </div>
        <x-slot:footer>
            <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
                <button type="button" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" onclick="onUpdate()">Simpan Perubahan</button>
            </div>
        </x-slot:footer>
    </x-dashboard.modal>

    <!-- Delete -->
    <x-dashboard.modal id="modalDeleteMiniSoccer" title="Hapus Sewa" footer="false" justify="justify-center md:justify-center">
        <div class="text-center md:text-left">
            <p>Apakah anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="mt-5 flex gap-2 justify-end">
            <button type="button" class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 transition close-modal" data-id="modalDeleteMiniSoccer">Batal</button>
            <button type="button" onclick="onDelete()" class="px-4 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600 transition">Hapus</button>
        </div>
    </x-dashboard.modal>
</div>

@push('scripts')
<script data-script="mini-soccer" type="hidden">
    const prefix = "#mini-soccer";
    let events = [];
    let reservationsData = [];
    let weeks = []; // array minggu bulan terpilih
    let currentWeekIndex = 0; // index minggu yang aktif
    let currentEditId = null;
    let currentDeleteId = null;
    // ================== Calendar Module ==================
    const Calendar = (function() {
        var weekStart = new Date();
        const startHour = 16;
        const endHour = 22;
        const dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        var days = [];
        let schedule = []; // bisa diubah dari luar
        let hideTimeout = null;

        function render(prefix) {
            days = [];
            for (let i = 0; i < 7; i++) {
                const d = new Date(weekStart);
                d.setDate(weekStart.getDate() + i);
                days.push({
                    label: dayNames[d.getDay()],
                    date: d.toLocaleDateString("id-ID", {
                        day: "2-digit",
                        month: "short"
                    })
                });
            }

            const dayHeader = $(prefix + " #dayHeader");
            const timeRows = $(prefix + " #timeRows");

            dayHeader.empty();
            timeRows.empty();

            // Header hari
            dayHeader.append(`<th></th>`);
            days.forEach((d) => {
                dayHeader.append(`
            <th class="py-2 font-semibold text-gray-900">
                ${d.label}<br>
                <span class="text-gray-500">${d.date}</span>
            </th>
        `);
            });

            // Baris jam
            for (let h = startHour; h <= endHour; h++) {
                let hourText = `${String(h).padStart(2, '0')}:00`;
                let row = `<tr><td class="py-3 text-gray-700 font-medium">${hourText}</td>`;

                for (let i = 0; i < days.length; i++) {
                    row += `<td class="border h-12 cell relative" data-day="${i}" data-hour="${h}"></td>`;
                }
                row += "</tr>";
                timeRows.append(row);
            }

            // Highlight schedule (sesuai format baru: time_in / time_out)
            schedule.forEach(item => {
                const startHourInt = parseInt(item.time_in.split(":")[0]);
                const endHourInt = parseInt(item.time_out.toString().split(":")[0] || item.time_out); // bisa number atau string

                for (let h = startHourInt; h <= endHourInt; h++) {
                    $(prefix + ` .cell[data-day="${item.dayIndex}"][data-hour="${h}"]`)
                        .addClass("bg-[#AEEF8B]");
                }
            });
        }

        function initClick(prefix) {
            $(document).on("click", prefix + " .cell", function() {
                const dayIndex = $(this).data("day");
                const hour = $(this).data("hour");
                const day = days[dayIndex];
                const timeText = `${String(hour).padStart(2, '0')}:00`;

                // Clear popup & highlight lain
                $(prefix + " .cell").removeClass("ring-2 ring-blue-600");
                $(prefix + " .popup-info").remove();

                // Highlight cell ini
                $(this).addClass("ring-2 ring-blue-600");

                // Tambah popup
                $(this).append(`
                <div class="popup-info absolute left-1/2 bottom-full mb-1 -translate-x-1/2
                    bg-black/30 text-white text-[10px] px-2 py-1 rounded shadow-lg whitespace-nowrap z-10">
                    ${day.label}, ${day.date}<br>${timeText}
                </div>
            `);

                // Hapus otomatis
                if (hideTimeout) clearTimeout(hideTimeout);
                hideTimeout = setTimeout(() => {
                    $(prefix + " .popup-info").fadeOut(200, function() {
                        $(this).remove();
                        $(prefix + " .cell").removeClass("ring-2 ring-blue-600");
                    });
                }, 1000);
            });
        }

        // Public API
        return {
            init: function(prefix, initialSchedule) {
                schedule = initialSchedule || [];
                render(prefix);
                initClick(prefix);
            },
            updateWeekStart: function(prefix, newWeekStart) {
                weekStart = new Date(newWeekStart);
                render(prefix);
            },
            updateSchedule: function(prefix, newSchedule) {
                schedule = newSchedule;
                render(prefix);
            }
        };
    })();

    // week module====================================================================================

    // Function untuk hitung minggu dalam bulan
    function getWeeksOfMonth(year, month) {
        const weeks = [];
        let firstDay = new Date(year, month, 1);
        let lastDay = new Date(year, month + 1, 0);

        let startDate = new Date(firstDay);
        startDate.setDate(startDate.getDate() - (startDate.getDay() === 0 ? 6 : startDate.getDay() - 1)); // Senin pertama

        while (startDate <= lastDay) {
            let endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + 6);
            if (endDate > lastDay) endDate.setDate(lastDay.getDate());

            weeks.push({
                start: new Date(startDate),
                end: new Date(endDate)
            });
            startDate.setDate(startDate.getDate() + 7);
        }

        return weeks;
    }

    // Function utama untuk render week, bisa dipanggil ulang saat bulan berubah
    function renderWeek(year, month, direction = 0) {
        // jika direction != 0, geser minggu
        if (weeks.length === 0 || direction !== 0) {
            currentWeekIndex += direction;
            if (currentWeekIndex < 0) currentWeekIndex = weeks.length - 1;
            if (currentWeekIndex >= weeks.length) currentWeekIndex = 0;
        }

        // kalau bulan berubah, generate minggu baru
        if (!weeks.length || renderWeek.lastMonth !== month || renderWeek.lastYear !== year) {
            weeks = getWeeksOfMonth(year, month);
            currentWeekIndex = 0; // reset ke minggu pertama
            renderWeek.lastMonth = month;
            renderWeek.lastYear = year;
        }

        // render label
        const week = weeks[currentWeekIndex];
        const startDay = String(week.start.getDate()).padStart(2, '0');
        const endDay = String(week.end.getDate()).padStart(2, '0');
        $('#weekLabel').text(`Tanggal ${startDay} - ${endDay}`);
        Calendar.updateWeekStart(prefix, weeks[currentWeekIndex].start);
        dataFilter.date_start = weeks[currentWeekIndex].start;
        dataFilter.date_end = weeks[currentWeekIndex].end;
        getData({
            header: `filter_start=${formatDateYMD(dataFilter.date_start)}&filter_end=${formatDateYMD(dataFilter.date_end)}&status=${dataFilter.status}`,
        });
    }

    // contoh event prev/next
    $('#prevWeek').click(() => renderWeek(renderWeek.lastYear, renderWeek.lastMonth, -1));
    $('#nextWeek').click(() => renderWeek(renderWeek.lastYear, renderWeek.lastMonth, 1));
    // end=============================================================================================


    // Content===========================================================================================
    var dataFilter = {
        month: new Date().getFullYear() + '-' + (parseInt(new Date().getMonth()) + 1),
        date_start: "",
        date_end: "",
        status: "",
    };

    $(document).ready(function() {
        generateMonthOptions();
        Calendar.init(prefix, events);
        renderWeek(new Date().getFullYear(), new Date().getMonth());
        renderWeek(new Date().getFullYear(), new Date().getMonth(), weeks.findIndex(w => new Date() >= new Date(w.start) && new Date() <= new Date(w.end)));
        Calendar.updateWeekStart(prefix, weeks[weeks.findIndex(w => new Date() >= new Date(w.start) && new Date() <= new Date(w.end))].start);
        // Time generate
        initTimePicker("#modalAddMiniSoccer");
    });

    function filterStatusChange(target) {
        dataFilter.status = target.target.value;
    }

    function filterStatus() {
        getData({
            header: `filter_start=${formatDateYMD(dataFilter.date_start)}&filter_end=${formatDateYMD(dataFilter.date_end)}&status=${dataFilter.status}`,
        });
    }

    function toggleDropdown(id) {
        // Hide all other dropdowns
        $('#mini-soccer .dropdown-menu').not(`#mini-soccer #dropdown-${id}`).addClass('hidden');
        // Toggle current
        $(`#mini-soccer #dropdown-${id}`).toggleClass('hidden');
    }
    // contoh rerender saat bulan berubah
    function filterMonthChange(target) {
        const date = target.target.value;
        const parts = date.split('-');
        currentYear = parseInt(parts[0]);
        currentMonth = parseInt(parts[1]) - 1;
        renderWeek(currentYear, currentMonth);
    }

    function generateMonthOptions() {
        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const $select = $(prefix + ' #filter-month');
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
                        <p>Tanggal :</p>
                        <p class="font-semibold">${item.date}</p>
                    </div>
                    <div>
                        <p>Durasi :</p>
                        <p class="font-semibold">${parseTime(item.time_in)} - ${parseTime(item.time_out)} WIB</p>
                    </div>
                </div>
                <div class="mt-3 flex gap-2 text-sm md:text-base">
                    <div class="px-4 py-2 border rounded-xl flex-[7]c bg-[#AEEF8B] border-[#AEEF8B] w-full">
                        <select name="" id="" class="border-none focus:outline-none w-full bg-transparent" onchange="updateStatus('${item.id}', this.value)">
                            <option value="Disewa" ${item.status == 'Disewa' ? 'selected' : ''}>Disewa</option>
                        </select>
                    </div>
                </div>
            </div>
        `;

        return element;
    }

    function getData({
        header = {},
    }) {
        requestServer({
            url: url + '/api/reservation-mini-soccer/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                reservationsData = response.data;
                renderEvents(response.data);
                $('#mini-soccer #container-reservation').empty();
                $.each(response.data, function(i, item) {
                    const element = renderReservation(item);
                    $('#mini-soccer #container-reservation').append(element);
                });
            },
        });
    }

    function renderEvents(data) {
        events = [];
        $.each(data, function(i, item) {
            const dayIndex = getDayIndexByDate(item.date);
            events.push({
                dayIndex: dayIndex,
                time_in: parseTime(item.time_in),
                time_out: parseTime(item.time_out),
            });
        });
        Calendar.updateSchedule(prefix, events);
    }

    function getFormData(prefix = "") {
        const name = $('#mini-soccer #' + prefix + 'name').val();
        const telp = $('#mini-soccer #' + prefix + 'telp').val();
        const date = $('#mini-soccer #' + prefix + 'date').val();
        const time_in = $('#mini-soccer #' + prefix + 'time_in').val();
        const time_out = $('#mini-soccer #' + prefix + 'time_out').val();
        const note = $('#mini-soccer #' + prefix + 'note').val();
        const status = "Disewa";

        const data = {
            name: name,
            telp: telp,
            date: date,
            time_in: time_in,
            time_out: time_out,
            note: note,
            status: status,
        };

        return data;
    }

    function editData(id) {
        currentEditId = id;
        const item = reservationsData.find(x => x.id == id);
        if (!item) return;

        $('#mini-soccer #edit-name').val(item.name);
        $('#mini-soccer #edit-telp').val(item.telp);
        $('#mini-soccer #edit-status').val(item.status);
        $('#mini-soccer #edit-date').val(item.date);
        $('#mini-soccer #edit-time').val(`${parseTime(item.time_in)}-${parseTime(item.time_out)}`);
        $('#mini-soccer #edit-time_in').val(item.time_in);
        $('#mini-soccer #edit-time_out').val(item.time_out);
        $('#mini-soccer #edit-note').val(item.note);

        // Hide dropdown
        $('#mini-soccer .dropdown-menu').addClass('hidden');

        openModal('modalEditMiniSoccer');
    }

    function onUpdate() {
        const data = getFormData("edit-");
        const formData = new FormData();
        formData.append('id', currentEditId);
        formData.append('name', data.name);
        formData.append('telp', data.telp);
        formData.append('date', data.date);
        formData.append('time_in', data.time_in);
        formData.append('time_out', data.time_out);
        formData.append('note', data.note);
        formData.append('status', data.status);

        // Save
        requestServer({
            url: url + '/api/reservation-mini-soccer/update',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({
                    header: `filter_start=${formatDateYMD(dataFilter.date_start)}&filter_end=${formatDateYMD(dataFilter.date_end)}&status=${dataFilter.status}`,
                });
                closeModal('modalEditMiniSoccer');
            },
        });
    }

    function onSubmit() {
        const data = getFormData("modalAddMiniSoccer #");
        const formData = new FormData();
        formData.append('name', data.name);
        formData.append('telp', data.telp);
        formData.append('date', data.date);
        formData.append('time_in', data.time_in);
        formData.append('time_out', data.time_out);
        formData.append('note', data.note);
        formData.append('status', data.status);
        // Save
        requestServer({
            url: url + '/api/reservation-mini-soccer/create',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({
                    header: `filter_start=${formatDateYMD(dataFilter.date_start)}&filter_end=${formatDateYMD(dataFilter.date_end)}&status=${dataFilter.status}`,
                });
                closeModal('modalEditMiniSoccer');
            },
        });
    }

    function updateStatus(id, newStatus) {
        const item = reservationsData.find(x => x.id == id);
        if (!item) return;

        const formData = new FormData();
        formData.append('id', id);
        formData.append('name', item.name);
        formData.append('telp', item.telp);
        formData.append('date', item.date);
        formData.append('time_in', item.time_in);
        formData.append('time_out', item.time_out);
        formData.append('note', item.note);
        formData.append('status', newStatus);

        requestServer({
            url: url + '/api/reservation-mini-soccer/update',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", "Status berhasil diperbarui");
                getData({
                    header: `filter_start=${formatDateYMD(dataFilter.date_start)}&filter_end=${formatDateYMD(dataFilter.date_end)}&status=${dataFilter.status}`,
                });
            },
        });
    }

    function deleteData(id) {
        currentDeleteId = id;
        $('.dropdown-menu').addClass('hidden');
        openModal('modalDeleteMiniSoccer');
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

    function onDelete() {
        const formData = new FormData();
        formData.append('id', currentDeleteId);

        requestServer({
            url: url + '/api/reservation-mini-soccer/delete',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({
                    header: `filter_start=${formatDateYMD(dataFilter.date_start)}&filter_end=${formatDateYMD(dataFilter.date_end)}&status=${dataFilter.status}`,
                });
                closeModal('modalDeleteMiniSoccer');
            },
        });
    }
</script>
@endpush