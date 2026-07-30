<?php

use Core\Validator;

$db = $container->resolve('Core\Database');
$user=[];
$error=[];

$user['givenName'] = filter_input(INPUT_POST,'givenName');
if (!Validator::textVal($user['givenName'],1,225)){
      $error['givenName']="Given Name must be between 1 and 225 characters";
}
$user['familyName'] = filter_input(INPUT_POST,'familyName');
if (!Validator::textVal($user['familyName'],1,225)){
      $error['familyName']="Family Name must be between 1 and 225 characters";
}
$user['email'] = filter_input(INPUT_POST,'email');
if (!Validator::emailVal($user['email'])){
      $error['email']="Email is not valid";
}
$user['password'] = filter_input(INPUT_POST,'password');
if (!Validator::passwordVal($user['password'])){
      $error['password']="Password must be between 1 and 225 characters";
}
$user['rePassword'] = filter_input(INPUT_POST,'rePassword');
if (!Validator::passwordVal($user['rePassword'])){
      $error['rePassword']="Password must be between 1 and 225 characters";
}

if ($user['password'] != $user['rePassword']){
      $error['rePassword'] = $error['password'] = "Passwords do not match";
}

$checkEmail = $db->getOne("select * from users where email = :email", ["email"=>$user['email']]);
if($checkEmail){
      $error['email']="An account with this email already exists";
}

if (empty($error)){
      try {
            $userID = $db->insertData("INSERT INTO users (given_name, family_name, email, password) 
            VALUES (:givenName, :familyName, :email, :password)", [
                  'givenName' => $user['givenName'],
                  'familyName' => $user['familyName'],
                  'email' => $user['email'],
                  'password' => password_hash($user['password'], PASSWORD_BCRYPT),
            ]);
            header ("location: ./");
            exit;
      } catch (PDOException $e){
            echo "error: ".$e->getMessage();
      }
}

view('registration/create.view.php', [
      'user' => $user,
      'error' =>$error,
]);
