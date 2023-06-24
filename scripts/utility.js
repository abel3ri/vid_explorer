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

if ((likeContainer = document.querySelector(".like-container"))) {
  const vidContainer = document.querySelector(".vid-container");
  vidContainer.addEventListener("click", (e) => {
    if (e.target.tagName == "svg") {
      e.preventDefault();
      let likeCount = e.target.parentElement.nextElementSibling.textContent;

      // Which videos like count is going to be incremented?

      const vidId = e.target.parentElement.nextElementSibling.classList[1];

      e.target.parentElement.nextElementSibling.textContent =
        parseInt(likeCount) + 1;

      // Prevent the URL from appending itself everytime the button is cliked

      window.history.pushState({}, null, window.location.href.split("?")[0]);
      // window.location.href = window.location.href.split("?")[0];

      // Pass the video id and the like count to PHP file through the URL

      // window.history.pushState(
      //   {},
      //   null,
      //   window.location.href +
      //     `?vid_id=${vidId}&like_count=${parseInt(likeCount) + 1}`
      // );

      window.location.href =
        window.location.href +
        `?vid_id=${vidId}&like_count=${parseInt(likeCount) + 1}`;
    }
  });
}

// window.addEventListener("load", () => {
//   window.location.href = window.location.href.split("?")[0];
// });
