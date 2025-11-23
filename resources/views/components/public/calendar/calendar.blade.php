<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Calendar</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .selected {
            background-color: #4F46E5 !important;
            color: white !important;
        }
        .in-range {
            background-color: #C7D2FE !important;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-3xl">
        <h1 class="text-xl font-bold text-center mb-4">Booking Calendar</h1>

        <!-- MONTH + YEAR -->
        <div class="flex justify-between items-center mb-4">
            <button onclick="prevMonth()" class="px-3 py-2 bg-gray-200 rounded">Prev</button>
            <h2 id="monthTitle" class="text-lg font-semibold"></h2>
            <button onclick="nextMonth()" class="px-3 py-2 bg-gray-200 rounded">Next</button>
        </div>

        <!-- CALENDAR -->
        <div class="grid grid-cols-7 text-center font-semibold">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>

        <div id="calendar" class="grid grid-cols-7 gap-2 mt-2"></div>

        <div class="mt-6 p-3 bg-gray-50 rounded-lg text-center text-sm text-gray-700">
            <p>Start Date: <span id="startDateText" class="font-bold">-</span></p>
            <p>End Date: <span id="endDateText" class="font-bold">-</span></p>
        </div>
    </div>

    <script>
        let current = new Date();
        let startDate = null;
        let endDate = null;

        function renderCalendar() {
            const month = current.getMonth();
            const year = current.getFullYear();
            document.getElementById("monthTitle").innerText = 
                current.toLocaleString('default', { month: 'long' }) + " " + year;

            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            let html = "";

            for (let i = 0; i < firstDay; i++) {
                html += `<div></div>`;
            }

            for (let d = 1; d <= lastDate; d++) {
                let fullDate = new Date(year, month, d);

                let classes = "p-6 border rounded-xl cursor-pointer hover:bg-gray-200";

                if (startDate && isSameDate(fullDate, startDate)) {
                    classes += " selected";
                }

                if (endDate && isSameDate(fullDate, endDate)) {
                    classes += " selected";
                }

                if (startDate && endDate && fullDate > startDate && fullDate < endDate) {
                    classes += " in-range";
                }

                html += `<div class="${classes}" onclick="selectDate(${year}, ${month}, ${d})">${d}</div>`;
            }

            document.getElementById("calendar").innerHTML = html;
        }

        function selectDate(y, m, d) {
            let selected = new Date(y, m, d);

            if (!startDate || (startDate && endDate)) {
                startDate = selected;
                endDate = null;
            } else if (selected < startDate) {
                startDate = selected;
            } else {
                endDate = selected;
            }

            updateText();
            renderCalendar();
        }

        function updateText() {
            document.getElementById("startDateText").innerText = startDate ? startDate.toDateString() : "-";
            document.getElementById("endDateText").innerText = endDate ? endDate.toDateString() : "-";
        }

        function isSameDate(d1, d2) {
            return d1.getFullYear() === d2.getFullYear() &&
                   d1.getMonth() === d2.getMonth() &&
                   d1.getDate() === d2.getDate();
        }

        function nextMonth() {
            current.setMonth(current.getMonth() + 1);
            renderCalendar();
        }

        function prevMonth() {
            current.setMonth(current.getMonth() - 1);
            renderCalendar();
        }

        renderCalendar();
    </script>

</body>
</html>
