<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        <div class="overflow-hidden rounded-lg bg-gray-800 shadow">

            <div class="border-b border-white/10 px-6 py-5">
                <h2 class="text-xl font-semibold text-white">
                    Personal Information
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    View the information connected to your gym account.
                </p>
            </div>

            <div class="px-6 py-6">

                <dl class="divide-y divide-white/10">

                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-400">
                            First Name
                        </dt>

                        <dd class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?= htmlspecialchars($user['given_name']) ?>
                        </dd>
                    </div>

                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-400">
                            Last Name
                        </dt>

                        <dd class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?= htmlspecialchars($user['family_name']) ?>
                        </dd>
                    </div>

                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-400">
                            Email Address
                        </dt>

                        <dd class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?= htmlspecialchars($user['email']) ?>
                        </dd>
                    </div>

                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-400">
                            Membership
                        </dt>

                        <dd class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?= htmlspecialchars(
                                    $user['membership_title'] ?? 'No membership selected'
                            ) ?>
                        </dd>
                    </div>

                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-400">
                            Member Since
                        </dt>

                        <dd class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?= date(
                                    'F j, Y',
                                    strtotime($user['created_at'])
                            ) ?>
                        </dd>
                    </div>

                </dl>

                <div class="mt-6 flex flex-wrap gap-3">

                    <a
                            href="<?= BASE_URL ?>/tier"
                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500"
                    >
                        View Membership
                    </a>

                    <a
                            href="<?= BASE_URL ?>/"
                            class="rounded-md bg-gray-700 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-600"
                    >
                        Return Home
                    </a>

                </div>

            </div>

        </div>

    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>