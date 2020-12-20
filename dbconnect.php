<?php
 include "config.php";
 if(isset($_POST['submit'])){
		$UserN=$_POST['UserN'];
	$pass=$_POST['pass'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$con=mysqli_connect ('localhost','root','','ecomdb');
	$c=mysqli_query($con, "insert into user(UserID,UserN, pass,email,address,mobile) VALUES ('','$UserN','$pass','$email','$address','mobile')");
	if($c){
	echo "Reg seccess";}
	else {echo "error";}
 header('Location: index.php');	
 }
 
?>
