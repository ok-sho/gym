<?php

namespace Core\Middleware;

class Guest {
  public function handle(){
    if (isset($_SESSION['user'])) {
      header('location: '.BASE_URL.'/books');
      exit();
    }
  }
}