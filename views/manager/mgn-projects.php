<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>
<main>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard - <?php echo $_SESSION['currentUser']->getUsername();?></h1>
          
        
  <div class="container">
    <div class="panel panel-default buffer">
      <div class="panel-body">
        <form action="../controllers/managerController.php" method="post">
                <input type="hidden" name="action" value="add_project">
                <input class="btn btn-success" type="submit" value="Add Project">
        </form>
        <h2>Select Project</h2>
        <table class="table">
          <tr class="panel-heading">
            <th>Name</th>
            <th>Description</th>
            <th>Image Link</th>
            <th>&nbsp;</th>
          </tr>
          <?php foreach ($projects as $project) : ?>
          <tr>
            <td>
              <?php echo htmlspecialchars($project['projectName']); ?>
            </td>
            <td>
              <?php echo htmlspecialchars($project['description']); ?>
            </td>
            <td>
              <?php echo htmlspecialchars($project['sampleSite_Link']); ?>
            </td>
            <td>
              <form action="../controllers/managerController.php" method="post">
                <input type='hidden' name='project_code' value=<?php echo htmlspecialchars($project['id']); ?>>
                <input type="hidden" name="action" value="edit_project">
                <input class="btn btn-default" type="submit" value="modify">
              </form>
            </td>
            <td>
              <form action="../controllers/managerController.php" method="post">
                <input type="hidden" name="action" value="delete_project">
                <input class="btn btn-default" type="submit" value="delete">
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>
</main>
<?php include '../views/shared/footer.php'; ?>
