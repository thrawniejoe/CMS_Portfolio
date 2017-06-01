<?php

function get_homepage() {
      global $db;
      $query = 'SELECT * FROM SiteInformation where id=1';
      $statement = $db->prepare($query);
      $statement->execute();
      $homePage = $statement->fetch();
      $statement->closeCursor();
      return $homePage;
}

function update_homepage($header, $homeUser, $paragraph1, $paragraph2) {
        global $db;
        $queryUpdateUser = "UPDATE SiteInformation "
                . "SET HomePage_Header= :header, "
                . "HomePage_Username= :homeuser, "
                . "HomePage_Paragraph_1= :para1,"
                . "HomePage_Paragraph_2 = :para2 "
                . "WHERE id= 1";
        $statement = $db->prepare($queryUpdateUser);
        $statement->bindValue(':header', $header);
        $statement->bindValue(':homeuser', $homeUser);
        $statement->bindValue(':para1', $paragraph1);
        $statement->bindValue(':para2', $paragraph2);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

function update_resume($resume) {
        global $db;
        $queryUpdateUser = "UPDATE SiteInformation "
                . "SET ResumeFile= :resume "
                . "WHERE id= 1";
        $statement = $db->prepare($queryUpdateUser);
        $statement->bindValue(':resume', $resume);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

function update_contact($currentUser) {
        global $db;
        $queryUpdateUser = "UPDATE SiteInformation "
                . "SET HomePage_Header= :header, "
                . "HomePage_Username= :homeuser, "
                . "HomePage_Paragraph_1= :para1,"
                . "HomePage_Paragraph_2 = :para2 "
                . "WHERE id= 1";
        $statement = $db->prepare($queryUpdateUser);
        $statement->bindValue(':header', $header);
        $statement->bindValue(':homeuser', $homeUser);
        $statement->bindValue(':para1', $paragraph1);
        $statement->bindValue(':para2', $paragraph2);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }