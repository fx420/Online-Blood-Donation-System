<?php include('dbconn.php');

$seeker_username = $_POST['seeker_username'];
$healthcarep_username = $_POST['healthcarep_username'];
$blood_type = $_POST['blood_type'];
date_default_timezone_set("Asia/Kuala_Lumpur");
$request_date_time = date('Y-m-d H:i:s');
$request_status = $_POST['request_status'];

$sqlSelect = "SELECT * FROM `blood_request` WHERE `seeker_username` = '$seeker_username' AND `healthcarep_username` = '$healthcarep_username'"; 
$result = mysqli_query($conn, $sqlSelect);

if(mysqli_num_rows($result) > 0){ 

    $data = array(
        'status'=>'failed',
        'msg' => 'Please provide seeker username or healthcare professional username'
);

echo json_encode($data);

}else if($seeker_username!='' && $healthcarep_username ==''){
    $sql = "INSERT INTO `blood_request` (`seeker_username`,`blood_type`,`request_date_time`,`request_status`) 
    values ('$seeker_username','$blood_type', '$request_date_time',  '$request_status')";
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
}else if($healthcarep_username!='' && $seeker_username==''  ){
    $sql = "INSERT INTO `blood_request` (`healthcarep_username`,`blood_type`,`request_date_time`,`request_status`) 
    values ('$healthcarep_username','$blood_type', '$request_date_time',  '$request_status')";
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
}

mysqli_close($conn);

?>