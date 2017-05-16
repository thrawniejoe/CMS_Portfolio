<?php

 function get_projects() {
      global $db;
      $query = 'SELECT * FROM projects';
      $statement = $db->prepare($query);
      $statement->execute();
      $projects = $statement->fetchAll();
      $statement->closeCursor();
      return $projects;
  }
