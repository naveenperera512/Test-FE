<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>
	<style type="text/css">
		.container {
			height: 280px;

		}
		#map {
			width: 100%;
			height: 100%;
			border: 5px solid green;
		}
		#data, #allData {
			display: none;
		}
	</style>
</head>
<body>
	<div class="container">

		<?php 
			require 'member-php.php';
			$kel = new keels;
			$coll = $kel->getCollegesBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';

			$allData = $kel->getAllColleges();
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';			
		 ?>
		<div id="map"></div>
	</div>

</body>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEF-4vrVWyEwlOePb2cLVa1CjPExdkFcE&callback=loadMap">
</script>
</html>