<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>
<main>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add Project</h1>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-10 col-sm-offset-1'>
          <div class='well'>
            <fieldset style="margin-top: 20px;">
                <form class="profile_form" action="../controllers/managerController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="upload_image">
                    <label for="image">Upload Resume: </label>
                    <input type="file" name="image" style="display: inline-block"/>
                    <input type="submit" value="Upload" class="btn btn-md btn-primary"/>
                </form>
            </fieldset>
            <h2><?php if (isset($message)) {
                  echo $confirm; } ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include '../views/shared/footer.php'; ?>