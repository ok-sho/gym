<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <div class="mb-8 rounded-md bg-[#426158] border border-[#53796E] p-6">

                <h2 class="text-2xl font-bold text-white">
                    Current Membership
                </h2>

                <?php if ($user['membership_tier_id']): ?>

                    <h3 class="mt-4 text-xl font-semibold text-white">
                        <?= htmlspecialchars($user['title']) ?>
                    </h3>

                    <p class="mt-2 text-white">
                        <?= htmlspecialchars($user['description']) ?>
                    </p>

                    <p class="mt-2 text-gray-300">
                        Gym Access:
                        <?= $user['gym_access'] ? 'Included' : 'Not Included' ?>
                    </p>

                    <p class="text-gray-300">
                        Free Classes Per Month:
                        <?= htmlspecialchars($user['classes_per_month']) ?>
                    </p>

                <?php else: ?>

                    <p class="mt-4 text-white">
                        You do not currently have a membership.
                    </p>

                <?php endif; ?>

            </div>

            <h2 class="mb-5 text-2xl font-bold text-[#426158]">
                Choose a Membership
            </h2>

            <div class="grid gap-6 md:grid-cols-3">

                <?php foreach ($membership_tiers as $tier): ?>

                    <div class="rounded-md bg-[#426158] border border-[#53796E] p-6">

                        <h3 class="text-xl font-bold text-white">
                            <?= htmlspecialchars($tier['title']) ?>
                        </h3>

                        <p class="mt-3 text-white">
                            <?= htmlspecialchars($tier['description']) ?>
                        </p>

                        <p class="mt-4 text-gray-300">
                            Gym Access:
                            <?= $tier['gym_access'] ? 'Included' : 'Not Included' ?>
                        </p>

                        <p class="text-gray-300">
                            Free Classes:
                            <?= htmlspecialchars($tier['classes_per_month']) ?> per month
                        </p>

                        <form method="POST" action="<?= BASE_URL ?>/tier">

                            <input
                                    type="hidden"
                                    name="membership_tier_id"
                                    value="<?= $tier['id'] ?>"
                            >

                            <button
                                    type="submit"
                                    class="rounded-md border border-[#C8B18A] bg-[#F6E7C8] px-4 py-2 text-sm font-semibold text-[#426158] transition hover:bg-[#EAD8B3]"
                            >
                                <?php if ($user['membership_tier_id'] == $tier['id']): ?>
                                    Current Membership
                                <?php else: ?>
                                    Select Membership
                                <?php endif; ?>
                            </button>

                        </form>

                    </div>

                <?php endforeach; ?>

            </div>

            <?php if ($user['membership_tier_id']): ?>

                <div class="mt-8">

                    <form
                            method="POST"
                            action="<?= BASE_URL ?>/tier"
                            onsubmit="return confirm('Are you sure you want to cancel your membership?');"
                    >

                        <input
                                type="hidden"
                                name="membership_tier_id"
                                value="cancel"
                        >

                        <button
                                type="submit"
                                class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500"
                        >
                            Cancel Membership
                        </button>

                    </form>

                </div>

            <?php endif; ?>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>