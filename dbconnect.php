<?php
include "config.php";
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	$con = mysqli_connect('localhost', 'root', '', 'ecomdb');
	$sql_u = "SELECT * FROM users WHERE username='$username'";
	$sql_e = "SELECT * FROM users WHERE email='$email'";
	$con1 = mysqli_query($con, $sql_u);
	$con2 = mysqli_query($con, $sql_e);

	if (mysqli_num_rows($con1) > 0) {
		$name_error = "Sorry... username already taken";
		echo '<script> alert("Sorry... username already taken")</script>';
		header('Location: register.php');
	} else if (mysqli_num_rows($con2) > 0) {
		$email_error = "Sorry... email already taken";
		echo '<script> alert( "Sorry... email already taken")</script>';
		header('Location: register.php');
	} else {
		mysqli_query($con, "insert into users(userid,username, pass,email,address,mobile) VALUES ('','$username','$pass','$email','$address','$mobile')");
		echo '<script> alert("Registration Successful")</script>';
		header('Location: index.php');
	} 
}
