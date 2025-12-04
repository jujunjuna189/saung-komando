@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="md:px-5 py-5 h-full">
    <div class="bg-white md:rounded-2xl p-5 h-full">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 md:gap-0">
            <div class="w-full md:w-auto flex justify-between items-center">
                <div>
                    <h1 class="text-lg md:text-2xl font-semibold">Overview</h1>
                    <p class="text-[12px] md:text-base">Selasa, 15 November 2025</p>
                </div>
                <div class="md:hidden">
                    <div class="px-3 py-3 md:px-4 md:py-4 border-[#AEEF8B] bg-[#AEEF8B] rounded-full flex items-center cursor-pointer text-[10px] md:text-base">Export to Excel</div>
                </div>
            </div>

            <div class="w-full md:w-auto overflow-x-auto pb-2 md:pb-0">
                <ul class="flex justify-between md:justify-end gap-2 md:min-w-max w-full">
                    <li class="grow px-4 py-2 border rounded-full flex items-center md:w-auto">
                        <select name="filter-month" id="filter-month" class="border-none focus:outline-none bg-transparent w-full" onchange="filterMonthChange(event)">
                            <!-- Render generate -->
                        </select>
                    </li>
                    <li class="px-4 py-2 border rounded-full flex items-center md:w-auto">
                        <select name="status" id="status" class="border-none focus:outline-none bg-transparent w-full" onchange="filterStatusChange(event)">
                            <option value="">Semua</option>
                            <option value="DP">DP</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Dilokasi">Dilokasi</option>
                        </select>
                    </li>
                    <li class="hidden px-4 py-2 border-[#AEEF8B] bg-[#AEEF8B] rounded-full items-center cursor-pointer md:flex">
                        <span>Export To Excel</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2" id="container-reservation">
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
        const isPinned = item.is_pinned == 1;
        const pinBg = isPinned ? 'bg-[#AEEF8B]' : 'bg-gray-100';
        const pinIcon = isPinned ? '' : 'grayscale opacity-50';

        const element = `
            <div class="bg-[#F2F4F7] rounded-lg p-5">
                <div class="flex justify-between items-center">
                    <h6 class="font-semibold text-base md:text-lg">${item.facility?.title ?? ""}</h6>
                    <div class="${pinBg} rounded-full w-7 h-7 p-1.5 flex justify-center items-center cursor-pointer hover:scale-110 transition-transform" onclick="togglePin(${item.id}, ${isPinned ? 0 : 1})">
                        <img src="{{ asset('assets/icon/pin.svg') }}" alt="Pin" class="${pinIcon}">
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
                    <div class="px-4 py-2 border border-[#AEEF8B] rounded-xl bg-[#AEEF8B] flex-[6] md:grow md:basis-auto">
                        <select name="" id="" class="border-none focus:outline-none w-full">
                            <option value="${item.status}">${item.status}</option>
                            <option value="DP">DP</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Dilokasi">Dilokasi</option>
                        </select>
                    </div>
                    <div class="px-4 py-2 border border-[#D8E0ED] rounded-xl bg-[#D8E0ED] flex-[4] md:flex-initial">
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
        onFilter();
    }

    function filterStatusChange(target) {
        dataFilter.status = target.target.value;
        onFilter();
    }

    function onFilter() {
        getData({
            header: `filter_month=${dataFilter.month}&status=${dataFilter.status}`,
        });
    }

    function togglePin(id, status) {
        let formData = new FormData();
        formData.append('id', id);
        formData.append('is_pinned', status);
        requestServer({
            url: url + '/api/reservation/pin',
            type: "POST",
            data: formData,
            onSuccess: function(response) {
                showToast("success", "Berhasil", "Status pin diperbarui");
                getData({
                    header: `filter_month=${dataFilter.month}&status=${dataFilter.status}`,
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