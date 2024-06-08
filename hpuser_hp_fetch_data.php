
<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `healthcare_professional` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'healthcarep_id',
    1 => 'healthcarep_username',
    2 => 'healthcarep_name',
    3 => 'healthcarep_email',
    4 => 'healthcarep_contact',
	5 => 'center_id',
	6 => 'image',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, healthcarep_id) like '%".$search_value."%'";
	$sql .= " OR healthcarep_username like '%".$search_value."%'";
	$sql .= " OR healthcarep_name like '%".$search_value."%'";
	$sql .= " OR healthcarep_email like '%".$search_value."%'";
	$sql .= " OR healthcarep_contact like '%".$search_value."%'";
	$sql .= " OR CONCAT(prefix2, center_id) like '%".$search_value."%'";
	$sql .= " OR image like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY healthcarep_id ASC";
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
    $id = $row['healthcarep_id'];
    $healthcarep_id = "$prefix"."$id";
    $sub_array[] = $healthcarep_id;
	$sub_array[] = $row['healthcarep_username'];
	$sub_array[] = $row['healthcarep_name'];
	$sub_array[] = $row['healthcarep_email'];
	$sub_array[] = $row['healthcarep_contact'];
	$sub_array[] = "BDC".$row['center_id'];
	if($row['image'] != ''){
		$sub_array[] = '<img style="width:80px;" src="assets/img/upload/healthcare_professional/'.$row['image'].'" /> ';
	}else{

		$sub_array[] = '-';
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

?>

