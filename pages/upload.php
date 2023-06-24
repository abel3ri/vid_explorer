<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload a video</title>
    <link rel="stylesheet" href="../styles/upload.css" />
  </head>
  <body>
    <div class="pop-up-error <?php if(isset($_GET['val'])) echo $_GET['val']; ?>">
    <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="pop-up-close"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      <p>Email not registered</p>
    </div>
    <div class="upload-container">
      <div class="message-container">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="close-btn"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>

        <strong> Notice: </strong>
        <p>
          The current timestamp will be used as a default video upload date.
        </p>
      </div>
      <h1>Upload your video</h1>
      <form
        action="../helper/post.php"
        method="post"
        novalidate
        enctype="multipart/form-data"
      >
        <div>
          <p class="error"></p>
          <input
            type="text"
            class="title-input"
            placeholder="Video title"
            name="title"
          />
        </div>
        <div>
          <p class="error"></p>
          <input
            type="text"
            class="uploader-input"
            placeholder="Uploader email"
            name="uploader"
          />
        </div>
        <div>
          <p class="error"></p>
          <input
            type="datetime-local"
            class="date-input"
            disabled
            name="date"
          />
        </div>
        <div>
          <p class="error"></p>
          <input type="file" name="file" accept="video/*" class="video-input" />
        </div>
        <input type="submit" name="submit" class="submit-btn" value="Upload" />
      </form>
    </div>
    <script src="../scripts/uploadValidator.js"></script>
  </body>
</html>
