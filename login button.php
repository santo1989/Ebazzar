<?php require "loginproc.php";
?>

<form action="loginproc.php" method="post">
  <div class="login-container">
    <?php include 'loginproc.php';
    if (isset($_SESSION["loggedin"])) {  echo '<a href="index.php">Logout</a>';
      // $_SESSION["loggedin"] == session_destroy();
     } else {?>
      <input type="text" name="username" id="username" placeholder="Username"></input>
      <input type="password" name="pass" id="pass" placeholder="Password"></input>
      <input type="submit" value="LOGIN" name="login" id="login"></input>
    <?php }
    // print_r($_SESSION);
    ?>
  </div>
</form>