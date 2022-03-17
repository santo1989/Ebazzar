<?php
include "config.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    if ($username != "" && $pass != "") {

        session_start();
        $sql_query = "select count(*) userid from users where username='" . $username . "' and pass='" . $pass . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['userid'];

        if ($count > 0) {
            $_SESSION['UID'] = $username;

            header('Location: member.php');
        } else {
            echo "Invalid username and password";
        }
    }
}

if (isset($_POST['loginN'])) {
    $AdminN = mysqli_real_escape_string($con, $_POST['AdminN']);
    $passN = mysqli_real_escape_string($con, $_POST['passN']);

    if ($AdminN != "" && $passN != "") {
        session_start();
        $sql_query = "select count(*) AdminID from Admin where AdminN='" . $AdminN . "' and passN='" . $passN . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['AdminID'];

        if ($count > 0) {
            $_SESSION['AID'] = $AdminN;
            header('Location: Admin.php');
        } else {
            echo "Invalid username and password";
        }
    }
}
