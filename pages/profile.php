<?php 

include "../helper/db_conn.php";
  session_start();
  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Details</title>
    <link rel="stylesheet" href="../styles/profile.css" />
  </head>
  <body>
    <section class="profile-container">
      <div class="left-container">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="profile-pic"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
          />
        </svg>
        <a href="#" class="home-btn">Home</a>
        <a href="../helper/logout.php" class="logout-btn">Logout</a>
      </div>
      <div class="right-container">
        <h1 class="profile-text">Profile Details</h1>
        <div class="profile-details-container">
          <div>
            <p>Name</p>
            <p><?php echo $user['name']; ?></p>
          </div>
          <hr />
          <div>
            <p>Email</p>
            <p><?php echo $user['email'] ?></p>
          </div>
          <hr />
          <div>
            <p>Joined</p>
            <p><?php echo explode(" ", $user['created_at'])[0] ?></p>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
