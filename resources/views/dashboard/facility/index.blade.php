@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="px-5 py-5">
    <div class="bg-white rounded-2xl p-5">
        <div class="">
            <h1 class="text-2xl font-semibold">Fasilitas Saung Komando</h1>
        </div>
        <div class="mt-5">
            <div class="flex gap-2 md:justify-between items-center">
                <div class="px-4 py-2 border rounded-full bg-[#F2F4F7] flex-1 md:flex-none md:w-auto">
                    <select name="filter-category" id="filter-category" onchange="filterCategoryChange(event)" class="border-none focus:outline-none w-full">
                        <!-- option filter category -->
                    </select>
                </div>
                <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer open-modal flex-1 md:flex-none md:w-auto" data-id="modalAdd">
                    <div class="flex gap-1 items-center justify-center">
                        <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus w-5 h-5 md:w-6 md:h-6">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        <span class="whitespace-nowrap">Tambah Fasilitas</span>
                    </div>
                </button>
            </div>
        </div>
        <div class="mt-5 p-3 md:p-5 bg-[#D8E0ED] rounded-xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2" id="container-facilitys">
                <!-- Fasility container -->
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<x-dashboard.modal id="modalAdd" title="Tambah Fasilitas" btn_text="Tambah Fasilitas" justify="justify-center md:justify-end">
    <div class="grid grid-cols-2 gap-2">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Nama Fasilitas<span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" placeholder="Masukan Nama Fasilitas" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Kategori<span class="text-red-500">*</span></label>
            <select name="category" id="category" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
                <!-- Option in database section -->
            </select>
        </div>
    </div>
    <div class="mt-3">
        <label for="" class="font-semibold text-[12px]">Deskripsi<span class="text-red-500">*</span></label>
        <textarea name="description" id="description" cols="30" rows="3" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2" placeholder="Masukan deskripsi"></textarea>
    </div>
    <div class="flex gap-2 mt-3">
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Maxs. Kapasitas<span class="text-red-500">*</span></label>
            <input type="text" name="max-capasity" id="max-capasity" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Harga Per Item<span class="text-red-500">*</span></label>
            <input type="text" name="price" id="price" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="">
            <label for="" class="font-semibold text-[12px]">Rating<span class="text-red-500">*</span></label>
            <input type="text" name="rating" id="rating" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="flex gap-2 mt-3">
        <div>
            <label for="" class="font-semibold text-[12px]">K. Tidur<span class="text-red-500">*</span></label>
            <input type="text" name="bedroom" id="bedroom" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div>
            <label for="" class="font-semibold text-[12px]">K. Mandi<span class="text-red-500">*</span></label>
            <input type="text" name="bathroom" id="bathroom" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
        <div class="grow">
            <label for="" class="font-semibold text-[12px]">Link Video Youtube<span class="text-red-500">*</span></label>
            <input type="text" name="link" id="link" placeholder="-" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full mt-2">
        </div>
    </div>
    <div class="mt-3">
        <label for="" class="font-semibold text-[12px]">Galeri Foto<span class="text-red-500">*</span></label>
        <div class="mt-2 grid grid-cols-3 md:grid-cols-6 justify-center gap-6">
            <x-dashboard.field.image-input label="Gambar" name="image" id="image_upload1" previewId="imageUpload1" required />
            <x-dashboard.field.image-input label="Gambar" name="image" id="image_upload2" previewId="imageUpload2" required />
            <x-dashboard.field.image-input label="Gambar" name="image" id="image_upload3" previewId="imageUpload3" required />
            <x-dashboard.field.image-input label="Gambar" name="image" id="image_upload4" previewId="imageUpload4" required />
            <x-dashboard.field.image-input label="Gambar" name="image" id="image_upload5" previewId="imageUpload5" required />
            <x-dashboard.field.image-input label="Gambar" name="image" id="image_upload6" previewId="imageUpload6" required />
        </div>
    </div>
    <div class="mt-5 border p-4 rounded-xl">
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="" class="font-semibold text-[12px]">Fasilitas Olahraga</label>
                <div class="flex gap-2 items-center mt-4">
                    <input type="checkbox" name="free-for-guest" id="free-for-guest" class="border rounded-sm bg-[#F1F3F6] w-4 h-4">
                    <label for="" class="text-[12px]">FREE untuk tamu</label>
                </div>
                <div class="flex gap-2 items-center mt-2">
                    <input type="checkbox" name="membership" id="membership" class="border rounded-sm bg-[#F1F3F6] w-4 h-4">
                    <label for="" class="text-[12px]">Membership</label>
                </div>
            </div>
            <div class="flex flex-col justify-start items-center">
                <label for="" class="font-semibold text-[12px]">Luas Area Terbuka</label>
                <input type="text" name="area" id="area" placeholder="-" class="border rounded-xl bg-[#F1F3F6] w-full px-5 py-3 mt-4">
            </div>
        </div>
    </div>
    <x-slot:footer>
        <div class="flex justify-start items-center px-5 py-4 border-t border-slate-200 gap-2">
            <button type="button" class="bg-[#AEEF8B] text-gray-700 px-5 py-3 rounded-xl hover:bg-black hover:text-white close-modal cursor-pointer" onclick="onSubmit()">Tambah Fasilitas</button>
        </div>
    </x-slot:footer>
</x-dashboard.modal>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        getCategory({
            onSuccess: function(response) {
                $('#filter-category').empty();
                $('#modalAdd #category').empty();
                var element = renderCategory({
                    value: "",
                    category: "Semua"
                });
                $("#filter-category").append(element);
                $.each(response.data, function(i, item) {
                    const element = renderCategory({
                        value: item.category,
                        category: item.category,
                    });
                    $("#filter-category").append(element);
                    $("#modalAdd #category").append(element);
                });
            }
        });
        getData({});
    });

    function renderCategory({
        value,
        category
    }) {
        const element = `
            <option value="${value}">${category}</option>
        `;

        return element;
    }

    function renderFasility(item) {
        let specHtml = "";

        $.each(item.specification, function(i, itemChild) {
            specHtml += `
                <div class="bg-[#EDEFF1] flex items-center justify-center gap-0.5 rounded-full px-1 py-0.5 w-full">
                    <img src="${url + '/' + itemChild.icon}" alt="" class="h-3 w-3 object-contain">
                    <span class="text-[8px] whitespace-nowrap">${itemChild.value}</span>
                </div>
            `;
        });

        let freeGuest = "";
        if (item.is_free_for_guest == 1) {
            freeGuest = `
            <div class="flex justify-between mb-3 gap-2">
                <div class="bg-[#EAC580] flex items-center gap-1 rounded-full px-2 py-1">
                    <span class="text-[8px] text-slate-900 leading-tight"><span class="font-bold">FREE</span> untuk tamu menginap</span>
                </div>
                <div class="bg-[#F2F4F7] flex gap-2 rounded-full px-2 py-1 items-center justify-end shrink-0 h-fit">
                    <svg xmlns="https://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                    </svg>
                    <span class="text-[10px] font-bold">${item.rating}</span>
                </div>
            </div>`;
        }

        let membership = "";
        if (item.is_membership == 1) {
            let rating = "";
            if (item.is_free_for_guest == 0) {
                rating = `
                    <div class="flex justify-end mb-3">
                        <div class="bg-[#F2F4F7] flex gap-2 rounded-full px-2 py-1 items-center justify-end shrink-0 h-fit">
                            <svg xmlns="https://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                            <span class="text-[10px] font-bold">${item.rating}</span>
                        </div>
                    </div>
                `;
            }

            membership = `
                ${rating}
                <div class="flex justify-between items-center gap-2 flex-wrap">
                    <h5 class="font-semibold text-xs md:text-base leading-tight">${item.title}</h5>
                    <div class="bg-[#EDEFF1] flex items-center gap-1 rounded-full px-2 py-1 shrink-0">
                        <span class="text-[8px] leading-tight font-bold">Membership 325rb/bln</span>
                    </div>
                </div>
            `;
        } else {
            let rating = "";
            if (item.is_free_for_guest == 0) {
                rating = `
                    <div class="bg-[#F2F4F7] flex gap-2 rounded-full px-2 py-1 items-center justify-end shrink-0 h-fit">
                        <svg xmlns="https://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <span class="text-[10px] font-bold">${item.rating}</span>
                    </div>
                `;
            }

            membership = `
                <div class="flex justify-between items-center gap-2 flex-wrap">
                    <h5 class="font-semibold text-xs md:text-base leading-tight">${item.title}</h5>
                    ${rating}
                </div>
            `;
        }

        const element = `
            <div class="bg-white rounded-xl p-2 flex gap-3 w-full h-full">
                <img src="{{ asset('storage/${item.thumbnails[0].path}') }}" alt="" class="w-[100px] max-w-[100px] aspect-square rounded-xl h-full object-cover">
                <div class="grow flex flex-col min-w-0">
                    ${freeGuest}
                    ${membership}
                    <p class="text-[#808080] text-[10px] mt-1">${item.description.length > 75 ? item.description.substring(0, 75) + "..." : item.description}</p>
                    <div class="grid grid-cols-3 gap-1 my-2">
                        ${specHtml}
                    </div>
                    <div class="grow"></div>
                    <div class="flex justify-between items-center">
                        <h5 class="font-semibold whitespace-nowrap text-xs md:text-base">${item.price}</h5>
                        <div class="rounded-full bg-[#AEEF8B] text-[10px] md:text-[12px] px-3 py-1 cursor-pointer whitespace-nowrap" onclick="editData('${item.id}')">Edit</div>
                    </div>
                </div>
            </div>
        `;

        return element;
    }

    function filterCategoryChange(target) {
        getData({
            header: `category=${target.target.value}`,
        });
    }

    function getData({
        header = {},
    }) {
        requestServer({
            url: url + '/api/facility/show',
            type: "GET",
            data: header,
            onLoader: false,
            onSuccess: function(response) {
                $("#container-facilitys").empty();
                $.each(response.data, function(i, item) {
                    const element = renderFasility(item);
                    $("#container-facilitys").append(element);
                });
            },
        });
    }

    function form() {
        const title = $('#title').val();
        const category = $('#category').val();
        const description = $('#description').val();
        const price = $('#price').val();
        const rating = $('#rating').val();
        const link = $('#link').val();
        const freeForGuest = $('#free-for-guest').prop('checked');
        const membership = $('#membership').prop('checked');

        // Spesification
        const maxCapasity = $('#max-capasity').val();
        const bedroom = $('#bedroom').val();
        const bathroom = $('#bathroom').val();
        const area = $('#area').val();

        const spesificationItem = [];
        if (maxCapasity !== null && maxCapasity !== undefined && maxCapasity !== "") {
            spesificationItem.push({
                icon: "assets/icon/person.png",
                value: maxCapasity + " Orang",
            });
        }

        if (bedroom !== null && bedroom !== undefined && bedroom !== "") {
            spesificationItem.push({
                icon: "assets/icon/bedroom.png",
                value: bedroom + " KT",
            });
        }

        if (bathroom !== null && bathroom !== undefined && bathroom !== "") {
            spesificationItem.push({
                icon: "assets/icon/bathroom.png",
                value: bathroom + " KM",
            });
        }

        if (area !== null && area !== undefined && area !== "") {
            spesificationItem.push({
                icon: "assets/icon/area.png",
                value: area,
            });
        }

        // Files
        const files = [];

        if ($('#image_upload1')[0].files[0] != undefined && $('#image_upload1')[0].files[0] != null && $('#image_upload1')[0].files[0] != "") {
            files.push($('#image_upload1')[0].files[0]);
        }
        if ($('#image_upload2')[0].files[0] != undefined && $('#image_upload2')[0].files[0] != null && $('#image_upload2')[0].files[0] != "") {
            files.push($('#image_upload2')[0].files[0]);
        }
        if ($('#image_upload3')[0].files[0] != undefined && $('#image_upload3')[0].files[0] != null && $('#image_upload3')[0].files[0] != "") {
            files.push($('#image_upload3')[0].files[0]);
        }
        if ($('#image_upload4')[0].files[0] != undefined && $('#image_upload4')[0].files[0] != null && $('#image_upload4')[0].files[0] != "") {
            files.push($('#image_upload4')[0].files[0]);
        }
        if ($('#image_upload5')[0].files[0] != undefined && $('#image_upload5')[0].files[0] != null && $('#image_upload5')[0].files[0] != "") {
            files.push($('#image_upload5')[0].files[0]);
        }
        if ($('#image_upload6')[0].files[0] != undefined && $('#image_upload6')[0].files[0] != null && $('#image_upload6')[0].files[0] != "") {
            files.push($('#image_upload6')[0].files[0]);
        }

        const data = {
            title: title,
            category: category,
            description: description,
            price: price,
            rating: rating,
            freeForGuest: freeForGuest,
            membership: membership,
            spesification: spesificationItem,
            files: files,
        };

        return data;
    }

    function onSubmit() {
        const data = form();
        const formData = new FormData();
        formData.append('title', data.title);
        formData.append('category', data.category);
        formData.append('description', data.description);
        formData.append('price', data.price);
        formData.append('rating', data.rating);
        formData.append('is_free_for_guest', data.freeForGuest ? 1 : 0);
        formData.append('is_membership', data.membership ? 1 : 0);
        // Spesification
        formData.append('spesification', JSON.stringify(data.spesification));
        $.each(Object.keys(data.files), function(i, item) {
            formData.append('files[]', data.files[item]);
        });
        // Save
        requestServer({
            url: url + '/api/facility/create',
            data: formData,
            onLoader: true,
            onSuccess: function(value) {
                showToast("success", "Berhasil", value.message);
                getData({});
                closeModal('modalAdd');
            },
        });
    }
</script>
@endsection
