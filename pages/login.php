<?php 
include "../helper/db_conn.php";
$errorMessage = [
  "emailErrMessage" => "",
  "passwordErrMessage" => "",
];
$val = "";
 if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  
  if($email == ""){
    $errorMessage['emailErrMessage'] = "Please provide an email address";
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errorMessage['emailErrMessage'] = "Please provide a valid email address";
  } else $errorMessage['emailErrMessage'] = "";

  if($password == ""){
    $errorMessage['passwordErrMessage'] = "Please provide a password";
  } else if(strlen($password) < 8){
    $errorMessage['passwordErrMessage'] = "Password must be at least 8 characters long";
  } else  $errorMessage['passwordErrMessage'] = "";

  $isValid = false;
  foreach($errorMessage as $key => $value){
    if($value == "") $isValid = true;
  }

  if($isValid){
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email,"password" => $password]);

    if($stmt->rowCount() == 0){
      $val = "error";
    } else {
      session_start();
      $_SESSION['email'] = $email;
      header("location:../pages/dashboard.php");
    }
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <link rel="stylesheet" href="../styles/style.css" />
  <body>
    <div class="form-container">
      <div class="login-container">
      <div class="error-message <?php echo $val ?>">
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
          <p>Incorrect email or password</p>
        </div>
        <h1>Welcome back</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" novalidate>
          <div>
            <p class="error"><?php echo $errorMessage['emailErrMessage'] ?? "" ?></p>
            <input
              type="email"
              placeholder="E-mail"
              class="input-text email-input"
              name="email"
            />
          </div>
          <div>
            <p class="error"> <?php echo $errorMessage['passwordErrMessage'] ?? "" ?></p>
            <input
              type="password"
              placeholder="Password"
              class="input-text pass-input"
              name="password"
            />
          </div>
          <input type="submit" class="submit-btn" value="Login" name="submit" />
        </form>
        <div class="prompt-container">
          <p>Don't have an account?</p>
          <a href="./signup.php" class="go-to-form signup-btn">Sign up</a>
        </div>
      </div>
    </div>
    <script src="../scripts/utility.js"></script>
  </body>
</html>
