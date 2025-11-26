// Create container auto
if ($("#toast-container").length === 0) {
    $("body").append(`
        <div id="toast-container" 
            class="fixed top-6 right-6 z-50 flex flex-col gap-3 pointer-events-none">
        </div>
    `);
}

function closeAllToasts() {
    $("#toast-container").children().remove();
}

function showToast(type = "info", title = "", message = "", duration = 3000) {
    // Tutup semua dulu (termasuk loading)
    closeAllToasts();

    const colors = {
        success: "bg-green-50 text-green-800 ring-green-400",
        error: "bg-red-50 text-red-800 ring-red-400",
        warning: "bg-yellow-50 text-yellow-800 ring-yellow-400",
        info: "bg-blue-50 text-blue-800 ring-blue-400",
        loading: "bg-gray-50 text-gray-800 ring-gray-400",
    };

    const icons = {
        success: `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M5 13l4 4L19 7"/></svg>`,
        error: `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>`,
        warning: `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M10.29 3.86L1.82 18h20.36L13.71 3.86z"/></svg>`,
        info: `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M13 16h-1V12h-1m1-4h.01"/></svg>`,
        loading: `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 animate-spin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3a9 9 0 1 0 9 9" /></svg>
        `,
    };

    const toast = $(`
        <div class="${colors[type]}
                   ring-1 shadow-lg rounded-lg p-3 w-80 flex items-start gap-3
                   opacity-0 translate-x-5 transition-all duration-300 pointer-events-auto">
            
            <div class="mt-1">${icons[type]}</div>

            <div class="flex-1">
                <div class="font-semibold text-sm">${title}</div>
                <div class="text-xs mt-1">${message}</div>

                ${type === "loading"
            ? ""
            : `
                        <div class="h-1 bg-black/10 rounded-full overflow-hidden mt-3">
                            <div class="progress h-full bg-current" style="width: 100%;"></div>
                        </div>
                        `
        }
            </div>

            <button class="close ml-2 text-xl leading-none">×</button>
        </div>
    `);

    $("#toast-container").prepend(toast);

    setTimeout(() => {
        toast.removeClass("opacity-0 translate-x-5")
            .addClass("opacity-100 translate-x-0");
    }, 20);

    if (type !== "loading") {
        toast.find(".progress").animate({ width: "0%" }, duration, "linear");
        setTimeout(() => toast.remove(), duration + 200);
    }

    toast.find(".close").on("click", function () {
        toast.remove();
    });
}

// Shortcut khusus loading
function showLoading(text = "Memproses...", sub = "Mohon tunggu") {
    showToast("loading", text, sub, 0);
}