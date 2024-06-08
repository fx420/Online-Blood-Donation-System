<?php
include 'functions.php';
include 'config.php';
session_start();
$seeker_username = $_SESSION['seeker_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion Tech Online Blood Donation Website</title>
        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- custom css file link -->
        <link rel="stylesheet" href="css/style2.css">

<style>

.icon {
    cursor: pointer;
    position:relative;
    line-height: 60px;

  }
  .icon span {
    background: var(--red);
    padding: 7px;
    border-radius: 50%;
    color: #fff;
    vertical-align: top;

  }
  .icon img {
    display: inline-block;
    width: 25px;
    margin-top: 20px;

  }
  .icon:hover {
    opacity: .7;
  }
  .notifi-box {
  background: var(--red);
  opacity: 0;
  backdrop-filter: blur(15px);
  width: 400px;
  height: 0px;
  position: absolute;
  top: 1px;
  right: 45px;
  overflow-y:auto;
  transition: 0.6s ease;
  transition-property: 1s opacity, 250ms height;
  margin-top: 190px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.notifi-box h2 {
  font-size: 30px;
  padding: 10px;
  border-bottom: 1px solid #eee;
  color: #999;
  margin-left: 45px;

}
.notifi-box h2 span {
  color: #f00;
}
.notifi-item {
  display: flex;
  border-bottom: 1px solid #eee;
  padding: 15px 5px;
  margin-bottom: 15px;
  cursor: pointer;
  margin-left: 45px;

}
.notifi-item:hover {
  background-color: #eee;
}

.notifi-item .text h4 {
  color: #777;
  font-size: 16px;
  margin-top: 10px;
  
}
.notifi-item .text p {
  color:#999;
  font-size: 12px;
  
}

 .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }


.header .dropdown-content a {
    padding: 12px 16px;
    display: block;
  }
  
.dropdown:hover .dropdown-content {
    display: block;
  }

.header .navbar .dropdown .dropbtn{
    font-size: 1.7rem;
    color: var(--light-color);
    margin-left: 2rem;
    background-color: #fff;
}

.header .navbar .dropdown .dropbtn:hover{
    color: var(--bluegreen);
} 

.dropdown {
    float: left;
    overflow: hidden;
  }

 center img{
    height: 80px;
    width: 80px;
    border-radius: 50%;
    object-fit: cover;

 }


.item{
    position: relative;
    cursor: pointer;
   }
   
.item a{
    color: #fff;
    font-size: 16px;
    text-decoration: none;
    display: block;
    padding: 5px 30px;
    line-height: 60px;
   }
   
.item a:hover{
    background: #5a1616;
    transition: 0.3s ease;
   }

.blog .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(40rem, 1fr));
    gap: 2rem;
}
.blog .box-container .box{
    text-align: center;
    background: white;
    border-radius: .5rem;
    border: var(--border);
    box-shadow: var(--box-shadow);
    padding: 2rem;
}
.blog .box-container .box img{
    height: 20rem;
    border: var(--border);
    border-radius: .5rem;
    margin-top: 1rem;
    margin-bottom: 1rem;
}
.blog .box-container .box h3{
    color: var(--black);
    font-size: 1.8rem;
    text-align:justify;
}

.blog .box-container h2{
  color: var(--black);
  text-shadow:var(--text-shadow) ;
  font-size: 3rem;
  line-height: 1.5; 
  margin-bottom:15px;
}
.blog .box-container .box span{
    color: var(--turqoise);
    font-size: 2.5rem;
}

.footer{

border-bottom: 1px solid rgba(0, 23, 58, 0.8);
padding: 0 0 0 0;
}
.footer .box-container{
border-bottom:10px solid #6967679d;
border-top:10px solid #6967679d;
background: #e9e9e9;
display: grid;
grid-template-columns: repeat(auto-fit,minmax(22rem,1fr));
gap: 2rem;
}

.footer .box-container .box h3{
font-size: 28px;
margin: 0 0 20px 0;
padding: 2px 0 2px 0;
line-height: 1;
font-weight: 700;
text-transform: uppercase;
color:#751919;
font-weight: bold;
}
.footer .box-container .box p{
font-size: 14px;
line-height: 24px;
margin-bottom: 0;
font-family: "Raleway", sans-serif;
color: #444;
}

.footer .box-container .box a{
display: block;
font-size: 1.5rem;
color: #444;
padding: 1rem 0;
line-height: 1;
}
.footer .box-container .box a:hover{
color: #751919;
}

.footer .box-container .box a i{
padding-right:.5rem;
color:  #751919;
}

.footer .box-container .box a:hover i{
padding-right:2rem;

}

</style>
</head>
<body>

<!-- Header section Starts -->
<?php include("seeker_header_2.php") ?>
<!-- Header Section Ends -->

<!-- Home section Starts -->
<section class="home" id="home" style="background-color: #751919;">
    <div class="image">
        <img src="assets/img/images/BLOG.jpg" alt="">
    </div>

    <div class="content">
        <h3 style="font-size:48px;">Welcome to Our Blog Page</h3>
        <p style="font-size:20px;">Let's read some intresting articles realted to blood donations.</p>
    </div>

</section>

<!-- Home section Ends -->


<!-- Blog Section starts -->
<section class="blog" id="blog"  style="background-color: #fff;">
<form action="" method="post" enctype="multipart/form-data">
<div class="box-container">
<?php
            $servername = "localhost";
			$username = "root";
			$password = "";
			$database = "fusiontech";

			// Create connection
			$connection = new mysqli($servername, $username, $password, $database);
            // Check connection
			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}
            // read all row from database table
			$sql = "SELECT * FROM blog";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}
            // read data of each row
			while($row = $result->fetch_assoc()) 
            {
                ?>
                

                     <div class="box" style="position:relative">
                        <h2> <?php echo $row ["blog_title"];?></h2>
                        <p style="color: var(--black);font-size: 1.8rem;text-align:left;">By : <?php echo $row ["admin_username"];?></p>
                        <p style="color: var(--black);font-size: 1.8rem;text-align:left;"><?php echo $row ["blog_dtCreated"];?></p><br>                        
                        <h3> <?php echo $row ["blog_description"];?></h3><br><br><br>
                        <div class="button" style="position:absolute;bottom:0;float:left;">
                           <a href="donor_blog.php?blog_id=<?php echo $row['blog_id']?>" class="btn ">Read More </a><br><br>
                        </div> 
                     </div>                
               <?php

            }
            $connection->close();
?>
</div><br>
</form>
</section>
<!-- Blog Section Ends -->


<!-- Footer section Starts -->
<?php include("seeker_footer.html") ?>
<!-- Footer section Ends -->


  <!-- custom javascript file link  -->
  <script src="js/script.js"></script>

</body>