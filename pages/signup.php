<?php
  include "../helper/db_conn.php";
  
    if(isset($_POST['signup'])){
      try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
    
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $email, $password]);
        if($result){
          header("location:../pages/home.html");
        } 
    
    }  
   catch(Exception $e){
    if($e->getCode() == 23000){
      $val = "error";      
    };
  }
}
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up</title>
    <link rel="stylesheet" href="../styles/style.css" />
  </head>
  <body>
    <div class="form-container">
      <div class="signup-container">
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
          <p>Email already registered</p>
        </div>
        <h1>Welcome</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <div>
            <p class="error"></p>
            <input
              type="text"
              placeholder="Name"
              class="input-text name-input"
              name="name"
            />
          </div>
          <div>
            <p class="error"></p>
            <input
              type="email"
              placeholder="E-mail"
              class="input-text email-input"
              name="email"
            />
          </div>
          <div>
            <p class="error"></p>
            <input
              type="password"
              placeholder="Password"
              class="input-text pass-input"
              name="password"
            />
          </div>
          <div>
            <p class="error"></p>
            <input
              type="password"
              placeholder="Re-enter password"
              class="input-text re-pass-input"
            />
          </div>
          <input
            type="submit"
            class="submit-btn signup-btn"
            value="Sign up"
            name="signup"
          />
        </form>
        <div class="prompt-container">
          <p>Already have an account?</p>
          <a href="./login.php" class="go-to-form login-btn">Login</a>
        </div>
      </div>
    </div>
    <script src="../scripts/validator.js"></script>
    <script src="../scripts/utility.js"></script>
  </body>
</html>
