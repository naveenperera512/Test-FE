<!DOCTYPE html>
<html>
<head>
	<title>display immage</title>
</head>
<body>
	<center>
		<form action="" method="POST" enctype="multipart/form-data">
			<table border="5">
				<thead>
					<tr>
						<th>Name</th>
       					<th>DESCRIPTION</th>
 				      	<th>QUANTITY</th>
 				       	<th>POSTID</th>
 				       	<th>PHARVEST OWNER</th>
 				       	<th>HARVEST PIC</th>
					</tr>
				</thead>

				<?php

$conn=mysqli_connect("localhost","root","","keels_db");

$query="SELECT * FROM farmerupdates";
$query_run = mysqli_query ($conn,$query);

while ($row=mysqli_fetch_array($query_run)) {
	?>
	<tr>	
		<td><?php echo $raw[name]; ?></td>
		<td><?php echo $raw[description]; ?></td>
		<td><?php echo $raw[quantity]; ?></td>
		<td><?php echo $raw[postid]; ?></td>
		<td><?php echo $raw[harvestowner]; ?></td>
		<td><?php  echo '<img src="data:image;base64,'.base64_encode($raw['image']).' " alt="harvpic" style="width:100px; height:100px;">'; ?></td>
	</tr>

	<?php
	
}


				?>

			</table>
		</form>


	</center>

</body>
</html>