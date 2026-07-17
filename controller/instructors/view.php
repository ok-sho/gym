<?php
redirect_if_not_logged_in();

$id= filter_input(INPUT_GET, 'id');
$params =['id' => $id];

$db = $container->resolve('Core\Database');
$instructor = $db->getOne("SELECT id, concat(given_name,' ',family_name) AS instructor_name, bio, profile_img_url FROM instructors WHERE instructors.id = :id", $params);
$classes = $db->getAll("SELECT class_instructors.instructor_id, class_types.title FROM class_instructors INNER JOIN class_types ON class_instructors.class_type_id = class_types.id WHERE class_instructors.instructor_id = :id", $params);


view('instructors/view.view.php', [
    'heading' => "Instructor Details",
    'instructor' => $instructor,
    'classes' => $classes,
]);



