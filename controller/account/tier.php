<<<<<<< Updated upstream
<?php

redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');

$user = $db->getOne(
    "SELECT users.id,
            users.membership_tier_id,
            membership_tiers.title,
            membership_tiers.description,
            membership_tiers.gym_access,
            membership_tiers.classes_per_month
     FROM users
     LEFT JOIN membership_tiers
        ON users.membership_tier_id = membership_tiers.id
     WHERE users.email = :email",
    [
        'email' => $_SESSION['user']['email']
    ]
);

$membership_tiers = $db->getAll(
    "SELECT id,
            title,
            description,
            gym_access,
            classes_per_month
     FROM membership_tiers"
);

view('account/tier.view.php', [
    'heading' => 'Gym Membership',
    'user' => $user,
    'membership_tiers' => $membership_tiers
]);