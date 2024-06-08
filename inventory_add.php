<?php include('dbconn.php');


$center_id  = $_POST['center_id'];
$inventory_location = $_POST['inventory_location'];



$sql = "INSERT INTO `inventory` (`center_id`,`inventory_location`)
 values ('$center_id', '$inventory_location')";
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