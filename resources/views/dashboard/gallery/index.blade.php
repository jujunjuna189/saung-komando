@extends('components.dashboard.layouts.app', ['nav_bar' => false])

@section('content')
<div class="py-3 md:px-5 md:py-5">
    <div class="bg-white md:rounded-2xl p-4 md:p-5 w-full">
        <div class="mt-0">
            <div class="flex justify-between items-center gap-2">
                <h1 class="text-xl md:text-2xl font-semibold">Update Galeri</h1>
                <button type="button" class="px-4 py-2 rounded-full bg-[#AEEF8B] border-[#AEEF8B] cursor-pointer md:w-auto" onclick="saveData()">
                    <div class="flex gap-1 items-center justify-center text-[12px] md:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M14 4l0 4l-6 0l0 -4" />
                        </svg>
                        <span>Simpan Perubahan</span>
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
        <div class="mt-5 flex gap-5">
            <div class="flex-1 w-0 md:pr-3">
                <span class="font-semibold">Gambar Slider Home</span>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-3">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="relative group w-full">
                            <input type="file" name="slider_image" id="slider_image_upload{{ $i }}" class="hidden" onchange="previewImage(this, 'sliderImageUpload{{ $i }}')">
                            <label for="slider_image_upload{{ $i }}" class="cursor-pointer block w-full aspect-square overflow-hidden rounded-2xl">
                                <div id="noImageText-sliderImageUpload{{ $i }}" class="border border-dashed w-full h-full rounded-2xl bg-gray-100 flex justify-center items-center">
                                    <span class="font-semibold">Upload</span>
                                </div>
                                <img id="sliderImageUpload{{ $i }}" class="w-full h-full object-cover hidden" />
                            </label>

                            <div class="absolute top-1/2 -translate-y-1/2 -left-3 z-10 hidden group-hover:block">
                                <button type="button" onclick="moveImage('slider', {{ $i }}, -1)" class="bg-white rounded-full p-1 shadow-md hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div class="absolute top-1/2 -translate-y-1/2 -right-3 z-10 hidden group-hover:block">
                                <button type="button" onclick="moveImage('slider', {{ $i }}, 1)" class="bg-white rounded-full p-1 shadow-md hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="w-px bg-gray-900 md:flex hidden"></div>
            <div class="flex-1 w-0 md:pl-3">
                <span class="font-semibold">Gambar Galeri</span>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-3">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="relative group w-full">
                            <input type="file" name="gallery_image" id="gallery_image_upload{{ $i }}" class="hidden" onchange="previewImage(this, 'galleryImageUpload{{ $i }}')">
                            <label for="gallery_image_upload{{ $i }}" class="cursor-pointer block w-full aspect-square overflow-hidden rounded-2xl">
                                <div id="noImageText-galleryImageUpload{{ $i }}" class="border border-dashed w-full h-full rounded-2xl bg-gray-100 flex justify-center items-center">
                                    <span class="font-semibold">Upload</span>
                                </div>
                                <img id="galleryImageUpload{{ $i }}" class="w-full h-full object-cover hidden" />
                            </label>

                            <div class="absolute top-1/2 -translate-y-1/2 -left-3 z-10 hidden group-hover:block">
                                <button type="button" onclick="moveImage('gallery', {{ $i }}, -1)" class="bg-white rounded-full p-1 shadow-md hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div class="absolute top-1/2 -translate-y-1/2 -right-3 z-10 hidden group-hover:block">
                                <button type="button" onclick="moveImage('gallery', {{ $i }}, 1)" class="bg-white rounded-full p-1 shadow-md hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endfor
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

    function getData() {
        requestServer({
            url: url + '/api/Gallery/show',
            type: "GET",
            onLoader: false,
            onSuccess: function(response) {
                if (!response.data) return;
                const data = response.data || [];

                // Set Hero Video URL
                const hero = data.find(item => item.category === 'hero' && item.type === 'video');
                if (hero) {
                    $('#url').val(hero.link);
                }

                // Set Slider Images
                const sliders = data.filter(item => item.category === 'slider' && item.type === 'image');
                sliders.sort((a, b) => (a.sort_order || 0) - (b.sort_order || 0));

                for (let i = 1; i <= 6; i++) {
                    resetImageInput('slider', i);
                }

                sliders.forEach((item, index) => {
                    if (index < 6) {
                        setImageInput('slider', index + 1, item);
                    }
                });

                // Set Gallery Images
                const galleries = data.filter(item => item.category === 'gallery' && item.type === 'image');
                galleries.sort((a, b) => (a.sort_order || 0) - (b.sort_order || 0));

                for (let i = 1; i <= 6; i++) {
                    resetImageInput('gallery', i);
                }

                galleries.forEach((item, index) => {
                    if (index < 6) {
                        setImageInput('gallery', index + 1, item);
                    }
                });
            },
        });
    }

    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + previewId).attr('src', e.target.result).removeClass('hidden');
                $('#noImageText-' + previewId).addClass('hidden');
                $('#' + previewId).removeAttr('data-id'); // Clear ID on new upload
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function resetImageInput(type, index) {
        const previewId = `${type}ImageUpload${index}`;
        const inputId = `${type}_image_upload${index}`;

        $(`#${previewId}`).attr('src', '').addClass('hidden');
        $(`#noImageText-${previewId}`).removeClass('hidden');
        $(`#${inputId}`).val('');
        $(`#${previewId}`).removeAttr('data-id');
    }

    function setImageInput(type, index, item) {
        const previewId = `${type}ImageUpload${index}`;

        $(`#${previewId}`).attr('src', `{{ asset('storage') }}/${item.link}`).removeClass('hidden').attr('data-id', item.id);
        $(`#noImageText-${previewId}`).addClass('hidden');
    }

    function moveImage(type, index, direction) {
        const targetIndex = index + direction;
        if (targetIndex < 1 || targetIndex > 6) return;

        const currentPreview = $(`#${type}ImageUpload${index}`);
        const targetPreview = $(`#${type}ImageUpload${targetIndex}`);

        const currentSrc = currentPreview.attr('src');
        const currentId = currentPreview.attr('data-id');
        const currentHidden = currentPreview.hasClass('hidden');

        const targetSrc = targetPreview.attr('src');
        const targetId = targetPreview.attr('data-id');
        const targetHidden = targetPreview.hasClass('hidden');

        // Swap src
        currentPreview.attr('src', targetSrc);
        targetPreview.attr('src', currentSrc);

        // Swap data-id
        if (targetId) currentPreview.attr('data-id', targetId);
        else currentPreview.removeAttr('data-id');

        if (currentId) targetPreview.attr('data-id', currentId);
        else targetPreview.removeAttr('data-id');

        // Swap visibility
        if (targetHidden) currentPreview.addClass('hidden');
        else currentPreview.removeClass('hidden');

        if (currentHidden) targetPreview.addClass('hidden');
        else targetPreview.removeClass('hidden');

        // Swap no-image text
        const currentText = $(`#noImageText-${type}ImageUpload${index}`);
        const targetText = $(`#noImageText-${type}ImageUpload${targetIndex}`);

        if (targetHidden) currentText.removeClass('hidden');
        else currentText.addClass('hidden');

        if (currentHidden) targetText.removeClass('hidden');
        else targetText.addClass('hidden');
    }

    function saveData() {
        const formData = new FormData();

        // Hero Video
        const heroUrl = $('#url').val();
        formData.append('hero_url', heroUrl);

        // Slider Images
        const sliderOrder = [];
        for (let i = 1; i <= 6; i++) {
            const input = $(`#slider_image_upload${i}`)[0];
            if (input && input.files[0]) {
                formData.append('slider_files[]', input.files[0]);
            }

            const id = $(`#sliderImageUpload${i}`).attr('data-id');
            if (id) {
                sliderOrder.push(id);
            }
        }
        formData.append('slider_order', JSON.stringify(sliderOrder));

        // Gallery Images
        const galleryOrder = [];
        for (let i = 1; i <= 6; i++) {
            const input = $(`#gallery_image_upload${i}`)[0];
            if (input && input.files[0]) {
                formData.append('gallery_files[]', input.files[0]);
            }

            const id = $(`#galleryImageUpload${i}`).attr('data-id');
            if (id) {
                galleryOrder.push(id);
            }
        }
        formData.append('gallery_order', JSON.stringify(galleryOrder));

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
</script>
@endsection
