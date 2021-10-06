<?php
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
      $category = $data['category'];
    
  }
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" type="text/css" href="css.css">
  <title>Crud Operation In PHP</title>
</head>
<body>
  <?php if (isset($_SESSION['message'])):?>
    <div class="message">
      <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']); 
      ?>
    </div>
  <?php endif ?>
  <div class="topnav">
  <a  href="index.php">E-bazzaR</a>
  <a href="Admin.php">Admin</a>
  <a href="#cart">Cart</a>
  <a class="active" href="edit.php">Edit</a>
  <!--<form action="newlogin.php" method="post">-->
</div>
  <h1>Edit, Create, Delete and Update</h1>
   <form class="form-inline" method="POST" action="CRUD.php">
     <input type="hidden" name="PriceID" value="<?php echo $PriceID; ?>">
     <input type="text" name="Name" placeholder="Name" value="<?php echo $Name; ?>">
     <input type="text" name="Description" placeholder="Description" value="<?php echo $Description; ?>">
     <input type="text" name="Price" placeholder="Price" value="<?php echo $Price; ?>">
     <input type="file" name="image" value="<?php echo $image; ?>">
     <input type="text" name="category" placeholder="category" value="<?php echo $category; ?>">
  <?php if ($edit_state == false): ?>
  <button class="btn" type="submit" name="save" >Save</button>
<?php else: ?>
  <button class="btn" type="submit" name="update" >Update</button>
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
  <td><img src="image/<?php echo $row["image"];?>"></td>
  <td><?php echo $row["category"]; ?></td>
  <td><a href="edit.php?edit=<?php echo $row["PriceID"]; ?>" class="edit_btn">Edit</a></td>
  <td><a href="CRUD.php?delete=<?php echo $row["PriceID"]; ?>" class="del_btn">Delete</a></td>
  </tr>
  <?php
  $i++;
}
  ?>
</table>
</body>
</html>