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

function add_project($projectName, $description, $github_Link, $sameSite_Link) {
    global $db;
    $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format, date for when project added, need to add field to SQL
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

function update_project($project) {
        $db = DatabaseConnection::getDBconn();
        $queryUpdateUser = "UPDATE projects "
                . "SET projectName= :projectName, "
                . "description= :description, "
                . "github_Link= :github_Link,"
                . "sampleSite_Link = :sampleSite_Link "
                . "WHERE id= :id";
        $statement = $db->prepare($queryUpdateUser);
        $statement->bindValue(':projectName', $project->getProjectName());
        $statement->bindValue(':description', $project->getDescription());
        $statement->bindValue(':github_Link', $project->getGithub_Link());
        $statement->bindValue(':sampleSite_Link', $project->getSampleSite_Link());
        $statement->bindValue(':id', $project->getID());
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

function add_picture($project_id, $image_file) {
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

function get_skills() {
      global $db;
      $query = 'SELECT * FROM skills';
      $statement = $db->prepare($query);
      $statement->execute();
      $skills = $statement->fetchAll();
      $statement->closeCursor();
      return $skills;
}

function add_skill($user_id, $skill_name, $description, $skill_picture) {
    global $db;
    $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format, date for when project added, need to add field to SQL
    $query =
        'INSERT INTO skills
            (projectName, description, github_Link, sameSite_Link)
            VALUES (:user_id, :skill_name, :description, :skill_picture)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':skill_name', $skill_name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':skill_picture', $skill_picture);
    $statement->execute();
    $statement->closeCursor();
}

function get_projectSkills($projectID) {
      global $db;
      $query = 'select S.skill_picture, S.skill_name
                  FROM skills S
                  INNER JOIN projectSkillList PSL
                  ON (S.ID = PSL.skill_id)
                  WHERE PSL.projectID = :projectID;';
      $statement = $db->prepare($query);
      $statement->bindValue(':projectID', $projectID);
      $statement->execute();
      $projectSkills = $statement->fetchAll();
      $statement->closeCursor();
      return $projectSkills;
}
