<nav>
    <div class="topnav">
        <a href="index.php">E-bazzaR</a>
        <a href="cart.php">Cart</a>
        <a href="invoice.php">Invoice</a>
        <form method='post'>
            <input type="submit" value="Logout" name="but_logout">
            <?php

            // logout
            if (isset($_POST['but_logout'])) {
                session_start();
                unset ($_SESSION['UID'] );
                // $_SESSION == session_destroy();
                // Redirect to the login page:

                header('Location: index.php');
            }

            ?>
        </form>


    </div>
</nav>