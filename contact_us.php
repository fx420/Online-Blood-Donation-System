
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- custom css file link -->
        <link rel="stylesheet" href="css/style2.css">
    <style>
        .alert{
   margin:10px 0;
   width: 100%;
   border-radius: 5px;
   padding:10px;
   text-align: center;
   background-color: var(--red);
   color:var(--white);
   font-size: 20px;
}
.contact .row{
    position: relative;
    min-height: 100vh;
    padding: 50px 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

}

.contact .row .content{
    max-width: 800px;
    text-align: center;
}
.contact .row .heading{
    padding-top: 10rem;
    color: #751919;
}

.contact .row .content p{
    font-weight: 500;
    color: rgb(243, 186, 186);
    font-size: 18px;
}

.contact .row .container{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
}

.contact .row .container .contactinfo{
    width: 100%;
    display: flex;
    flex-direction: column;
}

.contact .row .container .contactinfo .square{
    position: relative;
    padding: 20px 0;
    display: flex;
}

.contact .row .container .contactinfo .square  .icon{
    min-width: 60px;
    height: 60px;
    background-color: var(--black);
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;
    color: #fff;
    margin-left: 200px;
}

.contact .row .container .contactinfo .square .text {
    display: flex;
    margin-left: 40px;
    font-size: 16px;
    color: #751919;
    flex-direction: column;
    font-weight: 300;
}

.contact .row .container .contactinfo .square .text h3{
    font-weight: 500;
    color: #751919;
}


.contact .row .container .Contact Form{
    flex: 1 1 45rem;
    width: 100%;
    padding: 40px;
    background: #9e5353;
    box-shadow: var(--box-shadow);
    border-radius: 2rem;
    border: var(--border);
}

.contact .row .container .Contact Form h2{
    font-size: 30px;
    color: #333;
    font-weight: 500;
    text-align: center;
}

.contact .row .container .Contact Form .inputBox{

    margin-top: 12px 0;
}

.contact .row .container .Contact Form .inputBox input,
.contact .row .container .Contact Form .inputBox textarea{
    width: 100%;
    padding: 20px 20px;
    font-size: 16px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #333;
    outline: none;
    resize: none;
    text-align: center;
}


    </style>


</head>
<body>

<!-- Header section Starts -->
<?php include("header.html") ?>
<!-- Header Section Ends -->
<!-- Home section Starts -->
<section class="home" id="home">
    <div class="image">
        <img src="assets/img/images/BLOG.jpg" alt="">
    </div>

    <div class="content">
        <h3 style="font-size:48px;">Welcome to Our <br> Contact Us Page</h3>
        <p style="font-size:20px;">If you have any any type of quries , you can send us message from here. It's our pleasure to help you.</p>
    </div>

</section>

<!-- Home section Ends -->

<!-- Contact US Section Starts -->

<section class="contact" id="contact us">
    
    <div class="row">

        
        <div class="container">
            <div class="contactinfo">
                <div class="square">
                    <div class="icon"><i class="fa fa-map-pin" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p> Jalan Teknologi 5,<br>
                            Taman Teknologi Malaysia,<br>
                            57000 Kuala Lumpur,<br>
                            Wilayah Persekutuan Kuala Lumpu</p>
                    </div>
                </div>
                <div class="square">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+60 123456789</p>
                    </div>           
                </div>
                <div class="square">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>fusiontech@gmail.com</p>
                    </div>           
                </div>
            </div>
            <div class="Contact Form">
                <form action="process.php" method="post">
                    <h2>Send Message</h2>
                    <?php 
                            $Msg = "";
                            if(isset($_GET['error']))
                            {
                                $Msg = " Please Fill in the Blanks ";
                                echo '<div class="alert alert-danger">'.$Msg.'</div>';
                            }

                            if(isset($_GET['success']))
                            {
                                $Msg = " Your Message Has Been Sent ";
                                echo '<div class="alert alert-success">'.$Msg.'</div>';
                            }
                        
                        ?>
                    <div class="inputBox">
                        <input type="email" name="contact_form_email" placeholder="Email" required="required" >
                        <input type="text"  name="contact_form_subject" placeholder="Subject" required="required" >
                        <textarea  name="contact_form_message" placeholder="Type Your Message...." required="Required" ></textarea>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Send" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    

</section>

<!-- Contact US Section Ends -->

<!-- Footer section Starts -->
<?php include("footer.html") ?>

<!-- Footer section Ends -->



    <!-- custom javascript file link  -->
    <script src="js/script.js"></script>

</body>