<html>
<head>

	<title>Keells</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">


</head>
<body>




<div class="menu ">
	<ul>
		<li><a href="farmer/index.php" ><button class="button1 bt1">Farmer</button></a></li> 
		<li><a href="admin/index.php" ><button class="button2 bt2">Admin</button></a></li>
	</ul>
</div>
		
<br><br><br><br>

<div class="container-keells">
	<h1>
	  <span>K</span>
	  <span>E</span>
	  <span>E</span>
	  <span>l</span>
	  <span>l</span>
	  <span>S</span>

	</h1>
</div>
<br><br>
	<div class="container">
		<center><h2>Our active members</h2></center>
		<br>
		<?php 
			require 'indexmember.php';			
		 ?>
		
	</div>
	
	
<footer>
<br><br><br>
<br><br><br>
<br><br><br>
<div class="container-down">

<h2>News And Articals</h2>
<?php
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

$sql = "SELECT id, name,description FROM news order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
        echo " Name: " . $row["name"]. "<br>";
       echo " " . $row["description"]. "<br><br><hr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</div>

</footer>
</body>
</html>