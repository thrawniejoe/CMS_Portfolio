<?php include '../views/shared/header.php'; ?>
<div class="container-fluid">

  <form class="form-signin card" action="../controllers/homeController.php" method="post">
    <input type="hidden" name="action" value="login_to_profile">
    <h1>Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <br>   
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</div> <!-- /container -->
<?php include '../views/shared/footer.php'; ?>
