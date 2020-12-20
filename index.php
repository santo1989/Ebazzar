<?php require "loginproc.php";
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
  <a class="active" href="index.php">E-bazzaR</a>
  <a href="register.php">Open a New Account</a>
  <a href="#cart">Cart</a>
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
<div class="row">
<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "ecomdb"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
$query = "SELECT * FROM pricedb";
$query_run =mysqli_query($con, $query);
$check_price=mysqli_num_rows($query_run )>0;
if($check_price){
	while($row=mysqli_fetch_array($query_run )){
		?>
		<div class="column" "margin top-3">	
   <div class="card"> 
   <img src="image/<?php echo $row['image'];?>"  alt="E-bazzaR">
  <h3><?php echo $row['Name'];?></h3>
  <p><?php echo 'PID'. $row['PriceID'];?></p>
  <p><?php echo $row['Description'];?></p>
  <p class="price"><?php echo 'Tk= '.$row['Price'];?></p>
  <p><button>Add to Cart</button></p>
</div>
</div>
		<?php		
	}
	
}else{
	echo"no record found";
}
?>
  
</div>




	

</body>
</html>
