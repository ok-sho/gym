<?php
$router->get('/', 'controller/index.php');
$router->get('/history', 'controller/history.php');
$router->get('/instructors' , 'controller/instructors.php');

$router->get('/booking' , 'controller/booking/index.php');

// $router->delete('/books' , 'controller/books/destroy.php');

// $router->get('/books/create', 'controller/books/create.php');
// $router->post('/books/create', 'controller/books/store.php');

$router->get('/booking/view', 'controller/booking/view.php');

// $router->get('/books/edit' , 'controller/books/edit.php');
// $router->patch('/books/edit' , 'controller/books/edit_store.php');

$router->get('/signup', 'controller/registration/create.php');
$router->post('/signup', 'controller/registration/store.php');

$router->get('/login', 'controller/sessions/create.php');
$router->post('/login', 'controller/sessions/store.php');

$router->get('/account', 'controller/account/index.php');
$router->get('/tier', 'controller/account/tier.php');

$router->get('/logout', 'controller/sessions/destroy.php');


$routes = $router->getRoutes();
      
      $uri = parse_url(getUrl())['path'];
      $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
      /* short for
        if ($_POST['_method']){
          $method = $_POST['_method'];
        } else {
          $method = $_SERVER['REQUEST_METHOD'];
          }
      */

      foreach ($routes as $route){
        if ($route['uri'] === $uri && $route['method'] === strtoupper($method)){
            return require base_path($route['controller']);
        }
      } 
      abort();