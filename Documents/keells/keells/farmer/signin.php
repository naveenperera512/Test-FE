<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<?php
		$nicerr = $passerr = "";
		$nic = $pass = "";
		$passCheck = "";

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		if(isset($_POST["submit"])){

			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(empty($_POST["nic"])){
					$nicerr = "Enter a valid NIC number";
				}else{
					$nictmp = test_input($_POST["nic"]);
						if(!preg_match("/^[a-zA-Z\d]+$/", $nictmp)) {
							$nicerr = "NIC Number format is invalid";
						}else{
							$nic = test_input($_POST["nic"]);
						}
				}

				if(empty($_POST["password"])){
					$passerr = "Password not eneterd";
				}else{
					$pass = test_input($_POST["password"]);
				}
			}

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "keels_db";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			}

			$check = "SELECT * FROM user WHERE nic = '$nic'";

			$result = $conn->query($check);
			if($result){
				if($result->num_rows > 0){
					$sql = "SELECT password FROM user WHERE nic = $nic";
					$result2 = $conn->query($sql);
					if($result2->num_rows > 0){
						while($row = $result2->fetch_assoc()){
							$passCheck = $row["password"];
						}
					}
				}else{
					echo '<script>alert("User does not exist. Go back and Create a new account.")</script>';
				}
			}else{
				echo "Error: ".$sql."<br>".$conn->error;
			}

			if($pass == $passCheck){
				echo "Succefully logged in";
				include 'loginstatus.php';
				$usrLogged = true;
				#TODO : Navigate to landing page...

			}else{
				$passerr = "Incorrect password";
			}

			$conn->close();
		}

	?>

	<center><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h3>Farmer Login</h3>
		<input type="text" name="nic" placeholder="NIC Number" maxlength="12"><br>
		<span class="error"><?php echo $nicerr;?></span>
		<br><br>

		<input type="password" name="password" placeholder="Password"><br>
		<span class="error"><?php echo $passerr;?></span>
		<br><br>

		<input id="btn" type="submit" name="submit" value="Sign In">
	</form></center>
</body>
</html>