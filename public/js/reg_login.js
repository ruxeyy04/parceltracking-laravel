$('#registration').on('submit', function (e) {
    e.preventDefault();
    let formdata = new FormData(this);

    $.ajax({
        type: "POST",
        url: "api/register",
        data: formdata,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (res) {
            // Handle the success response
            if (res.status === 'success') {
                // Show a success message using SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: res.message,
                })
                $('#reg').modal('hide');

            }
        },
        error: function (xhr, status, error) {
            // Handle validation errors or other errors
            if (xhr.responseJSON.errors) {
                // Show validation errors using SweetAlert
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
                // Show a general error message using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong. Please try again later.',
                });
            }
        }
    });
});


$('#login').on('submit', function (e) {
    e.preventDefault();
    let formdata = new FormData(this);

    $.ajax({
        type: "POST",
        url: "api/login",
        data: formdata,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (res) {
            if (res.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: res.message,
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                });
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
                // Show a general error message using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Invalid credentials. Please check your email/username and password.',
                });
            }
        }
    });
});
