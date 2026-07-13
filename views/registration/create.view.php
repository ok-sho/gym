<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <form method="POST" action="">
      <div class="space-y-12">
        
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Sign Up</h2>
          <h3 class="mt-5 text-center text-2xl/9 tracking-tight text-white">Create a New Account</h3>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <div>
            <label for="givenName" class="block text-sm/6 font-medium text-white">Given Name</label>
            <div class="mt-2">
              <input id="givenName" value="<?= $user['givenName'] ?? '' ?>" type="text" name="givenName" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              <p class="text-red-500 text-xs"><?= $error['givenName'] ?? '' ?></p>
            </div>
          </div>

          <div>
            <label for="familyName" class="block text-sm/6 font-medium text-white">Family Name</label>
            <div class="mt-2">
              <input id="familyName" value="<?= $user['familyName'] ?? '' ?>" type="text" name="familyName" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              <p class="text-red-500 text-xs"><?= $error['familyName'] ?? '' ?></p>
            </div>
          </div>

          <div>
            <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
            <div class="mt-2">
              <input id="email" value="<?= $user['email'] ?? '' ?>" type="text" name="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              <p class="text-red-500 text-xs"><?= $error['email'] ?? '' ?></p>
            </div>
          </div>

          <div>
            <label for="password" class="block text-sm/6 font-medium text-white">Password</label>
            <div class="mt-2">
              <input id="password" value="" type="password" name="password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              <p class="text-red-500 text-xs"><?= $error['password'] ?? '' ?></p>
            </div>
          </div>

          <div>
            <label for="rePassword" class="block text-sm/6 font-medium text-white">Confirm Password</label>
            <div class="mt-2">
              <input id="rePassword" value="" type="password" name="rePassword" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              <p class="text-red-500 text-xs"><?= $error['rePassword'] ?? '' ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-center gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
      </div>

      <p class="mt-5 text-center text-sm/6 text-gray-100">
        Already have an account?  
        <a href="<?= BASE_URL ?>/login" class="font-semibold text-indigo-400 hover:text-white">Log in</a>
      </p>

    </form>
  
  </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>     