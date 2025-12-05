@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-3 md:px-5 md:py-5">
    <div class="bg-white md:rounded-2xl p-4 md:p-5 w-full">
        <div class="mt-0">
            <div class="flex justify-between items-center gap-2">
                <h1 class="text-xl md:text-2xl font-semibold">Update Galeri</h1>
                <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer open-modal md:w-auto" data-id="modalAdd">
                    <div class="flex gap-1 items-center justify-center text-[12px] md:text-base">
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
        <div class="flex mt-7">
            <div class="w-[300px]">
                <span class="font-semibold">Link Hero Video</span>
                <div>
                    <input type="text" name="url" id="url" placeholder="https://youtube.com" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                </div>
            </div>
        </div>
        <div class="mt-16 flex gap-5">
            <div class="grow md:pr-3">
                <span class="font-semibold">Gambar Slider Home</span>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-3">
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center" onclick="uploadSlider()">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                </div>
            </div>
            <div class="w-px bg-gray-900 md:flex hidden"></div>
            <div class="grow md:pl-3">
                <span class="font-semibold">Gambar Slider Home</span>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-3">
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center" onclick="uploadGallery()">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                    <div class="border border-dashed aspect-square rounded-2xl bg-gray-100 flex justify-center items-center">
                        <span class="font-semibold">Upload</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        getData();
    });

    function submitHero() {}

    function uploadSlider() {}

    function uploadGallery() {}

    function getData({
        header = {},
    }) {
        requestServer({
            url: url + '/api/gallery/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                console.log(response);
            },
        });
    }

    function onDelete(id) {
        const formData = new FormData();
        formData.append('id', id);
        // Save
        requestServer({
            url: url + '/api/gallery/delete',
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