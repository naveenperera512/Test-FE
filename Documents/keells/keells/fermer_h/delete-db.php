<?php

$id = $_POST['id'];
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

// sql to delete a record
$sql = "DELETE FROM farmerupdates WHERE $id ";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
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