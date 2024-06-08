
<?php
include 'functions.php';
include 'config.php';
session_start();
$donor_username = $_SESSION['donor_username'];

?>
<?php
if(isset($_POST['delete']))
{
  $id = $_POST['id'];

  $query = "DELETE FROM appointment WHERE appointment_id='$id'";
  $query_run = mysqli_query ($conn,$query);

  if ($query_run)
  {
    echo '<script> alert ("Appointment Canceled");</script>';
  }
  else
  {
    echo '<script> alert ("Error");</script>';
  }


}
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


@import url('font-inter.css');

:root {
  --primarycolor: #751919;
  --primarycolorhover: #d68989;
  --btnice:#D8EBFA;
  --btnnicetext:#1b62b3;
}
.dashboard-items{
  
  border: 5px solid #751919;
  border-radius: 7px;
  color: var(--primarycolor);


}
.header-searchbar{
    width: 75%;
    background-color: rgba(255, 255, 255, 0.705);
    border: 0.5px solid rgba(190, 190, 190, 0.884);
    font-size:18px;
    
    
}

.containers .heading{
    line-height: 1.5;
    font-size: 4.5rem;
    color:rgb(0, 0, 0);
    text-shadow: var(--text-shadow);
    margin-left: 380px;
    margin-bottom: 20px;

}
.dash-body{
  display: flex;
  align-items: center;
  justify-content: space-between;

  margin-left: 10px;
  padding-top: 30px;
  border:.2rem solid  #751919;
  background-color:rgba(230, 225, 225, 0.849);
}
.input-text{
    border-radius: 4px;
    border: 5px solid #d68989;
    padding: 10px;
    width: 92%;
    transition: 0.2s;
    outline: none;
}

.input-text:focus{
    border: 5px solid #751919;
    transition: 0.2s;
}
.btn{
    cursor: pointer;
    padding: 8px 20px;
    outline: none;
    text-decoration: none;
    font-size: 15px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    border-radius: 5px;
    font-family: 'Inter', sans-serif;
}

.btn:hover{
    background-color: var(--primarycolorhover);
    box-shadow: none;
    transition: all 0.5s;
    font-family: 'Inter', sans-serif;

}

.btn-primary{
    background-color: var(--primarycolor) ;
    border: 1px solid var(--primarycolor) ;
    color: #fff ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
}

.btn-primary-soft{
    background-color: #d68989;
    /*border: 1px solid rgba(57,108,240,0.1) ;*/    color: #fff;
    font-weight: 500;
    font-size: 16px;
    border: none;
    /*box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3)*/
}
.btn-primary-soft1{
    background-color: #751919;
 color: #fff;
    font-weight: 500;
    font-size: 16px;
    border: none;

}

.btn-primary-soft:hover{
    background-color: var(--primarycolor) ;
    /*border: 1px solid rgba(57,108,240,0.1) ;*/
    color: #fff ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
}

.search-items{
  padding:20px;
  margin:10px;
  width:95%;
  display: flex;
  padding-left:0;
  padding-left: 30px;
  box-sizing: border-box;
  line-height: 1.5;
  box-shadow: 0 3px 5px 0 rgba(95, 95, 97, 0.068);
}


.h1-search{
  margin: 0;
  padding: 0;
  font-size: 23px;
  font-weight: 600;
  padding-top: 20px;
  padding-bottom: 10px;
}

.h3-search{
  margin: 0;
  padding: 0;
  font-size: 18px;
  font-weight: 500;
  color: #212529e3;
  
}
.h4-search{
  margin: 0;
  padding: 0;
  font-size: 18px;
  font-weight: 500;
  color: #212529e3;
  
}
            
    .logout-btn{
    margin-top: 30px;
    width: 85%;
}

.header-search{
    display: flex;
    justify-content: center;

    
}
.ox{
    width: 40%;
    margin: 0.5rem;
    border-radius: .5rem;
    border: var(--border);
    font-size: 1.5rem;
    color: var(--black);
    text-transform: none;
    text-align: center;
    margin-top:16.5px;
    margin-bottom:20.5px;
    margin-left:20.5px;
}
</style>
</head>
<body>
<!-- Header section Starts -->
<?php include("donor_header.php") ?>
<!-- Header Section Ends -->

<section style="  background-color: #fff;  margin-top:200px;">

<div class="containers">
        
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
            <tr >
            <td width="13%" >
                    <a href="donor.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:55px;width:125px;margin-bottom:20px;font-size:20px;"><font class="tn-in-text">Back</font></button></a>
                    </td>
            </tr>
                <tr >

                    <td >
                            <form action="" method="post" class="header-search">

                                       
                            </form>
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                        <!-- <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49);font-weight:400;">Scheduled Sessions / Booking / <b>Review Booking</b></p> -->
                        
                    </td>
                    
                </tr>
                
                
                
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="80%" class="sub-table scrolldown" border="0" style="padding: 50px;border:none">
                            
                        <tbody>
                          
                <td style="width: 50%;" rowspan="2">
                <?php
    


    $id = $_GET['id'];

    $query ="UPDATE `appointment` SET `status` = '1' WHERE `appointment_id` = $id;";
    performQuery($query);

    $query = "SELECT * FROM appointment inner join blood_donation_center on appointment.center_id=blood_donation_center.center_id  WHERE `appointment_id` = '$id';";

    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            ?>
             <div  class="dashboard-items search-items"  >
            
            <div style="width:100%;">
            <form method="post" >
            
                    <div class="h3-search" >
                        Appointment ID: <?php echo $i ["appointment_id"];?><br>
                    </div>
                    <div class="h1-search">
                        Center Name: <?php echo $i["center_name"];?><br>
                    </div>
                    <div class="h4-search">
                       <b> Center Contact:</b> <?php echo $i ["center_contact"];?> <br>
                       <b> Appointment Date:</b> <?php echo $i ["appointment_date_time"];?> 
                    </div> 
                    <br>
                    <button  class=" btn-primary-soft1  "  style="padding-top:11px;padding-bottom:11px;width:100%;margin-bottom:15px;"><font class="tn-in-text"><?php echo $i ["appointment_status"];?></font></button>
                    <form method="post" >
                      <input type="hidden" name="id" value="<?php echo $i ["appointment_id"];?>">
                      <INPUT type="submit" value="Cancel Booking" name="delete" class="login-btn btn-primary-soft btn " style="padding-top:11px;padding-bottom:11px;width:100%"></INPUT><br><br>
                    </form>
                </div>
            
        </div><br>
                                            <?php
        }
    }
    
?><br/>
                                        </td>                            
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
</section>


<!-- Footer section Starts -->

<?php include("donor_footer.html") ?>

<!-- Footer section Ends -->




</body>