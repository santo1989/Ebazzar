<?php 
include "loginproc.php";
include "config.php";

// logout
if(isset($_POST['but_logout'])){
	
    session_destroy();
	// Redirect to the login page:
    header('Location: index.php');
}
?>

<?php
include "config.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="topnav">
  <a href="index.php">E-bazzaR</a>
  <a href="register.php">Open a New Account</a>
  <a href="cart.php">Cart</a>  

  <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
	   <a class="active" <?php
// to change a session variable, just overwrite it
if(isset($_POST['login']))
{ session_start(); // that will start the session
        //$_SESSION['UID']= $_POST['login'];
        //echo "Welcome ".$_SESSION['UID'];
		echo $_SESSION['login'];
    }
?>	</a>
		
</div>
<h1>Welcome </h1>
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
  <p><button name="add" type="submit" action="cart.php" method="post">Add to Cart</button></p>
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