const userInputField = $("#mailuser-input-login");
const passInputField = $("#password-input-login");
const login = $("#login-btn");
const viewPass = $("#view-pass");

let username;
let password;
let submit;

let errorStates = {
    userInput: false,
    userNull: false,
    invalidCredentials: false
};

// @TODO: make placeholders red on error
// @TODO: replace if-else's with switch where reasonable
// @TODO: handle case of clicking submit button without any input?
// @TODO: make username and password field input checks (for null, minchars, etc) into independent functions so they can possibly be used in the submit event
// @TODO: commenting
// @TODO: figure out why invalid username / password is so slow responding..

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
    username = userInputField.val();
    password = passInputField.val();
    submit = login.val();

    $.ajax({
        type: "POST",
        url: "login.inc.php",
        data: {username: username, password: password, submit: submit},
        success: function (result) {
            userFieldChecks();
            passFieldChecks();
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
        if (!errorStates.userInput) {
            userInputField.after(errors.userNull);
        }
    } else {
        if (!errorStates.userInput) {
            userInputField.next().remove();
            userInputField.after(errors.userNull);
        }
    }
}

function invalidCredentialsCheck() {
    errorStates.invalidCredentials = true;
    if (!userInputField.hasClass("input-error")) {
        userInputField.addClass("input-error");
    } else {
        if (!errorStates.userInput) {
            userInputField.next().remove();
        }
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
    // @TODO: utilize a for-each loop to assign false?
    errorStates.userInput = false;
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

function userFieldChecks() {
    username = userInputField.val();
    if (username.length === 0) {
        errorStates.userInput = true;
        if (!userInputField.hasClass("input-error")) {
            userInputField.addClass("input-error");
            userInputField.after(errors.required);
        } else {
            userInputField.next().remove();
            userInputField.after(errors.required);
        }
        // @TODO: maybe something to test the collective state of all elements in the array?
    } else if (!errorStates.userNull && !errorStates.invalidCredentials && !errorStates.userInput) {
        userInputField.removeClass("input-error");
        userInputField.next().remove();
    } else {
        errorStates.userInput = false;
        userInputField.removeClass("input-error");
        userInputField.next().remove();
    }
}

function passFieldChecks() {
    password = passInputField.val();
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
}

userInputField.focusout(function () {
    userFieldChecks();
});

passInputField.focusout(function () {
    passFieldChecks();
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

