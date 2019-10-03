<?php
//include __DIR__ . '/../functions.php';

$routes = [
     "/" => 'app/controller/territory.php',
    "/register" =>'app/view/home.php',
    "/show" => 'app/view/profile.php',
    "/allUsers" => 'app/view/allusers.php',
    "/getRegions" => 'app/controller/territory.php',
    "/getAreas" => 'app/controller/territory.php',
    "/registerUser" => 'app/controller/register.php',
    "/profile" =>'app/view/profile.php',
];

$route = $_SERVER['REQUEST_URI'];

$get_param = stripos($route, '?');//использование функция strpos ( поиск вхождения одной строки в другую) при сопоставлении роута и url'a;
if($get_param !== false){
    $route = substr($route, 0, $get_param);
}
if(array_key_exists($route, $routes)) {
    require_once __DIR__ . '/../'. $routes[$route];
    die;
} else {
    require_once __DIR__ . '/../app/view/404.php';
}



/*if(array_key_exists($route, $routes)){
 include __DIR__ . '/../' . $routes[$route] ;
  exit;
}else{
  dd(404);
}
*/
?>