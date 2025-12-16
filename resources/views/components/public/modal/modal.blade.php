@props([
'id' => 'modal-id',
'title' => 'Modal Title',
'btn_text' => '',
'class_container' => 'max-w-xl',
])

<div id="{{ $id }}" class="modal-overlay fixed inset-0 z-50 hidden items-center justify-center bg-black/50 opacity-0 transition-opacity duration-300">
    <div class="modal-box bg-white md:rounded-3xl shadow-lg w-full relative scale-95 transition-all duration-300 {{ $class_container }}">
        <!-- Header -->
        @if($title != "")
        <div class="flex justify-between items-center px-5 py-4 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
            <button class="text-gray-500 hover:text-gray-700 text-xl close-modal cursor-pointer" data-id="{{ $id }}">&times;</button>
        </div>
        @endif

        <!-- Body -->
        <div class="p-5 max-h-[80vh]  md:max-h-[78vh] overflow-y-auto">
            {{ $slot }}
        </div>

        <!-- Footer -->
        {{ $footer ?? '' }}
    </div>
</div>