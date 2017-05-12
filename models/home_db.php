<?php

class UserDB {
    public static function checkUsername($Username){
        $db = DatabaseConnection::getDBconn();
        
        $queryCheckUsername = "";
        
        $statement = $db->prepare($queryCheckUsername);
        $statement->bindValue(':username', $Username);
        $statement->execute(array(':username' => $Username)); //might not need this since binding value
        $results = $statement->fetchObject();
        return $result;
    }
    
    
}