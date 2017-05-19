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


function add_project($projectName, $description, $github_Link, $sameSite_Link) 
{
    global $db;
    $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query =
        'INSERT INTO projects
            (projectName, description, github_Link, sameSite_Link)
            VALUES (:projectName, :description, :github_Link, :sameSite_Link)';
    $statement = $db->prepare($query);
    $statement->bindValue(':projectName', $projectName);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':github_Link', $github_Link);
    $statement->bindValue(':sameSite_Link', $sameSite_Link);
    $statement->execute();
    $statement->closeCursor();
}

function add_picture($project_id, $image_file) 
{
    global $db;
    $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query =
        'INSERT INTO projectPictures
            (project_id, image_file)
            VALUES (:project_id, :image_file)';
    $statement = $db->prepare($query);
    $statement->bindValue(':project_id', $pproject_id);
    $statement->bindValue(':image_file', $image_file);
    $statement->execute();
    $statement->closeCursor();
}