<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>
<main>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add Skill</h1>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-10 col-sm-offset-1'>
          <div class='well'>

            <fieldset style="margin-top: 20px;">
                <form class="profile_form" action="../controllers/managerController.php" method="POST" enctype="multipart/form-data">
                  <div class='form-group'>
                    <label for='github'>skill_name</label>
                    <input type='text' name='skillName' class='form-control' />
                  </div>
                  <div class='form-group'>
                    <label for='demo'>description</label>
                    <input type='text' name='description' class='form-control' />
                  </div>                                  
                    <input type="hidden" name="action" value="modify_skills">
                    <label for="image">Upload skill picture: </label>
                    <input type="file" name="image" style="display: inline-block"/>
                    <input type="submit" value="Upload" class="btn btn-md btn-primary"/>
                </form>
            </fieldset>
            <h2><?php if (isset($message)) {
                  echo $message; } ?></h2>
          </div>
        </div>
      </div>
        
        <h2>Current Skills</h2>
        <table class="table">
          <tr class="panel-heading">
            <th>Name</th>
            <th>Description</th>
            <th>Image Link</th>
            <th>&nbsp;</th>
          </tr>
          <?php foreach ($skills as $skill) : ?>
          <tr>
            <td>
              <img src=<?php echo htmlspecialchars($skill['skill_picture']); ?> style="height:64px;width:64px;" />
            </td>
            <td>
              <?php echo htmlspecialchars($skill['skill_name']); ?>
            </td>
            <td>
              <?php echo htmlspecialchars($skill['description']); ?>
            </td>
            <td>
              <form action="../controllers/managerController.php" method="post">
                <input type='hidden' name='skillID' value=<?php echo htmlspecialchars($skill['id']); ?>>
                <input type="hidden" name="action" value="delete_skill">
                <input class="btn btn-default" type="submit" value="delete">
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
        
        
        
    </div>
  </div>
</main>
<?php include '../views/shared/footer.php'; ?>