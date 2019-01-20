const userLoginInputField = {
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
const passLoginInputField = {
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

const userSignupInputField = {
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
const emailSignupInputField = {
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
const passSignupInputField = {
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

const login = $("#login-btn");
const signup = $("#signup-btn");
const viewPass = $("#view-pass");

let username, email, password, passwordConfirm, submit;

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
    userNull: false,
    userExists: false,
    emailExists: false,
    invalidUserChars: false,
    invalidEmailChars: false,
    invalidCredentials: false
};

// @TODO: figure out why invalid username / password is so slow responding..

const errors = {
    required: "<span class='input-error inline-error'>This field is required.</span>",
    minChars: "<span class='input-error inline-error'>Password must be a minimum of 5 characters.</span>",
    passConfirm: "<span class='input-error inline-error'>Passwords do not match.</span>",
    passMatch: "<span class='input-error inline-error'>Password cannot be the same as username.</span>",
    userNull: "<span class='input-error inline-error'>User does not exist.</span>",
    userExists: "<span class='input-error inline-error'>Username is taken.</span>",
    emailExists: "<span class='input-error inline-error'>Email is already in use.</span>",
    invalidUserChars: "<span class='input-error inline-error'>Username can only contain alphanumerics.</span>",
    invalidEmailChars: "<span class='input-error inline-error'>Email must contain '@' and valid format.</span>",
    invalidCredentials: "<span class='input-error inline-error'>Invalid username/password.</span>",
    passConfirmReturned: "passConfirmError",
    passMatchReturned: "passMatchError",
    userNullReturned: "userNullError",
    userExistsReturned: "userExistsError",
    emailExistsReturned: "emailExistsError",
    invalidUserCharsReturned: "invalidUserCharsError",
    invalidEmailCharsReturned: "invalidEmailCharsError",
    invalidCredentialsReturned: "invalidCredentialsError"
};


// Login
$("#login-form").submit(function (event) {
    event.preventDefault();
    // Set the value here so the values are updated
    username = userLoginInputField.id.val();
    password = passLoginInputField.id.val();
    submit = login.val();

    $.ajax({
        type: "POST",
        url: "login.inc.php",
        data: {username: username, password: password, submit: submit},
        success: function (result) {
            /* In the case that a user submits the login form without entering any fields, check if these fields are empty. If they are, respond with a "required" error */
            userLoginFieldChecks();
            passLoginFieldChecks();
            /* This switch checks the result which is returned from login.inc.php in the form of a string */
            switch (result) {
                case errors.userNullReturned:
                    userNullCheck();
                    break;
                case errors.invalidCredentialsReturned:
                    invalidCredentialsCheck();
                    break;
                default:
                    validLoginChecks();
                    window.location.href = "../dashboard";
                    break;
            }
        }
    });
});

function userLoginFieldChecks() {
    username = userLoginInputField.id.val();
    if (username.length === 0) {
        errorStates.userInput = true;
        switch (userLoginInputField.hasErrorClass()) {
            case false:
                if (!errorStates.userNull) {
                    userLoginInputField.addErrorClass();
                    userLoginInputField.after(errors.required);
                }
                break;
            case true:
                if (!errorStates.userNull) {
                    userLoginInputField.removeNext();
                    userLoginInputField.after(errors.required);
                }
                break;
        }
// @TODO: maybe something to test the collective state of all elements in the array?
    } else if (errorStates.userNull === false && errorStates.invalidCredentials === false && errorStates.userInput === false && errorStates.passInput === false) {
        if (userLoginInputField.hasErrorClass()) {
            userLoginInputField.removeErrorClass();
            userLoginInputField.removeNext();
        }
    } else {
        errorStates.userInput = false;
        userLoginInputField.removeErrorClass();
        userLoginInputField.removeNext();
    }
}
function passLoginFieldChecks() {
    password = passLoginInputField.id.val();
    if (password.length === 0) {
        switch (passLoginInputField.hasErrorClass()) {
            case false:
                passLoginInputField.addErrorClass();
                viewPass.hide();
                passLoginInputField.after(errors.required);
                break;
            case true:
                passLoginInputField.removeNext();
                viewPass.hide();
                passLoginInputField.after(errors.required);
                break;
        }
    } else if (password.length < 5) {
        switch (passLoginInputField.hasErrorClass()) {
            case false:
                passLoginInputField.addErrorClass();
                viewPass.hide();
                passLoginInputField.after(errors.minChars);
                break;
            case true:
                passLoginInputField.removeNext();
                viewPass.hide();
                passLoginInputField.after(errors.minChars);
                break;
        }
    } else if (!errorStates.invalidCredentials) {
        if (passLoginInputField.hasErrorClass()) {
            passLoginInputField.removeErrorClass();
            passLoginInputField.removeNext();
        }
        viewPass.show();
    } else {
        passLoginInputField.removeErrorClass();
        passLoginInputField.removeNext();
    }
}
function userNullCheck() {
    errorStates.userNull = true;
    switch (userLoginInputField.hasErrorClass()) { // Check if error class is already applied
        case false: // If it isn't, add the class and check if the "userInput" error is already defined
            userLoginInputField.addErrorClass();
            if (!errorStates.userInput) {
                userLoginInputField.removeNext();
                userLoginInputField.after(errors.userNull);
            }
            break;
        case true: // If the class exist, remove the error message and add the userNull error message instead
            if (!errorStates.userInput) {
                userLoginInputField.removeNext();
                userLoginInputField.after(errors.userNull);
            }
            break;
    }
}
function invalidCredentialsCheck() {
    errorStates.invalidCredentials = true;
    switch (userLoginInputField.hasErrorClass()) {
        case false:
            if (!userLoginInputField.hasErrorClass())
                userLoginInputField.addErrorClass();
            break;
        case true:
            if (!errorStates.userInput)
                userLoginInputField.removeNext();
            break;
    }
    switch (passLoginInputField.hasErrorClass()) {
        case false:
            passLoginInputField.addErrorClass();
            viewPass.hide();
            passLoginInputField.after(errors.invalidCredentials);
            break;
        case true:
            userLoginInputField.removeNext();
            viewPass.hide();
            userLoginInputField.after(errors.invalidCredentials);
    }
}
function validLoginChecks() {
    // @TODO: utilize a for-each loop to assign false?
    errorStates.userInput = false;
    errorStates.userNull = false;
    errorStates.invalidCredentials = false;
    if (userLoginInputField.hasErrorClass())
        userLoginInputField.removeNext();
    if (passLoginInputField.hasErrorClass()) {
        passLoginInputField.removeNext();
        viewPass.show();
    }
}

userLoginInputField.id.focusout(function () {
    userLoginFieldChecks();
});
passLoginInputField.id.focusout(function () {
    passLoginFieldChecks();
});

// Signup
$('#signup-form').submit(function (event) {
    event.preventDefault();

    username = userSignupInputField.id.val();
    email = emailSignupInputField.id.val();
    password = passSignupInputField.id.val();
    passwordConfirm = passConfirmInputField.id.val();
    submit = signup.val();

    $.ajax({
        type: "POST",
        url: "signup.inc.php",
        data: {username: username, email: email, password: password, passwordConfirm: passwordConfirm, submit: submit},
        success: function (result) {
            userSignupFieldChecks();
            emailSignupFieldChecks();
            passSignupFieldChecks();
            passConfirmFieldChecks();
            console.log(result);
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
                case errors.passMatchReturned:
                    break;
                case errors.passConfirmReturned:
                    break;
                default:
                    validSignupChecks();
                    // window.location.href = "index.php";
                    break;
            }
        }
    })
});

function userSignupFieldChecks() {
    username = userSignupInputField.id.val();
    if (username.length === 0) {
        errorStates.userInput = true;
        switch (userSignupInputField.hasErrorClass()) {
            case false:
                if (!errorStates.userExists) {
                    userSignupInputField.addErrorClass();
                    userSignupInputField.after(errors.required);
                }
                break;
            case true:
                if (!errorStates.userExists) {
                    userSignupInputField.removeNext();
                    userSignupInputField.after(errors.required);
                }
                break;
        }
    }
    else {
        errorStates.userInput = false;
        userSignupInputField.removeErrorClass();
        userSignupInputField.removeNext();
    }
}
function emailSignupFieldChecks() {
    email = emailSignupInputField.id.val();
    if (email.length === 0) {
        errorStates.emailInput = true;
        switch (emailSignupInputField.hasErrorClass()) {
            case false:
                if (!errorStates.emailExists) {
                    emailSignupInputField.addErrorClass();
                    emailSignupInputField.after(errors.required);
                }
                break;
            case true:
                if (!errorStates.emailExists) {
                    emailSignupInputField.removeNext();
                    emailSignupInputField.after(errors.required);
                }
                break;
        }
    }
// @TODO: maybe something to test the collective state of all elements in the array?
    else {
        errorStates.emailInput = false;
        emailSignupInputField.removeErrorClass();
        emailSignupInputField.removeNext();
    }
}
function passSignupFieldChecks() {
    username = userSignupInputField.id.val();
    password = passSignupInputField.id.val();
    if (password.length === 0) {
        switch (passSignupInputField.hasErrorClass()) {
            case false:
                passSignupInputField.addErrorClass();
                passSignupInputField.after(errors.required);
                break;
            case true:
                passSignupInputField.removeNext();
                viewPass.hide();
                passSignupInputField.after(errors.required);
                break;
        }
    } else if (password.length < 5) {
        switch (passSignupInputField.hasErrorClass()) {
            case false:
                passSignupInputField.addErrorClass();
                viewPass.hide();
                passSignupInputField.after(errors.minChars);
                break;
            case true:
                passSignupInputField.removeNext();
                viewPass.hide();
                passSignupInputField.after(errors.minChars);
                break;
        }
    } else {
        passSignupInputField.removeErrorClass();
        passSignupInputField.removeNext();
    }
}
function passConfirmFieldChecks() {
    password = passSignupInputField.id.val();
    passwordConfirm = passConfirmInputField.id.val();
    if (passwordConfirm.length === 0) {
        errorStates.passInput = true;
        switch (passConfirmInputField.hasErrorClass()) {
            case false:
                passConfirmInputField.addErrorClass();
                passConfirmInputField.after(errors.required);
                break;
            case true:
                passConfirmInputField.removeNext();
                passConfirmInputField.after(errors.required);
                break;
        }
    }  else {
        errorStates.passInput = false;
        passConfirmInputField.removeErrorClass();
        passConfirmInputField.removeNext();
    }
}
function userExistsCheck() {
    errorStates.userExists = true;
    switch (userSignupInputField.hasErrorClass()) {
        case false:
            userSignupInputField.addErrorClass();
            userSignupInputField.after(errors.userExists);
            break;
        case true:
            userSignupInputField.removeNext();
            userSignupInputField.after(errors.userExists);
            break;
    }
}
function emailExistsCheck() {
    errorStates.emailExists = true;
    switch (emailSignupInputField.hasErrorClass()) {
        case false:
            emailSignupInputField.addErrorClass();
            emailSignupInputField.after(errors.emailExists);
            break;
        case true:
            emailSignupInputField.removeNext();
            emailSignupInputField.after(errors.emailExists);
            break;
    }
}
function invalidUserCharsCheck() {
    errorStates.invalidUserChars = true;
    switch (userSignupInputField.hasErrorClass()) {
        case false:
            userSignupInputField.addErrorClass();
            userSignupInputField.after(errors.invalidUserChars);
            break;
        case true:
            userSignupInputField.removeNext();
            userSignupInputField.after(errors.invalidUserChars);
            break;
    }
}
function invalidEmailCharsCheck() {
    errorStates.invalidEmailChars = true;
    switch (emailSignupInputField.hasErrorClass()) {
        case false:
            emailSignupInputField.addErrorClass();
            emailSignupInputField.after(errors.invalidEmailChars);
            break;
        case true:
            emailSignupInputField.removeNext();
            emailSignupInputField.after(errors.invalidEmailChars);
            break;
    }
}
function validSignupChecks() {}

userSignupInputField.id.focusout(function () {
    userSignupFieldChecks();
});
emailSignupInputField.id.focusout(function () {
    emailSignupFieldChecks();
});
passSignupInputField.id.focusout(function () {
    passSignupFieldChecks();
});
passConfirmInputField.id.focusout(function () {
    passConfirmFieldChecks();
});

// ViewPass icon
viewPass.click(function (event) {
    event.preventDefault();
    if (passLoginInputField.attr('type') === 'password') {
        passLoginInputField.attr('type', 'text');
        $(this).find($(".far")).removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
        passLoginInputField.attr('type', 'password');
        $(this).find($(".far")).removeClass('fa-eye').addClass('fa-eye-slash');
    }
});