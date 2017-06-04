<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>
<main>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add Project</h1>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-10 col-sm-offset-1'>
          <div class='well'>
            <form  action="../controllers/managerController.php" method="POST"  enctype="multipart/form-data">
              <input type="hidden" name="action" value="add_project_toDB">
              <div class='row'>
                <div class='col-sm-4'>
                  <div class='form-group'>
                    <label for='pname'>Project Name</label>
                    <input type='text' name='pname' class='form-control' value="<?php if (!isset($pname)) {$pname = " ";} echo $pname;?>" <?php if (isset($autofocus[ 'firstName'])) {echo $autofocus[ 'firstName'];} ?>><br>
                    <span style="color:red"><?php if (isset($message['pname'])) {echo $message['pname'];} ?></span>
                  </div>
                  <div class='form-group'>
                    <label for='github'>GitHub Link</label>
                    <input type='text' name='github' class='form-control' />
                  </div>
                  <div class='form-group'>
                    <label for='demo'>Demo Site</label>
                    <input type='text' name='demo' class='form-control' />
                  </div>
                  <div class='form-group'>
                    <label for='file'>add main pic</label>
                    <input type='file' name='image' class='form-control' />
                  </div>
                </div>
                <div class='col-sm-8'>
                  <div class='form-group'>
                    <label for='message'>Project Description</label>
                    <textarea class='form-control' name='message' rows='10'></textarea>
                  </div>
                  <div class='text-right'>
                    <input type='submit' class='btn btn-primary' value='Submit' />
                  </div>
                </div>
              </div>
            </form>
            <h2><?php if (isset($message)) {
                  echo $confirm; } ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include '../views/shared/footer.php'; ?>