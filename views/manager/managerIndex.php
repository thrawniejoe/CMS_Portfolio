<?php include '../views/shared/header_backend.php'; ?>
<?php include '../views/shared/sidebar.php'; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard - <?php echo htmlspecialchars($_SESSION['currentUser']->getUsername());?></h1>
          <?php include_once("../analyticstracking.php"); ?>
        </div>
      </div>
    </div>
<?php include '../views/shared/footer.php'; ?>
