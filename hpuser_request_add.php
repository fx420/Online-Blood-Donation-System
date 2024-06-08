
<?php include('dbconn.php');

$healthcarep_username = $_POST['healthcarep_username'];
$blood_type = $_POST['blood_type'];
date_default_timezone_set("Asia/Kuala_Lumpur");
$request_date_time = date('Y-m-d H:i:s');

$sql = "INSERT INTO `blood_request` (`healthcarep_username`,`blood_type`,`request_date_time`,`request_status`) 
    values ('$healthcarep_username','$blood_type', '$request_date_time',  'Pending')";
    $query= mysqli_query($conn,$sql);
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

?>