<!DOCTYPE html>
<html>
<head>
  <title>posts</title>
   <style type="text/css"> 
body{ 
margin: 0;
padding: 0;
text-align:center;
background-image: url("1.jpg");   
background-size:cover;
font-family:sans-serif;

}

.container-keells{
  min-height: 40vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  color: white;
  margin: 40px 80px;
  background: rgba(0, 0, 0, 0.5); 


}

.container-down{
  min-height: 40vh;
  font-size: 20px;
  color: white;
  margin: 80px;
  background: rgba(0, 0, 0, 0.5); 


}
h1 {
  cursor: default;
  text-align: center;
  color: white;
}
</style>
</head>
<body>

<div class="container-down">

<h2>Inbox</h2>
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

$sql = "SELECT id, name,description FROM fermessages order by id desc";
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





</div>


</body>
</html>