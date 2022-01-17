<?php
session_start();
include "config.php";

if (isset($_SESSION)) {
  // echo '<pre>';
  // print_r($_SESSION);
  // echo '</pre>';
  $sql_query = "insert into orders (userid, created, status) values ('" . $_SESSION['loggedin']['userid'] . "', '" . date('Y-m-d') . "', 'pending')";
  $result = mysqli_query($con, $sql_query);
  foreach ($_SESSION['shopping_cart'] as $keys => $values) {
    $sql_query = "insert into order_items (order_id, PriceID, quantity) values ('" . mysqli_insert_id($con) . "', '" . $values['item_id'] . "', '" . $values['item_quantity'] . "')";
    $result = mysqli_query($con, $sql_query);
  }
  // unset($_SESSION['shopping_cart']);
  header("location: invoice.php");
}
