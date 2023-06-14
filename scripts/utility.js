if ((headingText = document.querySelector(".get-started-container h1"))) {
  window.addEventListener("load", (e) => {
    const loginBtn = document.querySelector(".login-btn");
    const signUpBtn = document.querySelector(".signup-btn");
    const goBackBtn = document.querySelector(".go-back");

    loginBtn.classList.add("show");
    signUpBtn.classList.add("show");
    headingText.classList.add("show");
    goBackBtn.classList.add("animate");
  });
}

if ((signUpErrorMessage = document.querySelector(".error-message"))) {
  const closeBtn = document.querySelector(".close-btn");
  if (signUpErrorMessage.classList.contains("taken")) {
    setTimeout(() => {
      signUpErrorMessage.classList.add("show");
    }, 10);
    closeBtn.addEventListener("click", () => {
      signUpErrorMessage.classList.remove("show");
    });
    setTimeout(() => {
      signUpErrorMessage.classList.remove("show");
    }, 3000);
  }
}
