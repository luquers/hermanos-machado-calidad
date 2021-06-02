$('#users-table').on('click', '.delete-user', function () {

    let url = $(this).data('href');

    Swal.fire({
        title: Lang.get('global.confirm-question'),
        text: Lang.get('global.confirm-notice'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: Lang.get('global.continue'),
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ml-1'
        },
        cancelButtonText: Lang.get('global.cancel'),
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            shortPost(url, { _method: 'DELETE', _token: $('meta[name="csrf-token"]').attr('content') }, true);
        }
    })
});

$('#email, #name').donetyping(function() {
    window.LaravelDataTables['users-table'].draw();
});

$('#users_softDelete').change(function() {
    window.LaravelDataTables['users-table'].draw();
})