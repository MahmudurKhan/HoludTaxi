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


<body>

	<div class="row login_box" align="center">
	    <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3></h3></div>
           <h1><img src="img/logo.png" class="image-circle-new"/>   Confirmation Details</h1>
            
	    </div>
        
        <div class="col-md-12 col-xs-12 login_control" >
               
                   
<?php  



	include"includes/connection.php";
	$phone= $_SESSION["phone"] ;
	
	$status=1;
	
	$sql = "SELECT * FROM tbl_customer";
	$result = mysqli_query($conn, $sql);
		
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if ($phone== $row["phone"])
         {
			 $customer=$row["customer_id"];
			 
		 }	
    }
	} 
	
	$sql= "SELECT * FROM tbl_service"; 
	$result = mysqli_query($conn, $sql);
		
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if ($customer== $row["r_c_customer_id"] && $status=$row["service"])
         {
			 $carno=$row["c_car_no"];
			 $lisenseno=$row["c_lisense_no"];
		 }	
    }
	} 
	
	$sql= "SELECT * FROM tbl_driver"; 
	$result = mysqli_query($conn, $sql);
		
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if ($lisenseno== $row["lisense_no"])
         {
			 $name=$row["name"];
			 $phoneno=$row["phone"];
		 }	
    }
	} 
	
	if ($name)
	{
		echo"<h1>TAXI FOUND!</h1>
			<h2>Driver Details</h2>
			<h3>Name:</h3>".$name."<h3>Phone No:</h3>".$phoneno."<h3>Car No:</h3>".$carno."<h3>Lisense No:</h3>".$lisenseno;
	}
	else
	{
		echo"<h1>TAXI NOT FOUND!</h1>
			<h2>Sorry. No available Taxi Nearby</h2>";
	}
	//echo $name." ". $phoneno." ". $carno." ". $lisenseno;

mysqli_close($conn);

?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
  </body>
</html>