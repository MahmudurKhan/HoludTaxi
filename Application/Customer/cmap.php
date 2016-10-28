<?php
session_start();

$phone=$_SESSION["phone"];
$lat=$_SESSION["lat"] ;
$lon=$_SESSION["lon"] ;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOLUD TAXI - Public Transport, Private Expirience.</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>


<body onLoad="initialize()" >

	<div class="row login_box" align="center">
	    <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3></h3></div>
            <h1><img src="img/logo.png" class="image-circle-new"/>   Navigation</h1>
            <span>Please select pick up location</span>
	    </div>
        
       
        <div id="map_canvas" style="width: 100%; height: 350px"></div>

  <div id="latlong">
  
   <p><input size="20" type="text" id="latbox1" name="lat" value="<?php echo $lat?>" ></p>
    <p><input size="20" type="text" id="lngbox1" name="lng" value="<?php echo $lon?>"></p>
    <form class="form-horizontal" role="form" method="post">
    <p><input size="20" type="text" id="latbox" name="lat" ></p>
    <p><input size="20" type="text" id="lngbox" name="lon" ></p>
    <div align="center">
                     <button type = "submit" class="btn btn-red-2" id= "button" formaction="wait.php">FIND TAXI</button>
            
                </div>     
    </form>
  </div>



</div>
</div>
</body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
//<![CDATA[

    // global "map" variable
    var map = null;
    var marker = null;

    // popup window for pin, if in use
    var infowindow = new google.maps.InfoWindow({ 
        size: new google.maps.Size(150,50)
        });

    // A function to create the marker and set up the event window function 
    function createMarker(latlng, name, html) {

    var contentString = html;

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });

    google.maps.event.trigger(marker, 'click');    
    return marker;

}



function initialize() {
	
	var lat=document.getElementById("latbox1").value;
	var lng=document.getElementById("lngbox1").value;
    // the location of the initial pin
    var myLatlng = new google.maps.LatLng(lat,lng);
	//navigator.geolocation.getCurrentPosition(showPosition);
	/*var lat = position.coords.latitude;
	var lon = position.coords.longitude;
	var myLatlng = new google.maps.LatLng(lat,lon);
*/
    // create the map
    var myOptions = {
        zoom: 18,
        center: myLatlng,
        mapTypeControl: true,
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
        navigationControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    // establish the initial marker/pin
    var image = 'img/pin2.png';  
    marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: image,
      title:"Property Location"
    });

    // establish the initial div form fields
    formlat = document.getElementById("latbox").value = myLatlng.lat();
    formlng = document.getElementById("lngbox").value = myLatlng.lng();

    // close popup window
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
        });

    // removing old markers/pins
    google.maps.event.addListener(map, 'click', function(event) {
        //call function to create marker
         if (marker) {
            marker.setMap(null);
            marker = null;
         }

        // Information for popup window if you so chose to have one
        /*
         marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);
        */

        var image = 'img/pin2.png';
        var myLatLng = event.latLng ;
        /*  
        var marker = new google.maps.Marker({
            by removing the 'var' subsquent pin placement removes the old pin icon
        */
        marker = new google.maps.Marker({   
            position: myLatLng,
            map: map,
            icon: image,
            title:"Property Location"
        });

        // populate the form fields with lat & lng 
        formlat = document.getElementById("latbox").value = event.latLng.lat();
        formlng = document.getElementById("lngbox").value = event.latLng.lng();

    });

}
//]]>

</script>
    
    
  </body>
</html>