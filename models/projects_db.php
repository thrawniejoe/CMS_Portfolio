<?php

function get_projects() {
    global $db;
    $query = 'SELECT * FROM projects';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();


    $projects = array();
    foreach($rows as $row) {
        $t = new Project(
            $row['id'], $row['projectName'], $row['description'],
            $row['github_Link'], $row['sampleSite_Link']);
        $projects[] = $t;
    }
    return $projects;
}