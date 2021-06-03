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
        required: false,
        minlength: 8,
        pwcheck: false
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