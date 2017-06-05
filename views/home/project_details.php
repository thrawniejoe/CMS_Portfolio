<?php include '../views/shared/header.php'; ?>
<main>

    <div class="container">
        <?php foreach ($selectedProject as $project) : ?>
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">

                                <div class="tab-pane active" id="pic-1"><img src="<?php echo htmlspecialchars($project['display_picture']); ?>" /></div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">

                                <?php
                                foreach (array_chunk($projectPictures, 5, true) as $array) {
                                    foreach ($array as $pics) {
                                        ?>

                                        <li><a data-target="#pic-2" data-toggle="tab"><img src=<?php echo htmlspecialchars($pics['image_file']); ?> /></a></li>
                                        <?php
                                    }
                                }
                                ?>

                            </ul>

                        </div>

                        <div class="details col-md-6">
                            <h3 class="product-title"><?php echo htmlspecialchars($project['projectName']); ?></h3>
                            <p class="product-description"><?php echo htmlspecialchars($project['description']); ?></p>
                            <h5 class="colors">Languages Used:
                                <div class="pSkills">
                                    <?php //$projectSkills = get_projectSkills($project['id']);
                                    foreach ($projectSkills as $proSkill) {
                                        ?>
                                        <img src=<?php echo htmlspecialchars($proSkill['skill_picture']); ?> style="height:32px;width:32px;" />
    <?php } ?>
                                </div>
                                                              <!--<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                                                              <span class="color green"></span>
                                                              <span class="color blue"></span>-->
                            </h5>
                            <div class="action">
                                <a href="<?php echo htmlspecialchars($project['github_Link']);  ?>"><button class="like btn btn-default" type="button">GitHub<span class="fa fa-heart"></span></button></a>
                                <a href="<?php echo htmlspecialchars($project['sampleSite_Link']);  ?>"><button class="like btn btn-default" type="button">Sample Site<span class="fa fa-heart"></span></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach;?>
    </div>
</main>
<?php include '../views/shared/footer.php'; ?>
