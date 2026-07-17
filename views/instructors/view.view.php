<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-12 py-8 sm:px-6 lg:px-8">
    <img class="size-60 rounded-3xl outline -outline-offset-1 outline-white/10" src="<?= BASE_URL . '/'. $instructor['profile_img_url']?>">
    <h2 class="text-5xl font-bold py-4 text-white"><?= $instructor['instructor_name'] ?></h2>
    <p class="text-white"><?= $instructor['bio'] ?></p>
    
    <br>
    <p class="text-white font-bold">Classes Taught:</p>
    <ul class="list-disc list-inside">
      <?php foreach ($classes as $class):  ?>
      <li class="text-white"><?= $class['title'] ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>     