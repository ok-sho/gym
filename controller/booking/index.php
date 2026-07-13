<?php
redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');
$class_types = $db->getAll("SELECT id, title FROM class_types");
$class_choice = filter_input(INPUT_GET, 'class_choice');

$sql_base = "SELECT class_types.title, class_events.id, class_events.starts_at, class_events.ends_at, class_events.max_participants, concat(instructors.given_name,' ',instructors.family_name) as instructor_name FROM `class_events` INNER JOIN `class_types`ON class_events.class_type_id = class_types.id INNER JOIN `instructors` ON class_events.instructor_id = instructors.id";

if (isset($class_choice) && $class_choice != ""){
    $sql= "{$sql_base} WHERE class_type_id= :class_type_id";
    $params =['class_type_id' => $class_choice];
} else{
    $sql= $sql_base;
    $params =[];
}

$classes = $db->getAll($sql,$params);

view('booking/index.view.php', [
    'heading' => 'Upcoming classes',
    'class_types' => $class_types,
    'classes' => $classes, 
]);


