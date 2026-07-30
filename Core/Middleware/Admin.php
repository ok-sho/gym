<?php

namespace Core\Middleware;

class Admin {
  public function handle() {
    if (!isset($_SESSION['user'])) {
      header('location: '.BASE_URL.'/login');
      exit();
    }

    if (!($_SESSION['user']['is_admin'] ?? false)) {
      header('location: '.BASE_URL.'/');
      exit();
    }
  }
}