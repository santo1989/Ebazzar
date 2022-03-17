<?php
session_start();
unset($_SESSION["AID"]);
header("Location:Admin.php");
