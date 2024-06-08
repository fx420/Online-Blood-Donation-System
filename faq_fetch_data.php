
<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `faq` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'faq_id',
    1 => 'faq_title',
    2 => 'faq_answer',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, faq_id) like '%".$search_value."%'";
	$sql .= " OR faq_title like '%".$search_value."%'";
	$sql .= " OR faq_answer like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY faq_id ASC";
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
    $id = $row['faq_id'];
    $faq_id = "$prefix"."$id";
    $sub_array[] = $faq_id;
	$sub_array[] = $row['faq_title'];
	$sub_array[] = $row['faq_answer'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['faq_id'].'" class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-pen-to-square"></i></a>  <a href="javascript:void();" data-id="'.$row['faq_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
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

