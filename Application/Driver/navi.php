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


<body>

	<div class="row login_box" align="center">
	    <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3></h3></div>
            <h1><img src="img/logo.png" class="image-circle-new"/>   Navigation</h1>
            <span>Please Use The Map To Navigate</span>
	    </div>
        
        <div class="col-md-12 col-xs-12 login_control" >
<?php
include"includes/connection.php";
	$carno=$_POST['carno'];
	$lisenseno=$_POST['lisenseno'];
	$lat=$_POST['lat'];
	$lon=$_POST['lon'];
	$request=$_POST['request'];
	$customer=$_POST['customer'];
	$clat=$_POST['clat'];
	$clon=$_POST['clon'];
	$service=1;
	
	
	$sql = "SELECT * FROM tbl_customer";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if ($customer== $row["customer_id"])
         {
			 $name= $row["name"];
			 $phone= $row["phone"];
 			
		 }
		//echo "Name: " . $row["customer_id"]."<br>";
		
    }
	} else {
 	   echo "0 results";
	};
    
	$updateCAR= "UPDATE tbl_car SET status='0' WHERE car_number='$carno' AND d_lisense_no='$lisenseno'";
	$result= mysqli_query($conn,$updateCAR);
	$updateREQ= "UPDATE tbl_request SET status='0' WHERE request_id='$request'";
	$result= mysqli_query($conn,$updateREQ); 
	$insert= "INSERT INTO tbl_service (r_c_customer_id,c_car_no,c_lisense_no,service) VALUES ('$customer','$carno','$lisenseno','$service')";
	$result = mysqli_query($conn, $insert);	
	 
	 
	 echo "
    <table class='table'>
      <thead>
        <tr>
          <th>Customer Name</th>
          <th>Customer Phone</th>	  
        </tr>
      </thead>
      <tbody>
        <tr>";
          echo"<td>".$name."</td>";
          echo"<td>".$phone."</td>";
       echo "</tr>";
		
		echo"</tbody>
    </table>
  </div>
  <div class='row'>
  <div class='col-md-1'></div>
  <div class='col-md-1'></div>
  <div class='col-md-1'></div>
  <div id='dvMap' class='col-md-6' style='width: 100%; height:350px; alignment-adjust:central'></div>
  <div class='col-md-1'></div>
  <div class='col-md-1'></div>
  <div class='col-md-1'></div>
<input type='hidden' id='xlat' value=".$lat.">
<input type='hidden' id='xlon' value=".$lon.">
<input type='hidden' id='xclat' value=".$clat.">
<input type='hidden' id='xclon' value=".$clon.">
  </div>	
";	 
mysqli_close($conn);
?>

<div class="col-md-12 col-xs-12 login_control" ><a class='btn btn-danger btn-lg'  href="vacant.php">Exit</a></div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
	window.onload = function () {
	var lat = document.getElementById('xlat').value;
	var lon = document.getElementById('xlon').value;
	var clat = document.getElementById('xclat').value;
	var clon = document.getElementById('xclon').value;
    var markers = [
            
            {
              
                "lat": lat,
                "lng": lon,
                
            }
        ,
            {
               
                "lat": clat,
                "lng": clon,
                
            }
    ];
   
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var lat_lng = new Array();
        var latlngbounds = new google.maps.LatLngBounds();
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            lat_lng.push(myLatlng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
            latlngbounds.extend(marker.position);
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
 
        //***********ROUTING****************//
 
        //Intialize the Path Array
        var path = new google.maps.MVCArray();
 
        //Intialize the Direction Service
        var service = new google.maps.DirectionsService();
 
        //Set the Path Stroke Color
        var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });
 
        //Loop and Draw Path Route between the Points on MAP
        for (var i = 0; i < lat_lng.length; i++) {
            if ((i + 1) < lat_lng.length) {
                var src = lat_lng[i];
                var des = lat_lng[i + 1];
                path.push(src);
                poly.setPath(path);
                service.route({
                    origin: src,
                    destination: des,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                }, function (result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            path.push(result.routes[0].overview_path[i]);
                        }
                    }
                });
            }
        }
    }
	</script>
    
    
  </body>
</html>