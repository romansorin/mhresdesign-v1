const userInputField = document.getElementById('mailuser-input-login');
const passInputField = document.getElementById('password-input-login');
const viewPass = document.getElementById('view-pass');

let username;
let password;
let submit;

let errorStates = {
    userNull: false,
    invalidCredentials: false
};

// @TODO: make placeholders red on error

const errors = {
    required: "<span class='input-error inline-error'>This field is required.</span>",
    minChars: "<span class='input-error inline-error'>Password must be a minimum of 5 characters.</span>",
    userNull: "<span class='input-error inline-error'>User does not exist.</span>",
    invalidCredentials: "<span class='input-error inline-error'>Invalid username/password.</span>",
    userNullReturned: "userNullError",
    invalidCredentialsReturned: "invalidCredentialsError"
};

$("#login-form").submit(function (event) {
    event.preventDefault();
    username = $("#mailuser-input-login").val();
    password = $("#password-input-login").val();
    submit = $("#login-btn").val();


    $.ajax({
        type: "POST",
        url: "login.inc.php",
        data: {username: username, password: password, submit: submit},
        success: function (result) {
            if (result === errors.userNullReturned) {
                errorStates.userNull = true;
                if (!userInputField.hasClass("input-error")) {
                    userInputField.addClass("input-error");
                    userInputField.after(errors.userNull);
                } else {
                    userInputField.next().remove();
                    userInputField.after(errors.userNull);
                }
            } else if (result === errors.invalidCredentialsReturned) {
                errorStates.invalidCredentials = true;
                if (!userInputField.hasClass("input-error")) {
                    userInputField.addClass("input-error");
                } else {
                    userInputField.next().remove();
                }
                if (!passInputField.hasClass("input-error")) {
                    passInputField.addClass("input-error");
                    viewPass.hide();
                    passInputField.after(errors.invalidCredentials);
                } else {
                    userInputField.next().remove();
                    viewPass.hide();
                    userInputField.after(errors.invalidCredentials);
                }
            } else {
                errorStates.userNull = false;
                errorStates.invalidCredentials = false;
                if (userInputField.hasClass("input-error")) {
                    userInputField.next().remove();
                }
                if (passInputField.hasClass("input-error")) {
                    passInputField.next().remove();
                    viewPass.show();
                }
            }
        }
    });
});

userInputField.focusout(function () {
    username = $("#mailuser-input-login").val();
    if (username.length === 0) {
        if (!userInputField.hasClass("input-error")) {
            userInputField.addClass("input-error");
            userInputField.after(errors.required);
        }
    } else if (!errorStates.userNull && !errorStates.invalidCredentials) {
        userInputField.removeClass("input-error");
        userInputField.next().remove();
    }
});

passInputField.focusout(function () {
    password = $("#password-input-login").val();
    if (password.length === 0) {
        if (!passInputField.hasClass("input-error")) {
            passInputField.addClass("input-error");
            viewPass.hide();
            passInputField.after(errors.required);
        } else {
            passInputField.next().remove();
            viewPass.hide();
            passInputField.after(errors.required);
        }
    } else if (password.length < 5) {
        if (!passInputField.hasClass("input-error")) {
            passInputField.addClass("input-error");
            viewPass.hide();
            passInputField.after(errors.minChars);
        } else {
            passInputField.next().remove();
            viewPass.hide();
            passInputField.after(errors.minChars);
        }
    } else if (!errorStates.invalidCredentials) {
        if (passInputField.hasClass("input-error")) {
            passInputField.removeClass("input-error");
            passInputField.next().remove();
        }
        viewPass.show();
    }
});