<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "ecomdb");

if (isset($_POST["add_to_cart"])) {
  if (isset($_SESSION["shopping_cart"])) {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if (!in_array($_GET["id"], $item_array_id)) {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'item_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
      // send to confrom order


    } else {
      echo '<script>alert("Item Already Added")</script>';
    }
  } else {
    $item_array = array(
      'item_id' => $_GET["id"],
      'item_name' => $_POST["hidden_name"],
      'item_price' => $_POST["hidden_price"],
      'item_quantity' => $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      if ($values["item_id"] == $_GET["id"]) {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Shopping Cart </title>
  <link rel="stylesheet" type="text/css" href="css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    #Orders {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #Orders td,
    #Orders th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #Orders tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #Orders tr:hover {
      background-color: #ddd;
    }

    #Orders th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04aa6d;
      color: white;
    }
  </style>


</head>

<body>
  <div class="topnav">
    <a href="index.php">E-bazzaR</a>
    <a href="register.php">Open a New Account</a>
    <a class="active" href="cart.php">Cart</a>
    <a href="invoice.php">Invoice</a>

    <?php include "login button.php" ?>

      </div>

  </div>
  </form>
  </div>
  <h1>Enjoy Shopping</h1>

  <?php
  // echo '<pre>';
  // print_r($_SESSION);
  // echo '</pre>';


  ?>
  <br />
  <div class="container">
    <br />
    <br />
    <h3>Order Details</h3>
    <div>
      <table id="Orders">
        <tr>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
        <?php
        if (!empty($_SESSION["shopping_cart"])) {
          $total = 0;
          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        ?>
            <tr>
              <td><?php echo $values["item_name"]; ?></td>
              <td><?php echo $values["item_quantity"]; ?></td>
              <td>Tk <?php echo $values["item_price"]; ?></td>
              <td>Tk <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
              <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
            </tr>
          <?php
            $total = $total + ($values["item_quantity"] * $values["item_price"]);
          }
          ?>
          <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right">TK <?php echo number_format($total, 2); ?></td>
            <td></td>
          </tr>

        <?php
        }
        ?>
        <tr>
          <td colspan="5" align="right"><a href="invoice.php"> <button type="submit" name="conord" <?php if (empty($_SESSION["shopping_cart"])) {
                                                                                                      echo "disabled";
                                                                                                    } ?>>Order invoice</button></a></td>
        </tr>

      </table>
    </div>
  </div>
  </div>

  <br />
  <br />

  <br />
  <h3 align="center">Shoping Cart</a></h3><br />
  <br /><br />
  <?php
  $query = "SELECT * FROM pricedb ORDER BY PriceID ASC";
  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
  ?>
      <div class="column" "margin top 3">
        <form method="post" action="cart.php?action=add&id=<?php echo $row["PriceID"]; ?>">
          <div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">
            <img src="image/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

            <h4 class="text-info"><?php echo $row["Name"]; ?></h4>

            <h4 class="text-danger">TK <?php echo $row["Price"]; ?></h4>

            <input type="text" name="quantity" value="1" class="form-control" />

            <input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

          </div>
        </form>
      </div>
  <?php
    }
  }
  ?>
  <div style="clear:both"></div>
  <br />
  </div>
  </div>
  </div>
  <br />
</body>

</html>