<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>
<main>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Modify Homepage</h1>
		<div class='container'>
			<div class='row'>
				<div class='col-sm-10 col-sm-offset-1'>
					<div class='well'>
						<form class="profile_form" action="../controllers/managerController.php" method="post">
							<input type="hidden" name="action" value="update_homepage">
							<div class='row'>
								<div class='col-sm-4'>
									<div class='form-group'>
										<label for='header'>Header</label>
										<input type='text' name='header' class='form-control' value='<?php echo htmlspecialchars($frontPage['HomePage_Header']); ?>'>
									</div>
									<div class='form-group'>
										<label for='homeUser'>User display name</label>
										<input type='text' name='homeUser' class='form-control' value='<?php echo htmlspecialchars($frontPage['HomePage_Username']); ?>'>
									</div>
								</div>
								<div class='col-sm-8'>
									<div class='form-group'>
										<label for='HomePage_Paragraph_1'>Top Paragraph</label>
										<textarea class='form-control' name='paragraph1' rows='10'><?php echo htmlspecialchars($frontPage['HomePage_Paragraph_1']); ?></textarea>
									</div>
									<div class='form-group'>
										<label for='HomePage_Paragraph_2'>Bottom Paragraph</label>
										<textarea class='form-control' name='paragraph2' rows='10'><?php echo htmlspecialchars($frontPage['HomePage_Paragraph_2']); ?></textarea>
									</div>
									<div class='text-right'>
										<input type='submit' class='btn btn-primary' value='Submit' />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include '../views/shared/footer.php'; ?>