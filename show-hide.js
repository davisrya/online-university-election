const pwdField = document.getElementById("password");
const toggleBtn = document.querySelector(".toggle-password");

toggleBtn.addEventListener("click", function() {
    if (pwdField.type === "password") {
        pwdField.type = "text";
        toggleBtn.classList.add("active");
    } else {
        pwdField.type = "password";
        toggleBtn.classList.remove("active");
    }
});