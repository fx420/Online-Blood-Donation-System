<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `seeker` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'seeker_id',
    1 => 'seeker_username',
    2 => 'seeker_password',
    3 => 'seeker_name',
    4 => 'seeker_blood_type',
    5 => 'seeker_age',
    6 => 'seeker_gender',
    7 => 'seeker_contact',
    8 => 'seeker_address',
    9 => 'seeker_email',
    10 => 'latest_request_date',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, seeker_id) like '%".$search_value."%'";
	$sql .= " OR seeker_username like '%".$search_value."%'";
	$sql .= " OR seeker_password like '%".$search_value."%'";
	$sql .= " OR seeker_name like '%".$search_value."%'";
	$sql .= " OR seeker_blood_type like '%".$search_value."%'";
	$sql .= " OR seeker_age like '%".$search_value."%'";
	$sql .= " OR seeker_gender like '%".$search_value."%'";
	$sql .= " OR seeker_contact like '%".$search_value."%'";
	$sql .= " OR seeker_address like '%".$search_value."%'";
	$sql .= " OR seeker_email like '%".$search_value."%'";
	$sql .= " OR latest_request_date like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY seeker_id ASC";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	



$query = mysqli_query($conn,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$requestQuery = mysqli_query($conn,"SELECT max(request.request_date_time) FROM blood_request request inner join seeker seeker on request.seeker_username='".$row['seeker_username']."';");	
	$sub_array = array();
	$prefix = $row['prefix'];
    $id = $row['seeker_id'];
    $seeker_id = "$prefix"."$id";
    $sub_array[] = $seeker_id;
	$sub_array[] = $row['seeker_username'];
	$sub_array[] = $row['seeker_password'];
	$sub_array[] = $row['seeker_name'];
	$sub_array[] = $row['seeker_blood_type'];
	$sub_array[] = $row['seeker_age'];
	$sub_array[] = $row['seeker_gender'];
	$sub_array[] = $row['seeker_contact'];
	$sub_array[] = $row['seeker_address'];
	$sub_array[] = $row['seeker_email'];
	while($rows = mysqli_fetch_assoc($requestQuery)){
		if (is_null($rows['max(request.request_date_time)'])){
			$sub_array[]='<center>-</center>';
		}else{
			$date = $rows['max(request.request_date_time)'];
			$sub_array[]="<center>$date</center>";
		}
	}
	if($row['image'] != ''){
		$sub_array[] = '<center><img style="width:80px;" src="assets/img/upload/seeker/'.$row['image'].'" /></center> ';
	}else{

		$sub_array[] = '<center>-</center>';
	}
	
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
