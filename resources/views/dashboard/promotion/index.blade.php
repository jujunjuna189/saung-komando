@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="px-3 py-3 md:px-5 md:py-5">
    <div class="bg-white rounded-2xl p-4 md:p-5 w-full">
        <div class="">
            <h1 class="text-xl md:text-2xl font-semibold">Kode Promo</h1>
        </div>
        <div class="mt-5">
            <div class="flex justify-between items-center gap-2">
                <div class="px-4 py-2 border rounded-full bg-[#F2F4F7] w-1/2 md:w-auto">
                    <select name="" id="" class="border-none focus:outline-none bg-transparent w-full">
                        <option value="">November 2025</option>
                    </select>
                </div>
                <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer open-modal w-1/2 md:w-auto" data-id="modalAdd">
                    <div class="flex gap-1 items-center justify-center">
                        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        <span>Tambah Kode</span>
                    </div>
                </button>
            </div>
        </div>
        <div class="mt-7 w-full overflow-x-auto" style="max-width: calc(100vw - 60px);">
            <div class="min-w-[800px]">
                <div class="grid grid-cols-8 bg-[#F2F4F7] rounded-xl font-semibold text-xs md:text-sm">
                    <div class="py-3 px-3 text-center">#</div>
                    <div class="py-3 px-3 text-start">Fasilitas</div>
                    <div class="py-3 px-3 text-start">Kode</div>
                    <div class="py-3 px-3 text-start">Diskon</div>
                    <div class="py-3 px-3 text-start">Normal</div>
                    <div class="py-3 px-3 text-start">Promo</div>
                    <div class="py-3 px-3 text-start">Periode</div>
                    <div class="py-3 px-3 text-center">Hapus</div>
                </div>
                <div id="container-promotion" class="flex flex-col mt-3">
                    <!-- Content from JS -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<x-dashboard.modal id="modalAdd" title="Tambah Promo" btn_text="Tambah Promo">
    <div class="grid grid-cols-1 gap-2">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Kode Promo<span class="text-red-500">*</span></label>
            <input type="text" name="code" id="code" placeholder="Masukan Kode" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="flex gap-2 mt-3">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Fasilitas<span class="text-red-500">*</span></label>
            <select name="facility_id" id="facility_id" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="">Penginapan</option>
            </select>
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Periode<span class="text-red-500">*</span></label>
            <input type="date" name="periode" id="periode" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="">
            <label for="" class="font-semibold text-[12px]">Diskon<span class="text-red-500">*</span></label>
            <select name="discount" id="discount" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <option value="20%">20%</option>
                <option value="30%">30%</option>
                <option value="40%">40%</option>
            </select>
        </div>
    </div>
    <x-slot:footer>
        <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
            <button type="button" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" onclick="onSubmit()">Tambah Promo</button>
        </div>
    </x-slot:footer>
</x-dashboard.modal>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        getFacility({});
        getData({});
    });

    function renderFasility({
        value,
        category
    }) {
        const element = `
            <option value="${value}">${category}</option>
        `;

        return element;
    }

    function renderPromotion(i, item) {
        const element = `
            <div class="grid grid-cols-8 items-center text-xs md:text-sm even:bg-[#F2F4F7]">
                <div class="py-3 px-3 text-center">
                    ${i + 1}
                </div>
                <div class="py-3 px-3 text-start">
                    ${item.facility?.title ?? ""}
                </div>
                <div class="py-3 px-3 text-start">
                    ${item.code ?? ""}
                </div>
                <div class="py-3 px-3 text-start">
                    ${item.discount ?? ""}
                </div>
                <div class="py-3 px-3 text-start">
                    ${item.facility?.price ?? ""}
                </div>
                <div class="py-3 px-3 text-start">
                    ...
                </div>
                <div class="py-3 px-3 text-start">
                    ${dateFormat(item.periode)}
                </div>
                <div class="py-3 px-3 flex justify-center">
                    <div class="w-7 h-7 p-2 flex justify-center items-center bg-[#D8E0ED] rounded-full cursor-pointer hover:bg-red-200 transition" onclick="onDelete('${item.id}')">
                        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </div>
                </div>
            </div>
        `;

        return element;
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
                $.each(response.data, function(i, item) {
                    const element = renderFasility({
                        value: item.id,
                        category: item.title,
                    });
                    $('#modalAdd #facility_id').append(element);
                });
            },
        });
    }

    function getData({
        header = {},
    }) {
        requestServer({
            url: url + '/api/promotion/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                $('#container-promotion').empty();
                $.each(response.data, function(i, item) {
                    const element = renderPromotion(i, item);
                    $('#container-promotion').append(element);
                });
            },
        });
    }

    function form() {
        const code = $('#code').val();
        const facilityId = $('#facility_id').val();
        const periode = $('#periode').val();
        const discount = $('#discount').val();

        const data = {
            code: code,
            facilityId: facilityId,
            periode: periode,
            discount: discount,
        };

        return data;
    }

    function onSubmit() {
        const data = form();
        const formData = new FormData();
        formData.append('code', data.code);
        formData.append('facility_id', data.facilityId);
        formData.append('periode', data.periode);
        formData.append('discount', data.discount);
        // Save
        requestServer({
            url: url + '/api/promotion/create',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({});
                closeModal('modalAdd');
            },
        });
    }

    function onDelete(id) {
        const formData = new FormData();
        formData.append('id', id);
        // Save
        requestServer({
            url: url + '/api/promotion/delete',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({});
            },
        });
    }
</script>
@endsection
