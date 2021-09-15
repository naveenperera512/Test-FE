<?php

$id = $_POST['id'];
$harvestowner = $_POST['harvestowner'];
$hname = $_POST['hname'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "keels_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE farmerupdates SET hname='$hname', description='$description' ,quantity='$quantity' ,harvestowner='$harvestowner' WHERE id=45";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$result = mysqli_query($con, $query);
header("Location:Fmain.php");
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
mysqli_close($con);
?>
$conn->close();
?>