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

<body onLoad="myFunction()">
<?php

?>

<?php  
	include"includes/connection.php";
	$phone=$_SESSION["phone"];
	$lat= $_SESSION["lat"]=$_POST["lat"];
	$lon= $_SESSION["lon"]=$_POST["lon"];
	$status=1;
	$sql = "SELECT customer_id, phone FROM tbl_customer";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if ($phone== $row["phone"])
         {
			 
			 $customer_id= $row["customer_id"];
			 //$update="UPDATE tbl_customer SET verification_status='1' WHERE phone='$phone'";
			 $update="INSERT INTO tbl_request (c_customer_id,c_phone,current_location_lat,current_location_lon,status) VALUES ('$customer_id','$phone', '$lat','$lon','$status')";
			 $result = mysqli_query($conn, $update);	
			 //$message = "Please wait to be accepted by a TAXI";
			 //echo "<script type='text/javascript'>alert('$message');</script>";	
			 //echo "<script type='text/javascript'>window.location='wait.php';</script>";
			 
		 }
		//echo "Name: " . $row["customer_id"]."<br>";
		
    }
	} else {
 	   echo "0 results";
	};

mysqli_close($conn);


?>


	<div class="row login_box" align="center">
 
        <div class="spinner">
  		<div class="dot1"></div>
  		<div class="dot2"></div>
        
	    </div>
        Please Wait <div id="p"></div>
        
        
   </div>

   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script>
	function myFunction() {
   	 	setTimeout(function(){ window.location="confirm.php"}, 60000);
		var x = document.getElementById("p");
		 
		
   	    setTimeout(function(){ x.innerHTML="59 seconds" }, 1000);
        setTimeout(function(){ x.innerHTML="58 seconds" }, 2000);
        setTimeout(function(){ x.innerHTML="57 seconds" }, 3000);
		setTimeout(function(){ x.innerHTML="56 seconds" }, 4000);
		setTimeout(function(){ x.innerHTML="55 seconds" }, 5000);
		setTimeout(function(){ x.innerHTML="54 seconds" }, 6000);
		setTimeout(function(){ x.innerHTML="53 seconds" }, 7000);
		setTimeout(function(){ x.innerHTML="52 seconds" }, 8000);
		setTimeout(function(){ x.innerHTML="51 seconds" }, 9000);
		setTimeout(function(){ x.innerHTML="50 seconds" }, 10000);
		setTimeout(function(){ x.innerHTML="49 seconds" }, 11000);
		setTimeout(function(){ x.innerHTML="48 seconds" }, 12000);
		setTimeout(function(){ x.innerHTML="47 seconds" }, 13000);
		setTimeout(function(){ x.innerHTML="46 seconds" }, 14000);
		setTimeout(function(){ x.innerHTML="45 seconds" }, 15000);
		setTimeout(function(){ x.innerHTML="44 seconds" }, 16000);
		setTimeout(function(){ x.innerHTML="43 seconds" }, 17000);
		setTimeout(function(){ x.innerHTML="42 seconds" }, 18000);
		setTimeout(function(){ x.innerHTML="41 seconds" }, 19000);
		setTimeout(function(){ x.innerHTML="40 seconds" }, 20000);
		setTimeout(function(){ x.innerHTML="39 seconds" }, 21000);
		setTimeout(function(){ x.innerHTML="38 seconds" }, 22000);
		setTimeout(function(){ x.innerHTML="37 seconds" }, 23000);
		setTimeout(function(){ x.innerHTML="36 seconds" }, 24000);
		setTimeout(function(){ x.innerHTML="35 seconds" }, 25000);
		setTimeout(function(){ x.innerHTML="34 seconds" }, 26000);
		setTimeout(function(){ x.innerHTML="33 seconds" }, 27000);
		setTimeout(function(){ x.innerHTML="32 seconds" }, 28000);
		setTimeout(function(){ x.innerHTML="31 seconds" }, 29000);
		setTimeout(function(){ x.innerHTML="30 seconds" }, 30000);
		setTimeout(function(){ x.innerHTML="29 seconds" }, 31000);
		setTimeout(function(){ x.innerHTML="28 seconds" }, 32000);
		setTimeout(function(){ x.innerHTML="27 seconds" }, 33000);
		setTimeout(function(){ x.innerHTML="26 seconds" }, 34000);
		setTimeout(function(){ x.innerHTML="25 seconds" }, 35000);
		setTimeout(function(){ x.innerHTML="24 seconds" }, 36000);
		setTimeout(function(){ x.innerHTML="23 seconds" }, 37000);
		setTimeout(function(){ x.innerHTML="22 seconds" }, 38000);
		setTimeout(function(){ x.innerHTML="21 seconds" }, 39000);
		setTimeout(function(){ x.innerHTML="20 seconds" }, 40000);
		setTimeout(function(){ x.innerHTML="19 seconds" }, 41000);
		setTimeout(function(){ x.innerHTML="18 seconds" }, 42000);
		setTimeout(function(){ x.innerHTML="17 seconds" }, 43000);
		setTimeout(function(){ x.innerHTML="16 seconds" }, 44000);
		setTimeout(function(){ x.innerHTML="15 seconds" }, 45000);
		setTimeout(function(){ x.innerHTML="14 seconds" }, 46000);
		setTimeout(function(){ x.innerHTML="13 seconds" }, 47000);
		setTimeout(function(){ x.innerHTML="12 seconds" }, 48000);
		setTimeout(function(){ x.innerHTML="11 seconds" }, 49000);
		setTimeout(function(){ x.innerHTML="10 seconds" }, 50000);
		setTimeout(function(){ x.innerHTML="9 seconds" }, 51000);
		setTimeout(function(){ x.innerHTML="8 seconds" }, 52000);
		setTimeout(function(){ x.innerHTML="7 seconds" }, 53000);
		setTimeout(function(){ x.innerHTML="6 seconds" }, 54000);
		setTimeout(function(){ x.innerHTML="5 seconds" }, 55000);
		setTimeout(function(){ x.innerHTML="4 seconds" }, 56000);
		setTimeout(function(){ x.innerHTML="3 seconds" }, 57000);
		setTimeout(function(){ x.innerHTML="2 seconds" }, 58000);
		setTimeout(function(){ x.innerHTML="1 seconds" }, 59000);
		setTimeout(function(){ x.innerHTML="0 seconds" }, 60000);

		document.getElementById("p").value=x;
	}
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/location.js"></script>
    
  </body>
</html>