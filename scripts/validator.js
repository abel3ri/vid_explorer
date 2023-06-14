const form = document.querySelector("form");
const signupBtn = document.querySelector(".signup-btn");

const emailInput = document.querySelector(".email-input");
const passInput = document.querySelector(".pass-input");
const rePassInput = document.querySelector(".re-pass-input");
const nameInput = document.querySelector(".name-input");

// Remove unnecessary white spaces
emailInput.value.trim();
nameInput.value.trim();
passInput.value.trim();
rePassInput.value.trim();

form.addEventListener("submit", (e) => {
  // vals object that will validate if each input is valid or not
  const vals = {
    email: false,
    password: false,
    name: false,
    rePass: false,
  };

  if (emailInput.value == "" || emailInput.value == null) {
    emailInput.parentElement.firstElementChild.textContent =
      "Please provide email address";
  } else if (
    !emailInput.value.includes("@") ||
    !emailInput.value.includes(".")
  ) {
    emailInput.parentElement.firstElementChild.textContent =
      "Please provide a valid email address";
  } else {
    emailInput.parentElement.firstElementChild.textContent = "";
    vals.email = true;
  }

  if (passInput.value.length < 8) {
    passInput.parentElement.firstElementChild.textContent =
      "Password must be at least 8 characters long.";
  } else {
    passInput.parentElement.firstElementChild.textContent = "";
    vals.password = true;
  }

  if (!nameInput.value.match(/^[a-z ,.'-]+$/i)) {
    nameInput.parentElement.firstElementChild.textContent =
      "Please provide a valid name";
  } else {
    nameInput.parentElement.firstElementChild.textContent = "";
    vals.name = true;
  }
  if (rePassInput.value.length < 8) {
    rePassInput.parentElement.firstElementChild.textContent =
      "Password must be at least 8 characters long.";
  } else if (passInput.value != rePassInput.value) {
    passInput.parentElement.firstElementChild.textContent =
      "Password do not match";
    rePassInput.parentElement.firstElementChild.textContent =
      "Password do not match";
  } else {
    rePassInput.parentElement.firstElementChild.textContent = "";
    vals.rePass = true;
  }
  // if one input is invalid prevent the form from being submitted
  if (!(vals.email && vals.password && vals.name && vals.rePass)) {
    e.preventDefault();
    console.log("Hello");
    console.table(vals);
  }
});
