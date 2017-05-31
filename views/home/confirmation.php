<?php include '../views/shared/header.php'; ?>

<main class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <form action="../controllers/homeController.php" method="post">
            <input type="hidden" name="action" value="registration">
            <fieldset>
                <legend>Thank you for registering</legend>
      
                <label class="confirm_label"><?php echo $firstName; ?></label>
                <label class="confirm_label"><?php echo $lastName; ?></label><br>
                <label class="confirm_label"><?php echo $username; ?></label><br>         
                <label class="confirm_label"><?php echo $email; ?></label><br><br>
                
                <div class="message"><?php echo $confirm; ?></div><br>

                <input type="submit" value="Return to Registration" class="btn btn-lg btn-primary btn-block">
            </fieldset>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
</main>
<?php include '../views/shared/footer.php'; ?>
