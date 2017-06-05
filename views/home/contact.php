<?php include '../views/shared/header.php'; ?>
<main class="container text-center card">
    <p>Contact Information:</p>
  <p><?php echo htmlspecialchars($contact['email']); ?></p>
  <p><?php echo htmlspecialchars($contact['phone']); ?></p>  
</main>
<?php include '../views/shared/footer.php'; ?>
