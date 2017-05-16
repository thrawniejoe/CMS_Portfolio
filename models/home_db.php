<?php

class UserDB {
    public static function checkUsername($Username){
        global $db;
        
        $queryCheckUsername = "";
        
        $statement = $db->prepare($queryCheckUsername);
        $statement->bindValue(':username', $Username);
        $statement->execute(array(':username' => $Username)); //might not need this since binding value
        $results = $statement->fetchObject();
        return $result;
    }
    
    public static function checkLogin($email){
        //Checks to see if user exists and if their password and user name matches
        global $db;
        $queryCheckEmail = "SELECT * FROM `users` WHERE email = :email";
        $statement = $db->prepare($queryCheckEmail);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        return $result["password"];
    }
    
    public static function getUserByEmail($email) {
        global $db;
        $queryCheckEmail = "SELECT * FROM `users` WHERE email = :email";
        $statement = $db->prepare($queryCheckEmail);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $rs = $statement->fetch();
        $selectedUser = new User($rs["id"], $rs["firstName"], $rs["lastName"], $rs["username"], $rs["email"], $rs["password"], $rs["phone"], $rs["picture"]);
        return $selectedUser;
    }
}