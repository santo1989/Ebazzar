<?php
session_start();
include "config.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Admin Dashboard</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">



  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="deshbord.css">
</head>

<body>

  <?php
  include "config.php";
  include "deshboard_top.php";
  ?>

  <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

  <h2>Products</h2> <a href="edit.php" class="btn btn-primary">create</a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>

          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php
      require "dbconnect.php";

      $con = mysqli_connect($host, $user, $password, $dbname);
      $query = "SELECT * FROM pricedb ";
      $query_run = mysqli_query($con, $query);
      $check_price = mysqli_num_rows($query_run) > 0;
      if ($check_price) {
        while ($row = mysqli_fetch_array($query_run)) {
      ?>

          <tbody>
            <tr>
              <td><?php echo 'PID' . $row['PriceID']; ?></td>
              <td><?php echo $row['Name']; ?></td>
              <td><?php echo $row['Description']; ?></td>
              <td><img src="image/<?php echo $row['image']; ?>" alt="E-bazzaR"></td>
              <td><?php echo 'Tk= ' . $row['Price']; ?></td>
              <td>
                <a href="edit.php?edit=<?php echo $row['PriceID']; ?>" class="btn btn-primary">Edit</a>
                <a href="CRUD.php?delete=<?php echo $row['PriceID']; ?>" class="btn btn-danger">Delete</a>
            </tr>
        <?php
        }
      } else {
        echo "no record found";
      }
        ?>
          </tbody>
    </table>
  </div>
  </main>
  </div>
  </div>


  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>