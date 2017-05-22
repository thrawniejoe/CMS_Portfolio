<?php 

require('../models/database.php');
require('../models/projects_db.php');
require('../models/project.php');
require('../models/home_db.php');
require('../models/user.php');

session_start();
//require_once('../controllers/homeController.php');
//require_once('../controllers/homeController.php');
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
        include('../views/manager/mgn-editProject.php');
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
        $demo = filter_input(INPUT_POST, 'demo', FILTER_VALIDATE_FLOAT);
        $message = filter_input(INPUT_POST, 'message');

        //$ts = strtotime($release_date);
        //$release_date_db = date('Y-m-d', $ts);  // convert to yyyy-mm-dd format for database storage

        // Validate the inputs
        if (empty($pname) || empty($message)) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../views/errors/error.php');
        } else {
            add_project($pname, $github, $demo, $message);
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
