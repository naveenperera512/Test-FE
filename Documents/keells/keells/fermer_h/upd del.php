
<!DOCTYPE >
<html>
<head>
	<title>updat and delete post</title></head>
	<body>
<style type="text/css">   
body{
margin: 0;
padding: 0;
text-align:center;
background-image: url("pp.jpg"); 
background-size:cover;
font-family:sans-serif;
color: white;

}
    .Registation {
    width: 80%;
    margin: 70px 25% 80%;
    padding: 0;
    display: table;
    position: relative;
}
.signup-agile1{
    width:100%;
    float:center;
}

.Registation .signup-agile1 .form-control {
    margin-bottom: 20px;
}
label.header {
    font-size: 16px;
    font-weight: 700;
    width: 215px;
    color: black;
    margin-right:10px;
    text-align:justify;
    letter-spacing: 1px;
    text-transform: uppercase;
    display: inline-block;
    font-family: Arial;
}input#harvestowner,input#id,input#name, input#description,input#hname, input#quantity {
    padding:0 40px;
    width:60%;
    height:55px;
    border: 1px solid #dadada;
    color:gray;
    text-align:justify;
    outline: none;
    letter-spacing: 1px;
    font-size: 16px;
    font-weight:normal;
    font-family: 'Din-studio', sans-serif;
    border-radius:30px;
    -webkit-border-radius:30px;
    -moz-border-radius:30px;
    -o-border-radius:30px;
    -ms-border-radius:30px; 
}
input#harvestowner:focus,input#id:focus,input#name:focus, input#description:focus,input#quantity:focus{
    background-color:#f5f8fa !important;
    border:1px solid #dadada;
}
input::-webkit-input-placeholder {
color: black;
} 
input:-moz-placeholder { /* Firefox 18- */
color: black;  
} 
input::-moz-placeholder {  /* Firefox 19+ */
color: black;  
} 
input:-ms-input-placeholder {  
color: black;  
}
.register {
    background-color: lightgreen;
    width: 52%;
    height: 55px;
    border: none;
    margin-left: 233px;
    cursor: pointer;
    color: #fff;
    outline: none;
    font-size: 20px;
    font-weight: normal;
    text-transform: uppercase;
    transition: all 0.5s ease-in-out;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    border-radius: 30px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    -o-border-radius: 30px;
    -ms-border-radius: 30px;
    font-family: 'Muli', sans-serif;
}   
.register:hover {
    background-color:#36b051;
    color:#fff;
}
.menu ul li{
    list-style: none;
    cursor: pointer;
}

.button1 {
     top: 415  px;
    right: 420px;
    position: absolute;
    background-color: 00FA9A;
    border: none;
    color: black;
    padding: 15px 32px;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

.bt1:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

.button2 {
   
    position: absolute;
    right: 850px;
    background-color: 00FA9A;
    border: none;
    color: black;
    padding: 15px 32px;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: 6px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

.bt2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 60px 0 rgba(0,0,0,0.19);
}

.container-keells{
  min-height: 70vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  color: white;
  margin: 70px;
  background: rgba(0, 0, 0, 0.5); 
  padding: -50px;

}

.button3 {
   
    position: center;
    right: 850px;
    background-color: 00FA9A;
    border: none;
    color: black;
    padding: 15px 32px;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: 6px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

.bt3:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 60px 0 rgba(0,0,0,0.19);
}

h1{
    font-size: 40px;
}
</style>

<body>  
<form action ="updat-db.php" method="POST">

		<center><h1>Update and Delete</h1></center>
        <br>
        <br>
        <br>
        <br>
			
	</div >	<div class=" Edit farmer profilep">
		
<div class="container-keells">			
			<center>
				<div class="Update and delete">
    <div class="signup-agile1">
       
            <div class="form-control">
                Harvest owner:<input type="text" id="harvestowner" name="harvestowner">
                <br><br>

                Harvest Name:<input type="text" id="hname" name="hname">
                <br><br>

                Description:<input type="text" id="description" name="description">
                <br><br>

                Quantity:<input type="text" id="quantity" name="quantity">
                <br><br>

</div>                
<div class="menu ">
    <ul>
       <li> <button class="button1 bt1">Update</button></li>

<form action ="delete-db.php" method="POST">
        <li><button class="button2 bt2">Delete</button>/li>
        
    </ul>
</div>
<br><br><br><br><br><br><br> 


<br><br>

search post Id : <input type="text" id="quantity" name="id"><br>

</form>
</form>


</body>
</html>