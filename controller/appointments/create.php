<?php 
redirect_if_not_logged_in();

$id = filter_input(INPUT_GET, 'id');

// Get class event details and class type information as well as instructor info
$sql = "SELECT class_events.id, class_events.starts_at, class_events.ends_at, class_events.max_participants, class_types.title, concat(instructors.given_name,' ',instructors.family_name) as instructor_name 
FROM class_events INNER JOIN class_types ON class_events.class_type_id = class_types.id INNER JOIN instructors ON class_events.instructor_id = instructors.id WHERE class_events.id = :id";

$params = ['id' => $id];

$db = $container->resolve('Core\Database');
$class = $db->getOne($sql, $params);

// Get the number of spots taken for this class event
$spots_taken = $db->getOne("SELECT COUNT(*) as total FROM member_bookings WHERE class_event_id = :id", $params);
// Sees if max spots are taken for the class event
$is_full = $spots_taken['total'] >= $class['max_participants'];

view('appointments/create.view.php', [
    'heading' => "Confirm Booking",
    'class' => $class,
    'spots_taken' => $spots_taken['total'],
    'is_full' => $is_full
]);