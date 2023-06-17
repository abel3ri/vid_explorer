const titleInput = document.querySelector(".title-input");
const uploaderInput = document.querySelector(".uploader-input");
const dateInput = document.querySelector(".date-input");
const form = document.querySelector("form");
const closeBtn = document.querySelector(".close-btn");
const messageContainer = document.querySelector(".message-container");
const popUpErrorContainer = document.querySelector(".pop-up-error");
const popUpCloseBtn = document.querySelector(".pop-up-close");

closeBtn.addEventListener("click", () => {
  messageContainer.classList.add("hidden");
});

form.addEventListener("submit", (e) => {
  let isValid = { isValTtitle: false, isValUploader: false };
  if (titleInput.value == "" || titleInput.value == null) {
    titleInput.parentElement.firstElementChild.textContent =
      "Please provide a title";
  } else {
    titleInput.parentElement.firstElementChild.textContent = "";
    isValid.isValTtitle = true;
  }

  if (uploaderInput.value == "" || uploaderInput.value == null) {
    uploaderInput.parentElement.firstElementChild.textContent =
      "Please provide an email address";
  } else if (
    !uploaderInput.value.includes("@") ||
    !uploaderInput.value.includes(".")
  ) {
    uploaderInput.parentElement.firstElementChild.textContent =
      "Please provide a valid email address";
  } else {
    uploaderInput.parentElement.firstElementChild.textContent = "";
    isValid.isValUploader = true;
  }

  const { isValTtitle, isValUploader } = isValid;
  if (!isValTtitle || !isValUploader) {
    e.preventDefault();
  }
});

if (popUpErrorContainer.classList.contains("no_account")) {
  setTimeout(() => {
    popUpErrorContainer.classList.add("show");
  }, 10);

  popUpCloseBtn.addEventListener("click", () => {
    popUpErrorContainer.classList.remove("show");
    window.history.pushState({}, null, window.location.href.split("?val")[0]);
  });

  setTimeout(() => {
    popUpErrorContainer.classList.remove("show");
  }, 3000);
  window.history.pushState({}, null, window.location.href.split("?val")[0]);
}
