<?php include '../views/shared/header.php'; ?>
<div class="container-fluid bg-1 text-center">
    <div class="row">
        <div class="col-md-4" id="pictureBox">
        	<img src="../images/selfie.jpg" class="img-circle" alt="Joe Velasquez">
        </div>
        <div class="col-md-4">
        	<div id="Info">
          <h1><?php echo htmlspecialchars($content['HomePage_Username']); ?></h1>
                      <h4><p><?php echo htmlspecialchars($content['HomePage_Header']); ?></p></h4>
                      <p><?php echo htmlspecialchars($content['HomePage_Paragraph_1']); ?></p>

                      <p><?php echo htmlspecialchars($content['HomePage_Paragraph_2']); ?></p>
          </div>
        </div>
        <div class="col-md-4">
		</div>
    </div>
</div>
<div class="container-fluid bg-1 text-center">
	<div class="row">
    	<div >
          <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>CONTACT ME</button>
      </div>
    </div>
</div>
<div class="container-fluid bg-1 text-center">
	<div class="row">
    	<div class="linkBtns">
          <img src="../images/Facebook_logo_icon.png" alt="Facebook" height="35" width="35">
          <img src="../images/b2ap3_thumbnail_google-plus-icon.png" alt="Google Plus" height="35" width="35">
          <img src="../images/LinkedIn_logo_initials.png" alt="Linkin" height="35" width="35">
      </div>
    </div>
	<?php
	foreach (array_chunk($skills, 5, true) as $array) {
    echo '<div class="row">';
    foreach($array as $skill) { ?>
         <img src=<?php echo htmlspecialchars($skill['skill_picture']); ?> style="height:64px;width:64px;" />
  <?php  
	}
    echo '</div>';
} 
	?>
<?php include '../views/shared/footer.php'; ?>
