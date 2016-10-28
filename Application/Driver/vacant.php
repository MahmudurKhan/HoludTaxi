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
<?php  
	include"includes/connection.php";

	$carno=$_POST['carno'];
	$lisenseno=$_POST['lisenseno'];
	$lat= $_POST['lat'];
	$lon= $_POST['lon'];
	$status=1;
	$sql = "SELECT driver_id, lisense_no FROM tbl_driver";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if ($lisenseno== $row["lisense_no"])
         {
			 
			 $driver_id= $row["driver_id"];
			 //$update="UPDATE tbl_customer SET verification_status='1' WHERE phone='$phone'";
			 $update="UPDATE tbl_service SET service='0' WHERE c_lisense_no='$lisenseno'";
			 $result= mysqli_query($conn,$update);
			 $update="INSERT INTO tbl_car (car_number,d_driver_id,d_lisense_no,current_location_lat,current_location_lon,status) VALUES ('$carno','$driver_id','$lisenseno', '$lat','$lon','$status')";
			 $result = mysqli_query($conn, $update);	
			 
		 }
		//echo "Name: " . $row["customer_id"]."<br>";
		
		
				
					
			
    }
	} else {
 	   echo "0 results";
	};

mysqli_close($conn);
?>


	<div class="row login_box" align="center">
	    <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3></h3></div>
            <div class="outter"><img src="img/logo.png" class="image-circle"/></div>   
            <h1>Driver Companion</h1>
            <span>Please Click The Button When You Are Vacant</span>
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
                <form class="form-horizontal" role="form" method="post" action="find.php"> 
      			<input name="carno" type="hidden" class="form-control" id="carno" value="<?php echo $carno?>">
      			<input name="lisenseno" type="hidden" class="form-control" id="lisenseno" value="<?php echo $lisenseno?>">
     		    <input name="lat" type="hidden" class="form-control" id="lat" value="<?php echo $lat?>">
     	 		<input name="lon" type="hidden" class="form-control" id="lon" value="<?php echo $lon?>" >
  				<div align="center">
                     <button type = "submit" class="btn btn-vacant" >VACANT</button>
                </div>
				</form>
        </div>
      
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
  </body>
</html>