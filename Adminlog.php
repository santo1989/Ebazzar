<?php
include "config.php";
// Initialize shopping cart class   
// Include the database config file 
require "loginproc.php";
// for sending Edit from database 
include 'CRUD.php';



?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">



  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="deshbord.css">
</head>

<body>

  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">E-BazzaR</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" name="search" type="text" placeholder="Search" aria-label="Search" ?>>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <?php
        if ($_SESSION["AID"] ?? '') {
        ?>
          <a href="Admin_logout.php" tite="Logout">Logout</a>
        <?php
        } else  include "admin login button.php";
        ?>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">


      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>

        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

        <h2>Section title</h2>

        <div class="contain">

          <div class="search">
            <div class="row">
              <div class="colume" style="margin-top: 5%;">
                <div class="row">

                  <?php

                  $conn = new mysqli('localhost', 'root', '', 'ecomdb');
                  if (isset($_GET['search'])) {
                    $searchKey = $_GET['search'];
                    $sql = "SELECT * FROM pricedb WHERE Name LIKE '%$searchKey%'";
                  } else
                    $sql = "SELECT * FROM pricedb";
                  $result = $conn->query($sql);
                  ?>

                  <form action="" method="GET">
                    <div class="colume">
                      <input type="text" name="search" class='form-control' placeholder="Search By Name" value=<?php echo @$_GET['search']; ?>>
                    </div>
                    <div class="button">
                      <button>Search</button>
                    </div>
                  </form>

                  <br>
                  <br>
                </div>
                <table class="table">
                  <tr>
                    <th>PriceID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>image</th>
                    <th>category</th>

                  </tr>
                  <?php while ($row = $result->fetch_object()) : ?>
                    <tr>
                      <td><?php echo $row->PriceID  ?></td>
                      <td><?php echo $row->Name ?></td>
                      <td><?php echo $row->Description ?></td>
                      <td><?php echo $row->Price ?></td>
                      <td><img src="image/<?php echo $row->image ?>"></td>
                      <td><?php echo $row->category_id ?></td>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </table>
              </div>
            </div>
          </div>
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