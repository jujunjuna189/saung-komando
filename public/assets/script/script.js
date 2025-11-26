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