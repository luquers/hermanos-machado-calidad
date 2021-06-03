function showValidatorErrors(errors) {
    clearErrors();

    $.each(errors, function(input, error) {
        let formGroup = $('#' + input).closest('.form-group');
        formGroup.addClass('error');
        formGroup.append('<div class="help-block"><ul class="role"><li>'+error+'</li></ul></div>');

        setTimeout(clearErrors, 5000);
    });
}

function clearErrors() {
    $('.error').removeClass('error');
    $('.help-block').remove();
}