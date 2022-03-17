<?php require "loginproc.php";
?>

<form action="loginproc.php" method="post">
  <div class="login-container">
    <?php
    if ($_SESSION["UID"] ?? $_SESSION["loggedin"] ?? false) {
    ?>
      <a href="logout.php" tite="Logout">Logout</a>
    <?php
    } else { ?>

      <input type="text" name="username" id="username" placeholder="Username"></input>
      <input type="password" name="pass" id="pass" placeholder="Password"></input>
      <input type="submit" value="LOGIN" name="login" id="login"></input>
    <?php }
    // var_dump($_SESSION);
    ?>
  </div>
</form>