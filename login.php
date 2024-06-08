<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $donor_username = mysqli_real_escape_string($conn, $_POST['donor_username']);
   $donor_password = mysqli_real_escape_string($conn, ($_POST['donor_password']));

   $select = mysqli_query($conn, "SELECT * FROM `donor` WHERE donor_username = '$donor_username' AND donor_password = '$donor_password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['donor_username'] = $row['donor_username'];
      header('location:donor.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/profilestyle.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="donor_username" placeholder="enter username" class="box" required>
      <input type="password" name="donor_password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="Login Now" class="btn">
      <p>don't have an account? <a href="..//Header/registration.php">Register Now</a></p>
   </form>

</div>

</body>
</html>