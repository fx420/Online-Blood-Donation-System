<?php

include 'config.php';

if(isset($_POST['submit'])){

   $donor_username = mysqli_real_escape_string($conn, $_POST['donor_username']);
   $donor_email = mysqli_real_escape_string($conn, $_POST['donor_email']);
   $donor_password = mysqli_real_escape_string($conn, ($_POST['donor_password']));
   $donor_cpassword = mysqli_real_escape_string($conn, ($_POST['donor_cpassword']));
   $donor_name = mysqli_real_escape_string($conn, $_POST['donor_name']);
   $donor_blood_type = mysqli_real_escape_string($conn, $_POST['donor_blood_type']);
   $donor_age = mysqli_real_escape_string($conn, $_POST['donor_age']);
   $donor_gender = mysqli_real_escape_string($conn, $_POST['donor_gender']);
   $donor_contact = mysqli_real_escape_string($conn, $_POST['donor_contact']);
   $donor_address = mysqli_real_escape_string($conn, $_POST['donor_address']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '..//assets/img/upload/donor/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `donor` WHERE donor_username= '$donor_username' AND donor_password = '$donor_password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exist'; 
   }else{
      if(!preg_match ("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $donor_password)){
         $message[] = 'Password length min 8 & must contain one capital letter, one integer!';
      }elseif(!preg_match ("/^(01)[0-9]{8,9}$/", $donor_contact)){
         $message[] = 'Contact not valid';
      }elseif($donor_password != $donor_cpassword){
         $message[] = 'Confirm password not matched!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `donor`(donor_username, donor_email, donor_password,donor_name,donor_blood_type,donor_age,donor_gender,donor_contact,donor_address, image) VALUES('$donor_username', '$donor_email', '$donor_password','$donor_name','$donor_blood_type','$donor_age','$donor_gender','$donor_contact','$donor_address', '$image')") or die('query failed');

         if($insert){
            
            move_uploaded_file($image_tmp_name, $image_folder);
            echo "<script>alert('Registered Successfully!.')</script>";
            header('location:login.php');
         }else{
            $message[] = 'Failed Registration!';
         }
      }
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
   <link rel="stylesheet" href="..//Header/css/registrationstyle.css">
</head>
<body>

<div class="wrapper">
<form action="" method="post" class="was-validated" enctype="multipart/form-data"> 
    <div class="title">
      Registration Form
    </div>
    <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
    <div class="form">
      <div class="inputfield">
        <label>Username</label>
        <input type="text" class="input" name="donor_username" placeholder="enter username" class="box" required >
       </div> 
       <div class="inputfield">
        <label>Password</label>
        <input type="password" class="input" name="donor_password" placeholder="enter password" class="box" required  >
       </div>  
     <div class="inputfield">
        <label>Confirm Password</label>
        <input type="password" class="input" name="donor_cpassword" placeholder="confirm password" class="box"  required  >
     </div> 

       <div class="inputfield">
          <label>Full Name</label> 
          <input type="text" class="input" name="donor_name" placeholder="Enter your name" class="box" required>
       </div>  

       <div class="inputfield">
        <label>Age</label>
        <input type="number" class="input" name="donor_age" required>
       </div> 

       <div class="inputfield">
        <label>Blood Group</label>
        <div class="custom_select" >
          <select name="donor_blood_type"  required >
            <option value="">Select</option>
            <option value="male">A+</option>
            <option value="female">A-</option>
            <option value="male">B+</option>
            <option value="female">B-</option>
            <option value="male">AB+</option>
            <option value="female">AB-</option>
            <option value="male">O+</option>
            <option value="male">O-</option>
          </select>
        </div>
       </div>


        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select name="donor_gender" required >
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div> 
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" class="input" name="donor_contact" required>
       </div> 
      <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="donor_address" required></textarea>
       </div> 

 
       <div class="inputfield">
        <label>Email Address</label>
        <input type="text" class="input" name="donor_email" placeholder="enter email" class="box" required>
       </div>         
       

     <div class="inputfield">
      <label>Upload Profile Picture</label>
      <input type="file" name="image" class="input" accept="image/jpg, image/jpeg, image/png">
     </div> 
     <div class="inputfield">


     </div> 

      <div class="inputfield">
        <input type="submit" name="submit" value="Register" class="btn" >
      </div><br>
    </div>
    <p>Already a Member? <a href="login.php">Login Now</a></p>
</div>	
	
</body>
</html>