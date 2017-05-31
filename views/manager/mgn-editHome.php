<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>
<main>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Modify Homepage</h1>
		<div class='container'>
			<div class='row'>
				<div class='col-sm-10 col-sm-offset-1'>
					<div class='well'>
						<?php foreach ($frontPage as $page) : ?>
						<form class="profile_form" action="../controllers/managerController.php" method="post">
							<input type="hidden" name="action" value="edit_project_DB">
							<div class='row'>
								<div class='col-sm-4'>
									<div class='form-group'>
										<label for='Header'>Header</label>
										<input type='text' name='Header' class='form-control' value=<?php echo htmlspecialchars($page['HomePage_Header']); ?>>
									</div>
									<div class='form-group'>
										<label for='HomeUsername'>Home Username</label>
										<input type='text' name='gitHub' class='form-control' value=<?php echo htmlspecialchars($page['HomePage_Username']); ?>>
									</div>
								</div>
								<div class='col-sm-8'>
									<div class='form-group'>
										<label for='HomePage_Paragraph_1'>HomePage_Paragraph_1</label>
										<textarea class='form-control' name='description' rows='10'><?php echo htmlspecialchars($page['HomePage_Paragraph_1']); ?></textarea>
									</div>
									<div class='form-group'>
										<label for='HomePage_Paragraph_2'>HomePage_Paragraph_2</label>
										<textarea class='form-control' name='description' rows='10'><?php echo htmlspecialchars($page['HomePage_Paragraph_2']); ?></textarea>
									</div>
									<div class='text-right'>
										<input type='submit' class='btn btn-primary' value='Submit' />
									</div>
									<?php endforeach; ?>
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