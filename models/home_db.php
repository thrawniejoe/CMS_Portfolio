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
        $selectedUser = new User($rs["id"], $rs["firstName"], $rs["lastName"], $rs["username"], $rs["email"], $rs["password"]);
        return $selectedUser;
    }
  
  
  //UPDATE THIS
  public static function insertUser($currentUser){
        global $db;
        
        $insertQuery = 'INSERT INTO users '
                       . '(firstName, lastName, username, email, password) '
                       . 'VALUES(:firstname, :lastname, :username, :emailaddress, :password)';

        //if validate success, execute insert 
        $insertStatement = $db->prepare($insertQuery);
        $insertStatement->bindValue(':firstname', $currentUser->getFirstName());
        $insertStatement->bindValue(':lastname', $currentUser->getLastName());
        $insertStatement->bindValue(':username', $currentUser->getUsername());
        $insertStatement->bindValue(':emailaddress', $currentUser->getEmailAddress());
        $insertStatement->bindValue(':password', $currentUser->getPassword());
        $result = $insertStatement->execute();
        $insertStatement->closeCursor();
        return $result;
  } 
  
  public static function getSiteContactInfo() {
        global $db;
        $queryGetContact = "SELECT * FROM `users` WHERE mainSite_Account = 1";
        $statement = $db->prepare($queryGetContact);
        $statement->execute();
        $contact = $statement->fetch();
        $statement->closeCursor();
        return $contact;
    }
  
  public static function update_contact($firstName,$lastName,$username,$email,$phone) {
        global $db;
        $queryUpdateUser = "UPDATE users "
                . "SET firstName= :firstName, "
                . "lastName= :lastName, "
                . "username= :username,"
                . "email = :email "
                . "phone = :phone "
                . "WHERE mainSite_Account= 1";
        $statement = $db->prepare($queryUpdateUser);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }
}