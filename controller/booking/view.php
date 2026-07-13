<?php
redirect_if_not_logged_in();

$id= filter_input(INPUT_GET, 'id');

$sql = "SELECT class_types.title, class_types.description, class_types.length_in_minutes, class_events.starts_at, class_events.ends_at, class_events.max_participants, concat(instructors.given_name,' ',instructors.family_name) as instructor_name, instructors.profile_img_url, instructors.bio FROM `class_events` INNER JOIN `class_types` ON class_events.class_type_id = class_types.id INNER JOIN `instructors` ON class_events.instructor_id = instructors.id WHERE class_events.id = :id";
$params =['id' => $id];

$db = $container->resolve('Core\Database');
$class = $db->getOne($sql, $params);

view('booking/view.view.php', [
    'heading' => "Class Details",
    'class' => $class
]);



