<?php

$user = [];
$error = [];

view('registration/create.view.php', [
  'user' => $user,
  'errors' => $error
]);

?>