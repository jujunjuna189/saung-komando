function startCounter(selector = '.counter', duration = 2000) {
    $(selector).each(function () {
        let $this = $(this);
        let target = parseInt($this.data('count'));
        let current = 0;
        let step = Math.ceil(target / (duration / 16));

        let interval = setInterval(function () {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(interval);
            }
            $this.text(current.toLocaleString("id-ID") + "+");
        }, 16);
    });
}

function checkFadeUp() {
    const scroll = $(window).scrollTop();
    const winHeight = $(window).height();

    $('.fade-up-scroll').each(function () {
        const top = $(this).offset().top;

        // Jika elemen masuk viewport → tambahkan animasi
        if (scroll + winHeight > top + 50) {
            $(this).addClass('fade-up');
        }
    });
}

// Trigger ketika halaman load
$(window).on('load', checkFadeUp);

// Trigger saat scroll
$(window).on('scroll', checkFadeUp);

function setupImageZoomJQ(selector, zoom = 200) {
    const $container = $(selector);
    const $img = $container.find("img");

    $container.on("mousemove", function (e) {
        const rect = this.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        $(this).css("background-position", `${x}% ${y}%`);
    });

    $container.on("mouseenter", function () {
        $(this).addClass("zoomed")
            .css({
                "background-image": `url(${$img.attr('src')})`,
                "background-size": `${zoom}%`,
                "background-repeat": "no-repeat"
            });
    });

    $container.on("mouseleave", function () {
        $(this).removeClass("zoomed")
            .css("background-image", "none");
    });
}
