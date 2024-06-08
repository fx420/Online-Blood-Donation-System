<?php include('dbconn.php');

$faq_title = $_POST['faq_title'];
$faq_answer = $_POST['faq_answer'];

$sql = "INSERT INTO `faq` (`faq_title`,`faq_answer`) values ('$faq_title','$faq_answer')";
$query= mysqli_query($conn,$sql);


if($query ==true)
{
   
    $data = array(
        'status'=>'success',
        'msg' => 'Successfully add data'

       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
        'msg' => 'Failed to add data'

      
    );

    echo json_encode($data);
} 
mysqli_close($conn);
?>