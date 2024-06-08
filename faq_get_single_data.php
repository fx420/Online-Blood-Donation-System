<?php include('dbconn.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `faq` WHERE faq_id='$id' ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
mysqli_close($conn);
?>
