@push('styles')
<style>
    .day {
        width: 44px;
        height: 44px;
        line-height: 44px;
        display: inline-block;
        border-radius: 9999px;
        user-select: none;
    }

    .in-range {
        background: white;
        border: 2px solid #fb7185;
        /* red-ish */
        border-radius: 9999px;
        color: #111827;
    }

    .range-edge {
        background-image: linear-gradient(90deg, #AEEF8B, #AEEF8B);
        color: black !important;
        border-radius: 9999px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .muted {
        color: #d1d5db;
    }

    .weekend {
        color: #ef4444;
    }

    .nav-btn {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9999px;
    }

    .nav-btn:hover {
        background: rgba(0, 0, 0, 0.03);
    }
</style>
@endpush

<div id="dropdown-calendar" class="dropdown-menu hidden max-w-5xl mx-auto p-6 bg-white rounded-3xl shadow-xl absolute left-0 right-0 top-52 md:top-22 z-20">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <button id="prev" class="nav-btn text-pink-500">&lt;</button>
        </div>

        <div class="text-center">
            <div id="current-title" class="md:text-lg font-semibold"></div>
        </div>

        <div class="flex items-center gap-2">
            <button id="next" class="nav-btn text-pink-500">&gt;</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <div class="text-center text-sm font-semibold mb-3" id="m1-title"></div>
            <div class="grid grid-cols-7 gap-1 text-center text-xs font-semibold text-gray-500 mb-2">
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
                <div>Sun</div>
            </div>
            <div id="month1" class="grid grid-cols-7 gap-2 text-center"></div>
        </div>

        <div class="hidden md:block">
            <div class="text-center text-sm font-semibold mb-3" id="m2-title"></div>
            <div class="grid grid-cols-7 gap-1 text-center text-xs font-semibold text-gray-500 mb-2">
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
                <div>Sun</div>
            </div>
            <div id="month2" class="grid grid-cols-7 gap-2 text-center"></div>
        </div>
    </div>

    <form id="dateForm" class="mt-6">
        <input type="hidden" id="startDate" name="startDate" value="">
        <input type="hidden" id="endDate" name="endDate" value="">
        <div class="flex gap-3 items-center">
            <div>Start: <span id="startLabel" class="font-medium">-</span></div>
            <div>End: <span id="endLabel" class="font-medium">-</span></div>
            <button type="button" id="clear" class="ml-auto px-3 py-1 rounded bg-gray-100 text-sm">Clear</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    $(function() {
        let today = new Date();
        // initial months: December 2025 and January 2026
        // Bulan kiri = bulan saat ini
        let leftYear = today.getFullYear();
        let leftMonth = today.getMonth(); // ⬅️ current month (0-based)

        // Bulan kanan = bulan berikutnya
        let rightYear = leftYear;
        let rightMonth = leftMonth + 1;

        if (rightMonth > 11) {
            rightMonth = 0;
            rightYear++;
        }

        // Default: start = today, end = +1 day
        let tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);

        pickStart = toYMD(today.getFullYear(), today.getMonth(), today.getDate());
        pickEnd = toYMD(tomorrow.getFullYear(), tomorrow.getMonth(), tomorrow.getDate());

        function pad(n) {
            return n < 10 ? '0' + n : '' + n;
        }

        function toYMD(y, m, d) {
            return `${y}-${pad(m+1)}-${pad(d)}`;
        }

        function weekdayMondayFirst(date) {
            const w = date.getDay();
            return (w + 6) % 7;
        }

        function daysInMonth(y, m) {
            return new Date(y, m + 1, 0).getDate();
        }

        function monthName(m) {
            return ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][m];
        }

        function renderAll() {
            $('#m1-title').text(`${monthName(leftMonth)} ${leftYear}`);
            $('#m2-title').text(`${monthName(rightMonth)} ${rightYear}`);
            $('#current-title').text(`${monthName(leftMonth)} ${leftYear}    •    ${monthName(rightMonth)} ${rightYear}`);
            renderMonth('#month1', leftYear, leftMonth);
            renderMonth('#month2', rightYear, rightMonth);
            applySelection();
        }

        function renderMonth(sel, y, m) {
            const $c = $(sel);
            $c.empty();
            const first = new Date(y, m, 1);
            const offset = weekdayMondayFirst(first);
            for (let i = 0; i < offset; i++) $c.append('<div></div>');
            const total = daysInMonth(y, m);
            for (let d = 1; d <= total; d++) {
                const ymd = toYMD(y, m, d);
                const dt = new Date(y, m, d);
                const weekend = (dt.getDay() === 0) || (dt.getDay() === 6);
                const cls = `day selectable text-sm mx-auto transition ${weekend ? 'weekend' : ''}`;
                const $el = $(`<div class="${cls}" data-date="${ymd}">${d}</div>`);
                $el.data('year', y).data('month', m);
                $c.append($el);
            }
            // trailing empty cells
            const totalCells = offset + total;
            const rem = (7 - (totalCells % 7)) % 7;
            for (let i = 0; i < rem; i++) $c.append('<div></div>');
        }

        // visuals
        function applySelection() {
            $('.selectable').removeClass('in-range range-edge').css('color', '');
            if (!pickStart && !pickEnd) return;
            if (pickStart && !pickEnd) {
                $(`.selectable[data-date="${pickStart}"]`).addClass('range-edge').css('color', '#fff');
                setHiddenInputs();
                return;
            }
            if (pickStart && pickEnd) {
                const s = pickStart <= pickEnd ? pickStart : pickEnd;
                const e = pickStart <= pickEnd ? pickEnd : pickStart;
                $('.selectable').each(function() {
                    const d = $(this).data('date');
                    if (d >= s && d <= e) {
                        if (d === s || d === e) {
                            $(this).addClass('range-edge').css('color', '#fff');
                        } else {
                            $(this).addClass('in-range');
                        }
                    }
                });
                setHiddenInputs();
            }
        }

        function clearSelection() {
            pickStart = null;
            pickEnd = null;
            $('#startDate').val('');
            $('#endDate').val('');
            $('#startLabel').text('-');
            $('#endLabel').text('-');
            applySelection();
        }

        function setHiddenInputs() {
            if (!pickStart && !pickEnd) {
                $('#startDate').val('');
                $('#endDate').val('');
                $('#startLabel').text('-');
                $('#endLabel').text('-');
                return;
            }
            if (pickStart && !pickEnd) {
                $('#startDate').val(pickStart);
                $('#endDate').val('');
                $('#startLabel').text(pickStart);
                $('#endLabel').text('-');
                $('#checkinDisplay').text(pickStart);
                $('#checkoutDisplay').text('-');
                return;
            }
            if (pickStart && pickEnd) {
                const s = pickStart <= pickEnd ? pickStart : pickEnd;
                const e = pickStart <= pickEnd ? pickEnd : pickStart;
                $('#startDate').val(s);
                $('#endDate').val(e);
                $('#startLabel').text(s);
                $('#endLabel').text(e);
                $('#checkinDisplay').text(s);
                $('#checkoutDisplay').text(e);
            }
        }

        // CLICK behavior: first click => start, second click => end, third click => new start
        $(document).on('click', '.selectable', function(e) {
            const clicked = $(this).data('date');
            if (!pickStart) {
                pickStart = clicked;
                pickEnd = null;
            } else if (pickStart && !pickEnd) {
                // if clicked same as start, deselect end (keep only start)
                if (clicked === pickStart) {
                    // keep as single selection
                    pickEnd = null;
                } else {
                    pickEnd = clicked;
                }
            } else {
                // both exist -> start a new selection with clicked as start
                pickStart = clicked;
                pickEnd = null;
            }
            applySelection();
        });

        // nav
        $('#prev').on('click', function() {
            const l = new Date(leftYear, leftMonth - 1);
            leftYear = l.getFullYear();
            leftMonth = l.getMonth();
            const r = new Date(rightYear, rightMonth - 1);
            rightYear = r.getFullYear();
            rightMonth = r.getMonth();
            renderAll();
        });
        $('#next').on('click', function() {
            const l = new Date(leftYear, leftMonth + 1);
            leftYear = l.getFullYear();
            leftMonth = l.getMonth();
            const r = new Date(rightYear, rightMonth + 1);
            rightYear = r.getFullYear();
            rightMonth = r.getMonth();
            renderAll();
        });

        $('#clear').on('click', clearSelection);

        // initial render
        renderAll();
    });
</script>
@endpush