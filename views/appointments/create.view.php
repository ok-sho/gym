<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

/*popup for when user tries to book a class that is already full*/
<?php if (!empty($_SESSION['flash_error'])): ?>
  <script>
    alert(<?= json_encode($_SESSION['flash_error']) ?>);
  </script>
  <?php unset($_SESSION['flash_error']); ?>
<?php endif; ?>

<main>
<div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8">
 <h2 class="text-5xl font-bold py-4 text-white"><?= $class['title'] ?></h2>
    <p class="text-white">Starts: <?= $class['starts_at'] ?></p>
    <p class="text-white">Ends: <?= $class['ends_at'] ?></p>
    <br>
    <p class="text-white">Instructor: <?= $class['instructor_name'] ?></p>
    <p class="text-white">Spots taken: <?= $spots_taken ?> / <?= $class['max_participants'] ?></p>
    <br>
/*Calls our is_full func and shows confirm booking button if class is not full, otherwise shows a message that the class is full */
    <?php if ($is_full): ?>
      <p class="text-red-500 text-xl">Sorry, this class is full.</p>
    <?php else: ?>
      <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $class['id'] ?>">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">
          Confirm Booking
        </button>
      </form>
    <?php endif; ?>
</div>
</main>

<?php require base_path('views/partials/footer.php'); ?>