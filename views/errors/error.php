<?php include '../views/shared/header_backend.php'; ?>
<?php //include '../views/shared/sidebar.php'; ?>
<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Error</h2>
        <img src="../images/error.png">
        <h3></h3>
        <p style="font-size:20px;color:#5C5C5C;"><?php echo htmlspecialchars($message); ?></p>
        <a href="" class="btn btn-success">Back to dashboard</a>
    <br><br>
        </div>
	</div>
</div>
<?php include '../views/shared/footer.php'; ?>