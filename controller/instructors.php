<?php 
redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');
$instructors = $db->getAll("SELECT id, concat(given_name,' ',family_name) AS instructor_name, bio, profile_img_url FROM instructors");


view('instructors.view.php', [
  'heading' => 'Meet Your Instructors',
  'instructors' => $instructors,
  ]);
