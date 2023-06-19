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

if ((formPopUp = document.querySelector(".error-message"))) {
  const closeBtn = document.querySelector(".close-btn");
  if (formPopUp.classList.contains("error")) {
    setTimeout(() => {
      formPopUp.classList.add("show");
    }, 10);
    closeBtn.addEventListener("click", () => {
      formPopUp.classList.remove("show");
    });
    setTimeout(() => {
      formPopUp.classList.remove("show");
    }, 3000);
  }
}

if ((overlay = document.querySelector(".overlay"))) {
  const closeBtn = document.querySelector(".close-btn");
  const menuBtn = document.querySelector(".menu-btn");

  menuBtn.addEventListener("click", () => {
    overlay.classList.remove("hidden");
  });

  closeBtn.addEventListener("click", () => {
    overlay.classList.add("hidden");
  });
}
