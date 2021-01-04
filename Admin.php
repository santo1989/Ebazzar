
<?php 
// Initialize shopping cart class 
include_once 'Cart.php'; 
$cart = new Cart; 
 
// Include the database config file 
 
require "loginproc.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="topnav">
  <a  href="index.php">E-bazzaR</a>
  <a href="register.php">Open a New Account</a>
  <a href="#cart">Cart</a>
  <a class="active" href="Admin.php">Admin Login</a>
  <!--<form action="newlogin.php" method="post">-->
<form action="loginproc.php" method="post">
<div class="login-container">
		<?php include 'loginproc.php';?>
		<input type="text" name="UserN" id="UserN" placeholder="Username"></input>
		<input type="password" name="pass" id="pass" placeholder="Password"></input>
		<input type="submit" value="LOGIN" name="login" id="login"></input>
</div>
</form>
  
</div>
</body>
</html>