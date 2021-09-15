<?php
?>
<html> 
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta charset="utf-8">
 <title>Menu</title> 
 <style type="text/css"> 
  body{ 
 margin: 0;
  padding: 0;
  text-align:center;
    
    background-image: url("pp.jpg"); 
    background-size:cover;
    font-family:sans-serif;


}

       
 a.button2{
    top: 250px;
    left:10px;
    padding-top: ;
    position: absolute;
    background-color: #9ACD32;
    border:black;
    color: white;
    padding: 20px 60px;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: ;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
     } 
 a.button2:hover
{box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);}

 a.button3{
    top: 250px;
    left:400px;
    padding-top: ;
    position: absolute;
    background-color: #9ACD32;
    border:black;
    color: white;
    padding: 20px 60px;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: ;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
     } 
 a.button3:hover
{box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);}

      
a.button5{ 
    top: 250px;
    right:20px ;
    padding-top:;
    position: absolute;
    background-color: #9ACD32;
    border:black;
    color: white;
    padding: 20px 60px;
    text-decoration: none;
    display: inline-block;
    font-size:25px;
    margin: ;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;} 

 a.button5:hover
{box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);}

 a.button6{ 
    top: 250px;
    text-align: center;
    padding-top:;
    position: absolute;
    background-color: #9ACD32;
    border-radius: :black;
    color: white;
    padding: 20px 60px;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: ;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;} 

 a.button6:hover
{box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);}

h2{
  text-shadow: 2px 2px 5px black;
  text-align: center;
  min-width: 160px;
  font-size: 25px;
  color: #fff;}
   
.img{
  top:50%;
  border-radius: 50%;}

.menu ul li{
  list-style: none;
  cursor: pointer;
}
</style>
</head>


<body>


<div class="img">
<img src="dd.jpg" alt="Paris" style="width:250px">
</div>


<div class="menu ">
  <ul>
    <li><a class="button2" href="upload.php">Upload a post</a></a></li> 
    <li><a class="button3" href="mess.php">Messages</a></a></li> 
    <li><a class="button6" href="upd del.php">Update and Delete</a></li>
    <li><a class="button5" href="http://localhost/keells/admin/updateAdmin.php">Edit Profile</a> </li>
  </ul>
</div>

  

<br><br><br><br><br><br><br><br><br>

<div class="container">
<center><h2>OUR STORES</h2></center>
<br>
<?php 
     require 'indexmember.php';          
?>
</div>
  


</body> 
</html>

