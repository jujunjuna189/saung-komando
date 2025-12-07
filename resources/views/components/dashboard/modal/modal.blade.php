@props([
'id' => 'modal-id',
'title' => '',
'btn_text' => '',
'justify' => 'justify-center',
])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden items-center {{ $justify }} bg-black/50 opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-xl md:rounded-3xl shadow-lg w-full md:max-w-xl relative scale-95 transition-all duration-300">
        <!-- Header -->
        @if($title != "")
        <div class="flex justify-between items-center px-5 py-4 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
            <button class="text-gray-500 hover:text-gray-700 text-xl close-modal cursor-pointer" data-id="{{ $id }}">&times;</button>
        </div>
        @endif

        <!-- Body -->
        <div class="p-5 max-h-[70vh]  md:max-h-[78vh] overflow-y-auto">
            {{ $slot }}
        </div>

        <!-- Footer -->
        {{ $footer ?? '' }}
    </div>
</div>