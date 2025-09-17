function isStrongPassword(pw) { // password is pw
    // Checks if the password is at least 8 characters long
    if (pw.length < 8) {
        console.log("No good. Password must be at least 8 characters long.");
        return false;
    }
    
    // Checks if the password contains "password" or "1234"
    if (pw.indexOf("password") !== -1 || pw.indexOf("1234") !== -1) {
        console.log("No good. Password cannot contain 'password' or '1234'.");
        return false;
    }
    
    // Checks if the password contains at least one digit
    let digitExists = false;
    for (let i = 0; i < pw.length; i++) {
        const charCode = pw.charCodeAt(i);
        if (charCode >= 48 && charCode <= 57) { // ASCII codes for '0' to '9'
            digitExists = true;
            break;
        }
    }
    // Runs digit check
    if (!digitExists) {
        console.log("No good. Password must contain at least one number");
        return false;

    // If all checks are passed
    }
    else{
        console.log("Good password!");
        return true;
    }
}

// Test cases
isStrongPassword("qwerty1"); // false - Too short
isStrongPassword("qwertypassword1") // false - Contains "password"
isStrongPassword("qwertyABC") // false - No numbers
isStrongPassword("qwerty123") // true