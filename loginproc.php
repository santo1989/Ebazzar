<?php
include "config.php";

if(isset($_POST['login'])){
    $UserN = mysqli_real_escape_string($con,$_POST['UserN']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);

if ($UserN != "" && $pass != ""){

        $sql_query = "select count(*) UserID from user where UserN='".$UserN."' and pass='".$pass."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['UserID'];

        if($count > 0){
            $_SESSION['UID'] = $UserID;
            header('Location: member.php');
        }else{
            echo "Invalid username and password";
        }

}}