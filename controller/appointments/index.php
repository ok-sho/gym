<?php
redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');

$user = $db->getOne("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['user']['email']]);
$userId = $user['id'];

$sql = "SELECT member_bookings.id, class_events.id as class_event_id, class_events.starts_at, class_events.ends_at, class_types.title,concat(instructors.given_name,' ',instructors.family_name) as instructor_name 
FROM member_bookings INNER JOIN class_events ON member_bookings.class_event_id = class_events.id INNER JOIN class_types ON class_events.class_type_id = class_types.id INNER JOIN instructors 
ON class_events.instructor_id = instructors.id WHERE member_bookings.user_id = :user_id";
$params = ['user_id' => $userId];

$bookings = $db->getAll($sql, $params);

view('appointments/index.view.php', [
    'heading' => 'My Bookings',
    'bookings' => $bookings,
]);