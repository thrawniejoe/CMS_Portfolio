<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <li <?=echoActiveClassIfRequestMatches("managerController.php?action=manager_home")?>><a href="?action=manager_home">Overview <span class="sr-only">(current)</span></a></li>
        <li <?=echoActiveClassIfRequestMatches("managerController.php?action=project_list")?>><a href="?action=project_list">Modify Projects</a></li>
        <li><a href="https://analytics.google.com">Analytics</a></li>
        <li><a href="#">Export</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li <?=echoActiveClassIfRequestMatches("managerController.php?action=modify_homepage")?>><a href="?action=modify_homepage">Modify Homepage</a></li>
        <li <?=echoActiveClassIfRequestMatches("managerController.php?action=modify_users")?>><a href="?action=modify_users">Users</a></li>
        <li <?=echoActiveClassIfRequestMatches("managerController.php?action=modify_resume")?>><a href="?action=modify_resume">Change Resume</a></li>
        <li <?=echoActiveClassIfRequestMatches("managerController.php?action=modify_contact")?>><a href="?action=modify_contact">Edit Contact Info</a></li>
      </ul>
    </div>
  </div>
</div>
    
