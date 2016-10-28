<?php
session_start();

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

</head>
<a id="location"></a>
<body  onLoad="javascript:getCurrentLocation()">

	<div class="row login_box" align="center">
	    <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3></h3></div>
            <div class="outter"><img src="img/logo.png" class="image-circle"/></div>   
            <h1>Driver Companion</h1>
            <span>Please Login to the System</span>
	    </div>
        <div class="col-md-6 col-xs-6 follow line" align="center">
            <h3>
                 193 <br/> <span>DRIVERS</span>
            </h3>
        </div>
        <div class="col-md-6 col-xs-6 follow line" align="center">
            <h3>
                 757 <br/> <span>CUSTOMERS</span>
            </h3>
        </div>
        
        <div class="col-md-12 col-xs-12 login_control">
                <form class="form-horizontal" role="form" method="post">
                <div class="control">
                    <div class="label">Phone</div>
                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter Phone Number">
                </div>
                

                     <input name="lat" type="text" class="form-control" id="lat"/>
              
                     <input name="lon" type="text" class="form-control" id="lon" />
               
                <div align="center">
                     <button type = "submit" class="btn btn-red-2" id= "button" formaction="request.php">NEXT</button>
                     
                </div>     
                             
                </form>
                         
        </div>
      
    </div>

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/location.js"></script>
    
  </body>
</html>