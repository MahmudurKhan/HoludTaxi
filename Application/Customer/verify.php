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
<body>

	<div class="row login_box" align="center">
	    <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3></h3></div>
            <div class="outter"><img src="img/logo.png" class="image-circle"/></div>   
            <h1>Driver Companion</h1>
            <span>Enter Verification Code</span>
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
                
                <div class="control">
                     <div class="label">Verification Code</div>
                     <input name="verify" type="text" class="form-control" id="verify" placeholder="Enter 6 Digit Verification Code">
                </div>
                
               
                     
               
                <div align="center">
                     <button type = "submit" class="btn btn-orange" id= "button" >Submit</button>
                </div>     
                             
                </form>
                         
        </div>
      
    </div>
<?php  
	include"includes/connection.php";

	$phone=$_POST['phone'];
	$verify=$_POST['verify'];
	$sql = "SELECT phone, verification_code FROM tbl_customer";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if ($phone== $row["phone"] && $verify== $row["verification_code"] )
         {
			 $update="UPDATE tbl_customer SET verification_status='1' WHERE phone='$phone'";
			 $result = mysqli_query($conn, $update);	
			 $message = "Please wait to be redirected";
			 echo "<script type='text/javascript'>alert('$message');</script>";	
			 echo "<script type='text/javascript'>window.location='login.php';</script>";
			 
		 }
		//echo "Name: " . $row["phone"]."<br>";
		
    }
	} else {
 	   echo "0 results";
	};

mysqli_close($conn);


?>
  		
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/location.js"></script>
    
  </body>
</html>