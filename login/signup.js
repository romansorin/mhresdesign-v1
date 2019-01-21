const userInputField = {
    id: $("#user-input-signup"),
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
const emailInputField = {
    id: $("#email-input-signup"),
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
    id: $("#password-input-signup"),
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
const passConfirmInputField = {
    id: $("#password-confirm-input-signup"),
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
const signup = $("#signup-btn");

let username;
let email;
let password;
let passwordConfirm;
let submit;
/* Necessary checks:
 + If any fields are empty (required fields)
 + If email does not contain @
 + If password and passwordConfirm do not match
 + Minimum characters > 5
 + Username cannot have invalid characters
 + Password cannot match username
 + Username already exists
 + Email already exists
 */
// @TODO: Stay on page (login, singup, forgot password) on refresh
// @TODO: Do not re-submit form data on refresh or going back

let errorStates = {
    userInput: false,
    emailInput: false,
    passInput: false,
    userExists: false,
    emailExists: false,
    invalidUserChars: false,
    invalidEmailChars: false
};

const errors = {
 //   required: "<span class='input-error inline-error'>This field is required.</span>",
  //  minChars: "<span class='input-error inline-error'>Password must be a minimum of 5 characters.</span>",
    passConfirm: "<span class='input-error inline-error'>Passwords do not match.</span>",
    passMatch: "<span class='input-error inline-error'>Password cannot be the same as username.</span>",
    userExists: "<span class='input-error inline-error'>User already exists.</span>",
    emailExists: "<span class='input-error inline-error'>Email is already in use.</span>",
    invalidUserChars: "<span class='input-error inline-error'>Username can only contain alphanumerics.</span>",
    invalidEmailChars: "<span class='input-error inline-error'>Email must contain '@'.</span>",
    userExistsReturned: "userExistsError",
    emailExistsReturned: "emailExistsError",
    invalidUserCharsReturned: "invalidUserCharsError",
    invalidEmailCharsReturned: "invalidEmailCharsError",
    passConfirmReturned: "passConfirmError",
    passMatchReturned: "passMatchError"
};

$('#signup-form').submit(function (event) {
    event.preventDefault();

    username = userInputField.val();
    email = emailInputField.val();
    password = passInputField.val();
    passwordConfirm = passConfirmInputField.val();
    submit = signup.val();

    $.ajax({
        type: "POST",
        url: "signup.inc.php",
        data: {username: username, email: email, password: password, passwordConfirm: passwordConfirm, submit: submit},
        success: function (result) {
            userFieldChecks();
            emailFieldChecks();
            passFieldChecks();
            passConfirmFieldChecks();
            switch (result) {
                case errors.userExistsReturned:
                    userExistsCheck();
                    break;
                case errors.emailExistsReturned:
                    emailExistsCheck();
                    break;
                case errors.invalidUserCharsReturned:
                    invalidUserCharsCheck();
                    break;
                case errors.invalidEmailCharsReturned:
                    invalidEmailCharsCheck();
                    break;
                default:
                    validChecks();
                    // window.location.href = "index.php";
                    break;
            }
        }
    })
});

function userExistsCheck() {
    errorStates.userExists = true;
    switch (userInputField.hasErrorClass()) {
        case false:
            userInputField.addErrorClass();
            userInputField.after(errors.userExists);
            break;
        case true:
            userInputField.removeNext();
            userInputField.after(errors.userExists);
            break;
    }
}

function emailExistsCheck() {
    errorStates.emailExists = true;
    switch (emailInputField.hasErrorClass()) {
        case false:
            emailInputField.addErrorClass();
            emailInputField.after(error.emailExists);
            break;
        case true:
            emailInputField.removeNext();
            emailInputField.after(error.emailExists);
            break;
    }
}

function invalidUserCharsCheck() {
    errorStates.invalidUserChars = true;
    switch (userInputField.hasErrorClass()) {
        case false:
            break;
        case true:
            break;
    }
}

function invalidEmailCharsCheck() {
    errorStates.invalidEmailChars = true;
    switch (emailInputField.hasErrorClass()) {
        case false:
            break;
        case true:
            break;
    }
}

function validChecks() {
}

function userFieldChecks() {
    username = userInputField.id.val();
    if (username.length === 0) {
        errorStates.userInput = true;
        switch (userInputField.hasErrorClass()) {
            case false:
                if (!errorStates.userExists) {
                    userInputField.addErrorClass();
                    userInputField.after(errors.required);
                }
                break;
            case true:
                if (!errorStates.userExists) {
                    userInputField.removeNext();
                    userInputField.after(errors.required);
                }
                break;
        }
// @TODO: maybe something to test the collective state of all elements in the array?
    } else if (errorStates.userExists === false && errorStates.invalidCredentials === false && errorStates.userInput === false && errorStates.passInput === false) {
        if (userInputField.hasErrorClass()) {
            userInputField.removeErrorClass();
            userInputField.removeNext();
        }
    } else {
        errorStates.userInput = false;
        userInputField.removeErrorClass();
        userInputField.removeNext();
    }
}

function emailFieldChecks() {
}

function passFieldChecks() {
}

function passConfirmFieldChecks() {
}

userInputField.id.focusout(function () {
    userFieldChecks();
    alert('checks')
});
emailInputField.id.focusout(function () {
    emailFieldChecks();
});
passInputField.id.focusout(function () {
    passFieldChecks();
});
passConfirmInputField.id.focusout(function () {
    passConfirmFieldChecks();
});