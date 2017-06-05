<?php
session_start();
require('../models/database.php');
require('../models/projects_db.php');
require('../models/project.php');
require('../models/home_db.php');
require('../models/user.php');
require('../models/manager_db.php');
require('../models/Validation.php');

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
        $skills = get_skills();
        $content = get_homepage();
        include('../views/home/index.php');
        
        break;
      case 'login':
          include('../views/home/login.php');
          break;
      case 'registration':
          include('../views/home/registration.php');
          break;
      case 'logOut':
          session_destroy();
          header('location: ../controllers/homeController.php');
          break;
      case 'contact':
          $contact = UserDB::getSiteContactInfo();
          include('../views/home/contact.php');
          break;
      case 'resume':
          include('../views/home/resume.php');
          break;
      case 'portfolio':
          $projects = get_projects();
          include('../views/home/portfolio.php');
          break;
      case 'projectDetails':
          $project_code = filter_input(INPUT_POST, 'project_code');
          $selectedProject = get_project($project_code);
          $projectPictures = get_pictures($project_code);
          $projectSkills = get_projectSkills($project_code);
          //Phase 2 - Add ability to prevent the same skill from being added twice. 
          include('../views/home/project_details.php');
          break;
      case 'login_to_profile':
          $email = filter_input(INPUT_POST, 'email');
          $password = filter_input(INPUT_POST, 'password');
                
          $result = UserDB::checkLogin($email);
              if (password_verify($password, $result)) {
                 $confirm = "Login Successful.";
                 $_SESSION['currentUser'] = UserDB::getUserByEmail($email); 
                 
                 header('location: ../controllers/managerController.php'); 
                 exit();      
           }
           else {
                  $confirm = "Incorrect login, Please check your login information and try again.";
                  include ('../views/home/login.php');
                }
           break;
       case 'openManager':
            header('location: ../controllers/managerController.php'); 
            exit();
       case 'register':
           $firstName = filter_input(INPUT_POST, 'firstName');
           $lastName = filter_input(INPUT_POST, 'lastName');
           $username = filter_input(INPUT_POST, 'username');
           $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
           $password = filter_input(INPUT_POST, 'password');
            /* initialize error messages */
                if (isset($message)) {
                    unset($message);
                }
                $message = array();
    //validate
      /* data validation and setting up error mesages */
        $message['firstName'] = Validation::name($firstName, 'First Name');
        $message['lastName'] = Validation::name($lastName, 'Last Name');
        $message['username'] = Validation::alias($username);
        $message['email'] = Validation::email($email);
        $message['password'] = Validation::password($password);
    
        $valid = true;
                foreach ($message as $m) {
                    if ($m != '') {
                        $valid = false;
                        //$autofocus[key($m)] = 'autofocus';
                    }
                }
    
        if ($valid) { 
                $options = ['cost' => 10,];
                $result = UserDB::insertUser(new User($firstName, $lastName, $username, $email, password_hash($password, PASSWORD_DEFAULT, $options)));     
                if ($result == 1) {
                        $confirm = "Registration Complete.";
                    }
                    else {
                        $confirm = "Something went wrong. Your profile was not saved. Please try again.";
                    }
                    include ('../views/home/confirmation.php');
                    exit();
                }
                else {
                    include ('../views/home/registration.php');
                    exit();
                }

}


//checks to see what page the user is on and sets the button as actie
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri){
    echo 'class="active"';}
}


