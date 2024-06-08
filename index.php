<?php
include 'config.php';
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

    $donor_query = "SELECT * FROM `donor`";
    $donor_result = mysqli_query($conn, $donor_query);
    $total_row_donor = mysqli_num_rows($donor_result);

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
            
.icons-container .heading{
    color: #fff;
}
.icons-container .box-container{
    display: grid;
    gap:2rem;
    grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
    padding-top: 5rem;
    padding-bottom: 5rem;
}

.icons-container  .icons{
    border: var(--border);
    box-shadow: var(--box-shadow);
    border-radius: 100%;
    text-align: center;
    padding:2.5rem;
    background: white;
}

.icons-container .icons i{
    font-size: 4.5rem;
    color:#751919;
    padding-bottom: .7rem;
}

.icons-container .icons h3{
    font-size: 4.5rem;
    color:var(--black);
    padding: .5rem 0;
    text-shadow:var(--text-shadow) ;
}

.icons-container .icons p{
    font-size: 1.7rem;
    color:var(--light-color);
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
.blog .box-container .box p{
    color: var(--black);
    font-size: 1.8rem;
    text-align:left;
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

</style>
</head>

<body>

<?php include("header.html") ?>
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
<section class="donate-seek" id="donate-seek">

    <h1 class="heading"> Donate & Seek </h1>

    <div class="row">

        <div class="content">
            <h2>Welcome!!</h3>
            <h3> What Would You Like To Do Today? </h3>

        </div>

        <div class="image">
            <img src="assets/img/images/BD12.gif" alt="">
        </div>

    </div>

    <div class="box-container">

        <a href="seeker_login.php" class="btn"> SEEK </a>
        <a href="login.php" class="btn"> DONATE </a>

    </div>
</section>

<!-- Donate & Seek section Ends -->

<!-- Blood Inventory section Starts -->
<section class="blood-inventory" id="blood-inventory">

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
        <p style="font-size:25px;">ML</p>
     </div>
  
     <div class="blood">
        <img src="assets/img/images/O+.gif" alt="" style="width:100%;">
        <h3><?php echo $blood_oplus_volumn[0] ?></h3>
        <p style="font-size:25px;">ML</p>
     </div>
  
     <div class="blood">
        <img src="assets/img/images/O-.gif" alt="" style="width:100%;">
        <h3><?php echo $blood_ominus_volumn[0] ?> </h3>
        <p style="font-size:25px;">ML</p>
    </div>
    </section>

</section>

<!-- Blood Inventory section Ends -->

<!-- Donation Process section Starts -->
<section class="donation-process" id="donation-process">

    <h1 class="heading">Donation Process </h1>
    <div class="row">
      <div class="content">
        <h3>Giving blood for the first time</h3>
        <span style="  text-shadow:none ;">
          Tens of thousands of people are doing something amazing by registering to join our growing community of blood donors - ready to save lives. <br>
          As a new donor, we know you're eager to give blood and save lives straight away. We understand it's disappointing if you can’t find an appointment immediately. But don't worry, your help will be needed in the future so please search several months ahead. <br>
          <br>
          <h2 style="  text-shadow:none ;">There are three reasons why you might not get an appointment straight away: </h2>
          -we only collect the amount of blood that's needed and don't want to waste your donation. <br>
          -we prioritise the most needed blood types and your blood group is not yet known <br>
          -as a safety precaution, we've reduced the number of donation chairs per session to give more space between donors - this means there are fewer appointments available
        </span>
        <h3>Become a blood donor</h3>
        <span style="  text-shadow:none ;" >
          <h2 style="  text-shadow:none ;">To get started, you'll need to register your details on our database. We will ask you to: </h2>
    
         -answer some basic questions to check you are most likely to be able to donate <br>
         -register and validate your email address <br>
         -complete your personal details to set up your account <br>
        </span>
        <h3>Registered recently?</h3>
        <span style="  text-shadow:none ;">
          Thank you for taking the first step to becoming a blood donor. <br>
    
          Now that we have your details, we will let you know when there are appointments available in your area when you're logged in to your account.
        </span>
      </div>
  </div>
</section>
<!-- Donation Process section Ends -->


<!-- Success Record section Starts -->
<section class="icons-container">

<div class="box-container">

    <div class="icons">
        <i class="fas fa-heart fa-2x text-gray-300"></i>
        <p>Total Donors</p>
        <h3><?php echo $total_row_donor ?></h3>

    </div>
    
    <div class="icons">
        <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
        <p>Total Seekers</p>
        <h3><?php echo $total_row_seeker ?></h3>

    </div>
    
    <div class="icons">
        <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
        <p>Total Healthcare Professional </p>
        <h3><?php echo $total_row_healthcare_professional ?></h3>

    </div>
    
    <div class="icons">
        <i class="fas fa-hospital"></i>
        <p>Total Donation Center </p>
        <h3><?php echo $total_row_blood_donation_center ?></h3>

    </div>
</div>
</section>
<!-- Success Record section Ends -->


<!-- DONATION CAMPAIGNS section Starts -->
<section class="donor-opinion" id="donor-opinion">

    <h1 class="heading" >Donation Campaigns </h1>

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
			$sql = "SELECT * FROM blood_donation_camp inner join blood_donation_center on blood_donation_camp.center_id=blood_donation_center.center_id ORDER BY camp_id DESC LIMIT 6";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}
            // read data of each row
			while($row = $result->fetch_assoc()) 
            {
                ?>
                     <div class="box" >
                    <?php echo '<img src="assets/img/upload/donation_center/'.$row['image'].'">';?> 
                    <h3> <?php echo $row ["camp_description"];?></h3><br>
                        <h2 style="text-align:justify;"> Date & Time :   <?php echo $row ["camp_date_time"];?></h2>
                        <h2 style="text-align:justify;">Center :   <?php echo $row ["center_name"];?></h2>
                        <h2 style="text-align:justify;">Contact :   <?php echo $row ["center_contact"];?></h2>
                        <h2 style="text-align:justify;">Address :  <?php echo $row ["center_address"];?></h2>
                        <h2 style="text-align:justify;">Additional Info :  <?php echo $row ["center_information"];?></h2><br>
                     </div>  
                
               <?php

            }
            $connection->close();
?>

        </div>
</section>
<!-- DONATION CAMPAIGNS section Ends -->


<!-- PHOTO GALLERY section Starts -->
<section class="donor-opinion" id="donor-opinion">

    <h1 class="heading" style="color:#fff;">Photo Gallery </h1>

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
			$sql = "SELECT * FROM gallery ORDER BY image_id DESC LIMIT 3";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}
            // read data of each row
			while($row = $result->fetch_assoc()) 
            {
                ?>
                     <div class="box">
                    <?php echo '<img src="assets/img/upload/gallery/'.$row['image'].'">';?> 
                    <p><?php echo $row ["upload_date"];?></p><br>
                    
                     </div>  
                
               <?php

            }
            $connection->close();
?>

        </div>
</section>
<!-- PHOTO GALLERY section Ends -->


<!-- Recent Blog section Starts -->
    
<section class="blog" id="blog">
<h1 class="heading" style="color:#751919;"> Recent Blog </h1>
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
                        <h3> <?php echo $row ["blog_description"];?></h3><br><br><br>
                        <div class="button" style="position:absolute;bottom:0;float:left;">
                           <a href="blogdesc.php?blog_id=<?php echo $row['blog_id']?>" class="btn ">Read More </a><br><br>
                        </div> 
                     </div>
                  
                
               <?php

            }
            $connection->close();
?>
</div><br>

</section>
<!-- Recent Blog section Ends -->
<?php include("footer.html") ?>



  <!-- custom javascript file link  -->
  <script src="js/script.js"></script>

</body>