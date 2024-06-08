<?php include('dbconn.php');

session_start(); 
$uname = $_SESSION['healthcarep_username'];
$email  = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
date_default_timezone_set("Asia/Kuala_Lumpur");
$date_time = date('Y-m-d H:i:s');




$sql = "INSERT INTO `contact_form`( `healthcarep_username`, `contact_form_email`,`contact_form_date_time`, `contact_form_subject`,`contact_form_message`) VALUES ('$uname','$email','$date_time','$subject', '$msg')";
$query= mysqli_query($conn,$sql);

if (!$query) {
    echo("Error description: " . mysqli_error($conn));
}

if($query ==true)
{
   
    $data = array(
        'status'=>'success',
        'msg' => 'Successfully add data!'
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
        'msg' => 'Failed to add data!'
      
    );

    echo json_encode($data);
} 
mysqli_close($conn);

?>