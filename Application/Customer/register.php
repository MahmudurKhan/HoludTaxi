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
            <span>Please Register to the System</span>
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
                    <div class="label">Full Name</div>
                    <input name="fullname" type="text" required class="form-control" id="fullname" placeholder="Enter Full Name">
                </div>
                
                <div class="control">
                     <div class="label">Phone</div>
                     <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter Phone Number">
                </div>
                
                <div class="control">
                     <div class="label">Email</div>
                     <input name="email" type="text" class="form-control" id="email" placeholder="example@holudtaxi.com">
                </div>

                <div align="center">
                     <button type = "submit" class="btn btn-orange" id= "button" >Submit</button>
                </div>     
                             
                </form>
                         
        </div>
      
    </div>
<?php 

	include("includes/connection.php"); 
	
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$verification_code= rand();
	$verification_status= 0;
	
	if ($fullname!=NULL)
	{
		$sql="INSERT INTO tbl_customer (name, phone, email, verification_code, verification_status) VALUES ('$fullname', '$phone', '$email', '$verification_code', '$verification_status')";
		$result = mysqli_query($conn, $sql);
		
		echo "<script type='text/javascript'>window.location='verify.php';</script>";
	}

	mysqli_close($conn);

?>
  		
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/location.js"></script>
    
  </body>
</html>