<?php

class User {
    private $ID, $FirstName, $LastName, $Username, $EmailAddress, $Password, $Phone, $Picture;

    function __construct($id, $firstName, $lastName, $username, $emailAddress, $password) {
        $this->ID = $id;
        $this->FirstName = $firstName;
        $this->LastName = $lastName;
        $this->Username = $username;
        $this->EmailAddress = $emailAddress;
        $this->Password = $password;

    }
  


    function getID() {
        return $this->ID;
    }

    function getFirstName() {
        return $this->FirstName;
    }

    function getLastName() {
        return $this->LastName;
    }

    function getUsername() {
        return $this->Username;
    }

    function getEmailAddress() {
        return $this->EmailAddress;
    }
    
    function getPassword() {
        return $this->Password;
    }
    
    function getPhone() {
        return $this->Phone;
    }
    
    function getPicture() {
        return $this->Picture;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setFirstName($FirstName) {
        $this->FirstName = $FirstName;
    }

    function setLastName($LastName) {
        $this->LastName = $LastName;
    }

    function setUsername($Username) {
        $this->Username = $Username;
    }

    function setEmailAddress($EmailAddress) {
        $this->EmailAddress = $EmailAddress;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }
    
    function setPhone($Phone) {
        $this->Phone = $Phone;
    }

    function setPicture($Picture) {
        $this->Picture = $Picture;
    }
}
