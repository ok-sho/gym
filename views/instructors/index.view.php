<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 dark:text-white">
      <div class="flex gap-6 pt-4 flex-wrap">
        <?php foreach ($instructors as $instructor): ?>
        <a href="./instructors/view?id=<?= $instructor['id'] ?>" class="w-fit max-w-screen px-6 py-4 pt-6 border border-gray-600 bg-gray-700 flex-wrap shrink-0  rounded-xl hover:-translate-y-3 transition duration-300 ease-in-out hover:underline">
          <img class="size-40 rounded-full outline -outline-offset-1 outline-white/10 m-auto" src="<?= BASE_URL . '/'. $instructor['profile_img_url']?>">
          <p class="mt-4 m-auto w-fit px-2 py-2  font-bold text-white "><?= $instructor['instructor_name'] ?></p>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
<?php require base_path('views/partials/footer.php'); ?>    