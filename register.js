document.addEventListener("DOMContentLoaded", function() {
    const toggleButtons = document.querySelectorAll(".toggle-password");

    toggleButtons.forEach(button => {
        button.addEventListener("click", () => {
            const targetId = button.getAttribute("data-target");
            const pwdField = document.getElementById(targetId);

            if (pwdField.type === "password") {
                pwdField.type = "text";
                button.classList.add("active");
            } else {
                pwdField.type = "password";
                button.classList.remove("active");
            }
        });
    });
});


function convertToUppercase() {
    let  nameInput = document.getElementById("username");
    nameInput.value = nameInput.value.toUpperCase();
}

