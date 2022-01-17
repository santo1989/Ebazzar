<?php require "loginproc.php";



?>
<?php
session_start();
?>






<!DOCTYPE html>
<html>

<head>
  <title>invoice</title>
  <link rel="stylesheet" type="text/css" href="css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
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

    /* print with hidden property */

    @media print {

      .hidden-print,
      .hidden-print * {
        display: none !important;
      }
    }
  </style>


</head>

<body>
  <div class=" hidden-print">
    <div class="topnav">
      <a href="index.php">E-bazzaR</a>
      <a href="register.php">Open a New Account</a>
      <a class="active" href="invoice.php">Invoice</a>
      <a href="Adminlog.php">Admin Login</a>
      <a href="search.php">search</a>
      <!--<form action="newlogin.php" method="post">-->
      <?php include "login button.php" ?>

        </div>

    </div>
    </form>

  </div>
  </br>
  <div class="row">
    <div class="col-md-6">
      <div class=" hidden-print" style="text-align: center;">
        <a href="payment.php" button type="submit" name="checkout" <?php if (empty($_SESSION["shopping_cart"])) {

                                              echo "disabled";
                                            } ?> class="btn btn-primary">Checkout bill</a>
      </div>

    </div>

    <div class="col-md-6">
      <div class=" hidden-print" style="text-align: center;">
        <a href="cart.php" type="submit" name="submit" <?php if (empty($_SESSION["shopping_cart"])) {

                                                          echo "disabled";
                                                        } ?> class="btn btn-primary">Continue shopping</a>
      </div>

    </div>
  </div>


  <div class="container">
    <div class="page-header">
      <img src="image/cart.png" alt="" style="height: 50px; width: 50px" />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <!-- order information -->

          <div class="container">

            <br />
            <br />
            <h3 style="text-align: center;">Order Details</h3>
            <div>
              <table id="Orders">
                <tr>
                  <th style="text-align: center;">Item Name</th>
                  <th style="text-align: center;">Quantity</th>
                  <th style="text-align: center;">Price</th>
                  <th style="text-align: center;">Total</th>
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
                    </tr>
                  <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                  }
                  ?>
                  <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">TK <?php echo number_format($total, 2); ?></td>

                  </tr>
                  <tr>
                    <td colspan="3" align="right">VAT and TAX</td>
                    <td align="right">TK <?php echo number_format($amount = $total * 5 / 100, 2); ?></td>

                  </tr>
                <?php
                }
                ?>
                <tr>
                  <td colspan="3" align="right">Dalivery Charge</td>
                  <td align="right">TK <?php if (empty($_SESSION["shopping_cart"])) {
                                          echo "0";
                                        } else {
                                          echo number_format($amountch = 100, 2);
                                        } ?>
                  </td>

                </tr>
                <tr>
                  <td colspan="3" align="right">Ammount to Paid</td>
                  <td align="right">TK <?php if (empty($_SESSION["shopping_cart"])) {
                                          echo "0";
                                        } else {
                                          echo number_format(($amountch + $total + $amount), 2);
                                        } ?></td>
                </tr>

              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <!-- customer information -->

          <div class="container">
            <br />
            <br /><?php
                  if ((empty($_SESSION["loggedin"]))) {
                    echo '<strong>' . "Place log in for complete shopping" . '</strong>';
                  } else { ?>
              <h3 style="text-align: center;"><strong> Customer Details</strong> </h3>
              <div>
              <?php }
              ?>
              <table id="Orders">
              <tr>
                      <td><b>Payment Method:</b></td>
                      <td>Cash on Delivery</td>
                    </tr>
                    <tr>
                      <td><b>Order Status:</b></td>
                      <td>Successful</td>
                    </tr>
                <?php
                // echo'<pre>';
                // print_r($_SESSION);
                // echo '</pre>'; 
                foreach ($_SESSION as $keys => $values) {
                  if ($keys == 'loggedin') {
                    // foreach ($_SESSION["loggedin"] as $key => $value) {
                    //   echo '<tr>';
                    //   echo '<td>' . $key . '</td>';
                    //   echo '<td>' . $value . '</td>';
                    //   echo '</tr>';
                    // }
                ?>

                    <!-- <tr>
                      <td><b>Payment Method:</b></td>
                      <td>Cash on Delivery</td>
                    </tr>
                    <tr>
                      <td><b>Order Status:</b></td>
                      <td>Successful</td>
                    </tr> -->
                    <tr>
                      <td><b>Transaction Pin:</b>
                      <td><?php echo date("dmY") . ':' . $values['userid'] . ':' . rand(1, 99999); ?></td>
                    </tr>
                    <tr>
                      <td><b>Shipping Address:</b></td>
                      <td><?php echo $values["address"]; ?></td>
                    </tr>
                    <tr>
                      <td><b>Phone Number:</b></td>
                      <td> <?php echo $values['mobile']; ?></td>
                    </tr>
                    <tr>
                      <td><b>Email Address:</b></td>
                      <td> <?php echo $values['email']; ?></td>
                    </tr>
                    <tr>
                      <td><b>Name:</b></td>
                      <td> <?php echo $values['username']; ?></td>
                    </tr>
                <?php
                  }
                } //}
                ?>

              </table>
              </div>
          </div>
        </div>
        <div class="col-md-12">
          <p><b><?php
                // Set the new timezone
                date_default_timezone_set('Asia/Dhaka');
                echo "Created date is : " . date("d-m-Y h:i:sa");
                ?></p>
          <br />


          <p><b>Signature</b></p>
        </div>
        <div class=" hidden-print">
          <a href=#  button type="submit" name="print" class="btn btn-primary hidden-print " id="btnPrint" >Print</button></a>
          <?php 
            // unset($_SESSION['shopping_cart']);
          
          
          ?>
        </div>
      </div>
    </div>
  </div>
  <script>
    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
      window.print();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
<?php

// require "cart.php";

?>