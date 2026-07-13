<?php

// if (isset($_SESSION['user'])){
//   abort();
// }

$error = '';

view('sessions/create.view.php', [
  'errors' => $error,
]);

?>