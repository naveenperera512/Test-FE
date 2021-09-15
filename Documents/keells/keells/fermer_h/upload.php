<!DOCTYPE html>
<html>

<?php

include_once 'admin_F_location.php';
?>


<head>
  <title>upload post</title></head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style type="text/css">
    body{ 
margin: 0;
padding: 0;
background-color: lightgreen;
background-size: 100% 860px;
background-repeat: no-repeat;
font-family:sans-serif;

}

    .Registation {
    width: 50%;
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

}input#image,input#name, input#owner_type, input#quantity input#image input#description input#Fruit input#Vegetable{
    padding:0 40px;
    width:40%;
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
input#image:focus,input#name:focus,input#quantity:focus input#image:focus, input#description:focus{
    background-color:#f5f8fa !important;
    border:1px solid #dadada;
}
input::-webkit-input-placeholder {
color: grey;
} 
input:-moz-placeholder { /* Firefox 18- */
color: grey;  
} 
input::-moz-placeholder {  /* Firefox 19+ */
color: grey;  
} 
input:-ms-input-placeholder {  
color: grey;  
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
    right: 500px;
    position: absolute;
    background-color: 00FA9A;
    border: none;
    color: black;
    padding: 15px 32px;
    text-decoration: none;
    display: inline-block;
    font-color:black;
    font-size: 25px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

.bt1:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

   #map {
        height: 550px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }


</style>
  <body>
        
    
<div class="Edit">

    
  
<center><h1>Upload a post</h1></center>
        <br><br><br><br>
      
<div class="Edit farmer profilep">
    
      


      <div id="map" height="550px" width="100%"></div>
    
   
    <div id="for" style="display: none">
           <form id="form" method="POST" action="insert_F_location.php?">
    
          <table>
          
          <tr><td><label class="header">Harvest owner:</label>
           <input id="name" type="text" name="harvestowner" title="Please enter your harvest owner name"  required="" ></td> </tr>

         <tr><td><label class="header">Name of harvest :</label>
         <input type="text" id="name" name="hname"  title="Please_enter_your_harvest_Name" required=""></td> </tr>

          <tr><td><label class="header">Gross quantity :</label>
          <input type="text" id="quantity" name="quantity" title="Enter_gross_quantity" required=""></td> </tr>
         
          <tr><td><label class="header">image :</label><input type="file" name="image" accept="image" required=""></td> </tr>

          <tr><td><label class="header">description  :</label><input type='text' name='description' required=""/></td></tr>

          <tr><td><input type="hidden" name="lt" id="lt"></tr></td>
          <tr><td><br><input type="hidden" name="lg" id="lg"></td></tr>


          <tr><td><br><label class="header">Product chategaories:</label>              
          <input type="radio" id="Fruit" name="fr" value="Fruit">
          <label for="Fruit">Fruit</label>
          <input type="radio" id="Vegetable" name="ve" value="Vegetable">
          <label for="Vegetable">Vegetable</label><br></td></tr>


          <tr><td><button name="submited" onclick="myFunction()">Get Location and save</button></td></tr>

                     
          </table>
    
    </div>
    </form>
        
        <script>
          var map;
          var marker;
          var infowindow;
          var infowindow1;
          var locations = <?php get_all_locations() ?>;
         //add markers in member map//
          function initMap() {
            
            map = new google.maps.Map(document.getElementById('map'), {
             center: new google.maps.LatLng(6.927417, 79.861071),
                    zoom: 10,
            });
            
            infowindow = new google.maps.InfoWindow({
              content: document.getElementById('form')
            });
            google.maps.event.addListener(map, 'click', function(event) {
              marker = new google.maps.Marker({
                position: event.latLng,
                map: map
    
              });
             google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map, marker);
              });});
             //show add markers in member map//
              var i ; 
              for (i = 0; i < locations.length; i++) {
    
              marker = new google.maps.Marker({
              position: new google.maps.LatLng(locations[i][3], locations[i][4]),
              map: map,
              
              });
             
            }
           
         
          }
    
        </script>
  
    <script>
    function myFunction() {
      var latlng = marker.getPosition();
      document.getElementById("lt").value = latlng.lat();
      document.getElementById("lg").value = latlng.lng();
    
    }
    </script>
    
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBASl0AXJrqLuHm_negrmEYrBnGntLhIoM&callback=initMap">
        </script>



</body></html>