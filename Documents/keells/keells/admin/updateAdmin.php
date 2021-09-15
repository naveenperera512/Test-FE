<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 
<?php
    include 'datasource.php';
    $nameErr=$passworderr=$repassworderr=$phonenoerr="";
    $name=$nic=$password=$addrsline1=$addrsline2=$city=$postalcode=$croptype=$cropscale=$phoneno=$email="";
    $key = $emailofadmin;
    $data = "SELECT * FROM admin WHERE email = '$key'";
    $res = $conn->query($data);

    if(isset($_POST['submit'])){

		if($_SERVER["REQUEST_METHOD"]=="POST"){
			if(!empty($_POST["name"])){
			    $nametmp = test_input($_POST["name"]);
				if (!preg_match("/^[a-zA-Z-' ]*$/",$nametmp)) {
      				$nameErr = "Only letters and white space allowed";
    			}else{
    				$name = test_input($_POST["name"]);
                }
                
                $u12 = "UPDATE admin SET name = '$name' WHERE nic='$key'";
                $r12 = $conn->query($u12);
                if($r12){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u12."<br>".$conn->error;
                }
			}

			if(!empty($_POST["password"])){
				
			    if(empty($_POST["repassword"])){
				    $repassworderr = "Please enter password again to confirm";
			    }else{
					if($_POST["password"] != $_POST["repassword"]){
						$passworderr = "Passwords do not match";
					}else{
						$password = test_input($_POST["password"]);
                    }
                }

                $u13 = "UPDATE admin SET password = '$password' WHERE nic='$key'";
                $r13 = $conn->query($u13);
                if($r13){
                    echo "Succefully updated password";
                }else{
                    echo "Error: ".$u13."<br>".$conn->error;
                }
			}

			if(!empty($_POST["phoneno"])){
				$phonenotmp = test_input($_POST["phoneno"]);
					if(!preg_match("/^[0-9\+]+$/", $phonenotmp)){
						$phonenoerr = "invalid phone number";
					}else{
						$phoneno = test_input($_POST["phoneno"]);
                    }
                    
                    $u10 = "UPDATE admin SET phoneno = '$phoneno' WHERE nic='$key'";
                    $r10 = $conn->query($u10);
                    if($r10){
                        echo "Succefully updated number";
                    }else{
                        echo "Error: ".$u10."<br>".$conn->error;
                    }
			}

            if(!empty($_POST["email"])){
                $email = test_input($_POST["email"]);

                $u14 = "UPDATE admin SET email = '$email' WHERE nic='$key'";
                $r14 = $conn->query($u14);
                if($r14){
                    echo "Succefully updated email";
                }else{
                    echo "Error: ".$u14."<br>".$conn->error;
                }
            }

		}
    }
?>

<center><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h3>Admin Update</h3>

		<input type="text" name="name" placeholder=<?php echo $_name;?>>
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>

		<input type="password" name="password" placeholder="password">
		<span class="error">* <?php echo $passworderr;?></span>
		<br><br>

		<input type="password" name="repassword" placeholder="Confirm password">
		<span class="error">* <?php echo $repassworderr;?></span>
		<br><br>

		<input type="text" name="phoneno" placeholder=<?php echo $_phoneno;?> maxlength="13">
		<span class="error">* <?php echo $phonenoerr;?></span>
		<br><br>

		<input type="email" name="email" placeholder=<?php echo $_email;?>>
		<br><br>

		<input id="btn" type="submit" name="submit" value="Update">
	</form>
</center>


</body>
</html>