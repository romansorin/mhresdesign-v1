const userInputField = $('#mailuser-input-login');
const passInputField = $('#password-input-login');
const viewPass = $('#view-pass');

let userNullErrorState = false;
let invalidCredentialsErrorState = false;

const requiredError = "<span class='input-error inline-error'>This field is required.</span>";
const minCharsError = "<span class='input-error inline-error'>Password must be a minimum of 5 characters.</span>";
const userNullError = "<span class='input-error inline-error'>User does not exist.</span>";
const invalidCredentialsError = "<span class='input-error inline-error'>Invalid username/password.</span>";

$('#login-form').submit(function (event) {
    event.preventDefault();

    const username = $('#mailuser-input-login').val();
    const password = $('#password-input-login').val();
    const submit = $('#login-btn').val();

    $.ajax({
        type: "POST",
        url: "login.inc.php",
        data: {username: username, password: password, submit: submit},
        success: function (result) {
            if (result === 'userNullError') {
                userNullErrorState = true;
                if (!userInputField.hasClass('input-error')) {
                    userInputField.addClass('input-error');
                    userInputField.after(userNullError);
                } else {
                    userInputField.next().remove();
                    userInputField.after(userNullError);
                }
            } else if (result === 'invalidCredentialsError') {
                invalidCredentialsErrorState = true;
                if (!userInputField.hasClass('input-error')) {
                    userInputField.addClass('input-error');
                } else {
                    userInputField.next().remove();
                }
                if (!passInputField.hasClass('input-error')) {
                    passInputField.addClass('input-error');
                    viewPass.hide();
                    passInputField.after(invalidCredentialsError);
                } else {
                    userInputField.next().remove();
                    viewPass.hide();
                    userInputField.after(invalidCredentialsError);
                }
            } else {
                userNullErrorState = false;
                invalidCredentialsErrorState = false;
                if (userInputField.hasClass('input-error')) {
                    userInputField.next().remove();
                }
                if (passInputField.hasClass('input-error')) {
                    passInputField.next().remove();
                    viewPass.show();
                }
            }
        }
    });
});

userInputField.focusout(function () {
    if ($('#mailuser-input-login').val().length === 0) {
        if (!userInputField.hasClass('input-error')) {
            userInputField.addClass('input-error');
            userInputField.after(requiredError);
        }
    } else if (!userNullErrorState && !invalidCredentialsErrorState) {
        userInputField.removeClass('input-error');
        userInputField.next().remove();
    }
});

passInputField.focusout(function () {
    if ($('#password-input-login').val().length === 0) {
        if (!passInputField.hasClass('input-error')) {
            passInputField.addClass('input-error');
            viewPass.hide();
            passInputField.after(requiredError);
        } else {
            passInputField.next().remove();
            viewPass.hide();
            passInputField.after(requiredError);
        }
    } else if ($('#password-input-login').val().length < 5) {
        if (!passInputField.hasClass('input-error')) {
            passInputField.addClass('input-error');
            viewPass.hide();
            passInputField.after(minCharsError);
        } else {
            passInputField.next().remove();
            viewPass.hide();
            passInputField.after(minCharsError);
        }
    } else if (!invalidCredentialsErrorState) {
        passInputField.removeClass('input-error');
        passInputField.next().remove();
        viewPass.show();
    }
});