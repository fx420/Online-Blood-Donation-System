<?php include('dbconn.php');
$id = $_POST['id'];
$query = mysqli_query($conn, "select inventory.inventory_id, COUNT(location.inventory_id) as count from blood_location location inner join inventory inventory on location.inventory_id = inventory.inventory_id WHERE inventory.inventory_id='$id';
");
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
mysqli_close($conn);
?>
