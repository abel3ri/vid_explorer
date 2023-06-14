const form = document.querySelector("form");
const submitBtns = document.querySelectorAll(".submit-btn");

const emailInput = document.querySelector(".email-input");
const passInput = document.querySelector(".pass-input");
const rePassInput = document.querySelector(".re-pass-input");
const nameInput = document.querySelector(".name-input");

// Remove unnecessary white spaces
emailInput.value.trim();
nameInput.value.trim();
passInput.value.trim();
rePassInput.value.trim();

submitBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
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
    }

    if (passInput.value.length < 8) {
      passInput.parentElement.firstElementChild.textContent =
        "Password must be at least 8 characters long.";
    } else {
      passInput.parentElement.firstElementChild.textContent = "";
    }

    if (!nameInput.value.match(/^[a-z ,.'-]+$/i)) {
      nameInput.parentElement.firstElementChild.textContent =
        "Please provide a valid name";
    }
    if (rePassInput.value.length < 8) {
      rePassInput.parentElement.firstElementChild.textContent =
        "Password must be at least 8 characters long.";
    } else if (passInput.value != rePassInput.value) {
      passInput.parentElement.firstElementChild.textContent =
        "Password do not match";
      rePassInput.parentElement.firstElementChild.textContent =
        "Password do not match";
    }
  });
});
