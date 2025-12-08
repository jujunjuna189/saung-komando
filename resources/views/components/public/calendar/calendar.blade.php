<div class="bg-white md:rounded-2xl p-4 md:p-5 w-full min-w-0 xl:flex-7">
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
    <div class="w-full overflow-x-auto mt-10" id="calendarWrapper">

        <table class="w-full text-center text-sm" id="calendarTable">
            <thead>
                <tr id="dayHeader" class="bg-white"></tr>
            </thead>
            <tbody id="timeRows"></tbody>
        </table>

        <div class="flex justify-between">
            <div class="flex items-center gap-2 mt-4 ml-26">
                <span class="w-4 h-4 bg-[#AEEF8B] rounded"></span>
                <span class="text-sm text-gray-700">Di Sewa</span>
            </div>
            <div class="flex justify-end mt-4">
                <button id="btnExport" class="bg-[#A9C8FF] text-gray-900 px-5 py-2 rounded-full hover:bg-blue-600 hover:text-white transition">
                    Export to Excel
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let weeks = []; // array minggu bulan terpilih
    let currentWeekIndex = 0; // index minggu yang aktif

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
</script>
@endpush