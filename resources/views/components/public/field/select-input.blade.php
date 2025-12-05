@props([
'class_container' => "",
'class_list' => "",
'class_text' => "",
'default' => null,
'options' => [],
'id' => 'select-' . uniqid(),
])

<div class="relative w-full" id="{{ $id }}">

    <!-- Trigger -->
    <button class="select-btn flex gap-3 justify-between items-center border-gray-300 
        rounded-lg px-4 py-2 transition focus:outline-none w-full {{ $class_container }}">
        <span class="selected-text">{{ $default ?? "Pilih Item..." }}</span>

        <svg class="w-5 h-5 arrow-icon text-gray-500 transition-transform duration-200" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Popup Dropdown -->
    <div class="dropdown hidden absolute left-0 right-0 mt-2 bg-white shadow-xl rounded-xl
        border border-gray-200 overflow-hidden origin-top transform scale-y-0 opacity-0 
        transition duration-200 z-30 {{ $class_list }}">
        <ul class="max-h-48 overflow-y-auto">
            @foreach($options as $val)
            <li class="option px-4 py-2 cursor-pointer hover:bg-gray-100 {{ $class_text }}" data-value="{{ $val['value'] }}">{{ $val['display'] }}</li>
            @endforeach
        </ul>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        let select = $("#{{ $id }}");
        let dropdown = select.find(".dropdown");
        let btn = select.find(".select-btn");
        let text = select.find(".selected-text");
        let arrow = select.find(".arrow-icon");

        // Default Selection
        if ("{{ $default }}") {
            let defaultOption = select.find(`.option[data-value='{{ $default }}']`);
            if (defaultOption.length > 0) {
                text.text(defaultOption.text());
                select.find(".option").removeClass("bg-gray-200 font-semibold");
                defaultOption.addClass("bg-gray-200 font-semibold");
            }
        }

        // Toggle dropdown
        btn.on("click", function(e) {
            e.stopPropagation();
            dropdown.toggleClass("hidden");
            setTimeout(() => {
                dropdown.toggleClass("scale-y-0 opacity-0");
                arrow.toggleClass("rotate-180");
            }, 10);
        });

        // Option click
        select.find(".option").on("click", function() {
            let val = $(this).data("value");
            text.text($(this).text());

            select.find(".option").removeClass("bg-gray-200 font-semibold");
            $(this).addClass("bg-gray-200 font-semibold");

            dropdown.addClass("hidden scale-y-0 opacity-0");
            arrow.removeClass("rotate-180");
        });

        // Close on outside click
        $(document).on("click", function(e) {
            if (!select.is(e.target) && select.has(e.target).length === 0) {
                dropdown.addClass("hidden scale-y-0 opacity-0");
                arrow.removeClass("rotate-180");
            }
        });
    });
</script>
@endpush