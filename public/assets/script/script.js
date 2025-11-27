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