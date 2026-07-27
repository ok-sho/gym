<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
<main>
  <div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="text-black text-xl mb-8">Welcome back, gym-goer <?= $_SESSION['user']['full_name'] ?>!</p>

    <?php if ($next_class): ?>
      <p class="text-black mb-8">Your next class: <strong><?= $next_class['title'] ?></strong> on <?= $next_class['starts_at'] ?></p>
    <?php else: ?>
      <p class="text--300 mb-8">No upcoming classes booked.</p>
    <?php endif; ?>



    <div class="flex gap-6 flex-wrap">
      <a href="<?= BASE_URL ?>/account" class="w-48 px-6 py-4 border border-[#53796E] bg-[#426158] rounded-xl hover:-translate-y-3 transition duration-300 ease-in-out text-center">
        <p class="text-white font-bold">Account Info</p>
      </a>
      <a href="<?= BASE_URL ?>/tier" class="w-48 px-6 py-4 border border-[#53796E] bg-[#426158] rounded-xl hover:-translate-y-3 transition duration-300 ease-in-out text-center">
        <p class="text-white font-bold">Gym Membership</p>
      </a>
      <a href="<?= BASE_URL ?>/appointments" class="w-48 px-6 py-4 border border-[#53796E] bg-[#426158] rounded-xl hover:-translate-y-3 transition duration-300 ease-in-out text-center">
        <p class="text-white font-bold">My Bookings</p>
      </a>
      <a href="<?= BASE_URL ?>/booking" class="w-48 px-6 py-4 border border-[#53796E] bg-[#426158] rounded-xl hover:-translate-y-3 transition duration-300 ease-in-out text-center">
        <p class="text-white font-bold">Book a Class</p>
      </a>
    </div>

    <div class="border border-[#53796E] bg-[#426158] rounded-xl px-6 py-4 mt-10">
  <p class="text-white font-bold text-lg mb-2">Gym News</p>
  <p class="text-gray-200">New Sumo Slam sessions with Thro added this month, bring your A game! Also Boxing for Beginners now runs twice a week.</p> 
      <br>  
  <p class="text-white font-bold text-lg mb-2">Monthly Specials</p>
  <p class="text-gray-200">Get 20% off your next personal training session and free membership for the month!</p>
      <br>  
  <p class="text-white font-bold text-lg mb-2">PSA</p>
  <p class="text-gray-200">Remember to bring your own water bottle and towel to each session.</p> 
</div>

  </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>