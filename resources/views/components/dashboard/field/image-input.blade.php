@props([
'name' => 'image',
'id' => 'imageInput',
'required' => false,
'previewId' => 'imagePreview'
])

<div>
    <div class="flex items-center gap-4 relative">
        <div class="relative border border-dashed bg-[#F2F4F7] rounded-2xl aspect-square h-20 overflow-hidden flex items-center justify-center">
            <img id="{{ $previewId }}" src="#" alt="Preview" class="object-cover w-full h-full hidden">
            <span class="text-gray-400 text-xs absolute text-center" id="noImageText-{{ $previewId }}">Upload</span>
        </div>

        <div class="absolute top-0 bottom-0 left-0 right-0">
            <label
                for="{{ $id }}"
                class="cursor-pointer h-full w-full inline-flex gap-2 items-center hover:bg-gray-700/10 text-sm font-medium rounded-2xl"></label>
            <input type="file" name="{{ $name }}" id="{{ $id }}" accept="image/*" class="hidden">
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.querySelector('input[type="file"]#{{ $id }}');
        const preview = document.getElementById('{{ $previewId }}');
        const noImageText = document.getElementById('noImageText-{{ $previewId }}');

        if (input) {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        noImageText.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>
@endpush
