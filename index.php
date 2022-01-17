
<!DOCTYPE html>
<html>
<head>
  <title>E-BazzaR</title>
  <link rel="stylesheet" type="text/css" href="css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <nav>

    <div class="topnav">
      <!-- logo  -->
      <a href="index.php">
        <img src="image/logo.png" alt="logo" style="height: 30px; width:100px;">
        <a class="active" href="index.php">E-bazzaR</a>
        <a href="register.php">Open a New Account</a>
        <a href="invoice.php">Invoice</a>
        <a href="Adminlog.php">Admin Login</a>
        <a href="search.php">search</a>
        <!--<form action="newlogin.php" method="post">-->
        <?php include "login button.php" ?>

    </div>
  </nav>

  <div class="container">
    <div class="row">
      <?php
      require "dbconnect.php";

      $con = mysqli_connect($host, $user, $password, $dbname);
      $query = "SELECT * FROM pricedb";
      $query_run = mysqli_query($con, $query);
      $check_price = mysqli_num_rows($query_run) > 0;
      if ($check_price) {
        while ($row = mysqli_fetch_array($query_run)) {
      ?>
          <div class="col-md-3" style="margin:top-3; padding-top: 10px;">
            <div class="card">
              <img src="image/<?php echo $row['image']; ?>" alt="E-bazzaR">
              <h3><?php echo $row['Name']; ?></h3>
              <p><?php echo 'PID' . $row['PriceID']; ?></p>
              <p><?php echo $row['Description']; ?></p>
              <p class="price"><?php echo 'Tk= ' . $row['Price']; ?></p>
              <p><a href="register.php"><button>Add to Cart</button></a></p>
            </div>
          </div>
      <?php
        }
      } else {
        echo "no record found";
      }
      ?>

    </div>

  </div>
  <footer>
    <?php include 'footer.php'; ?>

  </footer>



</body>

</html>