<?php
include "loginproc.php";
include "config.php";


?>

<!DOCTYPE html>
<html>

<head>
    <title>Wellcome </title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include "member_nav.php"; ?>

    <div class="col text-center">
        <a>
            <h5>Welcome <?php
                        session_start();
                        if (isset($_SESSION['UID'])) {
                            echo $_SESSION['UID'];

                            $sql_query = "select * from users where username='" . $_SESSION['UID'] . "'";
                            $result = mysqli_query($con, $sql_query);
                            $row = mysqli_fetch_array($result);
                            $_SESSION['loggedin'] = $row;
                            // echo"<pre>";
                            // print_r($_SESSION['loggedin']);
                            // echo"</pre>";




                        } else {
                            echo "Guest";
                        }
                        ?> </h5>
        </a>
    </div>


    <div class="container">
        <div class="row">
            <?php
            $host = "localhost"; /* Host name */
            $user = "root"; /* User */
            $password = ""; /* Password */
            $dbname = "ecomdb"; /* Database name */

            $con = mysqli_connect($host, $user, $password, $dbname);
            $query = "SELECT * FROM pricedb";
            $query_run = mysqli_query($con, $query);
            $check_price = mysqli_num_rows($query_run) > 0;
            if ($check_price) {
                while ($row = mysqli_fetch_array($query_run)) {
            ?>
                    <div class="col-md-4" style="margin:top-3">
                        <div class="card">
                            <img src="image/<?php echo $row['image']; ?>" alt="E-bazzaR">
                            <h3><?php echo $row['Name']; ?></h3>
                            <p><?php echo 'PID' . $row['PriceID']; ?></p>
                            <p><?php echo $row['Description']; ?></p>
                            <p class="price"><?php echo 'Tk= ' . $row['Price']; ?></p>
                            <form action="cart.php" method="GET">
                                <p class="add_to_cart align-end"><button name="add" type="submit" action="cart.php" method="GET">Add to Cart</button></p>
                            </form>
                            <a class="active"><?php
                                                // to change a session variable, just overwrite it
                                                if (isset($_POST['add'])) {
                                                    session_start();
                                                    echo $_SESSION['add'];
                                                }
                                                ?> </a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div>
        <footer>
            <?php include 'footer.php'; ?>

        </footer>

    </div>
</body>

</html>