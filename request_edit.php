<?php 
include('dbconn.php');

$id = $_POST['id'];
$blood_type = $_POST['blood_type'];
$request_date_time = $_POST['request_date_time'];
$request_status = $_POST['request_status'];


$sql = "UPDATE `blood_request` SET `blood_type` ='$blood_type' ,`request_date_time`='$request_date_time',`request_status`='$request_status' WHERE request_id='$id' ";
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