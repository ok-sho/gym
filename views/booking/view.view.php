<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8">
    <h2 class="text-5xl font-bold py-4 text-black"><?= $class['title'] ?> - <?= $class['length_in_minutes'] ?> mins</h2>
    <p class="text-black italic text-xl"><?= $class['description'] ?></p>
    <p class="text-black text-xl mt-4">Taught by: <a href="<?= BASE_URL ?>/instructors/view?id=<?= $class['instructor_id'] ?>" class="font-bold hover:underline"><?= $class['instructor_name'] ?></a></p>
    <br>
    <p class="text-black"><span class="font-semibold">Starts:</span> <?= $class['starts_at'] ?></p>
    <p class="text-black"><span class="font-semibold">Ends:</span> <?= $class['ends_at'] ?></p>
    <br>
    <div>
      <?php if($booked === false): ?>
     <a href="<?= BASE_URL ?>/appointments/create?id=<?= $id ?>" class="rounded-md bg-[#53796E] px-3 py-2 text-md font-semibold text-white hover:bg-[#426158] inline-block mt-4">Book this class </a>
    <?php else: ?>
      <p class="text-2xl font-bold">Good news!</p>
      <p class="text-l mb-4">You are already booked for this class.</p>
      <a href="<?= BASE_URL ?>/appointments" class="font-bold hover:underline">Go to My Bookings</a>
     <?php endif; ?>
    </div>
    
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>     