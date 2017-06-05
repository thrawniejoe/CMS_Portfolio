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

 function get_project($id) {
      global $db;
      $query = 'SELECT * FROM projects where id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();
      $projects = $statement->fetchAll();
      $statement->closeCursor();
      return $projects;
}

function add_project($projectName, $description, $github_Link, $sameSite_Link, $displayPicture) {
    global $db;
    //$date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format, date for when project added, need to add field to SQL
    $query =
        'INSERT INTO projects
            (projectName, description, github_Link, sampleSite_Link, display_picture)
            VALUES (:projectName, :description, :github_Link, :sameSite_Link, :displayPic)';
    $statement = $db->prepare($query);
    $statement->bindValue(':projectName', $projectName);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':github_Link', $github_Link);
    $statement->bindValue(':sameSite_Link', $sameSite_Link);
    $statement->bindValue(':displayPic', $displayPicture);
    $statement->execute();
    $statement->closeCursor();
}

function update_project($project) {
        global $db;
        $queryUpdateUser = "UPDATE projects "
                . "SET projectName= :projectName, "
                . "description= :description, "
                . "github_Link= :github_Link,"
                . "sampleSite_Link = :sampleSite_Link, "
                . "display_picture = :displayPic"
                . "WHERE id= :id";
        $statement = $db->prepare($queryUpdateUser);
        $statement->bindValue(':projectName', $project->getprojectName());
        $statement->bindValue(':description', $project->getdescription());
        $statement->bindValue(':github_Link', $project->getgithub());
        $statement->bindValue(':sampleSite_Link', $project->getsampleLink());
        $statement->bindValue(':displayPic', $project->getDisplayPicture());
        $statement->bindValue(':id', $project->getID());
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }
    
    //non object update
    function modify_project($id, $projectName, $description, $github_link, $sample) {
        global $db;
        $queryUpdateUser = "UPDATE projects "
                . "SET projectName= :projectName, "
                . "description= :description, "
                . "github_Link= :github_Link,"
                . "sampleSite_Link = :sampleSite_Link "
                //. "display_picture = :displayPic"
                . "WHERE id= :id";
        $statement = $db->prepare($queryUpdateUser);
        $statement->bindValue(':projectName', $projectName);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':github_Link', $github_link);
        $statement->bindValue(':sampleSite_Link', $sample);
        //$statement->bindValue(':displayPic', $project->getDisplayPicture());
        $statement->bindValue(':id', $id);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

 function delete_project($id) {
      global $db;
      $query = 'DELETE FROM projects where id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();
      $statement->closeCursor();
}

function delete_projectPictures($project_id) {
      global $db;
      $query = 'DELETE FROM projectPictures where project_id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(':id', $project_id);
      $statement->execute();
      $statement->closeCursor();
}

function add_picture($project_id, $image_file) {
    global $db;
    //$date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query =
        'INSERT INTO projectPictures
            (project_id, image_file)
            VALUES (:project_id, :image_file)';
    $statement = $db->prepare($query);
    $statement->bindValue(':project_id', $project_id);
    $statement->bindValue(':image_file', $image_file);
    $statement->execute();
    $statement->closeCursor();
}

function get_pictures($project_id) {
      global $db;
      $query = 'SELECT * FROM projectPictures where project_id = :projectID';
      $statement = $db->prepare($query);
      $statement->bindValue(':projectID', $project_id);
      $statement->execute();
      $skills = $statement->fetchAll();
      $statement->closeCursor();
      return $skills;
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
    //$date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format, date for when project added, need to add field to SQL
    $query =
        'INSERT INTO skills
            (user_id, skill_name, description, skill_picture)
            VALUES (:user_id, :skill_name, :description, :skill_picture)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':skill_name', $skill_name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':skill_picture', $skill_picture);
    $statement->execute();
    $statement->closeCursor();
}

 function delete_skill($id) {
      global $db;
      $query = 'DELETE FROM skills where id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();
      $statement->closeCursor();
}


function get_projectSkills($projectID) {
      global $db;
      $query = 'select *
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

function add_ProjectSkill($projectID, $skill_id) {
    global $db;
    //$date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format, date for when project added, need to add field to SQL
    $query =
        'INSERT INTO projectSkillList
            (projectID, skill_id)
            VALUES (:projectID, :skill_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':projectID', $projectID);
    $statement->bindValue(':skill_id', $skill_id);
    $statement->execute();
    $statement->closeCursor();
}

function checkSkill($projectId, $skillId){
    global $db;
    $query = 
           'SELECT * FROM `projectskilllist` WHERE `projectID` = :projectID AND  `skill_id` = :skill_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':projectID', $projectId);
    $statement->bindValue(':skill_id', $skillId);
    $statement->execute();
    $projectSkills = $statement->fetch();
    $statement->closeCursor();
    return $projectSkills;
}


 function delete_projectskill($id) {
      global $db;
      $query = 'DELETE FROM projectskilllist where id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();
      $statement->closeCursor();
}