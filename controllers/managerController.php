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
if (isset($_SESSION['currentUser'])) {
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
        $projectPictures = get_pictures($pId);
        $skills = get_skills();
        include('../views/manager/mgn-editProject.php');
        break;
    case 'upload_image':
        $pId = filter_input(INPUT_POST, 'project_code');
        $pname = filter_input(INPUT_POST, 'pname');
        $projectPictures = get_pictures($pId);
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
                if (!file_exists("../images/projects/" . $pname)) {
                    mkdir("../images/projects/" . $pname);
                }
                move_uploaded_file($file_tmp, "../images/projects/" . $pname . "/" . $file_name);
                //echo "Success";
                add_picture($pId, "../images/projects/" . $pname . "/" . $file_name);
                $R_message = "Resume Successfully uploaded.";

                //todo - loop through images in dir and display file name on page
                $message = $file_name . " added as main picture.";
                $selectedProject = get_project($pId);
                include('../views/manager/mgn-editProject.php');
            } else {

                $message = "This file extension is not usable. Please try a different extension";
                include('../views/errors/error.php');
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
        // 
        //start file file add
        if (empty($pname) || empty($message) || empty($_FILES)) {
            $message = "Invalid project data. Check all fields and try again.";
            include('../views/errors/error.php');
        } else {


            //redo, make into function and call from another file(Phase 2 - after project 3 is due)   
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
                    if (!file_exists("../images/projects/" . $pname)) {
                        mkdir("../images/projects/" . $pname);
                    }
                    move_uploaded_file($file_tmp, "../images/projects/" . $pname . "/" . $file_name);
                    //echo "Success";
                    $mainPicture = "../images/projects/" . $pname . "/" . $file_name;
                    //var_dump($mainPicture);
                    add_project($pname, $message, $github, $demo, $mainPicture);
                    $message = "Project Successfully added to the database.";
                    //include('../views/manager/mgn_success.php');
                    $projects = get_projects();
        include('../views/manager/mgn-projects.php');
                } else {

                    $message = "This file extension is not usable. Please try a different extension";
                    include('../views/errors/error.php');
                }
            } else {

                $message = "Image not set.";
                include('../views/errors/error.php');
            }


            //$mainPicture = "../images/projects/" . $pname . "/" . $file_name;
            //add_project($pname, $message, $github, $demo, $mainPicture);
            //$R_message ="Project Successfully added to the database.";
            //include('../views/manager/mgn_success.php');
        }
        break;
    case 'edit_project_DB':
        $pId = filter_input(INPUT_POST, 'project_code');
        $pname = filter_input(INPUT_POST, 'projectName');
        $github = filter_input(INPUT_POST, 'gitHub');
        $demo = filter_input(INPUT_POST, 'sample');
        $message = filter_input(INPUT_POST, 'description');
        
        
        
        //$project = new Project($pId, $pname, $message, $github, $demo);

        //$ts = strtotime($release_date);
        //$release_date_db = date('Y-m-d', $ts);  // convert to yyyy-mm-dd format for database storage
        // Validate the inputs
        if (empty($pname) || empty($message)) {
            $message = "Invalid project data. Check all fields and try again.";
            include('../views/errors/error.php');
        } else {
            modify_project($pId,$pname,$message,$github,$demo);
            //update_project($project);
            $R_message = "Project Successfully added to the database.";
            include('../views/manager/mgn_success.php');
        }
        break;
    case 'AddSkillToProject':
        $sId = filter_input(INPUT_POST, 'skillID');
        $pId = filter_input(INPUT_POST, 'project_code');
        
        add_ProjectSkill($pId,$sId);
        $selectedProject = get_project($pId);
        $projectPictures = get_pictures($pId);
        $skills = get_skills();
        include('../views/manager/mgn-editProject.php');
        break;
    case 'DeleteSkillFromProject':
        $sId = filter_input(INPUT_POST, 'skillID');
        delete_projectskill($sId);
        $pId = filter_input(INPUT_POST, 'project_code');
        $selectedProject = get_project($pId);
        $projectPictures = get_pictures($pId);
        $skills = get_skills();
        include('../views/manager/mgn-editProject.php');
        break;
    case 'delete_project':
        $pId = filter_input(INPUT_POST, 'project_code');
        delete_projectPictures($pId);
        delete_project($pId);
        $projects = get_projects();
        include('../views/manager/mgn-projects.php');
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
            $message = "Invalid homepage data. Check all fields and try again.";
            include('../views/errors/error.php');
        } else {
            update_homepage($header, $homeUser, $paragraph1, $paragraph2);
            $R_message = "Homepage Successfully updated.";
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
                $R_message = "Resume Successfully uploaded.";
                include('../views/manager/mgn_success.php');
                //todo - loop through images in dir and display file name on page
                $message = $file_name . " added.";
            } else {

                $message = "This file extension is not usable. Please try a different extension";
                include('../views/errors/error.php');
            }
        }
        break;

    case 'modify_contact':
        $contact = UserDB::getSiteContactInfo();
        if (isset($contact)) {
            $firstName = $contact['firstName'];
            $lastName = $contact['lastName'];
            $username = $contact['username'];
            $emailAddress = $contact['email'];
            $phone = $contact['phone'];
            include('../views/manager/mgn-contact.php');
        } else {
            $message = "Error, site user is not set.";
            include('../views/errors/error.php');
        }

        break;
    case 'update-contact':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone');

        if (empty($email)) {
            $message = "E-Mail address is Required. Enter in an e-mail address and try again. Remember, changing email address will change your login email too.";
            include('../views/errors/error.php');
        } else {
            UserDB::update_contact($firstName, $lastName, $username, $email, $phone);
            $R_message = "Contact information Successfully updated.";
            include('../views/manager/mgn_success.php');
        }
        break;
    case 'modify_users':
        //$users;
        include('../views/manager/mgn_users.php');
        break;
    
    
    case 'skills':
        $skills = get_skills();
        include('../views/manager/mgn-skills.php');
        break;
     case 'delete_skill':
        $sId = filter_input(INPUT_POST, 'skillID');
        delete_skill($sId);
        $skills = get_skills();
        include('../views/manager/mgn-skills.php');
        break;
    case 'modify_skills':
        
        $userID = $_SESSION['currentUser']->getID();
        $skilName = filter_input(INPUT_POST, 'skillName');
        $description = filter_input(INPUT_POST, 'description');
                
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
                if (!file_exists("../images/skills/")) {
                    mkdir("../images/skills/");
                }
                move_uploaded_file($file_tmp,  "../images/skills/" . $file_name);
                //echo "Success";
                add_skill($userID , $skilName,$description ,"../images/skills/" . $file_name);
                $R_message = "Skill Successfully uploaded.";
                //include('../views/manager/mgn_success.php');
                //todo - loop through images in dir and display file name on page
                $message = $file_name . " added.";
            } else {

                $message = "This file extension is not usable. Please try a different extension";
                include('../views/errors/error.php');
            }
        $skills = get_skills();
        include('../views/manager/mgn-skills.php');
        break; 
        }
}

//checks to see what page the user is on and sets the button as actie
function echoActiveClassIfRequestMatches($requestUri) {
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri) {
        echo 'class="active"';
    }
}
