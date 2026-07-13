<!-- display custom message stored in session data if there is one -->
<?php if (!empty($_SESSION['flash_error'])): ?>
  <p><?= htmlspecialchars($_SESSION['flash_error']) ?></p>
  <?php unset($_SESSION['flash_error']); ?>
  <!-- otherwise just show the standard message -->
  <?php else: ?>
    <p>Page does not exist</p>
<?php endif; ?>

