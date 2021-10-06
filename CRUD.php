<?php
session_start();
include_once 'config.php';
// For Create new records
$PriceID = 0;
$Name = "";
$Description = "";
$Price = "";
$image = "";
$category = "";
$edit_state = false;

if (isset($_POST['save'])) {
  $Name = $_POST['Name'];
  $Description = $_POST['Description'];
  $Price = $_POST['Price'];
  $image = $_POST['image'];
  $category = $_POST['category'];

 $sql = "INSERT INTO pricedb (Name,Description,Price,image,category) VALUES ('$Name','$Description','$Price','$image','$category')";
 if (mysqli_query($con, $sql)) { 
   $_SESSION['message'] = "Data Saved Successfully";
    header("Location: Admin.php");
   } else {
    mysqli_close($con);
   }
   
}

// For updating records

if (isset($_POST['update'])) {
  $PriceID = $_POST['PriceID'];
  $Name = $_POST['Name'];
  $Description = $_POST['Description'];
  $Price = $_POST['Price'];
  $image = $_POST['image'];
  $category = $_POST['category'];
  mysqli_query($con, "UPDATE pricedb SET Name='$Name', Description='$Description', Price='$Price', image='$image' WHERE PriceID=$PriceID");
  $_SESSION['message'] = "Data Updated Successfully";
  header('location: Admin.php');
}

// For deleteing records

if (isset($_GET['delete'])) {
  $PriceID = $_GET['delete'];
  mysqli_query($con, "DELETE FROM pricedb WHERE PriceID=$PriceID");
  $_SESSION['message'] = "Data Deleted Successfully";
  header('location:Admin.php');
}
?>