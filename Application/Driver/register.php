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
                     <div class="label">Date of Birth</div>
                     <input name="dob" type="date" id="dob" placeholder="YYYY/MM/DD" class="form-control" >
                </div>
                
                <div class="control">
                     <div class="label">Gender</div>
                     
                     <select name="selectmenu" class="form-control" id="selectmenu" >
            			<option  selected="selected">Select Gender</option>
            			<option value="Male">Male</option>
            			<option value="Female">Female</option>
      				 </select>
                     
                </div>
                
                <div class="control">
                     <div class="label">Blood Group</div>
                     <input name="blood" type="text" class="form-control" id="blood" placeholder="Enter blood group">
                </div>
                
                <div class="control">
                     <div class="label">Lisense Number</div>
                     <input name="lisenseno" type="text" class="form-control" id="lisenseno" placeholder="Enter lisense number">
                </div>
                
                <div class="control">
                     <div class="label">Issue Date</div>
                     <input name="idate" type="date" id="idate" placeholder="YYYY/MM/DD" class="form-control" >
                </div>
                
                <div class="control">
                     <div class="label">Expiration date</div>
                     <input name="edate" type="date" id="edate" placeholder="YYYY/MM/DD" class="form-control" >
                </div>
                
                <div class="control">
                     <div class="label">Issuing Authority</div>
                     <input name="authority" type="text" class="form-control" id="authority" placeholder="Enter issuing authority">
                </div>
                
                <div class="control">
                     <div class="label">Social Security Number</div>
                     <input name="ssn" type="text" class="form-control" id="ssn" placeholder="Enter social security number">
                </div>
                
                <div class="control">
                     <div class="label">Enter Phone Number</div>
                     <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter phone number">
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
	$dob = $_POST['dob'];
	$sex = $_POST['selectmenu'];
	$blood = $_POST['blood'];
	$lisenseno = $_POST['lisenseno'];
	$idate = $_POST['idate'];
	$edate = $_POST['edate'];
	$authority = $_POST['authority'];
	$ssn = $_POST['ssn'];
	$phone = $_POST['phone'];
	$verification_code= rand();
	$verification_status= 0;
	
	
	if ($fullname!=NULL)
	{
  		
	
	
	$sql="INSERT INTO tbl_driver (name, dob, sex, blood_group,lisense_no, issue_date, expire_date,issuing_authority,ssn, phone, verification_code, verification_status) VALUES ('$fullname', '$dob','$sex','$blood', '$lisenseno','$idate','$edate','$authority','$ssn','$phone','$verification_code', '$verification_status')";
	
	$result = mysqli_query($conn,$sql);
	if($result)
	echo "<script type='text/javascript'>window.location='verify.php';</script>";
	mysqli_close($conn);
	}
  
  ?>
  		
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/location.js"></script>
    
  </body>
</html>