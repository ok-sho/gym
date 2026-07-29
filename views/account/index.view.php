<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-xl border border-[#53796E] bg-[#426158] shadow">

                <div class="border-b border-[#53796E] px-6 py-5">
                    <h2 class="text-xl font-semibold text-white">
                        Personal Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-200">
                        View or update the information connected to your gym account.
                    </p>
                </div>

                <form
                        method="POST"
                        action="<?= BASE_URL ?>/account"
                        class="px-6 py-6"
                >

                    <input type="hidden" name="_method" value="PATCH">

                    <div class="space-y-6">

                        <div>
                            <label
                                    for="given_name"
                                    class="block text-sm font-medium text-gray-300"
                            >
                                First Name
                            </label>

                            <input
                                    id="given_name"
                                    name="given_name"
                                    type="text"
                                    value="<?= htmlspecialchars($user['given_name']) ?>"
                                    class="mt-2 block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500"
                            >

                            <?php if (!empty($error['given_name'])): ?>
                                <p class="mt-2 text-sm text-red-400">
                                    <?= htmlspecialchars($error['given_name']) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label
                                    for="family_name"
                                    class="block text-sm font-medium text-gray-300"
                            >
                                Last Name
                            </label>

                            <input
                                    id="family_name"
                                    name="family_name"
                                    type="text"
                                    value="<?= htmlspecialchars($user['family_name']) ?>"
                                    class="mt-2 block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500"
                            >

                            <?php if (!empty($error['family_name'])): ?>
                                <p class="mt-2 text-sm text-red-400">
                                    <?= htmlspecialchars($error['family_name']) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label
                                    for="email"
                                    class="block text-sm font-medium text-gray-300"
                            >
                                Email Address
                            </label>

                            <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="<?= htmlspecialchars($user['email']) ?>"
                                    class="mt-2 block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500"
                            >

                            <?php if (!empty($error['email'])): ?>
                                <p class="mt-2 text-sm text-red-400">
                                    <?= htmlspecialchars($error['email']) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="border-t border-white/10 pt-6">

                            <p class="text-sm text-gray-200">
                                Membership
                            </p>

                            <p class="mt-1 text-sm text-white">
                                <?= htmlspecialchars(
                                        $user['membership_title']
                                        ?? 'No membership selected'
                                ) ?>
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-200">
                                Member Since
                            </p>

                            <p class="mt-1 text-sm text-white">
                                <?= date(
                                        'F j, Y',
                                        strtotime($user['created_at'])
                                ) ?>
                            </p>
                        </div>

                    </div>

                    <div class="mt-8 flex flex-wrap gap-3">

                        <button
                                type="submit"
                                class="rounded-md border border-[#C8B18A] bg-[#F6E7C8] px-4 py-2 text-sm font-semibold text-[#426158] transition hover:bg-[#EAD8B3]"
                        >
                            Update Account
                        </button>

                        <a
                                href="<?= BASE_URL ?>/tier"
                                class="rounded-md border border-[#C8B18A] bg-[#F6E7C8] px-4 py-2 text-sm font-semibold text-[#426158] transition hover:bg-[#EAD8B3]"
                        >
                            View Membership
                        </a>

                        <a
                                href="<?= BASE_URL ?>/"
                                class="rounded-md border border-[#C8B18A] bg-[#F6E7C8] px-4 py-2 text-sm font-semibold text-[#426158] transition hover:bg-[#EAD8B3]"
                        >
                            Return Home
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>