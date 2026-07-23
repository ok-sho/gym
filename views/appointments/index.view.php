<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <?php foreach ($bookings as $booking): ?>
    <div class="border border-gray-600 bg-gray-700 rounded-xl px-6 py-4 mb-4">
     <p class="text-white text-xl font-bold"><?= $booking['title'] ?></p>
     <p class="text-white">Starts: <?= $booking['starts_at'] ?></p>
     <p class="text-white">Ends: <?= $booking['ends_at'] ?></p>
     <p class="text-white">Instructor: <?= $booking['instructor_name'] ?></p>
        <div class="mt-4 flex gap-4">
         <form method="POST" action="<?= BASE_URL ?>/appointments/destroy">
        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
         <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="redirect_to" value="booking"><button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500"> Reschedule </button>
</form>
          <form method="POST" action="<?= BASE_URL ?>/appointments/destroy">
            <input type="hidden" name="id" value="<?= $booking['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500">  Cancel    </button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>

    <?php if (empty($bookings)): ?>
      <p class="text-white">You have no upcoming bookings.</p>
    <?php endif; ?>

  </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>