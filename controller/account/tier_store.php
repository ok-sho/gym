<?php

redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');

$membership_tier_id = filter_input(INPUT_POST, 'membership_tier_id');

if ($membership_tier_id === 'cancel') {
    $membership_tier_id = null;
} else {
    $membership_tier = $db->getOne(
        "SELECT id FROM membership_tiers WHERE id = :id",
        [
            'id' => $membership_tier_id
        ]
    );

    if (!$membership_tier) {
        abort(404, 'Membership tier could not be found.');
    }
}

$db->runQuery(
    "UPDATE users
     SET membership_tier_id = :membership_tier_id
     WHERE email = :email",
    [
        'membership_tier_id' => $membership_tier_id,
        'email' => $_SESSION['user']['email']
    ]
);

header('location: ' . BASE_URL . '/tier');
exit;
