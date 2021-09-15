<!DOCTYPE html>
<html>
<head>
	<title>posts</title>
	 <style type="text/css"> 
body{ 
margin: 0;
padding: 0;
text-align:center;
background-image: url("1.jpg");   
background-size:cover;
font-family:sans-serif;

}

.container-keells{
  min-height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  color: white;
  margin: 80px;
  background: rgba(0, 0, 0, 0.5); 
  padding: -50px;

}
h1 {
  cursor: default;
  text-align: center;
  color: white;
}
</style>
</head>
<body>
<h1>UPLOAD A NEWS</h1>

<div class="container-keells">
<form  action="news.php" method="POST" >
      
      <p><label>Name</label><br><br>
      <input type='text' name='name'/></p>
      <p>write a description
        <br><br>
      <textarea name='description' rows="5" cols="40" placeholder="Write a comment..."></textarea></p>
      <input  type="submit" name='submit' value="Submit">
      
</form>

</div>


</body>
</html>