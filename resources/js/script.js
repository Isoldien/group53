/* ------------------------------
   Helper: Show Error Message
------------------------------ */
function showError(inputId, message) {
    const field = document.getElementById(inputId);
    field.style.border = "2px solid #d9534f"; // red border

    alert(message); // popup message

    setTimeout(() => {
        field.style.border = "1px solid #ccc";
    }, 2000); // remove highlight after 2 sec
}

/* ------------------------------
   Helper: Validate Email Format
------------------------------ */
function isValidEmail(email) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
}

/* ------------------------------
   Helper: Validate Strong Password
   Must include: letters + numbers (min 6)
------------------------------ */
function isStrongPassword(pass) {
    const pattern = /^(?=.*[A-Za-z])(?=.*\d).{6,}$/;
    return pattern.test(pass);
}

/* ------------------------------
   LOGIN FUNCTION
------------------------------ */
function loginUser() {
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (email === "") return showError("email", "Please enter your email.");
    if (password === "") return showError("password", "Please enter your password.");

    if (!isValidEmail(email)) return showError("email", "Please enter a valid email format.");

    if (password.length < 6)
        return showError("password", "Password must be at least 6 characters.");

    // Example success
    alert("Login successful!\nWelcome back: " + email);
}

/* ------------------------------
   REGISTER FUNCTION
------------------------------ */
function registerUser() {
    const name = document.getElementById("fullname").value.trim();
    const email = document.getElementById("regEmail").value.trim();
    const pass = document.getElementById("regPassword").value.trim();
    const confirm = document.getElementById("regConfirmPassword").value.trim();

    if (name === "") return showError("fullname", "Please enter your full name.");
    if (email === "") return showError("regEmail", "Please enter your email.");
    if (pass === "") return showError("regPassword", "Please enter a password.");
    if (confirm === "") return showError("regConfirmPassword", "Please confirm your password.");

    if (!isValidEmail(email)) return showError("regEmail", "Enter a valid email format.");

    if (!isStrongPassword(pass))
        return showError("regPassword", "Password must include letters & numbers, min 6 characters.");

    if (pass !== confirm)
        return showError("regConfirmPassword", "Passwords do not match!");

    alert("Account created successfully!\nWelcome " + name);
}


function sendReset() {
    const email = document.getElementById("resetEmail").value.trim();

    if (email === "") return showError("resetEmail", "Please enter your email.");

    if (!isValidEmail(email)) return showError("resetEmail", "Please enter a valid email format.");

    alert("Password reset link sent to:\n" + email);
}
