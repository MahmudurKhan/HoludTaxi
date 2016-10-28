<?php 

	include("connection.php"); 
	
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
	
	$sql="INSERT INTO tbl_driver (name, dob, sex, blood_group,lisense_no, issue_date, expire_date,issuing_authority,ssn, phone, verification_code, verification_status) VALUES ('$fullname', '$dob','$sex','$blood', '$lisenseno','$idate','$edate','$authority','$ssn','$phone','$verification_code', '$verification_status')";
	
	$result = mysqli_query($conn,$sql);
	if($result)
	echo "<script type='text/javascript'>window.location='../driver_verification.php';</script>";
	mysqli_close($conn);

	//header("Location: ../driver_verification.php");
	//die();
	

?>
