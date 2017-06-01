<?php 

require('../models/database.php');
require('../models/projects_db.php');
require('../models/project.php');
require('../models/home_db.php');
require('../models/user.php');
require('../models/manager_db.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
$actionGet = filter_input(INPUT_GET, 'action');

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'openManager';
    }
}
//var_dump($_SESSION['currentUser']);
//$_SESSION['username']= 'bob';

//$myUser = new User('bill','bill','bill','bill','ibll');
  //$_SESSION['currentUser'] = $myUser;
  //var_dump($myUser);
if(isset($_SESSION['currentUser'])){
  $user = $_SESSION['currentUser'];

} else {
  $user = "not working";
}
switch ($action) {
  case 'openManager':
        include('../views/manager/managerIndex.php');
        break;
  case 'manager_home':
        include('../views/manager/managerIndex.php');
        break;
  case 'project_list':
        $projects = get_projects();
        include('../views/manager/mgn-projects.php');
        break;
  case 'edit_project':
        $pId = filter_input(INPUT_POST, 'project_code');
        $selectedProject = get_project($pId);
        include('../views/manager/mgn-editProject.php');
        break;
  case 'upload_image':
      $pId = filter_input(INPUT_POST, 'project_code');
      $pname = filter_input(INPUT_POST, 'pname');
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp2 = explode('.', $_FILES['image']['name']);
            $temp = end($temp2);
            $file_ext = strtolower($temp);
            $extensions = array("jpeg", "jpg", "png", "gif");
            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }
            if (empty($errors) == true) {
                if (!file_exists("../images/" . $pname)) {
                    mkdir("../images/" . $pname);
                }
                move_uploaded_file($file_tmp, "../images/" . $pname . "/" . $file_name);
                //echo "Success";
                add_picture($pId, "../images/" . $pname . "/" . $file_name);
              //todo - loop through images in dir and display file name on page
                $message = $file_name . " added.";
            } else {
                $message = "This file extension is not usable. Please try a different extension";
            }
        }
        break;
  case 'home':
        header('location: homeController.php');
        exit();
        break;
  case 'add_project':
        include('../views/manager/mgn-addProject.php');
        break;
  case 'add_project_toDB':
        $pname = filter_input(INPUT_POST, 'pname');
        $github = filter_input(INPUT_POST, 'github');
        $demo = filter_input(INPUT_POST, 'demo');
        $message = filter_input(INPUT_POST, 'message');

        //$ts = strtotime($release_date);
        //$release_date_db = date('Y-m-d', $ts);  // convert to yyyy-mm-dd format for database storage

        // Validate the inputs
        if (empty($pname) || empty($message)) {
            $error = "Invalid project data. Check all fields and try again.";
            include('../views/errors/error.php');
        } else {
            add_project($pname, $github, $demo, $message);
            $R_message ="Project Successfully added to the database.";
            include('../views/manager/mgn_success.php');
        }
        break;
  case 'edit_project_DB':
    break;
  case 'modify_homepage':
    $frontPage = get_homepage();
    include('../views/manager/mgn-editHome.php');
    break;
  case 'update_homepage':
        $header = filter_input(INPUT_POST, 'header');
        $homeUser = filter_input(INPUT_POST, 'homeUser');
        $paragraph1 = filter_input(INPUT_POST, 'paragraph1');
        $paragraph2 = filter_input(INPUT_POST, 'paragraph2');

        // Validate the inputs
        if (empty($header)) {
            $error = "Invalid homepage data. Check all fields and try again.";
            include('../views/errors/error.php');
        } else {
            update_homepage($header, $homeUser, $paragraph1, $paragraph2);
            $R_message ="Homepage Successfully updated.";
            include('../views/manager/mgn_success.php');
        }
    break;
  case 'modify_resume':
    include('../views/manager/mgn-resume.php');
    break;
  case 'upload_resume':
    if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp2 = explode('.', $_FILES['image']['name']);
            $temp = end($temp2);
            $file_ext = strtolower($temp);
            $extensions = array("pdf", "docx", "txt");
            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }
            
            if (empty($errors) == true) {
                if (!file_exists("../resume/")) {
                    mkdir("../resume/");
                }
                move_uploaded_file($file_tmp, "../resume/" . $file_name);
                //echo "Success";
                update_resume("../resume/" . $file_name);
              //todo - loop through images in dir and display file name on page
                $message = $file_name . " added.";
            } else {
                $message = "This file extension is not usable. Please try a different extension";
            }
   }          
    break;
    
  case 'modify_contact':
    include('../views/manager/mgn-contact.php');
    break;
  case 'update-contact':
           $firstName = filter_input(INPUT_POST, 'firstName');
           $lastName = filter_input(INPUT_POST, 'lastName');
           $username = filter_input(INPUT_POST, 'username');
           $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
           $phone = filter_input(INPUT_POST, 'phone');
    
            if (empty($header)) {
            $error = "Invalid homepage data. Check all fields and try again.";
            include('../views/errors/error.php');
        } else {
            update_homepage($header, $homeUser, $paragraph1, $paragraph2);
            $R_message ="Contact information Successfully updated.";
            include('../views/manager/mgn_success.php');
        }
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
