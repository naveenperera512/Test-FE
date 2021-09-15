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
			
			width:800px;
			line-height:40px;

		}
	</style>

</head>
<body >
<table border=5px; align="center" bgcolor="#d9d9d9" style="text-align:center;" >
	<tr>
		<th>HARVEST NAME</th>
        <th>DESCRIPTION</th>
        <th>QUANTITY</th>
        <th>HARWEST OWNER</th>
        <th>PRODUCT CATAGORY</th>
        <th>HARVEST PIC</th>
	</tr>
	<?php
	$conn=mysqli_connect("localhost","root","","keels_db");

$sql="SELECT * FROM farmerupdates";
$result = $conn-> query($sql);

if ($result-> num_rows >0) {
	while ($row = $result-> fetch_assoc()){
		echo"<tr><td>".$row["hname"]."</td><td>".$row["description"]."</td><td>".$row["quantity"]."</td><td>".$row["harvestowner"]."</td><td>".$row["Product catagory"]."</td></tr>";

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