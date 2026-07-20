<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8">
    <h2 class="text-5xl font-bold py-4 text-white"><?= $class['title'] ?></h2>
    <p class="text-white"><?= $class['description'] ?></p>
    
    <br>
    <p class="text-white">Length in minutes: <?= $class['length_in_minutes'] ?></p>
    <br>
    <p class="text-white">Starts: <?= $class['starts_at'] ?></p>
    <p class="text-white">Ends: <?= $class['ends_at'] ?></p>
    <br>
    <p class="text-white">Max Participants: <?= $class['max_participants'] ?></p>
    <!-- <p class="py-4 italic text-white">Added by: <\?= $book['full_name'] ?></p> -->
     <a href="<?= BASE_URL ?>/appointments/create?id=<?= $id ?>" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 inline-block mt-4">Book this class </a>
     <br>
     <br>
     <p class="text-xl text-white">Taught by: <?= $class['instructor_name'] ?></p>
     <p class="text-xl text-white"><?= $class['bio'] ?></p>
     <img src="<?= BASE_URL . '/'. $class['profile_img_url']?>">
     
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>     