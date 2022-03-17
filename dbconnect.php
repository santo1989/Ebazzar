<?php
// var_dump($_POST);
// include "config.php";
if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	$con = mysqli_connect('localhost', 'root', '', 'ecomdb');
	$sql_u = "SELECT * FROM users WHERE username='$username'";
	$con1 = mysqli_query($con, $sql_u);

	if (mysqli_num_rows($con1) > 0) {
		echo "Sorry... username already taken";
		header('Location: register.php');
	} else {
		mysqli_query($con, "insert into users(username, pass,email,address,mobile) VALUES ('$username','$pass','$email','$address','$mobile')");
		echo "Registration Successful";
		header('Location: index.php');
	}
}
?>
<!-- <?php
// $servername='localhost';
// $username='root';
// // $password='';
// $dbname = "ecomdb";
// try {
// 	$username = $_POST['username'];
// 	$pass = $_POST['pass'];
// 	$email = $_POST['email'];
// 	$address = $_POST['address'];
// 	$mobile = $_POST['mobile'];

//     $con = new PDO("mysql:host=$servername;dbname=$dbname", $username); //$password);
//     /* set the PDO error mode to exception */
//     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO users (username, pass,email,address,mobile)
//     VALUES ('$username','$pass','$email','$address','$mobile')";
//     $con->exec($sql);
//     echo "New record created successfully";
//     }
// catch(PDOException $e)
//     {

//     	echo $sql . "<br>" . $e->getMessage();
//     }

// $con = null;
?> -->
