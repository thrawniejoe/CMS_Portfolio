<?php
    $dsn = 'mysql:host=localhost;dbname=portfolio_Website';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../models/database_error.php');
        exit();
    }
?>