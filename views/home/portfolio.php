<?php include '../views/shared/header.php'; ?>
<main class="buffer">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="panel panel-default buffer">
      <div class="panel-body">
        <h2>Select Project</h2>


        <!-- display a table of technicians -->
        <table class="table">
          <tr class="panel-heading">
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
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
              <form action="." method="post">
                <input type="hidden" name="action" value="get_project">
                <input type="submit" value="Select">
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
  <div class="col-sm-3"></div>
</main>
<?php include '../views/shared/footer.php'; ?>