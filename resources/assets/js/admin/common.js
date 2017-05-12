$(document).ready(function () {
    $(function () {
        var status = $('meta[name="status"]').attr('content');

        if (status === 'success') {
            var message = $('meta[name="message"]').attr('content');
            toastr.success(message);
        } else if (status === 'failure') {
            var error = $('meta[name="error"]').attr('content');
            toastr.error(error);
        }
    });

    // delete a resource when click btn-delete-resource.
    $(document).on('click', '.btn-delete-resource', function (e) {
        e.preventDefault();

        var confirmMessage = $(this).attr('confirm-message');

        if (confirm(confirmMessage)) {
            var route = $(this).attr('href');

            $.post(route, { _method: 'delete' })
                .done(function (response) {
                    toastr.success(response.message);

                    setTimeout(function () {
                        if (response.redirect !== undefined) {
                            window.location.href = response.redirect;
                        }
                        window.location.reload();
                    }, 1000);
                })
                .fail(function (response) {
                    toastr.error(response.error);
                });
        }
    });
});
