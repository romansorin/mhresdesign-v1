/* Declare field variables for all three forms (login, signup, forgot password) with the same functions but separate ID's */
const userLoginInputField = {
    id: $("#user-input-login"), // 'id' corresponds to the input field's id
    hasErrorClass: function () { // Checks if the given object/field has been assigned the error class, responds truthy or falsy
        return this.id.hasClass("input-error");
    },
    addErrorClass: function () { // Adds error class, likely called after checking through hasErrorClass
        this.id.addClass("input-error");
    },
    removeErrorClass: function () { // Removes error class
        this.id.removeClass("input-error");
    },
    removeNext: function () { // Removes the next element in the DOM (ex. the subtitle after a title, the input after a label)
        this.id.next().remove();
    },
    after: function (arrayProperty) { // Add an element after the object / node which is calling the function
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

/* Declare variables for the buttons to reference */
const login = $("#login-btn");
const signup = $("#signup-btn");
const forgot = $("#forgotpass-btn");
const viewPass = $("#view-pass");

/* Declare general variables for the AJAX calls to process the values when requested */
let username, email, password, passwordConfirm, submit;

// @TODO: Stay on page (login, singup, forgot password) on refresh
// @TODO: Do not re-submit form data on refresh or going back

/* These error states are important for determining which error should show on a given field. If a field has two or more errors, conditional checks can be made within the
    associated functions to display a specific error. These are also used to determine if the form should submit if all checks pass / there is no return from the PHP files.
    The keys are assigned as 'false' to represent that there are no errors, and 'true' if an error exists
 */
let errorStates = {
    userInput: false, // Empty fields
    emailInput: false, // Empty fields
    passInput: false, // Empty fields
    passConfirm: false, // Empty fields and not matching default field
    passMatch: false, // The name is a bit confusing, but passMatch refers to the password matching the username
    userNull: false, // Username not existing in the database
    userExists: false, // Username already existing in the database
    emailExists: false, // Email already existing in the database
    invalidUserChars: false, // Invalid chars
    invalidEmailChars: false, // Invalid chars
    invalidCredentials: false // Password is not correct for a given username
};

// @TODO: figure out why invalid username / password is so slow responding..

/* An array to hold all of the error messages in one place, in case any need to be changed / added / removed */
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
    // These are all returned from respective PHP files
    passConfirmReturned: "passConfirmError",
    passMatchReturned: "passMatchError",
    userNullReturned: "userNullError",
    userExistsReturned: "userExistsError",
    emailExistsReturned: "emailExistsError",
    invalidUserCharsReturned: "invalidUserCharsError",
    invalidEmailCharsReturned: "invalidEmailCharsError",
    invalidCredentialsReturned: "invalidCredentialsError"
};


/* Login form submission event */
$("#login-form").submit(function (event) {
    event.preventDefault(); // Don't want the form to submit automatically without going through validation, so we prevent it here */
    // Set the value here so the values are updated and accurate
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
            /* This switch checks the result which is returned from login.inc.php in the form of a string, where the string is then compared to a given error in the errors array */
            switch (result) {
                case errors.userNullReturned:
                    userNullCheck();
                    break;
                case errors.invalidCredentialsReturned:
                    invalidCredentialsCheck();
                    break;
                default:
                    validLoginChecks();
                    break;
            }
        }
    });
});

/* Checks */
/* Checks the value of the username login field to determine if it is empty */
function userLoginFieldChecks() {
    username = userLoginInputField.id.val();
    if (username.length === 0) {
        errorStates.userInput = true;
        switch (userLoginInputField.hasErrorClass()) {
            case false:
                if (!errorStates.userNull) { // userNull can be read as "user not existing"
                    userLoginInputField.addErrorClass();
                    userLoginInputField.after(errors.required);
                }
                break;
            case true:
                if (!errorStates.userNull) {
                    userLoginInputField.removeNext(); // removeNext is necessary because another message may exist, and will interfere with the new 'after' message
                    userLoginInputField.after(errors.required);
                }
                break;
        }
// @TODO: maybe something to test the collective state of all elements in the array?
    } else {
        errorStates.userInput = false;
        if (userLoginInputField.hasErrorClass()) {
            userLoginInputField.removeErrorClass();
            userLoginInputField.removeNext();
        }
    }
}
/* Checks the value of the password field for character length, a null input, and handles the display of the 'viewPass' functionality */
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
/* Checks if the username provided does not exist in the database */
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
/* Checks if the login and password match, returning the respective state */
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
/* If all other checks are valid, assign all errorStates to false and remove error classes/messages if they exist */
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
    window.location.href = "../dashboard"; // Redirect the user to the dashboard if they log in successfully
}

/* Events */
userLoginInputField.id.focusout(function () {
    userLoginFieldChecks();
});
passLoginInputField.id.focusout(function () {
    passLoginFieldChecks();
});

/* Signup form submission event */
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
        // @TODO: make separate AJAX calls for user exists and email exists to display at the same time
        // @TODO: allow javascript to handle passMatch and passConfirm so less ajax calls need to be made
        success: function (result) {
            /* As also seen above in the login event handler, these functions are called despite mostly being used for the focusout events; this is to
               ensure that a user clicking "submit" without entering any data cannot make the submission
            */
            userSignupFieldChecks();
            emailSignupFieldChecks();
            passSignupFieldChecks();
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
                case errors.passMatchReturned:
                    passMatchCheck();
                    break;
                case errors.passConfirmReturned:
                    passConfirmCheck();
                    break;
                default:
                    validSignupChecks();
                    break;
            }
        }
    })
});
/* This function checks for an empty input, as well as checking the error against other error states which have precedence over an empty field */
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
    } else if (!errorStates.invalidUserChars) {
        errorStates.userInput = false;
        userSignupInputField.removeErrorClass();
        userSignupInputField.removeNext();
    }
}
/* Checks for empty input */
function emailSignupFieldChecks() {
    email = emailSignupInputField.id.val();
    if (email.length === 0) {
        errorStates.emailInput = true;
        switch (emailSignupInputField.hasErrorClass()) {
            case false:
                emailSignupInputField.addErrorClass();
                emailSignupInputField.after(errors.required);
                break;
            case true:
                emailSignupInputField.removeNext();
                emailSignupInputField.after(errors.required);
                break;
        }
    } else {
        errorStates.emailInput = false;
        emailSignupInputField.removeErrorClass();
        emailSignupInputField.removeNext();
    }
}
/* Checks for empty input and minimum characters */
function passSignupFieldChecks() {
    password = passSignupInputField.id.val();
    if (password.length === 0) {
        errorStates.passInput = true;
        switch (passSignupInputField.hasErrorClass()) {
            case false:
                passSignupInputField.addErrorClass();
                passSignupInputField.after(errors.required);
                break;
            case true:
                passSignupInputField.removeNext();
                passSignupInputField.after(errors.required);
                break;
        }
    } else if (password.length < 5) {
        errorStates.passInput = true;
        switch (passSignupInputField.hasErrorClass()) {
            case false:
                passSignupInputField.addErrorClass();
                passSignupInputField.after(errors.minChars);
                break;
            case true:
                passSignupInputField.removeNext();
                passSignupInputField.after(errors.minChars);
                break;
        }
    } else {
        errorStates.passInput = false;
        passSignupInputField.removeErrorClass();
        passSignupInputField.removeNext();
    }
}
/* Checks for empty input */
function passConfirmFieldChecks() {
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
    } else {
        errorStates.passInput = false;
        passConfirmInputField.removeErrorClass();
        passConfirmInputField.removeNext();
    }
}
/* Checks if the user already exists in the database */
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
/* Checks if the email already exists in the database */
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
/* Checks that the user does not contain any invalid characters, which are defined in the php file */
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
/* Checks that the email does not contain any invalid characters, which are defined in the php file */
function invalidEmailCharsCheck() {
    errorStates.invalidEmailChars = true;
    switch (emailSignupInputField.hasErrorClass()) {
        case false:
            if (!errorStates.emailInput) {
                emailSignupInputField.addErrorClass();
                emailSignupInputField.after(errors.invalidEmailChars);
            }
            break;
        case true:
            if (!errorStates.emailInput) {
                emailSignupInputField.removeNext();
                emailSignupInputField.after(errors.invalidEmailChars);
            }
            break;
    }
}
/* Checks that the username and password are not the same (case-insensitive) for security reasons */
function passMatchCheck() {
    errorStates.passMatch = true;
    switch (passSignupInputField.hasErrorClass()) {
        case false:
            if (!errorStates.passInput) {
                passSignupInputField.addErrorClass();
                passSignupInputField.after(errors.passMatch);
            }
            break;
        case true:
            if (!errorStates.passInput) {
                passSignupInputField.removeNext();
                passSignupInputField.after(errors.passMatch);
            }
            break;
    }
    switch (userSignupInputField.hasErrorClass()) {
        case false:
            if (!errorStates.userInput) {
                userSignupInputField.addErrorClass();
            }
            break;
        case true:
            if (!errorStates.userInput) {
                userSignupInputField.removeNext();
            }
            break;
    }
}
/* Checks that the password and password confirmation are equal */
function passConfirmCheck() {
    errorStates.passConfirm = true;
    switch (passSignupInputField.hasErrorClass()) {
        case false:
            passSignupInputField.addErrorClass();
            passSignupInputField.after(errors.passConfirm);
            break;
        case true:
            passSignupInputField.removeNext();
            passSignupInputField.after(errors.passConfirm);
            break;
    }
    switch (passConfirmInputField.hasErrorClass()) {
        case false:
            passConfirmInputField.addErrorClass();
            break;
        case true:
            passConfirmInputField.removeNext();
            break;
    }
}
/* If all other checks are valid, assign all errorStates to false and remove error classes/messages if they exist */
function validSignupChecks() {
    if (errorStates.userInput === false && errorStates.emailInput === false && errorStates.passInput === false) { // Do NOT allow submission if these are not false
        if (userSignupInputField.hasErrorClass())
            userSignupInputField.removeNext();
        if (passSignupInputField.hasErrorClass())
            passSignupInputField.removeNext();
        if (emailSignupInputField.hasErrorClass())
            emailSignupInputField.removeNext();
        if (passConfirmInputField.hasErrorClass())
            passConfirmInputField.removeNext();
        window.location.href = "index.php";
    }
}

/* Events */
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
    if (passLoginInputField.id.attr('type') === 'password') {
        passLoginInputField.id.attr('type', 'text');
        $(this).find($(".far")).removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
        passLoginInputField.id.attr('type', 'password');
        $(this).find($(".far")).removeClass('fa-eye').addClass('fa-eye-slash');
    }
});