<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "tripPlanner";

    try{
    $pdo= new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
        // echo"connection succesfull";
    }catch(PDOException $e){
        die("Connection Failed ". $e->getMessage());
    }
?>