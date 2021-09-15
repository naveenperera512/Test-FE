<?php


$database="keels_db";
// Gets data from URL parameters.
$name = $_POST['name'];
$discription = $_POST['discription'];




// Opens a connection to a MySQL server.

$con=mysqli_connect("localhost","root","","keels_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,"keels_db");

// ...some PHP code for database "test"...


// Inserts new row with place data.
$query = sprintf("INSERT INTO fermessages " .
         " (id, name, description ) " .
         " VALUES (NULL, '%s', '%s');",
         mysqli_real_escape_string($con, $name),
         mysqli_real_escape_string($con, $discription));
         

$result = mysqli_query($con, $query);
header("Location:fmain.php");
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
mysqli_close($con);
?>