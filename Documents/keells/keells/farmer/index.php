<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$nameErr=$nicerr=$passworderr=$repassworderr=$addrserr=$cityerr=$croptypeerr=$cropscaleerr=$phonenoerr="";

		$name=$nic=$password=$addrsline1=$addrsline2=$city=$postalcode=$croptype=$cropscale=$phoneno=$email="";

		$count = 0;

		

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		if(isset($_POST["submit"])){

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
	
				if(empty($_POST["nic"])){
					$nicerr = "National Identity Card Number is required";
				}else{
					$nictmp = test_input($_POST["nic"]);
						if(!preg_match("/^[a-zA-Z0-9]*$/", $nic)) {
							$nicerr = "NIC Number format is invalid";
						}else{
							$nic = test_input($_POST["nic"]);
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
	
				if(empty($_POST["addressline1"])){
					$addrserr = "Address is required";
				}else{
					$addrsline1 = test_input($_POST["addressline1"]);
				}
	
				if(!empty($_POST["addressline1"])){
					$addrsline2 = test_input($_POST["addressline2"]);
				}
	
				if(empty($_POST["city"])){
					$cityerr = "City is required";
				}else{
					$citytmp = test_input($_POST["city"]);
						if(!preg_match("/^[a-zA-Z-' ]*$/", $citytmp)){
							$cityerr = "Enter a valid city";
						}else{
							$city = test_input($_POST["city"]);
						}
				}
	
				if(!empty($_POST["addressline1"])){
					$postalcode = test_input($_POST["postalcode"]);
				}
				
	
				if(empty($_POST["croptype"])){
					$croptypeerr = "Crop type is required";
				}else{
					$croptype = test_input($_POST["croptype"]);
				}
	
				if(empty($_POST["cropscale"])){
					$cropscaleerr = "Crop scale is required";
				}else{
					$cropscale = test_input($_POST["cropscale"]);
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
	
				if(!empty($_POST["addressline1"])){
					$email = test_input($_POST["email"]);
				}

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "keels_db";

			$conn = new mysqli($servername, $username, $pass, $dbname);

			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			}

			$check = "SELECT * FROM user WHERE nic = '$nic'";

			$sql = "INSERT INTO user (name, nic, password, addrsline1, addrsline2, city, postalcode, croptype,cropscale, phoneno, email) VALUES ('$name','$nic','$password','$addrsline1','$addrsline2','$city','$postalcode','$croptype','$cropscale','$phoneno','$email')";

			$result = $conn->query($check);
			if($result){
				if($result->num_rows > 0){
					echo "<Script>alert('User already exists')</script>";
				}else{
					if($nic != ""){
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
		}
	?>

	<center><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h3>Farmer Registration</h3>

		<input type="text" name="name" placeholder="Username">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>

		<input type="text" name="nic" placeholder="NIC Number" maxlength="12">
		<span class="error">* <?php echo $nicerr;?></span>
		<br><br>

		<input type="password" name="password" placeholder="password">
		<span class="error">* <?php echo $passworderr;?></span>
		<br><br>

		<input type="password" name="repassword" placeholder="Confirm password">
		<span class="error">* <?php echo $repassworderr;?></span>
		<br><br>

		<input type="text" name="addressline1" placeholder="Address Line 1">
		<span class="error">* <?php echo $addrserr;?></span>
		<br><br>

		<input type="text" name="addressline2" placeholder="Address Line 2">
		<br><br>

		<input type="text" name="city" placeholder="City">
		<span class="error">* <?php echo $cityerr;?></span>
		<br><br>

		<input type="number" name="postalcode" placeholder="Postal Code">
		<br><br>

		Crop Type : <select name="croptype">
			<option></option>
			<option value="Vegetable">Vegetable</option>
			<option value="Fruits">Fruits</option>
			<option value="Grains">Grains</option>
			<option value="Vegetable & Fruits">Vegetable & Fruits</option>
			<option value="Vegetable & Grains">Vegetable & Grains</option>
			<option value="Fruits & Grains">Fruits & Grains</option>
			<option value="Vegetable & Fruits & Grains">Vegetable & Fruits & Grains</option>
			<option value="Other">Other</option>
		</select>
		<span class="error">* <?php echo $croptypeerr;?></span>
		<br><br>

		Crop Scale : <select name="cropscale">
			<option></option>
			<option value="small">Small</option>
			<option value="Medium">Medium</option>
			<option value="Large">Large</option>
		</select>
		<span class="error">* <?php echo $cropscaleerr;?></span>
		<br><br>

		<input type="text" name="phoneno" placeholder="Phone Number" maxlength="13">
		<span class="error">* <?php echo $phonenoerr;?></span>
		<br><br>

		<input type="email" name="email" placeholder="Email">
		<br><br>

		<input id="btn" type="submit" name="submit" value="Sign Up">

		<p>Already an user?</p>
		<a href="signin.php">Sign in</a>
	</form></center>

</body>
</html>