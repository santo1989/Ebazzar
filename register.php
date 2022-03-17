<?php require "dbconnect.php";
require "loginproc.php";
include "config.php";
?>
<html>

<head>
	<title> Login Page </title>
	<!--page title -->
	<link rel="stylesheet" type="text/css" href="css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


	<style>
		/* <!--internal CSS
		--> */
		label {
			color:
				#0888ff;
			font-size:
				18px;
		}
	</style>
</head>

<body>
	<div class="topnav">
		<a href="index.php">E-bazzaR</a>
		<a class="active" href="register.php">Open a New Account</a>
		<a href="invoice.php">Cart</a>
		<?php include "login button.php" ?>
	</div>

	</div>
	</form>

	</div>
	<div class="row">

		<h2 style=" text-align: center; color: #277583; padding: 20px">Sign Up</h2>
		<!--headline tag -->
		<!--inline CSS-->
		<div class="col-md-6 w-50">
			<div class="signupbox">
				<!--new devision -->


				<form class="signup" action="dbconnect.php" method="POST">
					<!--new form -->
					<div class="mb-3">
						<div>
							<label for="username" class="form-label"><b>User Name:</b></label>
							<input type="text" name="username" id="username" placeholder="Username" class="form-control" required>
						</div>
					</div>
					<!--line brack -->
					<div class="mb-3">

						<label for="pass" class="form-label"><b>Password:</b></label>
						<input type="password" name="pass" id="pass" placeholder="password" class="form-control" required>
					</div>

					<div class="mb-3">
						<div>
							<label for="email" class="form-label"><b>E-mail:</b>
								<input type="email" name="email" id="email" placeholder="email" class="form-control" required></label>
						</div>
					</div>

					<div class="mb-3">
						<label for="address" class="form-label"><b>Address:</b>
							<input type="text" name="address" id="address" placeholder="address" class="form-control" required></label>
					</div>

					<div class="mb-3">
						<label for="mobile" class="form-label"><b>Mobile:</b>
							<input type="text" name="mobile" id="mobile" placeholder="mobile" class="form-control" required></label>
					</div>
<div class="mb-3">
					<!--button tag -->
					<input name="submit" type="submit" id="log" value="Sign Up">
				</div>

				</form>
				
			</div>
		</div>
		<div class="col-md-6">
			<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active" data-bs-interval="100">
						<img src="image/slide-1.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-bs-interval="200">
						<img src="image/slide-2.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="image/slide-3.png" class="d-block w-100" alt="...">
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>
	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>