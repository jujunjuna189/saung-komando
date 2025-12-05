const set_zero = (value) => {
    return value < 10 ? '0' + value : value;
}

const dateFormat = (date) => {
    var date = new Date(date);
    return date.getFullYear() + '-' + set_zero(date.getMonth() + 1) + '-' + set_zero(date.getDate());
}

function dateDiff(start, end) {
    const d1 = new Date(start);
    const d2 = new Date(end);

    return (d2 - d1) / (1000 * 60 * 60 * 24);
}

// Request category
const getCategory = ({ onSuccess }) => {
    requestServer({
        url: url + '/api/facility/category/show',
        type: "GET",
        onLoader: false,
        onSuccess: function (response) {
            onSuccess(response);
        },
    });
}

// Request to server
const requestServer = ({ url = '', type = 'post', data = [], onLoader = true, onSuccess }) => {
    $.ajax({
        url: url,
        type: type,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        headers: {
            'X-CSRF-TOKEN': token,
        },
        beforeSend: function () {
            if (onLoader) {
                showLoading();
            }
        },
        success: function (data) {
            onSuccess(data);
        },
        error: function (error) {
            showToast("error", "Gagal", "Terjadi kesalahan!");
            console.log(error);
        }
    });
}

function runSliders(containerSelector, autoplayTime = 5000) {
    const container = $(containerSelector);
    const track = container.find('.slider-track');
    const slides = container.find('.slider-image');

    // clone first slide
    const firstClone = slides.eq(0).clone();
    track.append(firstClone);

    let index = 0;
    let interval;

    function showSlide(i) {
        track.css('transition', 'transform 0.7s');
        track.css('transform', `translateX(${-i * 100}%)`);
    }

    function next() {
        index++;
        showSlide(index);

        if (index === slides.length) {
            setTimeout(() => {
                track.css('transition', 'none');
                index = 0;
                track.css('transform', 'translateX(0%)');
            }, 710);
        }
    }

    function prev() {
        if (index === 0) {
            index = slides.length;
            track.css('transition', 'none');
            track.css('transform', `translateX(${-index * 100}%)`);

            setTimeout(() => {
                track.css('transition', 'transform 0.7s');
                index--;
                showSlide(index);
            }, 10);
        } else {
            index--;
            showSlide(index);
        }
    }

    function start() {
        interval = setInterval(next, autoplayTime);
    }

    function reset() {
        clearInterval(interval);
        start();
    }

    // tombol
    container.find('.slider-next').click(function(e) {
        e.preventDefault();
        next();
        reset();
    });

    container.find('.slider-prev').click(function(e) {
        e.preventDefault();
        prev();
        reset();
    });

    start();
}

function initFacilitySlider(trackId, prevId, nextId, dotsId) {
    const $track = $(`#${trackId}`);
    const $container = $track.parent();
    const $dotsContainer = $(`#${dotsId}`);
    let index = 0;

    function updateSlider() {
        const containerWidth = $container.width();
        const totalWidth = $track[0].scrollWidth;
        const visibleItems = Math.floor(containerWidth / $track.children().first().outerWidth(true));
        const maxTranslate = totalWidth - containerWidth;

        const itemWidth = $track.children().first().outerWidth(true);
        const totalItems = $track.children().length;
        const maxIndex = totalItems - visibleItems;

        // Bound index
        if (index < 0) index = 0;
        if (index > maxIndex) index = maxIndex;

        // Hitung translateX
        let translateX = (index * itemWidth);
        if (translateX > maxTranslate) translateX = maxTranslate;

        $track.css('transform', `translateX(-${translateX}px)`);

        // Update dots
        $dotsContainer.empty();
        for (let i = 0; i <= maxIndex; i++) {
            const dotClass = i === index ? 'bg-black' : 'bg-gray-400';
            $dotsContainer.append(`<div class="w-2 h-2 rounded-full cursor-pointer ${dotClass} transition-colors"></div>`);
        }

        // Dot click
        $dotsContainer.children().click(function() {
            index = $(this).index();
            updateSlider();
        });

        // Disable buttons jika sudah di batas
        $(`#${prevId}`).prop('disabled', index === 0);
        $(`#${nextId}`).prop('disabled', index === maxIndex);
    }

    // Prev / Next
    $(`#${prevId}`).click(() => {
        index--;
        updateSlider();
    });
    $(`#${nextId}`).click(() => {
        index++;
        updateSlider();
    });

    // Responsive: reset slider saat resize
    $(window).resize(() => updateSlider());

    // Inisialisasi
    updateSlider();
}