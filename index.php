<?php
    session_start();
    if(!isset($_SESSION['logged']) && !$_SESSION['logged']){
        header("location: dashboard/login.php");
    }else{
        header("location: dashboard/index.php");
    }
?>