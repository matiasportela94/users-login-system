const togglePassword = document.querySelector("#togglePassword");
const toggleAdminPassword = document.querySelector("#toggleAdminPassword");
const password = document.querySelector("#password");
const adminPassword = document.querySelector("#adminPassword");

togglePasswords(togglePassword, password);
togglePasswords(toggleAdminPassword, adminPassword);

function togglePasswords(togglePassword, password) {
  togglePassword.addEventListener("click", function (e) {
    // toggle the type attribute
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    // toggle the eye slash icon
    this.classList.toggle("fa-eye-slash");
  });
}