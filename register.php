<?php require "dbconnect.php";
 require "loginproc.php";
 ?>
<html>
<head>
	<title> Login Page </title> <!--page title -->
	<link rel="stylesheet" type="text/css" href="css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style> <!--internal CSS-->
		label{
			color: #08ffd1;
			font-size: 18px;
	}
	</style>
</head>
<body>
	<div class="topnav">
  <a href="index.php">E-bazzaR</a>
  <a class="active" href="register.php">Open a New Account</a>
  <a href="#cart">Cart</a>
<form action="#" method="post">
<div class="login-container">
		<?php include 'loginproc.php';	?>
		<input type="text" name="UserN" id="UserN" placeholder="Username"></input>
		<input type="password" name="pass" id="pass" placeholder="Password"></input>
		<input type="submit" value="LOGIN" name="login" id="login"></input>
</div>
</form>
  
</div>
	<h2 style=" text-align: center; color: #277583; padding: 20px">Sign Up</h2> <!--headline tag --><!--inline CSS-->
	<div class="signupbox"> <!--new devision -->
		<form class="signup" action="dbconnect.php" method="post"> <!--new form -->
			
			<center>
			<label><b>User Name:</b></label> <!--label tag --> <!--bold tag -->
			<input type="text" name="UserN" id="UserN" placeholder="Username"> <!--input tag with label field -->  <!--text field marker  -->
			</br></br> <!--line brack -->
			<label><b>Password:</b></label>
			<input type="password"  name="pass" id="pass" placeholder="password">
			<br><br>
			<label><b>E-mail:</b> <input type="email"  name="email" id="pass" placeholder="email"></label>
			<br><br>
			<label><b>Address:</b> <input type="text"  name="address" id="address" placeholder="address"></label>
			<br><br>
			<label><b>Mobile:</b> <input type="text"  name="mobile" id="mobile" placeholder="mobile"></label>
			<br><br>
			<!--button tag -->
			<input name="submit" type="submit" id="log" value="Sign Up">
			<br><br>
			</center>
			</form>
	
	</div>

</body>

</html>