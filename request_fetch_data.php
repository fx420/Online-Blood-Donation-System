<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `blood_request` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'request_id',
    1 => 'seeker_username',
    2 => 'healthcarep_username',
    3 => 'blood_type',
    4 => 'request_date_time',
    5 => 'request_status',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, request_id) like '%".$search_value."%'";
	$sql .= " OR seeker_username like '%".$search_value."%'";
	$sql .= " OR healthcarep_username like '%".$search_value."%'";
	$sql .= " OR blood_type like '%".$search_value."%'";
	$sql .= " OR request_date_time like '%".$search_value."%'";
	$sql .= " OR request_status like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY request_id ASC";
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
	$sub_array = array();
	$prefix = $row['prefix'];
    $id = $row['request_id'];
    $request_id = "$prefix"."$id";
    $sub_array[] = $request_id;
	$sub_array[] = $row['seeker_username'];
	$sub_array[] = $row['healthcarep_username'];
	$sub_array[] = $row['blood_type'];
	$sub_array[] = $row['request_date_time'];
	$sub_array[] = $row['request_status'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['request_id'].'" class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-pen-to-square"></i></a>  <a href="javascript:void();" data-id="'.$row['request_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

mysqli_close($conn);

?>
