<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>
<main class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card">
            
          
            <h3 class="text-center" >Update Contact Information</h3>
            <form class="profile_form" action="../controllers/managerController.php" method="post">
                <input type="hidden" name="action" value="update-contact">
                <fieldset>
                    <legend>Enter your information here</legend>
                    <label for="firstName">First Name: </label>
                    <input type="text" name="firstName" class="form-control" value="<?php if (!isset($firstName)) {$firstName = "";} echo $firstName;?>" <?php if (isset($autofocus['firstName'])) {echo $autofocus['firstName'];} ?>><br>
                    <span style="color:red"><?php if (isset($message['firstName'])) {echo $message['firstName'];} ?></span>

                    <label for="lastName" >Last Name: </label>
                    <input type="text" name="lastName" class="form-control" value="<?php if (!isset($lastName)) {$lastName = "";} echo $lastName;?>" <?php if (isset($autofocus['lastName'])) {echo $autofocus['lastName'];} ?>><br>
                    <span style="color:red"><?php if (isset($message['lastName'])) {echo $message['lastName'];} ?></span>

                    <label for="alias">Username: </label>
                    <input type="text" name="username" class="form-control" value="<?php if (!isset($alias)) {$username = "";} echo $username;?>" <?php if (isset($autofocus['username'])) {echo $autofocus['username'];} ?>><br>
                    <span style="color:red"><?php if (isset($message['username'])) {echo $message['username'];} ?></span>

                    <label for="email">Email Address: </label>
                    <input type="email" name="email" class="form-control" value="<?php if (!isset($emailAddress)) {$emailAddress = "";} echo $emailAddress;?>" <?php if (isset($autofocus['emailAddress'])) {echo $autofocus['emailAddress'];} ?>><br>
                    <span style="color:red"><?php if (isset($message['email'])) {echo $message['email'];} ?></span>

                    <label for="phone">Phone Number: </label>
                    <input type="phone" name="phone" class="form-control" value="<?php if (!isset($phone)) {$phone = "";} echo $phone;?>" <?php if (isset($autofocus['phone'])) {echo $autofocus['phone'];} ?>><br>
                    <span style="color:red"><?php if (isset($message['phone'])) {echo $message['phone'];} ?></span>
                    <input type="submit" value="update" class="btn btn-lg btn-primary btn-block">
                    <!--<label for="picture_upload">Profile Picture: </label>-->            
<!--                    <div class="message"><?php if (!isset($message)) {$message = "";} echo $message;?></div>-->
                </fieldset>
            </form>
            </div>
        </div>
        <div class="col-md-3"></div>
        </div>        
</main>       
<?php include '../views/shared/footer.php'; ?>