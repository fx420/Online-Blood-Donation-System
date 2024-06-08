<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `inventory` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'inventory_id',
    1 => 'center_id',
    2 => 'inventory_location',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, inventory_id) like '%".$search_value."%'";
	$sql .= " OR CONCAT(prefix2, center_id) like '%".$search_value."%'";
	$sql .= " OR inventory_location like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY inventory_id ASC";
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
    $id = $row['inventory_id'];
    $inventory_id = "$prefix"."$id";
    $sub_array[] = $inventory_id;
	$sub_array[] = "BDC".$row['center_id'];
	$sub_array[] = $row['inventory_location'];
	$sub_array[] = '<a href="javascript:void();" data-bs-toggle="modal" data-bs-target="#viewBloodQuantity" data-id="'.$row['inventory_id'].'" class="btn btn-warning btn-sm viewbtn" ><i class="fa-solid fa-eye"></i></a>   <a href="javascript:void();" data-id="'.$row['inventory_id'].'" class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-pen-to-square"></i></a>  <a href="javascript:void();" data-id="'.$row['inventory_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
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

