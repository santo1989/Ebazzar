<?php require "loginproc.php";
?>

<form action="loginproc.php" method="post">
    <div class="login-container">
        <?php include 'loginproc.php';
        if (isset($_SESSION["loggedin"])) {
            echo '<a href="index.php">Logout</a>';
            // $_SESSION['loggedin'] == session_destroy();
        } else { ?>
            <input type="text" name="AdminN" id="AdminN" placeholder="Username"></input>
            <input type="password" name="passN" id="passN" placeholder="Password"></input>
            <input type="submit" value="LOGIN" name="loginN" id="loginN"></input>
        <?php }
        // print_r($_SESSION);
        ?>
    </div>
</form>