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
    </nav>
    <div class="vid-container">
      <?php 
        include "../helper/db_conn.php";
        // session_start();
        // $email =  $_SESSION['email'];

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
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="like-btn">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
              </svg>
              <span class="like-count"><?php echo $vid['likes'] ?></span>
          </div>
        </div>
      </div>
        <?php endforeach; ?>
    </div>
  </body>
</html>
