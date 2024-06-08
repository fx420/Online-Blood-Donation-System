<?php include('dbconn.php');

$healthcarep_username = $_POST['healthcarep_username'];
$healthcarep_password = $_POST['healthcarep_password'];
$healthcarep_name = $_POST['healthcarep_name'];
$healthcarep_email = $_POST['healthcarep_email'];
$healthcarep_contact = $_POST['healthcarep_contact'];
$center_id = $_POST['center_id'];

$sqlSelect = "SELECT * FROM healthcare_professional WHERE healthcarep_username = '$healthcarep_username' "; 
$result = mysqli_query($conn, $sqlSelect);
if(mysqli_num_rows($result) > 0){ 

	$data = array(

        'status'=>'failed',
        'msg' => 'Username is duplicated'
      
    );

    echo json_encode($data);


}else{

	if(empty($_FILES['image'])){
		$sql = "INSERT INTO `healthcare_professional` (`healthcarep_username`,`healthcarep_password`,`healthcarep_name`,`healthcarep_email`,`healthcarep_contact`,`center_id`)
            values ('$healthcarep_username','$healthcarep_password', '$healthcarep_name',  '$healthcarep_email','$healthcarep_contact' ,'$center_id')";
		$query= mysqli_query($conn,$sql);
	
			if($query ==true)
			{
				$data = array(
					'status'=>'success',
					'msg' => 'Successfully update data'
				);

				echo json_encode($data);
			}
			else
			{
				$data = array(
					'status'=>'failed',
					'msg' => 'Failed to update data'
				);
	
				echo json_encode($data);
			} 
	}else{

			$img = $_FILES['image'];
			if(isset($img['name']) && $img["name"] != '' ){

				$filename = date('YmdHi').'_'.(str_replace(' ','',$img['name']));
				$path = $img['tmp_name'];
				$img_path = '';

				$move = move_uploaded_file($path,'assets/img/upload/healthcare_professional/'.$filename);
		  
				if($move){

					$img_path .= $filename;

					$sql = "INSERT INTO `healthcare_professional` (`healthcarep_username`,`healthcarep_password`,`healthcarep_name`,`healthcarep_email`,`healthcarep_contact`,`center_id`,`image`)
						 values ('$healthcarep_username','$healthcarep_password', '$healthcarep_name',  '$healthcarep_email','$healthcarep_contact' ,  '$center_id','$img_path')";
					$query = mysqli_query($conn,$sql);

					if (!$query) {
					  echo("Error description: " . mysqli_error($conn));
					}

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
							'status'=> 'failed',
							  'msg' => 'Failed to add data'
						);

						echo json_encode($data);
					}

				}else{

					$data = array(
							'status'=>'failed',
							  'msg' => 'Failed to add image'
						);

						echo json_encode($data);
				}

			}
	}		
}

mysqli_close($conn);
?>