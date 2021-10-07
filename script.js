// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var username = document.contactForm.username.value;
    var email = document.contactForm.email.value;
    var firstname = document.contactForm.firstname.value;
    var lastname = document.contactForm.lastname.value;
    var address = document.contactForm.address.value;
    var password = document.contactForm.password.value;
    var confirm_password = document.contactForm.confirm_password.value;


    // Defining error variables with a default value
    var usernameErr = emailErr = firstnameErr = lastnameErr = addressErr = passwordErr = confirm_passwordErr = true;

    // Validate username

    if (username == "") {
        printError("usernameErr", "Please enter your username");
    }
    else if (username.length < 4 || username.length > 15) {
        printError("usernameErr", "Username must be between 4 to 15 characters");
    }
    else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(username) === false) {
            printError("usernameErr", "Please enter a valid username");
        }
        else {
            printError("usernameErr", "");
            usernameErr = false;
        }
    }



    // Validate email address
    if (email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else {
            printError("emailErr", "");
            emailErr = false;
        }
    }

    // Validate firstname
    if (firstname == "") {
        printError("firstnameErr", "Please enter your firstname");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(firstname) === false) {
            printError("firstnameErr", "Please enter a valid firstname");
        } else {
            printError("firstnameErr", "");
            firstnameErr = false;
        }
    }

    // Validate lastname
    if (lastname == "") {
        printError("lastnameErr", "Please enter your lastname");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(lastname) === false) {
            printError("lastnameErr", "Please enter a valid lastname");
        } else {
            printError("lastnameErr", "");
            lastnameErr = false;
        }
    }

    // Validate address
    if (address == "") {
        printError("addressErr", "Please enter your address");
    } else {
        printError("addressErr", "");
        addressErr = false;
    }

    // Validate password
    if (password == "") {
        printError("passwordErr", "Please enter your password");
    } else {
        var regex = /^(?=.*[0-9])(?=.*[!@#$%_^&*])[a-zA-Z0-9!@#$%_^&*]{6,20}$/;
        if (regex.test(password) === false) {
            printError("passwordErr", "Password is weak");
        } else {
            printError("passwordErr", "");
            passwordErr = false;
        }
    }

    // Validate confirm_password
    if (confirm_password !== password) {
        printError("confirm_passwordErr", "Password didn't match");
    } else {
        printError("confirm_passwordErr", "");
        confirm_passwordErr = false;
    }



    // // Validate mobile number
    // if (mobile == "") {
    //     printError("mobileErr", "Please enter your mobile number");
    // } else {
    //     var regex = /^[1-9]\d{9}$/;
    //     if (regex.test(mobile) === false) {
    //         printError("mobileErr", "Please enter a valid 10 digit mobile number");
    //     } else {
    //         printError("mobileErr", "");
    //         mobileErr = false;
    //     }
    // }

    // // Validate country
    // if (country == "Select") {
    //     printError("countryErr", "Please select your country");
    // } else {
    //     printError("countryErr", "");
    //     countryErr = false;
    // }

    // // Validate gender
    // if (gender == "") {
    //     printError("genderErr", "Please select your gender");
    // } else {
    //     printError("genderErr", "");
    //     genderErr = false;
    // }

    // Prevent the form from being submitted if there are any errors
    if ((usernameErr || emailErr || firstnameErr || lastnameErr || addressErr || passwordErr || confirm_passwordErr) == true) {
        return false;
    }
};


// Defining a function to validate form 
function validate() {
    // Retrieving the values of form elements 
    var username = document.loginForm.username.value;
    var password = document.loginForm.password.value;



    // Defining error variables with a default value
    var usernameErr = passwordErr = true;

    // Validate username

    if (username == "") {
        printError("usernameErr", "Please enter your username");
    }
    else {
        printError("usernameErr", "");
        usernameErr = false;
    }


    // Validate password
    if (password == "") {
        printError("passwordErr", "Please enter your password");
    } 
    else {
        printError("passwordErr", "");
        passwordErr = false;
    }

    // Prevent the form from being submitted if there are any errors
    if ((usernameErr || passwordErr) == true) {
        return false;
    }
};


// Defining a function to validate form 
function update() {
    // Retrieving the values of form elements 
    var username = document.updateForm.username.value;
    var email = document.updateForm.email.value;
    var firstname = document.updateForm.firstname.value;
    var lastname = document.updateForm.lastname.value;
    var address = document.updateForm.address.value;



    // Defining error variables with a default value
    var usernameErr = emailErr = firstnameErr = lastnameErr = addressErr = true;

 // Validate username

 if (username == "") {
     printError("usernameErr", "Please enter your username");
 }
 else if (username.length < 4 || username.length > 15) {
     printError("usernameErr", "Username must be between 4 to 15 characters");
 }
 else {
     var regex = /^[a-zA-Z\s]+$/;
     if (regex.test(username) === false) {
         printError("usernameErr", "Please enter a valid username");
     }
     else {
         printError("usernameErr", "");
         usernameErr = false;
     }
 }



 // Validate email address
 if (email == "") {
     printError("emailErr", "Please enter your email address");
 } else {
     // Regular expression for basic email validation
     var regex = /^\S+@\S+\.\S+$/;
     if (regex.test(email) === false) {
         printError("emailErr", "Please enter a valid email address");
     } else {
         printError("emailErr", "");
         emailErr = false;
     }
 }

 // Validate firstname
 if (firstname == "") {
     printError("firstnameErr", "Please enter your firstname");
 } else {
     var regex = /^[a-zA-Z\s]+$/;
     if (regex.test(firstname) === false) {
         printError("firstnameErr", "Please enter a valid firstname");
     } else {
         printError("firstnameErr", "");
         firstnameErr = false;
     }
 }

 // Validate lastname
 if (lastname == "") {
     printError("lastnameErr", "Please enter your lastname");
 } else {
     var regex = /^[a-zA-Z\s]+$/;
     if (regex.test(lastname) === false) {
         printError("lastnameErr", "Please enter a valid lastname");
     } else {
         printError("lastnameErr", "");
         lastnameErr = false;
     }
 }

 // Validate address
 if (address == "") {
     printError("addressErr", "Please enter your address");
 } else {
     printError("addressErr", "");
     addressErr = false;
 }

    // Prevent the form from being submitted if there are any errors
    if ((usernameErr || firstnameErr || lastnameErr || emailErr || addressErr) == true) {
        return false;
    }
};