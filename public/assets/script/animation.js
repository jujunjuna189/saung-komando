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