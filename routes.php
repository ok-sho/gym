<?php

use Core\Middleware\Middleware;

$router->get('/', 'controller/index.php')->only('auth');

$router->get('/instructors' , 'controller/instructors/index.php')->only('auth');
$router->get('/instructors/view' , 'controller/instructors/view.php')->only('auth');

// Weekly calendar and individual class views
$router->get('/booking' , 'controller/booking/index.php')->only('auth');
$router->get('/booking/view', 'controller/booking/view.php')->only('auth');

// CRUD for user's booked classes
$router->get('/appointments', 'controller/appointments/index.php')->only('auth');
$router->get('/appointments/create', 'controller/appointments/create.php')->only('auth');
$router->post('/appointments/create', 'controller/appointments/store.php')->only('auth');
$router->delete('/appointments/destroy', 'controller/appointments/destroy.php')->only('auth');

$router->get('/signup', 'controller/registration/create.php')->only('guest');
$router->post('/signup', 'controller/registration/store.php')->only('guest');

$router->get('/login', 'controller/sessions/create.php')->only('guest');
$router->post('/login', 'controller/sessions/store.php')->only('guest');

// CRUD for user's account info and membership
$router->get('/account', 'controller/account/index.php')->only('auth');
$router->get('/tier', 'controller/account/tier.php')->only('auth');
$router->post('/tier', 'controller/account/tier_store.php')->only('auth');

$router->get('/logout', 'controller/sessions/destroy.php')->only('auth');

// admin dashboard
$router->get('/admin', 'controller/admin/index.php')->only('admin');

$routes = $router->getRoutes();
      
      $uri = parse_url(getUrl())['path'];
      $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

      foreach ($routes as $route){
        if ($route['uri'] === $uri && $route['method'] === strtoupper($method)){
          Middleware::resolve($route['middleware']);
          return require base_path($route['controller']);
        }
      } 
      abort();