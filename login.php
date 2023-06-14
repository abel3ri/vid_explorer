<?php 

$errorMessage = [
  "emailErrMessage" => "",
  "passwordErrMessage" => "",
];
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
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <link rel="stylesheet" href="./styles/style.css" />
  <body>
    <div class="form-container">
      <div class="login-container">
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
          <a href="./signup.html" class="go-to-form signup-btn">Sign up</a>
        </div>
      </div>
    </div>
  </body>
</html>
