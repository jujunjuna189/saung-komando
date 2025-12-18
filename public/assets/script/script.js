const set_zero = (value) => {
    return value < 10 ? '0' + value : value;
}

const dateFormat = (date) => {
    var date = new Date(date);
    return date.getFullYear() + '-' + set_zero(date.getMonth() + 1) + '-' + set_zero(date.getDate());
}

function dateDiff(start, end) {
    const startDate = new Date(start);
    const endDate = new Date(end);

    const diffTime = endDate - startDate;

    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    return diffDays;
}

// Request category
const getCategory = ({ onSuccess }) => {
    requestServer({
        url: url + '/api/facility/category/show',
        type: "GET",
        onLoader: false,
        onSuccess: function (response) {
            onSuccess(response);
        },
    });
}

// Request to server
const requestServer = ({ url = '', type = 'post', data = [], onLoader = true, onSuccess }) => {
    $.ajax({
        url: url,
        type: type,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        headers: {
            'X-CSRF-TOKEN': token,
        },
        beforeSend: function () {
            if (onLoader) {
                showLoading();
            }
        },
        success: function (data) {
            onSuccess(data);
        },
        error: function (error) {
            showToast("error", "Gagal", "Terjadi kesalahan!");
            console.log(error);
        }
    });
}

function runSliders(containerSelector, autoplayTime = 5000) {
    const container = $(containerSelector);
    const track = container.find('.slider-track');
    const slides = container.find('.slider-image');

    // clone first slide
    const firstClone = slides.eq(0).clone();
    track.append(firstClone);

    let index = 0;
    let interval;

    function showSlide(i) {
        track.css('transition', 'transform 0.7s');
        track.css('transform', `translateX(${-i * 100}%)`);
    }

    function next() {
        index++;
        showSlide(index);

        if (index === slides.length) {
            setTimeout(() => {
                track.css('transition', 'none');
                index = 0;
                track.css('transform', 'translateX(0%)');
            }, 710);
        }
    }

    function prev() {
        if (index === 0) {
            index = slides.length;
            track.css('transition', 'none');
            track.css('transform', `translateX(${-index * 100}%)`);

            setTimeout(() => {
                track.css('transition', 'transform 0.7s');
                index--;
                showSlide(index);
            }, 10);
        } else {
            index--;
            showSlide(index);
        }
    }

    function start() {
        interval = setInterval(next, autoplayTime);
    }

    function reset() {
        clearInterval(interval);
        start();
    }

    // tombol
    container.find('.slider-next').click(function (e) {
        e.preventDefault();
        next();
        reset();
    });

    container.find('.slider-prev').click(function (e) {
        e.preventDefault();
        prev();
        reset();
    });

    start();
}

function initFacilitySlider(trackId, prevId, nextId, dotsId) {
    const $track = $(`#${trackId}`);
    const $container = $track.parent();
    const $dotsContainer = $(`#${dotsId}`);
    let index = 0;

    function updateSlider() {
        const containerWidth = $container.width();
        const totalWidth = $track[0].scrollWidth;
        const visibleItems = Math.floor(containerWidth / $track.children().first().outerWidth(true));
        const maxTranslate = totalWidth - containerWidth;

        const itemWidth = $track.children().first().outerWidth(true);
        const totalItems = $track.children().length;
        const maxIndex = totalItems - visibleItems;

        // Bound index
        if (index < 0) index = 0;
        if (index > maxIndex) index = maxIndex;

        // Hitung translateX
        let translateX = (index * itemWidth);
        if (translateX > maxTranslate) translateX = maxTranslate;

        $track.css('transform', `translateX(-${translateX}px)`);

        // Update dots
        $dotsContainer.empty();
        for (let i = 0; i <= maxIndex; i++) {
            const dotClass = i === index ? 'bg-black' : 'bg-gray-400';
            $dotsContainer.append(`<div class="w-2 h-2 rounded-full cursor-pointer ${dotClass} transition-colors"></div>`);
        }

        // Dot click
        $dotsContainer.children().click(function () {
            index = $(this).index();
            updateSlider();
        });

        // Disable buttons jika sudah di batas
        $(`#${prevId}`).prop('disabled', index === 0);
        $(`#${nextId}`).prop('disabled', index === maxIndex);
    }

    // Prev / Next
    $(`#${prevId}`).click(() => {
        index--;
        updateSlider();
    });
    $(`#${nextId}`).click(() => {
        index++;
        updateSlider();
    });

    // Responsive: reset slider saat resize
    $(window).resize(() => updateSlider());

    // Inisialisasi
    updateSlider();
}

function getYouTubeCode(url) {
    let videoCode = null;

    // Untuk short link youtu.be
    if (url.includes('youtu.be')) {
        videoCode = url.split('/').pop().split('?')[0]; // ambil bagian setelah /
    }
    // Untuk full link youtube.com
    else if (url.includes('youtube.com')) {
        const urlObj = new URL(url);
        videoCode = urlObj.searchParams.get('v');
    }

    return videoCode;
}

function copyToClipboard(text, targetSelector = null) {
    navigator.clipboard.writeText(text).then(() => {

        // efek background tombol (opsional)
        if (targetSelector) {
            const el = document.querySelector(targetSelector);
            if (el) {
                const originalBg = el.style.backgroundColor;
                el.style.backgroundColor = "#D1FFD6";
                setTimeout(() => {
                    el.style.backgroundColor = originalBg || "#EDEFF1";
                }, 800);
            }
        }

        // Alert kecil
        showCopyAlert({ text: "Link Disalin" });
    }).catch(err => {
        showCopyAlert({ text: "Gagal Salin Link" });
    });
}

function showCopyAlert({ text = "Tersalin!" }) {
    // Cek kalau alert masih ada, hapus dulu
    let oldAlert = document.querySelector(".copy-alert");
    if (oldAlert) oldAlert.remove();

    const alertDiv = document.createElement("div");
    alertDiv.className = "copy-alert";
    alertDiv.innerText = text;

    Object.assign(alertDiv.style, {
        position: "fixed",
        bottom: "20px",
        left: "50%",
        transform: "translateX(-50%)",
        background: "#111",
        color: "#fff",
        padding: "6px 20px",
        borderRadius: "100px",
        fontSize: "13px",
        fontWeight: "500",
        zIndex: "9999",
        opacity: "0",
        transition: "opacity 0.3s ease"
    });

    document.body.appendChild(alertDiv);

    // Fade in
    setTimeout(() => {
        alertDiv.style.opacity = "1";
    }, 10);

    // Fade out & remove
    setTimeout(() => {
        alertDiv.style.opacity = "0";
        setTimeout(() => alertDiv.remove(), 300);
    }, 1500);
}

function initDateRangePicker(
    inputSelector,
    popupSelector,
    checkinSelector = null,
    checkoutSelector = null,
    bookedRanges = [],
    callbacks = {}
) {
    const { onPrevMonth = null, onNextMonth = null } = callbacks;

    let $input = $(inputSelector);
    let $popup = $(popupSelector);
    let $checkin = checkinSelector ? $(checkinSelector) : null;
    let $checkout = checkoutSelector ? $(checkoutSelector) : null;

    let startDate = null;
    let endDate = null;
    let currentDate = new Date();

    // 🔥 STATE BOOKING (DINAMIS)
    let bookedData = bookedRanges;

    /* ===============================
        EVENT OPEN INPUT
    =============================== */
    $input.on("click", function (e) {
        e.stopPropagation();
        renderCalendar(currentDate);
        $popup.removeClass("hidden");
    });

    /* ===============================
        BOOKING CHECK
    =============================== */
    function isBooked(date) {
        return bookedData.some(range => {
            let start = new Date(range.start);
            let end = new Date(range.end);

            start.setHours(0, 0, 0, 0);
            end.setHours(23, 59, 59, 999);

            return date >= start && date <= end;
        });
    }

    function hasBookingBetween(start, end) {
        let from = new Date(start);
        let to = new Date(end);
        if (to < from) [from, to] = [to, from];

        for (let d = new Date(from); d <= to; d.setDate(d.getDate() + 1)) {
            if (isBooked(new Date(d))) return true;
        }
        return false;
    }

    /* ===============================
        RENDER CALENDAR
    =============================== */
    function renderCalendar(date) {
        $popup.html("");

        let month = date.getMonth();
        let year = date.getFullYear();
        let firstDay = new Date(year, month, 1).getDay();
        let lastDate = new Date(year, month + 1, 0).getDate();
        let monthName = date.toLocaleDateString("id-ID", {
            month: "long",
            year: "numeric"
        });

        $popup.append(`
            <div class="flex justify-between items-center mb-2 px-2">
                <button id="prevMonth" class="px-2 py-1">◀</button>
                <span class="font-semibold">${monthName}</span>
                <button id="nextMonth" class="px-2 py-1">▶</button>
            </div>
        `);

        let $cal = $('<div class="grid grid-cols-7 gap-1 p-2"></div>');

        for (let i = 0; i < firstDay; i++) {
            $cal.append("<span></span>");
        }

        for (let d = 1; d <= lastDate; d++) {
            let chosen = new Date(year, month, d);
            let disabled = isBooked(chosen);

            let $cell = $(`
                <div class="text-center p-1 rounded select-none
                    ${disabled ? 'bg-gray-200 text-gray-400 line-through cursor-not-allowed' : 'cursor-pointer'}">
                    ${d}
                </div>
            `);

            if (startDate && chosen.getTime() === startDate.getTime()) {
                $cell.addClass("bg-[#AEEF8B]");
            }
            if (endDate && chosen.getTime() === endDate.getTime()) {
                $cell.addClass("bg-[#AEEF8B]");
            }
            if (startDate && endDate && chosen > startDate && chosen < endDate) {
                $cell.addClass("bg-[#AEEF8B]/30");
            }

            $cell.on("click", function (e) {
                e.stopPropagation();
                if (disabled) return;

                if (!startDate) {
                    startDate = chosen;
                    endDate = null;
                } else if (!endDate) {
                    if (hasBookingBetween(startDate, chosen)) {
                        showToast(
                            "error",
                            "Periksa Ulang",
                            "Tanggal sudah dibooking di tengah pilihan"
                        );
                        return;
                    }

                    endDate = chosen;
                    if (endDate < startDate) {
                        [startDate, endDate] = [endDate, startDate];
                    }

                    updateInputs();
                    $popup.addClass("hidden");
                } else {
                    startDate = chosen;
                    endDate = null;
                }

                renderCalendar(currentDate);
            });

            $cal.append($cell);
        }

        $popup.append($cal);

        /* ===============================
            MONTH NAVIGATION
        =============================== */
        $("#prevMonth").off().on("click", function (e) {
            e.stopPropagation();
            currentDate = new Date(year, month - 1, 1);

            onPrevMonth?.({
                month: currentDate.getMonth() + 1,
                year: currentDate.getFullYear(),
                date: currentDate
            });

            renderCalendar(currentDate);
        });

        $("#nextMonth").off().on("click", function (e) {
            e.stopPropagation();
            currentDate = new Date(year, month + 1, 1);

            onNextMonth?.({
                month: currentDate.getMonth() + 1,
                year: currentDate.getFullYear(),
                date: currentDate
            });

            renderCalendar(currentDate);
        });
    }

    /* ===============================
        UPDATE INPUT
    =============================== */
    function updateInputs() {
        let start = formatDate(startDate);
        let end = formatDate(endDate);

        $input.val(`${start} - ${end}`);
        $checkin?.val(start);
        $checkout?.val(end);
    }

    function formatDate(date) {
        return date.toLocaleDateString("id-ID", {
            day: "2-digit",
            month: "short",
            year: "numeric"
        });
    }

    /* ===============================
        UPDATE BOOKING (API)
    =============================== */
    function updateBookedRanges(newRanges = []) {
        bookedData = newRanges;
        renderCalendar(currentDate);
    }

    $(document).on("click", function (e) {
        if (
            !$(e.target).closest(inputSelector).length &&
            !$(e.target).closest(popupSelector).length
        ) {
            $popup.addClass("hidden");
        }
    });

    /* ===============================
        EXPOSE API
    =============================== */
    return {
        updateBookedRanges
    };
}

function initTimePicker(container = "", suffix = "", events = []) {
    let prefix = container ? container + " " : "";
    const startHour = 16;
    const endHour = 22;

    let start = null;
    let end = null;

    // ❗ HAPUS EVENT LAMA
    $(document).off("click.timepicker");

    // Buka picker
    $(document).on("click.timepicker", prefix + suffix, function (e) {
        e.stopPropagation();
        resetSelection();
        renderHours();
        $(prefix + "#hourSlots").toggleClass("hidden");
    });

    // Klik luar → tutup
    $(document).on("click.timepicker", function (e) {
        if (!$(e.target).closest(prefix + "#time-picker").length) {
            $(prefix + "#hourSlots").addClass("hidden");
            resetSelection();
        }
    });

    // ===== NORMALIZE TIME =====
    function normalize(time) {
        return time ? time.substring(0, 5) : null; // "18:00:00" → "18:00"
    }

    function isHourDisabled(hour) {
        return events.some(e => {
            const start = normalize(e.time_start);
            const end = normalize(e.time_end);
            return hour >= start && hour < end;
        });
    }

    function hasDisabledBetween(start, end) {
        let s = parseInt(start.split(":")[0]);
        let e = parseInt(end.split(":")[0]);

        for (let h = s + 1; h <= e; h++) {
            const t = `${String(h).padStart(2, '0')}:00`;
            if (isHourDisabled(t)) return true;
        }
        return false;
    }

    function renderHours() {
        const box = $(prefix + "#hourSlots");
        box.html("");

        for (let h = startHour; h <= endHour; h++) {
            const t = `${String(h).padStart(2, '0')}:00`;
            const disabled = isHourDisabled(t);

            box.append(`
                <div class="hour-item px-4 py-2 text-sm
                    ${disabled
                    ? 'bg-gray-200 text-gray-400 cursor-not-allowed'
                    : 'cursor-pointer hover:bg-blue-100'}
                "
                data-hour="${t}"
                data-disabled="${disabled}">
                    ${t}
                </div>
            `);
        }

        $(prefix + ".hour-item").off("click").on("click", function (e) {
            e.stopPropagation();

            const t = $(this).data("hour");
            const disabled = $(this).data("disabled");

            if (disabled) return;

            if (start == null) showCopyAlert({ text: "Silakan pilih jam selesai" });

            if (start === t) {
                resetSelection();
                start = t;
                $(this).addClass("bg-blue-500 text-white");
                return;
            }

            if (!start) {
                start = t;
                $(this).addClass("bg-blue-500 text-white");
                return;
            }

            if (t <= start) {
                showToast("error", "Gagal", "Jam selesai harus lebih besar!");
                return;
            }

            if (hasDisabledBetween(start, t)) {
                showToast("error", "Gagal", "Tidak boleh melewati jam yang terisi!");
                resetSelection();
                return;
            }

            end = t;
            updateValues();
            resetSelection();
        });

        document.addEventListener("pointerdown", function (e) {
            const picker = document.querySelector(prefix + "#time-picker");
            const input = document.querySelector(prefix + suffix);
            const hourSlots = document.querySelector(prefix + "#hourSlots");

            if (!picker || !hourSlots || !input) return;

            // klik di dalam popup → abaikan
            if (picker.contains(e.target)) return;

            // klik input time → abaikan (biar click-nya buka)
            if (input.contains(e.target)) return;

            // 🔥 SELAIN ITU → TUTUP
            hourSlots.classList.add("hidden");
            resetSelection();
        }, true);
    }

    function updateValues() {
        $(prefix + suffix).val(`${start} - ${end}`);
        $(prefix + "#time_in").val(start);
        $(prefix + "#time_out").val(end);
        $(prefix + "#hourSlots").addClass("hidden");
    }

    function resetSelection() {
        start = null;
        end = null;
        $(prefix + ".hour-item").removeClass("bg-blue-500 text-white");
    }
}


function getDayIndexByDate(dateString) {
    const dayNames = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
    const dayName = new Date(dateString).toLocaleDateString("id-ID", {
        weekday: "long"
    });

    return dayNames.findIndex(d => d === dayName);
}

function parseTime(time) {
    var times = time.toString();
    times = times.split(":");
    times = times[0] + ':' + times[1];
    return times;
}

function formatDateYMD(date) {
    const d = new Date(date); // bisa menerima Date object atau string
    const year = d.getFullYear();
    const month = String(d.getMonth() + 1).padStart(2, '0'); // bulan 0-based
    const day = String(d.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

function renderWeeks(month, year) {
    let weeks = [];
    let firstDay = new Date(year, month - 1, 1); // tanggal 1 bulan itu
    let lastDay = new Date(year, month, 0);      // tanggal terakhir bulan itu

    let current = new Date(firstDay);

    while (current <= lastDay) {
        // start of week (Senin)
        let startOfWeek = new Date(current);
        startOfWeek.setDate(current.getDate() - (current.getDay() === 0 ? 6 : current.getDay() - 1));

        // end of week (Minggu)
        let endOfWeek = new Date(startOfWeek);
        endOfWeek.setDate(startOfWeek.getDate() + 6);

        // batasi akhir minggu tidak melebihi akhir bulan
        if (endOfWeek > lastDay) endOfWeek = lastDay;

        // simpan minggu
        weeks.push({
            start: startOfWeek.toISOString().split('T')[0],
            end: endOfWeek.toISOString().split('T')[0],
        });

        // lanjut ke minggu berikutnya
        current.setDate(endOfWeek.getDate() + 1);
    }

    return weeks;
}

function formatDayDate(tanggal) {
    const hari = [
        "Minggu", "Senin", "Selasa", "Rabu",
        "Kamis", "Jumat", "Sabtu"
    ];

    const bulan = [
        "Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
        "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
    ];

    const d = new Date(tanggal);

    const namaHari = hari[d.getDay()];
    const tgl = d.getDate();
    const namaBulan = bulan[d.getMonth()];
    const tahun = d.getFullYear();

    return `${namaHari}, ${tgl} ${namaBulan} ${tahun}`;
}