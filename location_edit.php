<?php 
include('dbconn.php');

$id = $_POST['id'];
$inventory_id  = $_POST['inventory_id'];

$sql = "UPDATE `blood_location` SET  `inventory_id`='$inventory_id' WHERE bloodbag_id='$id' ";
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