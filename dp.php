<?php
    // $con = mysqli_connect("localhost","root", "", "restaurant_management");
    define('DATABASE_SERVER', 'localhost');
    define('DATABASE_USER', 'db');
    define('DATABASE_PASSWORD', '');
    define('DATABASE_NAME', 'restaurant_management');
    $connection = null;
    try {
        $connection = new PDO(
            "mysql:host=".DATABASE_SERVER.";dbname=".DATABASE_NAME,DATABASE_USER, DATABASE_PASSWORD
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        $connection = null;
    }
?>