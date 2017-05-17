<?php
require('../models/database.php');
require('../models/projects_db.php');
require('../models/project.php');
require('../models/home_db.php');
require('../models/user.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
$actionGet = filter_input(INPUT_GET, 'action');

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
      case 'registration':
          include('../views/home/registration.php');
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
      case 'login_to_profile':
          $email = filter_input(INPUT_POST, 'email');
          $password = filter_input(INPUT_POST, 'password');
                
          $result = UserDB::checkLogin($email);
              if ($result === $password){//(password_verify($password, $result)) {
                 $confirm = "Login Successful.";
                 $_SESSION["currentUser"] = UserDB::getUserByEmail($email);
                 include ('../controllers/managerController.php');
           }
           else {
                  $confirm = "Incorrect login, Please check your login information and try again.";
                  include ('../views/home/login.php');
                }
           break;
       case 'register':
           $firstName = filter_input(INPUT_POST, 'firstName');
           $lastName = filter_input(INPUT_POST, 'lastName');
           $username = filter_input(INPUT_POST, 'username');
           $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
           $password = filter_input(INPUT_POST, 'password');
            
    //validate
        $valid = true;
                foreach ($message as $m) {
                    if ($m != '') {
                        $valid = false;
                        $autofocus[key($m)] = 'autofocus';
                    }
                }
    
        if ($valid) { 
                    $options = [
                        'cost' => 10,
                        ];
                    
                    $result = UserDB::insertUser(new User($firstName, $lastName, $alias, $emailAddress, password_hash($password, PASSWORD_DEFAULT, $options)));
                    if ($result == 1) {
                        $confirm = "Registration Complete.";
                    }
                    else {
                        $confirm = "Something went wrong. Your profile was not saved. Please try again.";
                    }
                    include ('../views/confirmation.php');
                    exit();
                }
                else {
                    include ('../views/registration.php');
                    exit();
                }

}


//checks to see what page the user is on and sets the button as actie
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

?>
