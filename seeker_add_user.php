<?php include('dbconn.php');

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$blood_type = $_POST['blood_type'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$email = $_POST['email'];


$sqlSelect = "SELECT * FROM seeker WHERE seeker_username = '$username' "; 
$result = mysqli_query($conn, $sqlSelect);

if(mysqli_num_rows($result) > 0){ 

	$data = array(

        'status'=>'failed',
        'msg' => 'Username is duplicated'

    );

    echo json_encode($data);

}else{

		if(empty($_FILES['image'])){
			$sql = "INSERT INTO `seeker` (`seeker_username`,`seeker_password`,`seeker_name`,`seeker_blood_type`,`seeker_age`,`seeker_gender`,`seeker_contact`,`seeker_address`,`seeker_email`) values ('$username','$password', '$name',  '$blood_type','$age' , '$gender','$contact' , '$address','$email')";
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

					$move = move_uploaded_file($path,'assets/img/upload/seeker/'.$filename);
		      
		        	if($move){

		                $img_path .= $filename;

						$sql = "INSERT INTO `seeker` (`seeker_username`,`seeker_password`,`seeker_name`,`seeker_blood_type`,`seeker_age`,`seeker_gender`,`seeker_contact`,`seeker_address`,`seeker_email`,`image`)
						 values ('$username','$password', '$name',  '$blood_type','$age' ,  '$gender','$contact' ,  '$address','$email','$img_path')";
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