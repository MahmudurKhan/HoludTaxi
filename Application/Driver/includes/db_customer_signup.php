<?php 

	include("connection.php"); 
	
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$verification_code= rand();
	$verification_status= 0;
	
	$sql="INSERT INTO tbl_customer (name, phone, email, verification_code, verification_status) VALUES ('$fullname', '$phone', '$email', '$verification_code', '$verification_status')";

	if (!mysqli_query($conn,$sql)) {
 	 die('Error: ' . mysqli_error($conn));
	}
	
	mysqli_close($conn);
	
	
	

?>
