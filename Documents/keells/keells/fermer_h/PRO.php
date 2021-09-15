<?php
?>
<html>
<head>

    
	<title>Edit profile</title>
	<link rel="stylesheet" type="text/css" href="project.css">
</head>
<body>
	<div class="Profile">
	<div class="Edit profile- title">
		 	<h1>Edit your profile</h1>
			
	</div >	<div class=" Edit profile">
		<form action="project.php" method="GET">
			<center>
			<input name="Username" type="text"class="form-control"placeholder="User Name" required>
			<br> 
		 	
			<input name="Contactnumber"type="text"class="form-control"placeholder="Contact Number"required> 
			<br>
			<input name="Email"type="text"class="form-control"placeholder="Email"required> 
			<br>
      <input name="Password"type="Password"class="form-control"placeholder="Password"required> 
      <br>
      <input name="Password"type=" Repeat Password"class="form-control"placeholder=" Repeat Password"required> 
      <br>
      
      
			
			
			

  <p>Gender</p>
  <input type="radio" id="Male" name="Gender" value="Male">
  <label for="Male">Male</label>
  <input type="radio" id="Female" name="Gender" value="Female">
  <label for="Female">Female</label><br>
<br>

 
<form>
<br><input type="submit" class ="form-control"name="submit">
</form>



	</div>

</body>
</html>
<style type="text/css"> 
  body{ 
  margin: 0;
  padding: 0;
  text-align:center;
  
   background-image: url("ee.jpg"); 
   
  background-size:cover;
  background-position: center;
  font-family:sans-serif;
  font-color:#FFFF;


  } 
  .profile
  {
    max-width: 700px;
    max-height: 2200px;
    border-radius: 10px;
    margin:auto;
    background: rgba(0,0,0,0.7);
    box-sizing: border-box;
    padding: 40px;
    color: #fff6;
    margin-top: 60px;
     
  }
  .contact-title
  {
    margin-top: 100px;
    color: #000000;
    text-transform: uppercase;
    transition: all 4s ease-in-out;
      
  }

  .contact-title h1{
     font-size: 32px;
     line-height: 5px;
      
  }

  .contact-title h2{
    font-size: 16px;

  }
  form
  {
    margin-top: 50px;
    transition: all 4s ease-in-out;
  }
    
  .form-control
  {
    width:600px;
    background: transparent;
    border:none;
    outline: none;
    border-bottom: 1px solid gray;
    color:#000000;
    font-size: 18px;
    margin-bottom: 16px;
     font-color:#FFFF;
  }
  form.submit
  {
    background: #0000FF;
    border-color: transparent;
    color:#ffff;
    font-size: 20px;
    font-weight:bold;
    letter-spacing: 2px;
    height: 50px;
    margin-top: 20px; 
     color: #fff6;
  }
  form.submit:hover
  {
    background: color:#ffff;
    cursor: pointer;
  }

