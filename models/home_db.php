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
  
  
  //UPDATE THIS
  public static function insertUser(){
        global $db;
        
        $insertQuery = 'INSERT INTO Users '
                       . '(FirstName, LastName, UserAlias, EmailAddress, Password) '
                       . 'VALUES(:firstname, :lastname, :alias, :emailaddress, :password)';

        //if validate success, execute insert 
        $insertStatement = $db->prepare($insertQuery);
        $insertStatement->bindValue(':firstname', $currentUser->getFirstName());
        $insertStatement->bindValue(':lastname', $currentUser->getLastName());
        $insertStatement->bindValue(':alias', $currentUser->getUserAlias());
        $insertStatement->bindValue(':emailaddress', $currentUser->getEmailAddress());
        $insertStatement->bindValue(':password', $currentUser->getPassword());
        $result = $insertStatement->execute();
        $insertStatement->closeCursor();
        return $result;
  }
}