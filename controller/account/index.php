<?php

redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');

$user = $db->getOne(
    "SELECT 
        users.id,
        users.given_name,
        users.family_name,
        users.email,
        users.created_at,
        membership_tiers.title AS membership_title
     FROM users
     LEFT JOIN membership_tiers
        ON users.membership_tier_id = membership_tiers.id
     WHERE users.email = :email",
    [
        'email' => $_SESSION['user']['email']
    ]
);

authorize($user, 'Account could not be found.');

view('account/index.view.php', [
    'heading' => 'Account Information',
    'user' => $user , 
    'error' => []
]);