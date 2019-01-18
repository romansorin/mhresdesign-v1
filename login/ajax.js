// Define field variables for later use in functions
const userInputField = $("#mailuser-input-login");
const passInputField = $("#password-input-login");
const login = $("#login-btn");
const viewPass = $("#view-pass");

let username;
let password;
let submit;

// ErrorStates array holds the current error shown later, used for checking validity and status
let errorStates = {
    userInput: false,
    userNull: false,
    invalidCredentials: false
};

// @TODO: make placeholders red on error
// @TODO: figure out why invalid username / password is so slow responding..

// Errors array to easily access the provided errors and the error codes which are returned from login.inc.php
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
    // Set the value here so the values are updated
    username = userInputField.val();
    password = passInputField.val();
    submit = login.val();

    $.ajax({
        type: "POST",
        url: "login.inc.php",
        data: {username: username, password: password, submit: submit},
        success: function (result) {
            /* In the case that a user submits the login form without entering any fields, check if these fields are empty. If they are, respond with a "required" error */
            userFieldChecks();
            passFieldChecks();
            /* This switch checks the result which is returned from login.inc.php in the form of a string */
            switch (result) {
                case errors.userNullReturned:
                    userNullCheck();
                    break;
                case errors.invalidCredentialsReturned:
                    invalidCredentialsCheck();
                    break;
                default:
                    validChecks();
                    window.location.href = "../dashboard";
                    break;
            }
        }
    });
})
;

/** [userNullCheck: Checks if the username does not exist in the database] */
function userNullCheck() {
    errorStates.userNull = true;
    switch (userInputField.hasClass("input-error")) { // Check if error class is already applied
        case false: // If it isn't, add the class and check if the "userInput" error is already defined
            userInputField.addClass("input-error");
            if (errorStates.userInput === false)
                userInputField.after(errors.userNull);
            break;
        case true: // If the class exist, remove the error message and add the userNull error message instead
            if (errorStates.userInput === false) {
                userInputField.next().remove();
                userInputField.after(errors.userNull);
            }
            break;
    }
}

/** [invalidCredentialsCheck: Check if username/password are valid and matching] */
function invalidCredentialsCheck() {
    errorStates.invalidCredentials = true;
    switch (userInputField.hasClass("input-error")) {
        case false:
            if (!userInputField.hasClass("input-error"))
                userInputField.addClass("input-error");
            break;
        case true:
            if (!errorStates.userInput)
                userInputField.next().remove();
            break;
    }
    switch (passInputField.hasClass("input-error")) {
        case false:
            passInputField.addClass("input-error");
            viewPass.hide();
            passInputField.after(errors.invalidCredentials);
            break;
        case true:
            userInputField.next().remove();
            viewPass.hide();
            userInputField.after(errors.invalidCredentials);
    }
}

/** [validChecks: Executed if all other checks are false, resets the error fields] */
function validChecks() {
    // @TODO: utilize a for-each loop to assign false?
    errorStates.userInput = false;
    errorStates.userNull = false;
    errorStates.invalidCredentials = false;
    if (userInputField.hasClass("input-error"))
        userInputField.next().remove();
    if (passInputField.hasClass("input-error")) {
        passInputField.next().remove();
        viewPass.show();
    }
}

/** [userFieldChecks: Check for empty username fields and error states] */
function userFieldChecks() {
    username = userInputField.val();
    if (username.length === 0) {
        errorStates.userInput = true;
        switch (userInputField.hasClass("input-error")) {
            case false:
                userInputField.addClass("input-error");
                userInputField.after(errors.required);
                break;
            case true:
                userInputField.next().remove();
                userInputField.after(errors.required);
                break;
        }
// @TODO: maybe something to test the collective state of all elements in the array?
    } else if (errorStates.userNull === false && errorStates.invalidCredentials === false && errorStates.userInput === false) {
        userInputField.removeClass("input-error");
        userInputField.next().remove();
    } else {
        errorStates.userInput = false;
        userInputField.removeClass("input-error");
        userInputField.next().remove();
    }
}

/** [passFieldChecks: Check for empty fields & character length] */
function passFieldChecks() {
    password = passInputField.val();
    if (password.length === 0) {
        switch (passInputField.hasClass("input-error")) {
            case false:
                passInputField.addClass("input-error");
                viewPass.hide();
                passInputField.after(errors.required);
                break;
            case true:
                passInputField.next().remove();
                viewPass.hide();
                passInputField.after(errors.required);
                break;
        }
    } else if (password.length < 5) {
        switch (passInputField.hasClass("input-error")) {
            case false:
                passInputField.addClass("input-error");
                viewPass.hide();
                passInputField.after(errors.minChars);
                break;
            case true:
                passInputField.next().remove();
                viewPass.hide();
                passInputField.after(errors.minChars);
                break;
        }
    } else if (errorStates.invalidCredentials === false) {
        if (passInputField.hasClass("input-error")) {
            passInputField.removeClass("input-error");
            passInputField.next().remove();
        }
        viewPass.show();
    }
}

/** [Run these when input fields lose focus to validate the input] */
userInputField.focusout(function () {
    userFieldChecks();
});

passInputField.focusout(function () {
    passFieldChecks();
});

viewPass.click(function (event) {
    event.preventDefault();
    if (passInputField.attr('type') === 'password') {
        passInputField.attr('type', 'text');
        $(this).find($(".far")).removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
        passInputField.attr('type', 'password');
        $(this).find($(".far")).removeClass('fa-eye').addClass('fa-eye-slash');
    }
});