<?php
//require('../model/database.php');
//require('../model/product_db.php');

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
      //test
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
          include('../views/home/portfolio.php');
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
