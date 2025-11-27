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
                    <select name="filter-month" id="filter-month" class="border-none focus:outline-none" onchange="filterMonthChange(event)">
                        <!-- Render generate -->
                    </select>
                </li>
                <li class="px-4 py-2 border rounded-full">
                    <select name="status" id="status" class="border-none focus:outline-none" onchange="filterStatusChange(event)">
                        <option value="">Semua</option>
                        <option value="DP">DP</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Dilokasi">Dilokasi</option>
                    </select>
                </li>
                <li class="px-4 py-2 border rounded-full">
                    <button type="button" class="border-none focus:outline-none placeholder-[#000000] text-center w-20 cursor-pointer" onclick="onFilter()">Filter</button>
                </li>
                <li class="px-4 py-2 border-[#AEEF8B] bg-[#AEEF8B] rounded-full flex items-center">Export To Excel</li>
            </ul>
        </div>
        <div class="mt-5">
            <div class="grid grid-cols-4 gap-2" id="container-reservation">
                <!-- Container reservation -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        generateMonthOptions();
        getData({});
    });

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

    function renderReservation(item) {
        const element = `
            <div class="bg-[#F2F4F7] rounded-lg p-5">
                <div class="flex justify-between items-center">
                    <h6 class="font-semibold text-lg">${item.facility?.title ?? ""}</h6>
                    <div class="bg-[#D8EDED] rounded-full w-7 h-7 p-1.5 flex justify-center items-center">
                        <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin">
                    </div>
                </div>
                <hr class="border-[#808080] my-3" />
                <div class="flex justify-between">
                    <span class="font-semibold">${item.name}</span>
                    <span class="font-semibold text-end">${item.telp}</span>
                </div>
                <div class="mt-3 grid grid-cols-2">
                    <div>
                        <p>Check In :</p>
                        <p class="font-semibold">${dateFormat(item.check_in)}</p>
                    </div>
                    <div class="text-end">
                        <p>Check Out :</p>
                        <p class="font-semibold">${dateFormat(item.check_out)}</p>
                    </div>
                </div>
                <div class="mt-3">
                    <p>Catatan :</p>
                    <p>${item.note}</p>
                </div>
                <div class="mt-3 flex gap-2">
                    <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] grow">
                        <select name="" id="" class="border-none focus:outline-none w-full">
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

    var dataFilter = {
        month: "",
        status: "",
    };

    function filterMonthChange(target) {
        dataFilter.month = target.target.value;
    }

    function filterStatusChange(target) {
        dataFilter.status = target.target.value;
    }

    function onFilter() {
        getData({
            header: `filter_month=${dataFilter.month}&status=${dataFilter.status}`,
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
                $('#container-reservation').empty();
                $.each(response.data, function(i, item) {
                    const element = renderReservation(item);
                    $('#container-reservation').append(element);
                });
            },
        });
    }
</script>
@endsection