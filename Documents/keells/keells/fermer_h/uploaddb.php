<?php
 $con = mysqli_connect('localhost','root','');





 if(!$con){
  echo'not connect to server';

 }
 if(!mysqli_select_db($con,'keels_db')){
  echo'database not selected';
 }
 
 if(isset($_POST['oname'])){
  $oname=$_POST['oname'];
 }
 if(isset($_POST['hname'])){
  $hname=$_POST['hname'];
 }
 
 if(isset($_POST['quantity'])){
  $quanti=$_POST['quantity'];
 }
 if(isset($_POST['image'])){
  $image=$_POST['image'];
 }
 if(isset($_POST['description'])){
  $description=$_POST['description'];
 }
 if(isset($_POST['lt'])){
  $lt=$_POST['lt'];
 }

 if(isset($_POST['lg'])){
  $lg=$_POST['lg'];
 }
 if(isset($_POST['pc'])){
  $pc=$_POST['pc'];
 }

 $sql = "INSERT INTO farmerupdates(hname,description,quantity,harvestowner,lat,lng,product catagory,image) VALUES('$hname'.'$description','$quanti','$hname','$lt','$lg','$pc')";

if(!mysqli_query($con,$sql)){
  echo'not inserted';
}else{
  echo'inserted succsessfully';
}
header("refresh:10; url=upload.php");

?>
