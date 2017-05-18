<?php 

$action = filter_input(INPUT_POST, 'action');
$actionGet = filter_input(INPUT_GET, 'action');

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_to_profile';
    }
}

switch ($action) {
    case 'login_to_profile':
        include('../views/manager/managerIndex.php');
        break;
  case 'project_list':
        include('../views/manager/mgn-projects.php');
        break;
}
