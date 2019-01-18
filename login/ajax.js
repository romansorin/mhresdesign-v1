const userInputField = $("#mailuser-input-login");
const passInputField = $("#password-input-login");
let viewPass = $("#view-pass");

let username;
let password;
let submit;

let errorStates = {
    userNull: false,
    invalidCredentials: false
};

// @TODO: make placeholders red on error
// @TODO: replace if-else's with switch where reasonable
// @TODO: handle case of clicking submit button without any input?
// @TODO: make username and password field input checks (for null, minchars, etc) into independent functions so they can possibly be used in the submit event

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
            switch (result) {
                case errors.userNullReturned:
                    userNullCheck();
                    break;
                case errors.invalidCredentialsReturned:
                    invalidCredentialsCheck();
                    break;
                default:
                    validChecks();
                    break;
            }
        }
    });
})
;

function userNullCheck() {
    errorStates.userNull = true;
    if (!userInputField.hasClass("input-error")) {
        userInputField.addClass("input-error");
        userInputField.after(errors.userNull);
    } else {
        userInputField.next().remove();
        userInputField.after(errors.userNull);
    }
}

function invalidCredentialsCheck() {
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
}

function validChecks() {
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

viewPass.click(function (event) {
    event.preventDefault();
    if (passInputField.attr('type') == 'password') {
        passInputField.attr('type', 'text');
        $(this).find($(".far")).removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
        passInputField.attr('type', 'password');
        $(this).find($(".far")).removeClass('fa-eye').addClass('fa-eye-slash');
    }
});

