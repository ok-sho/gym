<?php

redirect_if_logged_in();

$user = [];
$error = [];

view('registration/create.view.php', [
  'user' => $user,
  'errors' => $error
]);

?>