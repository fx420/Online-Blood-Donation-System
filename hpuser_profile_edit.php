<?php 
include('dbconn.php');

$id = $_POST['id'];
$healthcarep_username = $_POST['healthcarep_username'];
$healthcarep_password = $_POST['healthcarep_password'];
$healthcarep_name = $_POST['healthcarep_name'];
$healthcarep_email = $_POST['healthcarep_email'];
$healthcarep_contact = $_POST['healthcarep_contact'];

if(empty($_FILES['image'])){

    $sql = "UPDATE `healthcare_professional` SET  `healthcarep_username`='$healthcarep_username' ,`healthcarep_password`='$healthcarep_password' ,`healthcarep_name`='$healthcarep_name' , `healthcarep_email`= '$healthcarep_email',
    `healthcarep_contact`='$healthcarep_contact'WHERE healthcarep_id='$id' ";
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
				$sql = "UPDATE `healthcare_professional` SET  `healthcarep_username`='$healthcarep_username' ,`healthcarep_password`='$healthcarep_password' ,`healthcarep_name`='$healthcarep_name' , `healthcarep_email`= '$healthcarep_email',
             `healthcarep_contact`='$healthcarep_contact', `image`='$img_path' WHERE healthcarep_id='$id' ";
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
				      	'msg' => 'Failed to update data' . mysqli_error($conn)
				    );

				    echo json_encode($data);
				} 
		}else{

				$data = array(
				        'status'=>'failed',
				      	'msg' => 'Failed to upload image'
				    );

				    echo json_encode($data);

		}
}else{


    $sql = "UPDATE `healthcare_professional` SET  `healthcarep_username`='$healthcarep_username' ,`healthcarep_password`='$healthcarep_password' ,`healthcarep_name`='$healthcarep_name' , `healthcarep_email`= '$healthcarep_email',
    `healthcarep_contact`='$healthcarep_contact' WHERE healthcarep_id='$id' ";
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


		mysqli_close($conn);
}






}



?>