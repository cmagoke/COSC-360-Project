function validateForm() {
var username = document.getElementById("user").value;
var password = document.getElementById("pass").value;
var fullName = document.getElementById("fullname").value;
var dob = document.getElementById("dob").value;

if (
    username === "" ||
    password === "" ||
    fullName === "" ||
    dob === ""
) {
    alert("All fields must be filled out");
    return false;
}

if (
    password.length < 8 ||
    !/[A-Z]/.test(password) ||
    !/[a-z]/.test(password) ||
    !/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(password)
) {
    alert(
    "Password must be at least 8 characters long, with at least 1 uppercase letter, 1 lowercase letter, and 1 special character"
    );
    return false;
}

if (/[\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(fullName)) {
    alert("Full Name should not contain numbers or special characters");
    return false;
}

var today = new Date().toISOString().slice(0, 10);
if (dob === today) {
    alert("Date of Birth cannot be today's date");
    return false;
}

var dateOfBirth = new Date(dob);
var eighteenYearsAgo = new Date();
eighteenYearsAgo.setFullYear(eighteenYearsAgo.getFullYear() - 18);
if (dateOfBirth > eighteenYearsAgo) {
    alert("You must be at least 18 years old.");
    return false;
}

return true;
}
