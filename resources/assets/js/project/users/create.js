let validation = {
    username: {
        required: false,
    },
    avatar: {
        required: false,
        file: true
    },
    email: {
        required: true,
        email: true
    },
    name: {
        required: true,
        maxlength: 191
    },
    password: {
        required: true,
        minlength: 8,
        pwcheck: true
    },
    password_confirmation: {
        equalTo: '#password'
    }
};

let messages = {
    password: {
        pwcheck: Lang.get('validation.pwcheck', {numcharacter: 8})
    }
};

$('#create-user').validate({
    lang: locale,
    rules: validation,
    messages: messages
});