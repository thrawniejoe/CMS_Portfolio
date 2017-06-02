<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>
<main>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Modify Project</h1>
		<div class='container'>
			<div class='row'>
				<div class='col-sm-10 col-sm-offset-1'>
					<div class='well'>
						<?php foreach ($selectedProject as $project) : ?>
						<form class="profile_form" action="../controllers/managerController.php" method="post">
							<input type="hidden" name="action" value="edit_project_DB">
							<input type="hidden" name="project_code" value="<?php echo htmlspecialchars($project['id']); ?>">
							<div class='row'>
								<div class='col-sm-4'>
									<div class='form-group'>
										<label for='projectName'>Project Name</label>
										<input type='text' name='projectName' class='form-control' value='<?php echo htmlspecialchars($project['projectName']); ?>'>
									</div>
									<div class='form-group'>
										<label for='gitHub'>Git Hub Link</label>
										<input type='text' name='gitHub' class='form-control' value='<?php echo htmlspecialchars($project['github_Link']); ?>'>
									</div>
									<div class='form-group'>
										<label for='sample'>Sample Site Link</label>
										<input type='text' name='sample' class='form-control' value='<?php echo htmlspecialchars($project['sampleSite_Link']); ?>'>
									</div>
								</div>
								<div class='col-sm-8'>
									<div class='form-group'>
										<label for='description'>Description</label>
										<textarea class='form-control' name='description' rows='10'><?php echo htmlspecialchars($project['description']); ?></textarea>
									</div>
									<div class='text-right'>
										<input type='submit' class='btn btn-primary' value='Submit' />
									</div>
									<?php endforeach; ?>
								</div>
							</div>
						</form>
						<fieldset style="margin-top: 20px;">
                <form class="profile_form" action="../controllers/managerController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="upload_image">
                    <label for="image">Add Picture: </label>
                    <input type="file" name="image" style="display: inline-block"/>
                    <input type="submit" value="Upload" class="btn btn-md btn-primary"/>
                </form>
            </fieldset>

            <h2><?php if (isset($message)) {
    echo $confirm;
} ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include '../views/shared/footer.php'; ?>