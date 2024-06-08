<?php include('dbconn.php');


$bloodbag_id  = $_POST['bloodbag_id'];
$inventory_id  = $_POST['inventory_id'];



$sqlSelect = "SELECT * FROM blood_location WHERE bloodbag_id = '$bloodbag_id' "; 
$result = mysqli_query($conn, $sqlSelect);
if(mysqli_num_rows($result) > 0){ 

	$data = array(

        'status'=>'failed',
        'msg' => 'Bloodbag ID is duplicated'
      
    );

    echo json_encode($data);


}else{


        $sql = "INSERT INTO `blood_location` (`bloodbag_id`,`inventory_id`)
        values ('$bloodbag_id','$inventory_id')";
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