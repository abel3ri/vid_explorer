<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vid - explorer</title>
    <link rel="stylesheet" href="../styles/dashboard.css" />
  </head>
  <body>
    <nav class="nav">
      <hr />
      <a href="#" class="logo"><span>vid</span> explorer</a>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="menu-btn">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
    </svg>

    </nav>
    <div class="vid-container">
      <?php 
        include "../helper/db_conn.php";
        if(isset($_GET['vid_id'])){
            $vidId = $_GET['vid_id'];
            $like_count = $_GET['like_count'];
            $sql = "UPDATE vids SET likes = $like_count WHERE id = $vidId;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        }
        $sql = "SELECT * FROM vids;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $vids = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($vids as $vid) :
      ?>
      <div class="vid">
        <video src="<?php echo $vid['vid_name']; ?>" controls></video>
        <div class="desc-container">
        <p class="vid-title"> <?php echo $vid['title']; ?></p>
          <div class="like-container">
              <a href="#" class="like">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="like-btn">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
              </a>
              <span class="like-count <?php echo $vid['id']; ?>"><?php echo $vid['likes'] ?></span>
              
          </div>
        </div>
      </div>
        <?php endforeach; ?>
    </div>
    <footer>
      <a href="../pages/upload.php" class="upload-btn">Upload your vid</a>
    </footer>

    <!-- OVERLAY -->
    <div class="overlay hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close-btn">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
    <div class="overlay-content">
      <a href="../helper/logout.php" class="overlay-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="overlay-icon">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
        <p>Home</p>
      </a>
      <a href="../pages/profile.php" class="overlay-btn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="overlay-icon">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
          <p>Profile</p>
        </a>
      <a href="../helper/logout.php" class="overlay-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="overlay-icon">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
    
        <p>Logout</p>
      </a>
    </div>
    </div>
    <script src="../scripts/utility.js"></script>
  </body>
</html>
