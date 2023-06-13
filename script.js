function changeForm() {
  const promptBtns = document.querySelectorAll(".go-to-form");
  const signupContainer = document.querySelector(".signup-container");
  const loginContainer = document.querySelector(".login-container");
  console.log(signupContainer);

  signupContainer.style.transform = "translateX(100vw)";

  promptBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      if (btn.classList.contains("signup-btn")) {
        signupContainer.style.transform = "translateX(0)";
        loginContainer.style.transform = "translateX(100vw)";
      } else {
        loginContainer.style.transform = "translateX(0)";
        signupContainer.style.transform = "translateX(100vw)";
      }
    });
  });
}

changeForm();

document.querySelector("");
