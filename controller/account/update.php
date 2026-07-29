<?php

redirect_if_not_logged_in();

use Core\Validator;

$db = $container->resolve('Core\Database');

$user = [];
$error = [];

$user['given_name'] = trim(filter_input(INPUT_POST, 'given_name') ?? '');
$user['family_name'] = trim(filter_input(INPUT_POST, 'family_name') ?? '');
$user['email'] = trim(filter_input(INPUT_POST, 'email') ?? '');

if (!Validator::textVal($user['given_name'], 1, 225)) {
    $error['given_name'] = 'First name must be between 1 and 225 characters.';
}

if (!Validator::textVal($user['family_name'], 1, 225)) {
    $error['family_name'] = 'Last name must be between 1 and 225 characters.';
}

if (!Validator::emailVal($user['email'])) {
    $error['email'] = 'Please enter a valid email address.';
}

$emailOwner = $db->getOne(
    "SELECT id
     FROM users
     WHERE email = :email
     AND email != :current_email",
    [
        'email' => $user['email'],
        'current_email' => $_SESSION['user']['email']
    ]
);

if ($emailOwner) {
    $error['email'] = 'An account with this email already exists.';
}

if (!empty($error)) {
    $currentUser = $db->getOne(
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

    $currentUser['given_name'] = $user['given_name'];
    $currentUser['family_name'] = $user['family_name'];
    $currentUser['email'] = $user['email'];

    return view('account/index.view.php', [
        'heading' => 'Account Information',
        'user' => $currentUser,
        'error' => $error
    ]);
}

$db->runQuery(
    "UPDATE users
     SET given_name = :given_name,
         family_name = :family_name,
         email = :email
     WHERE email = :current_email",
    [
        'given_name' => $user['given_name'],
        'family_name' => $user['family_name'],
        'email' => $user['email'],
        'current_email' => $_SESSION['user']['email']
    ]
);

$_SESSION['user']['email'] = $user['email'];
$_SESSION['user']['full_name'] =
    $user['given_name'] . ' ' . $user['family_name'];

header('location: ' . BASE_URL . '/account');
exit;
