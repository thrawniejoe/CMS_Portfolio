
<?php include '../views/shared/header.php'; ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
  </script>
<main class="container">
   
 
  <div class="well well-sm">
        <strong>Projects</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>

    <div id="categories-list" class="row list-group">
      <?php foreach ($projects as $project) : ?>
        
    <div id="products" class="row list-group">
        <div class="item col-xs-4 col-lg-4 list-group-item">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?php echo htmlspecialchars($project['display_picture']); ?>" alt="" />
              <div class="pSkills">
                              <?php $projectSkills = get_projectSkills($project['id']);
                                foreach($projectSkills as $proSkill) { ?>
                                <img src=<?php echo htmlspecialchars($proSkill['skill_picture']); ?> style="height:32px;width:32px;" />
                              <?php } ?>
                          </div>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <?php echo htmlspecialchars($project['projectName']); ?></h4>
                    <p class="group inner list-group-item-text">
                        <?php echo htmlspecialchars($project['description']); ?></p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <form action="../controllers/homeController.php" method="POST" enctype="multipart/form-data">
                                <input type='hidden' name='project_code' value=<?php echo htmlspecialchars($project['id']); ?>>
                                <input type="hidden" name="action" value="projectDetails">
                                <input type="submit" value="Select" class="btn btn btn-success"/>
                            </form>
                            
                          
                        </div>             
                    </div>
                        <div class="row">

                        </div>  
                </div>
            </div>
        </div>
  </div>
    <?php endforeach; ?>
  </div>
</main>
<?php include '../views/shared/footer.php'; ?>