      <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="shrink-0">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
              </div>
              <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                  <?php if(isset($_SESSION['user'])): ?>
                    <a href="<?=  BASE_URL ?>/" class="rounded-md px-3 py-2 text-sm font-medium 
                  <?= urlIs('/') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>
                  ">Home</a>
                    <a href="<?=  BASE_URL ?>/instructors" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/instructors') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Instructors</a>
                    <a href="<?=  BASE_URL ?>/booking" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/booking') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Book a Class</a>
                    <a href="<?=  BASE_URL ?>/history" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/history') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Past Visits</a>
                  <?php endif ?>
                </div>
              </div>
            </div>
            <div class="hidden md:block">
              <?php if(isset($_SESSION['user'])): ?>
                <div class="ml-4 flex items-center md:ml-6">
                  <!-- Profile dropdown -->
                  <el-dropdown class="relative ml-3">
                    <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                      <span class="absolute -inset-1.5"></span>
                      <span class="sr-only">Open user menu</span>
                      <img src="<?= BASE_URL.'/assets/pokeball.jpg' ?>" alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                    </button>

                    <el-menu anchor="bottom end" popover class="mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                      <a href="<?= BASE_URL ?>/account" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Account Info</a>
                      <a href="<?= BASE_URL ?>/tier" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Gym Membership</a>
                      <a href="<?= BASE_URL ?>/logout" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Sign out</a>
                    </el-menu>
                  </el-dropdown>
                </div>

              <?php else: ?>
                <div class="flex items-center">
                  <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                      <a href="<?=  BASE_URL ?>/login" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/login') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Log In</a>
                      <a href="<?=  BASE_URL ?>/signup" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/signup') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Sign Up</a>
                    </div>
                  </div>
                </div>
              <?php endif ?>
            </div>
            <div class="-mr-2 flex md:hidden">
              <!-- Mobile menu button -->
              <button type="button" command="--toggle" commandfor="mobile-menu" id="menu-btn" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                  <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                  <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <el-disclosure id="mobile-menu" hidden class="block md:hidden hidden">
          <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
            <?php if(isset($_SESSION['user'])): ?>
            <a href="<?=  BASE_URL ?>/" class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Home</a>
            <a href="<?=  BASE_URL ?>/instructors" class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/instructors') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Instructors</a>
            <a href="<?=  BASE_URL ?>/booking" class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/booking') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Book a Class</a>
            <a href="<?=  BASE_URL ?>/history" class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/history') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Past Visits</a>
            <?php endif ?>
          </div>
          <div class="border-t border-white/10 pt-4 pb-3">
            <?php if(isset($_SESSION['user'])): ?>
            <div class="flex items-center px-5">
              <div class="shrink-0">
                <img src="<?= BASE_URL.'/assets/pokeball.jpg' ?>" alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
              </div>
              <div class="ml-3">
                <div class="text-base/5 font-medium text-white"><?= $_SESSION['user']['full_name'] ?></div>
                <div class="text-sm font-medium text-gray-400"><?= $_SESSION['user']['email'] ?></div>
              </div>
            </div>
            <?php endif ?>
            <div class="mt-3 space-y-1 px-2">
              <?php if(isset($_SESSION['user'])): ?>
              <a href="<?= BASE_URL ?>/account" class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/account') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Your Account</a>
              <a href="<?= BASE_URL ?>/tier" class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/tier') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Gym Membership</a>
              <a href="<?= BASE_URL ?>/logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Sign Out</a>
              <?php else: ?>
              <a href="<?=  BASE_URL ?>/login" class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/login') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Log In</a>
              <a href="<?=  BASE_URL ?>/signup" class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/signup') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Sign Up</a>
              <?php endif ?>
            </div>
          </div>
        </el-disclosure>
      </nav>

<?php 
echo "
<script>
  const menuBtn = document.getElementById('menu-btn');
  const menu = document.getElementById('mobile-menu');

  menuBtn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>
"

?>