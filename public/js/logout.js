document.addEventListener('DOMContentLoaded', function () {
    var logoutBtn = document.getElementById('logout-btn');
    
    logoutBtn.addEventListener('click', function () {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://127.0.0.1:8000/api/logout', true);


        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location.href = "/";
            }
        };

        xhr.send();
    });
});

$('#updateprofile').on('submit', function (e) {
    e.preventDefault();
    let formdata = new FormData(this);
    $.ajax({
        type: "POST",
        url: "/api/editprofile",
        data: formdata,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                });
            } else {
                Swal.fire({
                    icon: 'info',
                    title: 'Notice',
                    text: response.message,
                })
            }
        },
        error: function (xhr, status, error) {
            if (xhr.responseJSON.errors) {
                let errorsHtml = '';
                $.each(xhr.responseJSON.errors, function (key, value) {
                    errorsHtml += `<li>${value[0]}</li>`;
                });

                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error!',
                    html: `<ul>${errorsHtml}</ul>`,
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong. Please try again later.',
                });
            }
        }
    });
});

