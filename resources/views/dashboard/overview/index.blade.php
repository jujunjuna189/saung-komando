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
                    <select name="" id="" class="border-none focus:outline-none">
                        <option value="">November 2025</option>
                        <option value="">Desember 2025</option>
                    </select>
                </li>
                <li class="px-4 py-2 border rounded-full">
                    <select name="" id="" class="border-none focus:outline-none">
                        <option value="">Lunas</option>
                    </select>
                </li>
                <li class="px-4 py-2 border rounded-full">
                    <input type="text" placeholder="Filter" class="border-none focus:outline-none placeholder-[#000000] text-center w-20">
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
        getData({});
    });

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