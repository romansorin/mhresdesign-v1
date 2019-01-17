let userEmpty = false;
let userNull = false;
let passEmpty = false;
let passWrong = false;


const password = $('#password-input-login').val();
const userInput = $('#mailuser-input-login');
const passInput = $('#password-input-login');
const submit = $('#login-btn').val();

const requiredError = "<span class='input-error inline-error'>This field is required.</span>";
const minCharsError = "<span class='input-error inline-error'>Password must be a minimum of 5 characters.</span>";
const userPassMatchError = "<span class='input-error inline-error'>Username and password can not match.</span>";
const userNullError = "<span class='input-error inline-error'>User does not exist.</span>";
const invalidCredentialsError = "<span class='input-error inline-error'>Invalid username/password.</span>";

// $('#login-form').submit(function (event) {
//     event.preventDefault();
//     $.ajax({
//         type: "POST",
//         url: "login.inc.php",
//         data: {username: username, password: password, submit: submit},
//         success: function (result) {
//             // alert(result);

            /*// username checks
            usernameChecks();

            if (username === password) {
                inputErrorClass(passInput, userPassMatchError);
            }

            passwordChecks();
            // password

        }
    });
});

// ajax call to : check if username exists
// ajax call to : check username and password combination
/*
// when user input is clicked off
userInput.focusout(function () {
    if (username.length === 0) {
        userEmpty = true;
        inputErrorClass(userInput, requiredError);
    }
});

// when pass input is clicked off
passInput.focusout(function () {
    if (password.length === 0) {
        inputErrorClass(passInput, requiredError);
    } else if (password.length < 6) {
        if (passInput.next().length > 0) {
            passInput.next().remove();
        }
        inputErrorClass(passInput, minCharsError);
    }
});

function usernameChecks() {
    if (username.length === 0 || result === 'userEmpty') {
        userEmpty = true;
        inputErrorClass(userInput, requiredError);
    } else if (result === 'userNull') {
        userNull = true;
        inputErrorClass(userInput, userNullError);
    } else if (userEmpty === false && userNull === false) {
        inputErrorClass(userInput);
    }
}

function inputErrorClass(id, error) {
    if (id.hasClass('input-error')) {
        id.removeClass('input-error');
        id.next().remove();
    } else {
        id.addClass('input-error');
        id.after(error);
    }
}

function passwordChecks() {
    if (password.length === 0 || result === 'passEmpty') {
        passEmpty = true;
        inputErrorClass(passInput)
        $('#password-input-login').addClass('input-error');
        $('#password-input-login').after(requiredError);
    } else if (result === 'passWrong') {
        passWrong = true;
        $('#password-input-login').addClass('input-error');
        $('#password-input-login').after(invalidCredentialsError);
    } else if (passEmpty === false && passWrong === false) {
        $('#password-input-login').removeClass('input-error');
        $('#password-input-login').next().remove();

    }
}
// On error display, the 'show-hide' button should be hidden and then brought back when there is no error
/* Client-side validation:
   1. Check for empty fields [ERROR: This field is required; HIGHLIGHT: Respective fields]
       a. Username
       b. Password
   2. Check that the password is more than 5 characters [ERROR: Password cannot be less than 5 characters; HIGHLIGHT: Password input]

   Server-side validation:
   1. Check that the username exists [ERROR: User does not exist; HIGHLIGHT: Username input]
   2. Check that the username and password are correct [ERROR: Invalid username/password combination; HIGHLIGHT: Username and password fields, error message displayed in password]
 */


userInput.focusout(function () {
    if ($('#mailuser-input-login').val().length === 0) {
        if (!userInput.hasClass('input-error')) {
            userInput.addClass('input-error');
            userInput.after(requiredError);
        }
    } else {
        userInput.removeClass('input-error');
        userInput.next().remove();
    }
});

passInput.focusout(function() {
   if ($('#password-input-login').val().length === 0) {
       if (!passInput.hasClass('input-error')) {
           passInput.addClass('input-error');
           passInput.after(requiredError);
       } else {
           passInput.next().remove();
           passInput.after(requiredError);
       }
   } else if ($('#password-input-login').val().length < 5) {
       if (!passInput.hasClass('input-error')) {
           passInput.addClass('input-error');
           passInput.after(minCharsError);
       } else {
           passInput.next().remove();
           passInput.after(minCharsError);
       }
   } else {
       passInput.removeClass('input-error');
       passInput.next().remove();
   }
});
