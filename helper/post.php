<?php
include "../helper/db_conn.php";
if(isset($_POST['submit'])){

   // a varibale to check if a user has been found with the provided email address of video uploader

   $userFound = true;

   $uploaderEmail = $_POST['uploader'];
   $vidTitle = $_POST['title'];

   $sql = "SELECT * FROM users WHERE email = ?";

   $stmt = $pdo->prepare($sql);
   $stmt->execute([$uploaderEmail]);

   if($stmt->rowCount() == 0){
      $userFound = false;
      header("location:../pages/upload.php?val=no_account");
      die;
   }

   if($userFound){
      $fileName = $_FILES['file']['name'];
      $tempName = $_FILES['file']['tmp_name'];
      $filePath = "../vids/". $fileName;
      move_uploaded_file($tempName, $filePath);
      
      $sql = "INSERT INTO vids (title, uploader_email, vid_name, likes) VALUES (?, ?, ?, ?);";

      $stmt = $pdo->prepare($sql);
      $result = $stmt->execute([$vidTitle, $uploaderEmail, $filePath, 0]);

      if($result) {
         header("location:../pages/dashboard.php");
      };

   }

   
}
?>