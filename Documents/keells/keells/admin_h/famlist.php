<!DOCTYPE html>
<html>
<head>
	<title>farmers list</title>
	<style type="text/css">
		body{
			background-image: url("1.jpg");
			background-size:cover;

		}
		table{
			background-color: lightblue;
			width:800px;
			line-height:40px;

		}
h1{
	color: white;
}		
	</style>



</head>

<body >
	
<h1 align="center">REGISTERED FARMERS</h1>

<table border=5px; align="center" bgcolor="#d9d9d9" style="text-align:center;" >
	<tr>
		<th>Name</th>
        <th>NIC</th>
        <th>ADDRASS</th>
        <th>CITY</th>
        <th>POSTAL CODE</th>
        <th>CROPTYPE</th>
        <th>CROPSCALE</th>
        <th>PHONE NUMBER</th>
        <th>EMAIL</th>

	</tr>
	<?php
	$conn=mysqli_connect("localhost","root","","keels_db");



$sql="SELECT * FROM user";
$result = $conn-> query($sql);

if ($result-> num_rows >0) {
	while ($row = $result-> fetch_assoc()){
		echo"<tr><td>".$row["name"]."</td><td>".$row["nic"]."</td><td>".$row["addrsline1"].$row["addrsline2"]."</td><td>".$row["city"]."</td><td>".$row["postalcode"]."</td><td>".$row["croptype"]."</td><td>".$row["cropscale"]."</td><td>".$row["phoneno"]."</td><td>".$row["email"]."</td></tr>";
	}
	echo "</table>";
}
else{echo "0 result";
}
	$conn->close();

?>
</table>


</body>
</html>