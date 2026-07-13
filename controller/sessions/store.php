<?php
use Core\Validator;

$error='';

$email = filter_input(INPUT_POST,'email');
if (!Validator::emailVal($email)){
      $error .= "Please enter a valid email address. ";
}
$password = filter_input(INPUT_POST,'password');
if (!Validator::textVal($password,7,225)){
      $error .= "Please enter a valid password. ";
}

$db = $container->resolve('Core\Database');

$user = $db->getOne("select * from users where email = :email", ["email"=>$email]);

if(!$user){
      $error .= "The email is not associated with an account. ";
}

if (!password_verify($password, $user['password']) ) {
      $error .= "Credentials do not match.";
}

if (empty($error)){
      login($email);
      header("location: ./");
      exit;
}
 
view('sessions/create.view.php', [
      'error' =>$error,
]);
