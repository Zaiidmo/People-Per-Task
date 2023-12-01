const form = document.getElementById("form");

form.addEventListener("submit", (e) => {
  let password = e.target.password.value;
  let email = e.target.email.value;

  const emailError = document.querySelector("#email-error");
  const passwordError = document.querySelector("#password-error");

  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

  // Reset errors
  emailError.classList.add("hidden");
  passwordError.classList.add("hidden");

  let isValid = true;

  if (!passwordRegex.test(password)) {
    passwordError.classList.remove("hidden");
    isValid = false;
  }

  if (!emailRegex.test(email)) {
    emailError.classList.remove("hidden");
    isValid = false;
  }

  // If the form is valid, submit it programmatically
  if (isValid) {
    form.submit();
  } else {
    // If the form is not valid, prevent default submission
    e.preventDefault();
  }
});
