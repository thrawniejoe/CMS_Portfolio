<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DatabaseConnection {
    
    public static function getDBconn() {
        $dns = 'mysql:host=localhost;dbname=portfolio_WebsiteDB';
        $user = 'root';
        $password = '';

        try {
            $db = new PDO($dns, $user, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOExecption $e) {
            $error_message = $e->getMessage();
            include('database_error.php');
            exit();
        }
        return $db;
    }
}