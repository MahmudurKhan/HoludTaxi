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
           <h1><img src="img/logo.png" class="image-circle-new"/>   Customers Nearby</h1>
            <span>Please Select A Customer From The List</span>
	    </div>
        
        <div class="col-md-12 col-xs-12 login_control" >
                <table class="table">
  				   <thead >
                   <tr>
		           
                   <th>Request ID</th>
                   <th>Customer ID</th>
                   <th>Area</th>    
                   <th></th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                   
<?php  
	include"includes/connection.php";

	$carno=$_POST['carno'];
	$lisenseno=$_POST['lisenseno'];
	$lat= $_POST['lat'];
	$lon= $_POST['lon'];
	$status=1;
	$request=0;
	$sql = "SELECT * FROM tbl_request";
	$result = mysqli_query($conn, $sql);
	
	
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if ($status== $row["status"])
         {
			 $request=$row["request_id"];
			 $customer=$row["c_customer_id"];
			 $name= "Dhaka";
			 
			 $clat=$row["current_location_lat"];
			 $clon=$row["current_location_lon"];
			
		
            
            echo"<td>".$request."</td>";
            echo"<td>".$customer."</td>";
            echo"<td>".$name."</td>";
			
            echo"<td><form class='form-horizontal' role='form' method='post' action='navi.php'>";
			echo"	<input name='carno' type='hidden' value=".$carno.">
					<input name='lisenseno' type='hidden' value=".$lisenseno.">
					<input name='lat' type='hidden' value=".$lat.">
					<input name='lon' type='hidden' value=".$lon.">
					<input name='request' type='hidden' value=".$request.">
					<input name='customer' type='hidden' value=".$customer.">
					<input name='clat' type='hidden' value=".$clat.">
					<input name='clon' type='hidden' value=".$clon.">
					    <input name='accept' type='submit' id='accept' class='btn btn-danger btn-lg' value='Accept'>
               </form></td>";
            echo "</tr>";  
			 
		 }
		
    }
	} else {
 	   echo"</tbody>
    </table>
  </div>
  
</div> ";
    
	};
	

mysqli_close($conn);

?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
  </body>
</html>