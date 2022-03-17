<?php
include "config.php";
// Initialize shopping cart class   
// Include the database config file 
require "loginproc.php";
// for sending Edit from database 
include 'CRUD.php';

if (isset($_GET['edit'])) {
  $PriceID = $_GET['edit'];
  $edit_state = true;

  $record = mysqli_query($con, "SELECT * FROM pricedb WHERE PriceID=$PriceID");
  $data = mysqli_fetch_array($record);
  $Name = $data['Name'];
  $Description = $data['Description'];
  $Price = $data['Price'];
  $image = $data['image'];
  $category_id = $data['category_id'];
}



?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" type="text/css" href="css.css">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="deshbord.css">
</head>

<body>

  <?php
  include "deshboard_top.php";
  ?>

  <h1>Edit, Create, Delete and Update</h1>
  <div>
    <?php if (isset($_SESSION['message'])) : ?>
      <div class="message">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>

  </div>


  <form class="form-inline" method="POST" action="CRUD.php" enctype="multipart/form-data">
    <input type="hidden" name="PriceID" value="<?php echo $PriceID; ?>">
    <input type="text" name="Name" placeholder="Name" value="<?php echo $Name; ?>">
    <input type="text" name="Description" placeholder="Description" value="<?php echo $Description; ?>">
    <input type="text" name="Price" placeholder="Price" value="<?php echo $Price; ?>">
    <input type="file" name="image" value="<?php echo  $image; ?>">
    <label>
      <?php
      $record = mysqli_query($con, "SELECT * FROM `categories`");
      $data = mysqli_fetch_array($record);
      foreach ($record as $row) {
        // print_r($row);
        echo $row['id'] . " = " . $row['name'] . "<br>";
      } ?>
    </label>
    <input type="number" name="category_id" placeholder="category" value="<?php echo $category_id; ?>">

    <?php if ($edit_state == false) : ?>
      <button class="btn" type="submit" name="save">Save</button>
    <?php else : ?>
      <button class="btn" type="submit" name="update">Update</button>
    <?php endif ?>

  </form>
  <table>
    <tr>
      <th>PriceID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>image</th>
      <th>category</th>
      <th>Operation</th>

    </tr>
    <?php
    $result = mysqli_query($con, "SELECT * FROM pricedb");
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row["Name"]; ?></td>
        <td><?php echo $row["Description"]; ?></td>
        <td><?php echo $row["Price"]; ?></td>
        <td><img src="image/<?php echo $row["image"]; ?>"></td>
        <td><?php echo $row["category_id"]; ?></td>
        <td><a href="edit.php?edit=<?php echo $row["PriceID"]; ?>" class="edit_btn">Edit</a></td>
        <td><a href="CRUD.php?delete=<?php echo $row["PriceID"]; ?>" class="del_btn">Delete</a></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>


  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>