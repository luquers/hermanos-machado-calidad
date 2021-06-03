jQuery.validator.setDefaults({
    debug: false,
    ignore: ":hidden",
    highlight: function ( element, errorClass, validClass ) {
        $(element).closest('.form-group').addClass('error');
        $(element).closest('.form-control').addClass('is-invalid');

    },
    unhighlight: function ( element, errorClass, validClass ) {
        $(element).closest(".form-group").removeClass("error");
        $(element).closest('.form-control').removeClass('is-invalid');
    }
});

$.validator.addMethod("pwcheck", function(value) {
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
        && /[a-z]/.test(value) // has a lowercase letter
        && /\d/.test(value) // has a digit
});