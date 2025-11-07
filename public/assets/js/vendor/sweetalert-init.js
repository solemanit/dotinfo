//Basic
document.getElementById("sa-basic").addEventListener("click", function () {
    Swal.fire(
        {
            title: 'This is a basic alert example.',
            confirmButtonColor: 'var(--color-primary)',
        }
    )
});

//A title with a text under
document.getElementById("sa-title").addEventListener("click", function () {
    Swal.fire(
        {
            title: "The Internet?",
            text: 'Would you like to know more?',
            icon: 'question',
            confirmButtonColor: 'var(--color-primary)'
        }
    )
});

//Success Message
document.getElementById("sa-success").addEventListener("click", function () {
    Swal.fire(
        {
            title: 'Success!',
            text: 'You clicked the button!',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: 'var(--color-primary)',
            cancelButtonColor: "var(--color-danger)"
        }
    )
});

//Warning Message
document.getElementById("sa-warning").addEventListener("click", function () {
    Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to proceed? This action cannot be undone.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "var(--color-success)",
        cancelButtonColor: "var(--color-danger)",
        confirmButtonText: "Yes, delete it!"
    }).then(function (result) {
        if (result.value) {
            Swal.fire("Deleted!", "Your file has been successfully deleted.", "success"
            );
        }
    });
});

//Parameter
document.getElementById("sa-params").addEventListener("click", function () {
    Swal.fire({
        title: 'Confirmation Required',
        text: "This action is irreversible. Are you sure?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        customClass: {
            confirmButtonClass: 'btn btn-success mt-2',
            cancelButtonClass: 'btn btn-danger ms-2 mt-2',
        },
        buttonsStyling: true,
    }).then(function (result) {
        if (result.value) {
            Swal.fire({
                title: 'Deleted!',
                text: 'The item has been deleted.',
                icon: 'success',
                confirmButtonColor: 'var(--color-primary)',
            })
        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire({
                title: 'Cancelled',
                text: 'No changes were made.',
                icon: 'error',
                confirmButtonColor: 'var(--color-primary)',
            })
        }
    });
});


//Custom Image
document.getElementById("sa-image").addEventListener("click", function () {
    Swal.fire({
        title: 'Sweet!',
        text: 'This modal displays a custom image.',
        imageUrl: 'assets/images/logo/favicon.svg',
        imageHeight: 50,
        confirmButtonColor: "var(--color-primary)",
        animation: false
    })
});

//Auto Close Timer
document.getElementById("sa-close").addEventListener("click", function () {
    var timerInterval;
    Swal.fire({
        title: 'Auto close alert!',
        html: 'This alert will close in <b></b> seconds.',
        timer: 2000,
        timerProgressBar: true,
        didOpen: function () {
            Swal.showLoading()
            timerInterval = setInterval(function () {
                var content = Swal.getHtmlContainer()
                if (content) {
                    var b = content.querySelector('b')
                    if (b) {
                        b.textContent = Swal.getTimerLeft()
                    }
                }
            }, 100)
        },
        onClose: function () {
            clearInterval(timerInterval)
        }
    }).then(function (result) {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
    })
});

//custom html alert
document.getElementById("custom-html-alert").addEventListener("click", function () {
    Swal.fire({
        title: '<i>HTML</i> <u>example</u>',
        icon: 'info',
        html: 'You can use <b>bold text</b>, ' +
            '<a href="//Pichforest.in/">links</a> ' +
            'and other HTML tags',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger ms-1',
        confirmButtonColor: "#47bd9a",
        cancelButtonColor: "var(--color-danger)",
        confirmButtonText: '<i class="ri-thumb-up-fill me-1"></i> Great!',
        cancelButtonText: '<i class="ri-thumb-down-fill"></i> Decline'
    })
});

//position
document.getElementById("sa-position").addEventListener("click", function () {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your settings have been updated.',
        showConfirmButton: false,
        timer: 1500
    })
});

//Custom width padding
document.getElementById("custom-padding-width-alert").addEventListener("click", function () {
    Swal.fire({
        title: 'This alert has custom width and padding.',
        width: 600,
        padding: 100,
        confirmButtonColor: "var(--color-primary)",
        background: 'var(--color-body-bg)'
    })
});

//Ajax
document.getElementById("ajax-alert").addEventListener("click", function () {
    Swal.fire({
        title: 'Submit email to run ajax request',
        input: 'email',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        confirmButtonColor: "var(--color-primary)",
        cancelButtonColor: "var(--color-danger)",
        preConfirm: function (email) {
            return new Promise(function (resolve, reject) {
                setTimeout(function () {
                    if (email === 'taken@example.com') {
                        reject('This email is already taken.')
                    } else {
                        resolve()
                    }
                }, 2000)
            })
        },
        allowOutsideClick: false
    }).then(function (email) {
        Swal.fire({
            icon: 'success',
            title: 'Ajax request finished!',
            confirmButtonColor: "var(--color-primary)",
            html: 'Submitted email: ' + email
        })
    })
});
