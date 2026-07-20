<?php
redirect_if_not_logged_in();
$id = filter_input(INPUT_POST, 'id');
$redirect_to = filter_input(INPUT_POST, 'redirect_to');
$db = $container->resolve('Core\Database');
$user = $db->getOne("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['user']['email']]);
$userId = $user['id'];
$db->runQuery("DELETE FROM member_bookings WHERE id = :id AND user_id = :user_id", ['id' => $id,'user_id' => $userId,]);
if ($redirect_to === 'booking') {
    header("location: " . BASE_URL . "/booking");
} else {
    header("location: " . BASE_URL . "/appointments");
}
exit;
