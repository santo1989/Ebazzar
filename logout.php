<?php
session_start();
unset($_SESSION["UID"]);
unset($_SESSION["loggedin"]);
header("Location:index.php");
