<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "keels_db";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
    }
    
	$nicofuser = "";
	$emailofadmin = "";
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	  }
?>