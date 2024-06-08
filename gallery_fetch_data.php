<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `gallery` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'image_id',
    1 => 'image',
    2 => 'upload_date',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, image_id) like '%".$search_value."%'";
	$sql .= " OR image like '%".$search_value."%'";
	$sql .= " OR upload_date like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY image_id ASC";
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
    $id = $row['image_id'];
    $image_id = "$prefix"."$id";
    $sub_array[] = $image_id;
	if($row['image'] != ''){
		$sub_array[] = '<img style="width:80px;" src="assets/img/upload/gallery/'.$row['image'].'" /> ';
	}else{

		$sub_array[] = '-';
	}
	$sub_array[] = $row['upload_date'];
	
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['image_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
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
