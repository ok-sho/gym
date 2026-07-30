<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            <div class="mb-6 rounded-xl border bg-[#426158] p-6">

                <h2 class="text-2xl font-bold text-white">
                    Welcome Admin
                </h2>

                <p class="mt-2 text-gray-100">
                    Upcoming Member Bookings:
                </p>

            </div>

            <div class="overflow-hidden rounded-xl border bg-[#53796E]">

                <table class="min-w-full">

                    <thead class="bg-[#426158]">

                    <tr>
                        <th class="px-5 py-4 text-left text-white">Member</th>
                        <th class="px-5 py-4 text-left text-white">Email</th>
                        <th class="px-5 py-4 text-left text-white">Class</th>
                        <th class="px-5 py-4 text-left text-white">Instructor</th>
                        <th class="px-5 py-4 text-left text-white">Starts</th>
                    </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($bookings as $booking): ?>

                        <tr class="border-t border-[#F7C664]">

                            <td class="px-5 py-4 text-white">
                                <?= htmlspecialchars($booking['given_name'] . ' ' . $booking['family_name']) ?>
                            </td>

                            <td class="px-5 py-4 text-gray-100">
                                <?= htmlspecialchars($booking['email']) ?>
                            </td>

                            <td class="px-5 py-4 text-white">
                                <?= htmlspecialchars($booking['class_title']) ?>
                            </td>

                            <td class="px-5 py-4 text-gray-100">
                                <?= htmlspecialchars($booking['instructor_name']) ?>
                            </td>

                            <td class="px-5 py-4 text-gray-100">
                                <?= date('M j, Y g:i A', strtotime($booking['starts_at'])) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if (empty($bookings)): ?>

                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-white">
                                No bookings found.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>