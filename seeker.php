<?php
include 'functions.php';
include 'config.php';
session_start();
$seeker_username = $_SESSION['seeker_username'];
?>

<?php
    $current_date = date("Y-m-d");
    $current_volumn_query = "SELECT date(donate_date_time) as date, sum(blood_volume) as total_volume from blood WHERE `blood_status` = 'Good' GROUP by date HAVING date = '$current_date';";
    $current_volumn_query_result = mysqli_query($conn, $current_volumn_query);

    $data = mysqli_fetch_all($current_volumn_query_result, MYSQLI_ASSOC);

    $total_volume = array_map(function ($item) {
        return $item['total_volume'];
    }, $data);

    if (empty($total_volume)){
        $total_volume = ["0"];
    }




    $admin_query = "SELECT * FROM `admin`";
    $admin_result = mysqli_query($conn, $admin_query);
    $total_row_admin = mysqli_num_rows($admin_result);

    $seeker_query = "SELECT * FROM `seeker`";
    $seeker_result = mysqli_query($conn, $seeker_query);
    $total_row_seeker = mysqli_num_rows($seeker_result);

    $healthcare_professional_query = "SELECT * FROM `healthcare_professional`";
    $healthcare_professional_result = mysqli_query($conn, $healthcare_professional_query);
    $total_row_healthcare_professional = mysqli_num_rows($healthcare_professional_result);

    $seeker_query = "SELECT * FROM `seeker`";
    $seeker_result = mysqli_query($conn, $seeker_query);
    $total_row_seeker = mysqli_num_rows($seeker_result);

    $blood_donation_center_query = "SELECT * FROM `blood_donation_center`";
    $blood_donation_center_result = mysqli_query($conn, $blood_donation_center_query);
    $total_row_blood_donation_center = mysqli_num_rows($blood_donation_center_result);

    $blood_aplus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'A+';";
    $blood_aplus_result = mysqli_query($conn, $blood_aplus);

    $data = mysqli_fetch_all($blood_aplus_result, MYSQLI_ASSOC);

    $blood_aplus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_aplus_volumn)){
        $blood_aplus_volumn = ["0"];
    }

    $blood_bplus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'B+';";
    $blood_bplus_result = mysqli_query($conn, $blood_bplus);

    $data = mysqli_fetch_all($blood_bplus_result, MYSQLI_ASSOC);

    $blood_bplus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_bplus_volumn)){
        $blood_bplus_volumn = ["0"];
    }

    $blood_oplus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'O+';";
    $blood_oplus_result = mysqli_query($conn, $blood_oplus);

    $data = mysqli_fetch_all($blood_oplus_result, MYSQLI_ASSOC);

    $blood_oplus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_oplus_volumn)){
        $blood_oplus_volumn = ["0"];
    }

    $blood_abplus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'AB+';";
    $blood_abplus_result = mysqli_query($conn, $blood_abplus);

    $data = mysqli_fetch_all($blood_abplus_result, MYSQLI_ASSOC);

    $blood_abplus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_abplus_volumn)){
        $blood_abplus_volumn = ["0"];
    }

    $blood_aminus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'A-';";
    $blood_aminus_result = mysqli_query($conn, $blood_aminus);

    $data = mysqli_fetch_all($blood_aminus_result, MYSQLI_ASSOC);

    $blood_aminus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_aminus_volumn)){
        $blood_aminus_volumn = ["0"];
    }

    $blood_bminus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'B-';";
    $blood_bminus_result = mysqli_query($conn, $blood_bminus);

    $data = mysqli_fetch_all($blood_bminus_result, MYSQLI_ASSOC);
    
    $blood_bminus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_bminus_volumn)){
        $blood_bminus_volumn = ["0"];
    }

    $blood_ominus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'O-';";
    $blood_ominus_result = mysqli_query($conn, $blood_ominus);

    $data = mysqli_fetch_all($blood_ominus_result, MYSQLI_ASSOC);

    $blood_ominus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_ominus_volumn)){
        $blood_ominus_volumn = ["0"];
    }

    $blood_abminus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'AB-';";
    $blood_abminus_result = mysqli_query($conn, $blood_abminus);

    $data = mysqli_fetch_all($blood_abminus_result, MYSQLI_ASSOC);

    $blood_abminus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_abminus_volumn)){
        $blood_abminus_volumn = ["0"];
    }


    $donation_query = "SELECT monthname(donate_date_time) as month, count(*) as total_donate_per_month from blood group by month order by month;";

    $donation_result = mysqli_query($conn, $donation_query);

    $data = mysqli_fetch_all($donation_result, MYSQLI_ASSOC);

    $donation_xValues = array_map(function ($item) {
        return $item['month'];
    }, $data);

    $donation_yValues = array_map(function ($item) {
        return $item['total_donate_per_month'];
    }, $data);

    $request_query = "SELECT monthname(request_date_time) as month, count(*) as total_request_blood from blood_request WHERE `request_status` = 'success' group by month;";

    $request_result = mysqli_query($conn, $request_query);

    $data = mysqli_fetch_all($request_result, MYSQLI_ASSOC);

    $request_xValues = array_map(function ($item) {
        return $item['month'];
    }, $data);

    $request_yValues = array_map(function ($item) {
        return $item['total_request_blood'];
    }, $data);
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

    /* ABOUT  */

#about-us{
    background: white;
}

.about {
    width:98%;
    margin: auto;
    text-align: center;
    padding-top: 8%;
  }

  h1 {
    font-size: 30px;
    font-weight: 600;
  }

  p {
    color: #777;
    font-size: 20px;
    font-weight: 300;
    padding: 10px;
    line-height: 20px;
  }

.about-col {
    transition: transform 1s;
    width: 25%;
    display: inline-block;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border-radius: 5px;
    position: relative;
    background: white;
    margin: 2%;
  }
  

  .about-col:hover {
    transform: scale(1.03, 1.03);
  }

  .image img {
    width: 50%;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
  }

.about h3 {
    font-family: "Alegreya Sans SC", sans-serif;
  }

  .about-col p {
    padding: 3px;
    text-align: center;
    padding-top: 10px;
    border-radius: 2.8rem;
    margin: 10px;
    z-index: -1;
    font-family: "NTR", sans-serif;
    font-size: 1.2rem;
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

.home{
    padding-top: 200px;
    background-color: #751919;
}




</style>
</head>
<body>
<!-- Header section Starts -->
<?php include("seeker_header.php") ?>
<!-- Header Section Ends -->


<!-- Home section Starts -->
<section class="home" id="home">
    <div class="image">
        <img src="assets/img/images/BD1.jpg" alt="">
    </div>

    <div class="content">
        <h3>Donate Blood, Safe Lives</h3>
        <p>Your blood donation can give a precious smile to someone's face. Donate blood and be the reason for the smile on many faces. Blood donation will cost you nothing, but it will save a life! Your blood is precious: Donate, save a life & make it Divine.</p>
    </div>

</section>
<!-- Home section Ends -->


<!-- Donate & Seek section Starts -->
<section class="donate-seek" id="donate-seek" style="margin-top:120px;background-color:#fff;">

    <div class="row">

        <div class="content">
            <h2>Welcome <?php echo  $fetch['seeker_username'] ; ?> !!</h3>
            <h3 > What Would You Like To Do Today? </h3>

        </div>

        <div class="image" style="    z-index: 0;">
            <img src="assets/img/images/BD12.gif" alt="">
        </div>

    </div>

    <div class="box-container">

          <a href="seeker_blood_request.php" class="btn">Request now</a>
          <a href="seeker_review_request.php" class="btn">Review Request</a>

    </div>
</section>

<!-- Donate & Seek section Ends -->

<!-- Blood Inventory section Starts -->
<section class="blood-inventory" id="blood-inventory" style="background-color:#751919">

    <h1 class="heading">Blood Inventory </h1>

    <section class="blood-container">
       <div class="blood">
          <img src="assets/img/images/A+.gif" alt="" style="width:100%;">
          <h3><?php echo $blood_aplus_volumn[0] ?></h3>
          <p style="font-size:25px;">ML</p>
       </div>
    
       <div class="blood">
          <img src="assets/img/images/A-.gif" alt="" style="width:100%;">
          <h3><?php echo $blood_aminus_volumn[0] ?></h3>
          <p style="font-size:25px;">ML</p>
       </div>
    
       <div class="blood">
          <img src="assets/img/images/B+.gif" alt="" style="width:100%;">
          <h3><?php echo $blood_bplus_volumn[0] ?></h3>
          <p style="font-size:25px;">ML</p>
       </div>
    
       <div class="blood">
          <img src="assets/img/images/B-.gif" alt="" style="width:100%;">
          <h3><?php echo $blood_bminus_volumn[0] ?></h3>
          <p style="font-size:25px;">ML</p>
      </div>

      <div class="blood">
        <img src="assets/img/images/AB+.gif" alt="" style="width:100%;">
        <h3><?php echo $blood_abplus_volumn[0] ?></h3>
        <p style="font-size:25px;">ML</p>
     </div>
  
     <div class="blood">
        <img src="assets/img/images/AB-.gif" alt="" style="width:100%;">
        <h3><?php echo $blood_abminus_volumn[0] ?></h3>
        <p style="font-size:25px;">ml</p>
     </div>
  
     <div class="blood">
        <img src="assets/img/images/O+.gif" alt="" style="width:100%;">
        <h3><?php echo $blood_oplus_volumn[0] ?></h3>
        <p style="font-size:25px;">ml</p>
     </div>
  
     <div class="blood">
        <img src="assets/img/images/O-.gif" alt="" style="width:100%;">
        <h3><?php echo $blood_ominus_volumn[0] ?> </h3>
        <p style="font-size:25px;">ml</p>
    </div>
    </section>    

</section>

<!-- Blood Inventory section Ends -->

<!-- Abouts us section Start -->
<section id="about-us">
    <div class="about">
        <h1 class="heading">What is this all about ?</h1> <br>
        <p class="head-des" class="text">We solve the problem of blood emergencies by connecting <span
            class="one-line"><br></span> blood donors directly with people in blood need. </p>
            <div class="row">
            <div class="about-col">
                <div class="image">
                <img src="assets/img/images/drop.png">
                </div>
                <h3>What we do ?</h3>
                    <p>We connect blood donors with recipients, without any intermediary such as blood banks, for an
                    efficient and seamless process.</p>
            </div>
                <div class="about-col">
                    <div class="image">
                    <img src="assets/img/images/innovation.png">
                    </div>
                    <br>
                        <h3>Innovative</h3>
                        <p>Fusiontech  is an innovative approach to address global health.We provide <span>immediate
                            access</span> to blood donors.</p>
                </div>
                    <div class="about-col">
                    <div class="image">
                        <img src="assets/img/images/netwotk.png">
                    </div>
                        <h3>Network</h3>
                        <p>Fusiontech is one of several community organizations working together as a network that
                            responds to emergencies in an efficient manner.</p>
                    </div>
                        <div class="about-col">
                            <div class="image">
                                <img src="assets/img/images/noti.png">
                            </div>
                            <h3>Get notified</h3>
                            <p>Fusiontech  Connect works with network partners to connect blood donors and recipients
                                through an automated SMS service and a mobile app.</p>
                        </div>
                        <div class="about-col">
                            <div class="image">
                                <img src="assets/img/images/cost.png">
                            </div>
                            <h3>Totally Free</h3>
                            <p>Fusiontech 's ultimate goal is to provide an easy -to-use, easy-to-access, fast, efficient,
                                and reliable way to get life-saving blood, totally <span>Free of cost.</span></p>
                        </div>
                        <div class="about-col">
                            <div class="image">
                                <img src="assets/img/images/save.png">
                            </div>
                            <h3>Save Life</h3>
                            <p>We are a non profit foundation and our main objective is to make sure that everything is done
                                to protect vulnerable persons.<span>Help
                                    us by making a gift!</span></p>
                        </div>
            </div>
    </div>
    </section>
<!-- Abouts us section Ends -->

<!-- Recent Blog section Starts -->
    
    <!-- Blog Section starts -->
    <section class="blog" id="blog" style="    z-index: 2;background-color:#751919;">
<h1 class="heading" style="color:#fff;"> Recent Blog </h1>
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
			$sql = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT 3";
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
                        <p>By : <?php echo $row ["admin_username"];?></p>
                        <p><?php echo $row ["blog_dtCreated"];?></p><br>
                        <h3> <?php echo $row ["blog_description"];?></h3><br><br><br><br>
                        <div class="button" style="position:absolute;bottom:0;float:left;">
                           <a href="seeker_blog.php?blog_id=<?php echo $row['blog_id']?>" class="btn ">Read More </a><br><br><br>
                        </div> 
                     </div>
                  
                
               <?php

            }
            $connection->close();
?>
</div><br>

</section>
<!-- Recent Blog section Ends -->





<!-- Footer section Starts -->
<?php include("seeker_footer.html") ?>
<!-- Footer section Ends -->


</body>