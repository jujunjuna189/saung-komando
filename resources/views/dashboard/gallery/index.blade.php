@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-3 md:px-5 md:py-5">
    <div class="bg-white md:rounded-2xl p-4 md:p-5 w-full">
        <div class="mt-0">
            <div class="flex justify-between items-center gap-2">
                <h1 class="text-xl md:text-2xl font-semibold">Update Galeri</h1>
            </div>
        </div>

        <!-- Hero Video Section -->
        <div class="flex mt-7">
            <div class="w-full md:w-[400px]">
                <span class="font-semibold">Link Hero Video</span>
                <div class="flex gap-2 mt-2">
                    <input type="text" name="url" id="url" placeholder="https://youtube.com" class="border rounded-xl bg-[#F1F3F6] px-5 py-3 w-full">
                    <button type="button" class="px-4 py-2 rounded-xl bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer hover:bg-[#9FE07B] transition" onclick="saveVideo()">
                        <div class="flex gap-1 items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M14 4l0 4l-6 0l0 -4" />
                            </svg>
                            <span class="font-semibold">Simpan</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-8 flex flex-col md:flex-row gap-8">
            <!-- Slider Images -->
            <div class="flex-1 w-full">
                <span class="font-semibold block mb-3">Gambar Slider Home</span>
                <div id="slider-container" class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <!-- Dynamic Content -->
                </div>
            </div>

            <div class="w-px bg-gray-200 hidden md:block"></div>

            <!-- Gallery Images -->
            <div class="flex-1 w-full">
                <span class="font-semibold block mb-3">Gambar Galeri</span>
                <div id="gallery-container" class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <!-- Dynamic Content -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let galleryData = [];

    $(document).ready(function() {
        getData();
    });

    function getData() {
        requestServer({
            url: url + '/api/Gallery/show',
            type: "GET",
            onLoader: false,
            onSuccess: function(response) {
                galleryData = response.data || [];
                renderAll();
            },
        });
    }

    function renderAll() {
        if (!Array.isArray(galleryData)) galleryData = [];

        // Set Hero Video URL
        const hero = galleryData.find(item => item.category === 'youtube' && item.type === 'video');
        if (hero) {
            $('#url').val(hero.link);
        }

        // Render Sliders
        const sliders = galleryData.filter(item => item.category === 'slider');
        renderSection('slider-container', 'slider', sliders);

        // Render Galleries
        const galleries = galleryData.filter(item => item.category === 'gallery');
        renderSection('gallery-container', 'gallery', galleries);
    }

    function renderSection(containerId, category, items) {
        const container = $('#' + containerId);
        container.empty();

        // Upload Button (Always First)
        const uploadBtn = `
            <label class="cursor-pointer block w-full aspect-square overflow-hidden rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 flex flex-col justify-center items-center hover:bg-gray-100 transition group">
                <input type="file" class="hidden" onchange="uploadImage(this, '${category}')" accept="image/*">
                <div class="bg-white p-2 rounded-full shadow-sm group-hover:scale-110 transition mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600"><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path><path d="M7 9l5 -5l5 5"></path><path d="M12 4l0 12"></path></svg>
                </div>
                <span class="font-semibold text-sm text-gray-600">Upload</span>
            </label>
        `;
        container.append(uploadBtn);

        // Items
        items.forEach((item, index) => {
            const html = `
                <div class="relative group w-full aspect-square rounded-2xl overflow-hidden bg-gray-100 shadow-sm border border-gray-100">
                    <img src="{{ asset('storage') }}/${item.link}" class="w-full h-full object-cover">

                    <!-- Overlay & Delete Button -->
                    <div class="absolute inset-0 bg-black/40 hidden group-hover:flex justify-center items-center z-10 transition-all">
                        <button onclick="event.stopPropagation(); deleteImage(${item.id})" class="bg-white hover:bg-red-500 hover:text-white text-red-500 p-3 rounded-full shadow-lg transition transform hover:scale-110 z-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7l16 0"></path><path d="M10 11l0 6"></path><path d="M14 11l0 6"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>
                        </button>
                    </div>

                    <!-- Move Left -->
                    ${index > 0 ? `
                    <div class="absolute top-1/2 -translate-y-1/2 left-2 z-20 hidden group-hover:block">
                        <button type="button" onclick="moveImage('${category}', ${index}, -1)" class="bg-white/90 rounded-full p-1.5 shadow-md hover:bg-gray-100 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                    </div>` : ''}

                    <!-- Move Right -->
                    ${index < items.length - 1 ? `
                    <div class="absolute top-1/2 -translate-y-1/2 right-2 z-20 hidden group-hover:block">
                        <button type="button" onclick="moveImage('${category}', ${index}, 1)" class="bg-white/90 rounded-full p-1.5 shadow-md hover:bg-gray-100 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>` : ''}
                </div>
            `;
            container.append(html);
        });
    }

    function saveVideo() {
        const urlValue = $('#url').val();
        const formData = new FormData();
        formData.append('hero_url', urlValue);

        requestServer({
            url: url + '/api/Gallery/update',
            data: formData,
            onLoader: true,
            onSuccess: function(response) {
                showToast("success", "Berhasil", response.message);
                getData();
            },
        });
    }

    function uploadImage(input, category) {
        if (input.files && input.files[0]) {
            const formData = new FormData();
            formData.append('file', input.files[0]);
            formData.append('category', category);

            requestServer({
                url: url + '/api/Gallery/upload',
                data: formData,
                onLoader: true,
                onSuccess: function(response) {
                    showToast("success", "Berhasil", response.message);
                    getData(); // Reload to show new image
                },
            });
        }
    }

    function deleteImage(id) {
        const formData = new FormData();
        formData.append('id', id);

        requestServer({
            url: url + '/api/Gallery/delete',
            data: formData,
            onLoader: true,
            onSuccess: function(response) {
                showToast("success", "Berhasil", response.message);
                getData();
            },
        });
    }

    function moveImage(category, index, direction) {
        const items = galleryData.filter(item => item.category === category);
        const targetIndex = index + direction;

        if (targetIndex < 0 || targetIndex >= items.length) return;

        // Swap in local array to get IDs
        const item = items[index];
        const targetItem = items[targetIndex];

        // We need to swap their sort orders or just send the new order of IDs
        // Let's create a new array of IDs in the desired order

        // First, get all items of this category sorted by current order
        const sortedItems = [...items]; // assuming they are already sorted from getData

        // Swap
        [sortedItems[index], sortedItems[targetIndex]] = [sortedItems[targetIndex], sortedItems[index]];

        const orderIds = sortedItems.map(item => item.id);

        const formData = new FormData();
        orderIds.forEach((id, i) => {
            formData.append(`order[${i}]`, id);
        });

        requestServer({
            url: url + '/api/Gallery/sort',
            data: formData,
            onLoader: true,
            onSuccess: function(response) {
                showToast("success", "Berhasil", response.message);
                getData();
            },
        });
    }
</script>
@endsection
