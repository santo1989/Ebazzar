<?php 
// Initialize shopping cart class   
// Include the database config file 
require "loginproc.php";
 ?>
 
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
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="topnav">
  <a  href="index.php">E-bazzaR</a>
  <a href="register.php">Open a New Account</a>
  <a href="#cart">Cart</a>
  <a class="active" href="Admin.php">Admin</a>
  <!--<form action="newlogin.php" method="post">-->
</div>
</form> 
</div>
<div class="contain">

<div class="search">
   <div class="row">
   <div class="colume" style="margin-top: 5%;">
   <div class="row">

   <?php 

     $conn = new mysqli('localhost', 'root', '', 'ecomdb');
     if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM pricedb WHERE Name LIKE '%$searchKey%'";
     }else
     $sql = "SELECT * FROM pricedb";
     $result = $conn->query($sql);
   ?>

   <form action="" method="GET"> 
     <div class="colume">
        <input type="text" name="search" class='form-control' placeholder="Search By Name" value=<?php echo @$_GET['search']; ?> > 
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
     <th>Operation</th>
     
  </tr>
  <?php while( $row = $result->fetch_object() ): ?>
  <tr>
     <td><?php echo $row->PriceID  ?></td>
     <td><?php echo $row->Name ?></td>
     <td><?php echo $row->Description ?></td>
     <td><?php echo $row->Price ?></td>
     <td><img src="image/<?php echo $row->image?>"></td>
     <td><?php echo $row->category ?></td>
     <td><a href="edit.php"><button >CRUD Operation</button> </br></br> <!--line brack -->
	</td>
  </tr>
  <?php endwhile; ?>
</table>
</div>
</div>
</div>
  </body>
  </html>
</div>
</div>
</body>
</html>