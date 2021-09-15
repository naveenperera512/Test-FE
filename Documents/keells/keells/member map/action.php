<?php 
	require 'keels.php';
	$kel = new keels;
	$kel->setId($_REQUEST['id']);
	$kel->setLat($_REQUEST['lat']);
	$kel->setLng($_REQUEST['lng']);
	$status = $edu->updateCollegesWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
 ?>