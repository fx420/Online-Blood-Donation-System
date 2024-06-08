<?php 
include('dbconn.php');

$id = $_POST['id'];
$faq_title = $_POST['faq_title'];
$faq_answer = $_POST['faq_answer'];



$sql = "UPDATE `faq` SET  `faq_title`='$faq_title' ,`faq_answer`='$faq_answer'  WHERE faq_id='$id' ";
$query= mysqli_query($conn,$sql);

if($query ==true)
{
   
    $data = array(
        'status'=>'success',
        'msg' => 'Successfully update data!'

       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
        'msg' => 'Failed to update data!'

      
    );

    echo json_encode($data);
} 
mysqli_close($conn);
?>