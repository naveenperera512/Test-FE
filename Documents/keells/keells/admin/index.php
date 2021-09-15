<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$nameErr=$passworderr=$repassworderr=$phonenoerr=$emailerr="";

		$name=$password=$phoneno=$email="";

		$count = 0;

		if($_SERVER["REQUEST_METHOD"]=="POST"){
			if(empty($_POST["name"])){
				$nameErr = "Name is required";
			}else{
				$nametmp = test_input($_POST["name"]);
				    if (!preg_match("/^[a-zA-Z-' ]*$/",$nametmp)) {
      					$nameErr = "Only letters and white space allowed";
    				}else{
    					$name = test_input($_POST["name"]);
    				}
			}

			if(empty($_POST["password"])){
				$passworderr = "Password is required";
			}

			if(empty($_POST["repassword"])){
				$repassworderr = "Please enter password again to confirm";
			}else{
					if($_POST["password"] != $_POST["repassword"]){
						$passworderr = "Passwords do not match";
					}else{
						$password = test_input($_POST["password"]);
					}
			}


			if(empty($_POST["phoneno"])){
				$phonenoerr = "Phone Number is required";
			}else{
				$phonenotmp = test_input($_POST["phoneno"]);
					if(!preg_match("/^[0-9\+]+$/", $phonenotmp)){
						$phonenoerr = "invalid phone number";
					}else{
						$phoneno = test_input($_POST["phoneno"]);
					}
			}

			if(empty($_POST["email"])){
				$emailerr = "Email is required";
			}else{
				$emailtmp = test_input($_POST["email"]);
				if(!filter_var($emailtmp,FILTER_VALIDATE_EMAIL)){
					$emailerr = "Enter a valid email address";
				}else{
					$email = $emailtmp;
				}
			}
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		if(isset($_POST["submit"])){

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "keels_db";

			$conn = new mysqli($servername, $username, $pass, $dbname);

			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			}

			$check = "SELECT * FROM admin WHERE email = '$email'";

			$sql = "INSERT INTO admin (name, email, password,phoneno) VALUES ('$name','$email','$password','$phoneno')";

			$result = $conn->query($check);
			if($result){
				if($result->num_rows > 0){
					echo "<Script>alert('User already exists')</script>";
				}else{
					if($email != ""){
							if($conn->query($sql)===TRUE){
								echo "New record created succesfully";
								include 'loginstatus.php';
								$usrLogged = true;
								#TODO: Navigate to landing page...
							}else{
								echo "Error: ".$sql."<br>".$conn->error;
							}
						}else{
							echo "<script>alert('Fill in the fields')</script>";
						}
				}
			}else{
				echo "Error: ".$sql."<br>".$conn->error;
			}

			$conn->close();
		}
	?>

	<center><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h3>Admin Registration</h3>

		<input type="text" name="name" placeholder="Username">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>

		
		<input type="email" name="email" placeholder="Email">
		<span class="error">* <?php echo $emailerr;?></span>
		<br><br>

		<input type="password" name="password" placeholder="password">
		<span class="error">* <?php echo $passworderr;?></span>
		<br><br>

		<input type="password" name="repassword" placeholder="Confirm password">
		<span class="error">* <?php echo $repassworderr;?></span>
		<br><br>

		<input type="text" name="phoneno" placeholder="Phone Number" maxlength="13">
		<span class="error">* <?php echo $phonenoerr;?></span>
		<br><br>


		<input id="btn" type="submit" name="submit" value="Sign Up">

		<p>Already an user?</p>
		<a href="signin.php">Sign in</a>
	</form></center>

</body>
</html>