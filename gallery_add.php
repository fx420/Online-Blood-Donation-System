<?php include('dbconn.php');

$img = $_FILES['image'];

if(isset($img['name']) && $img["name"] != '' ){

	$filename = date('YmdHi').'_'.(str_replace(' ','',$img['name']));
	$path = $img['tmp_name'];
	$img_path = '';

	$move = move_uploaded_file($path,'assets/img/upload/gallery/'.$filename);
	
	if($move){

			$img_path .= $filename;

			$sql = "INSERT INTO `gallery` (`image`) values ('$img_path')";
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
mysqli_close($conn);
?>