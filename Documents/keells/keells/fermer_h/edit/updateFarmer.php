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
    $nameErr=$nicerr=$passworderr=$repassworderr=$addrserr=$cityerr=$croptypeerr=$cropscaleerr=$phonenoerr="";
    $name=$nic=$password=$addrsline1=$addrsline2=$city=$postalcode=$croptype=$cropscale=$phoneno=$email="";
    $count = 0;
    $key = $nicofuser;
    $data = "SELECT * FROM user WHERE nic = '$key'";
    $res = $conn->query($data);
    if($res){
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $_name = $row["name"];
                $_nic = $row["nic"];
                $_addressl1 = $row["addrsline1"];
                $_addressl2 = $row["addrsline2"];
                $_city = $row["city"];
                $_postalcode = $row["postalcode"];
                $_croptype = $row["croptype"];
                $_cropscale = $row["cropscale"];
                $_phoneno = $row["phoneno"];
                $_email = $row["email"];
            }
        }
    }else{
        echo "Error: ".$data."<br>".$conn->error;
    }

    if(isset($_POST['submit'])){

		if($_SERVER["REQUEST_METHOD"]=="POST"){
			if(!empty($_POST["name"])){
			    $nametmp = test_input($_POST["name"]);
				if (!preg_match("/^[a-zA-Z-' ]*$/",$nametmp)) {
      				$nameErr = "Only letters and white space allowed";
    			}else{
    				$name = test_input($_POST["name"]);
                }
                
                $u1 = "UPDATE user SET name = '$name' WHERE nic='$key'";
                $r1 = $conn->query($u1);
                if($r1){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u1."<br>".$conn->error;
                }
			}

			if(!empty($_POST["nic"])){
				$nictmp = test_input($_POST["nic"]);
				if(!preg_match("/^[a-zA-Z\d]+$/", $nic)) {
					$nicerr = "NIC Number format is invalid";
				}else{
					$nic = test_input($_POST["nic"]);
                }
                
                $u2 = "UPDATE user SET nic = '$nic' WHERE nic='$key'";
                $r2 = $conn->query($u2);
                if($r2){
                    echo "Succefully updated name";
                    $key = $nic;
                }else{
                    echo "Error: ".$u2."<br>".$conn->error;
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

                $u3 = "UPDATE user SET password = '$password' WHERE nic='$key'";
                $r3 = $conn->query($u3);
                if($r3){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u3."<br>".$conn->error;
                }
			}

			if(!empty($_POST["addressline1"])){
                $addrsline1 = test_input($_POST["addressline1"]);

                $u4 = "UPDATE user SET addrsline1 = '$addrsline1' WHERE nic='$key'";
                $r4 = $conn->query($u4);
                if($r4){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u4."<br>".$conn->error;
                }
            }

            if(!empty($_POST["addressline2"])){
                $addrsline2 = test_input($_POST["addressline2"]);

                $u5 = "UPDATE user SET addrsline2 = '$addrsline2' WHERE nic='$key'";
                $r5 = $conn->query($u5);
                if($r5){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u5."<br>".$conn->error;
                }
            }


			if(!empty($_POST["city"])){
				$citytmp = test_input($_POST["city"]);
				if(!preg_match("/^[a-zA-Z-' ]*$/", $citytmp)){
					$cityerr = "Enter a valid city";
				}else{
					$city = test_input($_POST["city"]);
                }
                
                $u6 = "UPDATE user SET city = '$city' WHERE nic='$key'";
                $r6 = $conn->query($u6);
                if($r6){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u6."<br>".$conn->error;
                }
			}

            if(!empty($_POST["postalcode"])){
                $postalcode = test_input($_POST["postalcode"]);

                $u7 = "UPDATE user SET postalcode = '$postalcode' WHERE nic='$key'";
                $r7 = $conn->query($u7);
                if($r7){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u7."<br>".$conn->error;
                }
            }

			if(!empty($_POST["croptype"])){
                $croptype = test_input($_POST["croptype"]);
                
                $u8 = "UPDATE user SET croptype = '$croptype' WHERE nic='$key'";
                $r8 = $conn->query($u8);
                if($r8){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u8."<br>".$conn->error;
                }
			}

			if(!empty($_POST["cropscale"])){
                $cropscale = test_input($_POST["cropscale"]);
                
                $u9 = "UPDATE user SET cropscale = '$cropscale' WHERE nic='$key'";
                $r9 = $conn->query($u9);
                if($r9){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u9."<br>".$conn->error;
                }
			}

			if(!empty($_POST["phoneno"])){
				$phonenotmp = test_input($_POST["phoneno"]);
					if(!preg_match("/^[0-9\+]+$/", $phonenotmp)){
						$phonenoerr = "invalid phone number";
					}else{
						$phoneno = test_input($_POST["phoneno"]);
                    }
                    
                    $u10 = "UPDATE user SET phoneno = '$phoneno' WHERE nic='$key'";
                    $r10 = $conn->query($u10);
                    if($r10){
                        echo "Succefully updated name";
                    }else{
                        echo "Error: ".$u10."<br>".$conn->error;
                    }
			}

            if(!empty($_POST["email"])){
                $email = test_input($_POST["email"]);

                $u11 = "UPDATE user SET email = '$email' WHERE nic='$key'";
                $r11 = $conn->query($u11);
                if($r11){
                    echo "Succefully updated name";
                }else{
                    echo "Error: ".$u11."<br>".$conn->error;
                }
            }

		}
    }
?>

<center><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h3>Farmer Update</h3>

		<input type="text" name="name" placeholder=<?php echo $_name;?>>
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>

		<input type="text" name="nic" placeholder=<?php echo $_nic;?> maxlength="12">
		<span class="error">* <?php echo $nicerr;?></span>
		<br><br>

		<input type="password" name="password" placeholder="password">
		<span class="error">* <?php echo $passworderr;?></span>
		<br><br>

		<input type="password" name="repassword" placeholder="Confirm password">
		<span class="error">* <?php echo $repassworderr;?></span>
		<br><br>

		<input type="text" name=<?php echo $addrsline1;?> placeholder="$_addressl1">
		<span class="error">* <?php echo $addrserr;?></span>
		<br><br>

		<input type="text" name="addressline2" placeholder=<?php echo $_addressl2;?>>
		<br><br>

		<input type="text" name="city" placeholder=<?php echo $_city;?>>
		<span class="error">* <?php echo $cityerr;?></span>
		<br><br>

		<input type="number" name="postalcode" placeholder=<?php echo $_postalcode;?>>
		<br><br>

		Crop Type : <select name=<?php echo $_croptype;?>>
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

		Crop Scale : <select name=<?php echo $_cropscale;?>>
			<option></option>
			<option value="small">Small</option>
			<option value="Medium">Medium</option>
			<option value="Large">Large</option>
		</select>
		<span class="error">* <?php echo $cropscaleerr;?></span>
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