const form = document.querySelector("form");
const submitBtns = document.querySelectorAll(".submit-btn");

submitBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    if ((emailInput = document.querySelector(".email-input"))) {
      emailInput.value.trim();
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
    }
    if ((passInput = document.querySelector(".pass-input"))) {
      passInput.value.trim();
      if (passInput.value.length < 8) {
        passInput.parentElement.firstElementChild.textContent =
          "Password must be at least 8 characters long.";
      } else {
        passInput.parentElement.firstElementChild.textContent = "";
      }
    }
    if ((nameInput = document.querySelector(".name-input"))) {
      nameInput.value.trim();
      if (!nameInput.value.match(/^[a-z ,.'-]+$/i)) {
        nameInput.parentElement.firstElementChild.textContent =
          "Please provide a valid name";
      }
    }
    if ((rePassInput = document.querySelector(".re-pass-input"))) {
      rePassInput.value.trim();
      if (passInput.value != rePassInput.value) {
        passInput.parentElement.firstElementChild.textContent =
          "Password do not match";
        rePassInput.parentElement.firstElementChild.textContent =
          "Password do not match";
      }
    }
  });
});
