<?php 
// Gets data from URL parameters.

$hname =   $_POST['hname'];
$image =  $_POST['image'];
$owner=   $_POST['harvestowner'];
$quantity=  $_POST['quantity'];
$lat =    $_POST['lt'];
$lng =    $_POST['lg'];
$description =  $_POST['description'];
$image= $_POST['image'];


  

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
$query = sprintf("INSERT INTO farmerupdates " .
         " (id, hname, image, harvestowner, quantity, lat, lng, description) " .
         " VALUES (NULL,'%s', '%s', '%s', '%s', '%f', '%f', '%s');",
        
         mysqli_real_escape_string($con, $hname),
         mysqli_real_escape_string($con, $image),
         mysqli_real_escape_string($con, $owner),
         mysqli_real_escape_string($con, $quantity),
         mysqli_real_escape_string($con, $lat),
         mysqli_real_escape_string($con, $lng),
         mysqli_real_escape_string($con, $description));

$result = mysqli_query($con, $query);


if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
mysqli_close($con);
header("Location:fmain.php");
    
?>