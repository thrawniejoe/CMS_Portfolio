<?php
require('../models/database.php');
require('../models/projects_db.php');
require('../models/project.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}

switch ($action) {
    case 'home':
        include('../views/home/index.php');
        
        break;
      case 'login':
          include('../views/home/login.php');
          break;
      case 'contact':
          include('../views/home/contact.php');
          break;
      case 'resume':
          include('../views/home/resume.php');
          break;
      case 'portfolio':
          $projects = get_projects();
          include('../views/home/portfolio.php');
          break;
      case 'get_project':
          break;
}


//checks to see what page the user is on and sets the button as actie
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

?>
