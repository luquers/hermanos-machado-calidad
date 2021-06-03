function shortPost(url, data, oTable = false) {
    $.post(url, data)
        .done(function(response) {
            toastr.success(response.message);

            if (oTable) {
                $('.buttons-reload').click();
            }
        })
        .fail(function(response) {
            toastr.error(response.responseJSON.message);
            if (response.responseJSON) {
                showValidatorErrors(response.responseJSON.errors);
            }
        })
        .always(function() {
            // TODO hay que añadir un loader
        });
}

function shortGet(url, data) {
    $.get(url, data)
        .done(function(response) {
            toastr.success(response.message);
        })
        .fail(function(response) {
            toastr.error(response.message);
        })
        .always(function(response) {
            // TODO hay que añadir un loader
        });
}
