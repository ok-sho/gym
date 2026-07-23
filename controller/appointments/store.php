<?php 
redirect_if_not_logged_in();

$id = filter_input(INPUT_POST, 'id');
$db = $container->resolve('Core\Database');

$user = $db->getOne("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['user']['email']]);
$userId = $user['id'];

try {
    $db->insertData("INSERT INTO member_bookings (class_event_id, user_id) 
    VALUES (:class_event_id, :user_id)", [
        'class_event_id' => $id,
        'user_id' => $userId,
    ]);
    header("location: " . BASE_URL . "/appointments");
    exit;
//idk if this is best way to show an error message if class is already booked 
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        $_SESSION['flash_error'] = "You've already booked this class.";
    } else {
        $_SESSION['flash_error'] = "Something went wrong: " . $e->getMessage();
    }
    header("location: " . BASE_URL . "/appointments/create?id=" . $id);
    exit;
}