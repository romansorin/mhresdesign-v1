// Define field variables for later use in functions
const userInputField = {
    id: $("#user-input-login"),
    hasErrorClass: function () {
        return this.id.hasClass("input-error");
    },
    addErrorClass: function () {
        this.id.addClass("input-error");
    },
    removeErrorClass: function () {
        this.id.removeClass("input-error");
    },
    removeNext: function () {
        this.id.next().remove();
    },
    after: function (arrayProperty) {
        this.id.after(arrayProperty);
    }
};
const passInputField = {
    id: $("#password-input-login"),
    hasErrorClass: function () {
        return this.id.hasClass("input-error");
    },
    addErrorClass: function () {
        this.id.addClass("input-error");
    },
    removeErrorClass: function () {
        this.id.removeClass("input-error");
    },
    removeNext: function () {
        this.id.next().remove();
    },
    after: function (arrayProperty) {
        this.id.after(arrayProperty);
    }
};
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
    username = userInputField.id.val();
    password = passInputField.id.val();
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
    switch (userInputField.hasErrorClass()) { // Check if error class is already applied
        // test: it does not have an error yet, so it should run 77 and 78
        // test again: double click.
        // test again: empty field error.
        // test again: no error
        case false: // If it isn't, add the class and check if the "userInput" error is already defined
            userInputField.addErrorClass();
            if (!errorStates.userInput) {
                userInputField.removeNext();
                userInputField.after(errors.userNull);
            }
            break;
        case true: // If the class exist, remove the error message and add the userNull error message instead
            if (!errorStates.userInput) {
                userInputField.removeNext();
                userInputField.after(errors.userNull);
            }
            break;
    }
}

/** [invalidCredentialsCheck: Check if username/password are valid and matching] */
function invalidCredentialsCheck() {
    errorStates.invalidCredentials = true;
    switch (userInputField.hasErrorClass()) {
        case false:
            if (!userInputField.hasErrorClass())
                userInputField.addErrorClass();
            break;
        case true:
            if (!errorStates.userInput)
                userInputField.removeNext();
            break;
    }
    switch (passInputField.hasErrorClass()) {
        case false:
            passInputField.addErrorClass();
            viewPass.hide();
            passInputField.after(errors.invalidCredentials);
            break;
        case true:
            userInputField.removeNext();
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
    if (userInputField.hasErrorClass())
        userInputField.removeNext();
    if (passInputField.hasErrorClass()) {
        passInputField.removeNext();
        viewPass.show();
    }
}

/** [userFieldChecks: Check for empty username fields and error states] */
function userFieldChecks() {
    username = userInputField.id.val();
    if (username.length === 0) {
        errorStates.userInput = true;
        switch (userInputField.hasErrorClass()) {
            case false:
                if (!errorStates.userNull) {
                    userInputField.addErrorClass()
                    userInputField.after(errors.required);
                }
                break;
            case true:
                if (!errorStates.userNull) {
                    userInputField.removeNext()
                    userInputField.after(errors.required);
                }
                break;
        }
// @TODO: maybe something to test the collective state of all elements in the array?
    } else if (errorStates.userNull === false && errorStates.invalidCredentials === false && errorStates.userInput === false && errorStates.passInput === false) {
        if (userInputField.hasErrorClass()) {
            userInputField.removeErrorClass();
            userInputField.id.next().remove();
        }
    } else {
        errorStates.userInput = false;
        userInputField.removeErrorClass();
        userInputField.removeNext();
    }
}

/** [passFieldChecks: Check for empty fields & character length] */
function passFieldChecks() {
    password = passInputField.id.val();
    if (password.length === 0) {
        switch (passInputField.hasErrorClass()) {
            case false:
                passInputField.addErrorClass();
                viewPass.hide();
                passInputField.after(errors.required);
                break;
            case true:
                passInputField.removeNext();
                viewPass.hide();
                passInputField.after(errors.required);
                break;
        }
    } else if (password.length < 5) {
        switch (passInputField.hasErrorClass()) {
            case false:
                passInputField.addErrorClass();
                viewPass.hide();
                passInputField.after(errors.minChars);
                break;
            case true:
                passInputField.removeNext();
                viewPass.hide();
                passInputField.after(errors.minChars);
                break;
        }
    } else if (!errorStates.invalidCredentials) {
        if (passInputField.hasErrorClass()) {
            passInputField.removeErrorClass();
            passInputField.removeNext();
        }
        viewPass.show();
    } else {
        passInputField.removeErrorClass();
        passInputField.removeNext();
    }
}

/** [Run these when input fields lose focus to validate the input] */
userInputField.id.focusout(function () {
    userFieldChecks();
});

passInputField.id.focusout(function () {
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