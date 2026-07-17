<?php 
function vdd($value) {
  echo "<pre>";
  var_dump ($value);
  echo "</pre>";
  die();
}

function getUrl() {
  return str_replace("/gym", "", $_SERVER['REQUEST_URI']); 
}

function urlIs($value) {
  return getUrl()===$value; 
}

function abort($value=404, $message = null ) {
  // store error message in session data 
  // so it persists through different HTTP requests
  if ($message) {
        $_SESSION['flash_error'] = $message;
    }
  http_response_code($value);
  require "views/{$value}.php";
  die();
}

function test_input($data) {
  $data= trim($data);
  $data= stripslashes($data);
  return $data = htmlspecialchars($data);
}

function authorize($condition, $message = null, $status=404){
  if (!$condition){
    abort($status, $message);
  }
  return true;
}

function login (string $email, string $name): void {
  $_SESSION['user'] = ['email' => $email,'full_name' => $name,];
  session_regenerate_id(true);
}

function logout (){
  $_SESSION = [];
  session_destroy();
  $params = session_get_cookie_params();
  setcookie('PHPSESSID', '', time()-3600, $params['path'], $params['domain']);
}

function redirect_if_not_logged_in() {
  if (!isset($_SESSION['user'])){
    header('location: '.BASE_URL.'/login');
    exit();
  }
}

function redirect_if_logged_in() {
  if (isset($_SESSION['user'])){
    header('location: '.BASE_URL.'/books');
    exit();
  }
}