<?php 
include('dbconn.php');

$id = $_POST['id'];
$center_id  = $_POST['center_id'];
$inventory_location = $_POST['inventory_location'];

$sql = "UPDATE `inventory` SET  `center_id`='$center_id' ,`inventory_location`='$inventory_location' WHERE inventory_id='$id' ";
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