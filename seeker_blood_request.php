<?php
include 'config.php';
session_start();
$seeker_username = $_SESSION['seeker_username'];

if(isset($_POST['submit']))
{
  $seeker_username = mysqli_real_escape_string($conn, $_POST['seeker_username']);
  $seeker_blood_type = mysqli_real_escape_string($conn, $_POST['seeker_blood_type']);
  $request_date_time = date('Y-m-d H:i:s');
  

  $sql = "INSERT INTO `blood_request` (`seeker_username`,`blood_type`,`request_date_time`,`request_status`) 
    values ('$seeker_username','$seeker_blood_type', '$request_date_time', 'pending')";
    $query= mysqli_query($conn,$sql);
    if($query ==true)
    {
      echo "<script>alert('Request Appointment Booked Successfully!.')</script>";
    }
    else
    {
      echo "<script>alert('Woops! User is already request.')</script>";
    } 
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Request Blood</title>



<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --blue:#751919;
   --dark-blue:#5f0e0e;
   --red:#cf5c4f;
   --dark-red:#793932;
   --black:#333;
   --white:#fff;
   --light-bg:#eee;
   --box-shadow:0 5px 10px rgba(0,0,0,.1);
}

:root{
   --red: #751919;
   --black: #444; 
   --light-color: #777;
   --box-shadow:.5rem .5rem 0 rgba(4, 82, 66, 0.2);
   --text-shadow:.4rem .4rem 0 rgba(0,0,0,.2);
   --border:.2rem solid var(--red);
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
}

*::-webkit-scrollbar{
   width: 10px;
}

*::-webkit-scrollbar-track{
   background-color: transparent;
}

*::-webkit-scrollbar-thumb{
   background-color: var(--blue);
}

.btn,
.delete-btn{
   width: 100%;
   border-radius: 5px;
   padding:10px 30px;
   color:var(--white);
   display: block;
   text-align: center;
   cursor: pointer;
   font-size: 20px;
   margin-top: 10px;
}

.btn{
   background-color: var(--red);
}

.btn:hover{
   background-color: var(--dark-red);
}

.delete-btn{
   background-color: var(--red);
}

.delete-btn:hover{
   background-color: var(--dark-red);
}

.message{
   margin:10px 0;
   width: 100%;
   border-radius: 5px;
   padding:10px;
   text-align: center;
   background-color: var(--red);
   color:var(--white);
   font-size: 20px;
}

.form-container{
   min-height: 100vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

.form-container form{
   padding:20px;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 500px;
   border-radius: 5px;
}

.form-container form h3{
   margin-bottom: 10px;
   font-size: 30px;
   color:var(--black);
   text-transform: uppercase;
}

.form-container form .box{
   width: 100%;
   border-radius: 5px;
   padding:12px 14px;
   font-size: 18px;
   color:var(--black);
   margin:10px 0;
   background-color: var(--light-bg);
}

.form-container form p{
   margin-top: 15px;
   font-size: 20px;
   color:var(--black);
}

.form-container form p a{
   color:var(--red);
}

.form-container form p a:hover{
   text-decoration: underline;
}

.container{
   min-height: 100vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

.container .profile{
   padding:20px;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 400px;
   border-radius: 5px;
}

.container .profile img{
   height: 150px;
   width: 150px;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
}

.container .profile h3{
   margin:5px 0;
   font-size: 20px;
   color:var(--black);
}

.container .profile p{
   margin-top: 20px;
   color:var(--black);
   font-size: 20px;
}

.container .profile p a{
   color:var(--red);
}

.container .profile p a:hover{
   text-decoration: underline;
}
   .update-profile{
   min-height: 100vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

.update-profile form{
   padding:20px;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 700px;
   text-align: center;
   border-radius: 5px;
}

.update-profile form img{
   height: 200px;
   width: 200p;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
}

.update-profile form .flex{
   display: flex;
   justify-content: space-between;
   margin-bottom: 20px;
   gap:15px;
}

.update-profile form .flex .inputBox{
   width: 49%;
}

.update-profile form .flex .inputBox span{
   text-align: left;
   display: block;
   margin-top: 15px;
   font-size: 17px;
   color:var(--black);
}

.update-profile form .flex .inputBox .box{
   width: 100%;
   border-radius: 5px;
   background-color: var(--light-bg);
   padding:12px 14px;
   font-size: 17px;
   color:var(--black);
   margin-top: 10px;
}

@media (max-width:650px){
   .update-profile form .flex{
      flex-wrap: wrap;
      gap:0;
   }
   .update-profile form .flex .inputBox{
      width: 100%;
   }
}
</style>
</head>
<body>
   
<div class="update-profile">
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `seeker` WHERE seeker_username = '$seeker_username'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" name="seeker_username" value="<?php echo $fetch['seeker_username']; ?>" class="box">
            <span>Blood type :</span>
            <input type="text" name="seeker_blood_type" value="<?php echo $fetch['seeker_blood_type']; ?>" class="box">
            <span>Date:</span>
            <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>">
            <span>Time :</span>
            <input type="time" name="time" value="<?php echo date('H:i:s'); ?>">
         </div>
      </div>
      <INPUT type="submit"  name="submit" class="login-btn btn-primary-soft btn " style="padding-top:11px;padding-bottom:11px;width:100%"></INPUT>
      <a href="seeker.php" class="delete-btn">Go back</a>
   </form>
</div>

</body>
</html>