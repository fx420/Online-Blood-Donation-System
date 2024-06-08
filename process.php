<?php 
include 'config.php';

    if(isset($_POST['submit']))
    {
       $contact_form_email = $_POST['contact_form_email'];
       $contact_form_subject = $_POST['contact_form_subject'];
       $contact_form_message = $_POST['contact_form_message'];
       $contact_form_date_time = $_POST['contact_form_date_time'];

       if(empty($contact_form_email) || empty($contact_form_subject) || empty($contact_form_date_time) || empty($contact_form_message))
       {
           header('location:contact-us.php?error');
       }
       else
       {
        $insert = mysqli_query($conn, "INSERT INTO `contact_form`(contact_form_email, contact_form_subject, contact_form_message,contact_form_date_time) VALUES('$contact_form_email', '$contact_form_subject', '$contact_form_message','$contact_form_date_time')") or die('query failed');
        if($insert){
           header("location:Contact-us.php?success");
        }    
       }
    }
    else
    {
        header("location:Contact-us.php");
    }
?>