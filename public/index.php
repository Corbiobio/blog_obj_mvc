<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new BlogObjMvc\Router($_SERVER["REQUEST_URI"]);

//home
$router->get('/', "BlogController@index");

//get page for user
$router->get('/login/', "UserController@showLogin");
$router->get('/register/', "UserController@showRegister");
$router->get('/logout/', "UserController@logout");
//get page for post
$router->get('/dashboard/', "BlogController@showAllPost");
$router->get('/dashboard/nouveau/', "BlogController@showCreate");
$router->get('/dashboard/:post/delete', "BlogController@deletePost");
$router->get('/dashboard/:post/update', "BlogController@showUpdate");


//post page for user
$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");
//post page for post
$router->post('/dashboard/nouveau/', "BlogController@createPost");
$router->post('/dashboard/:post/update', "BlogController@updatePost");





// $router->post('/dashboard/task/nouveau', "TaskController@store");
// $router->post('/dashboard/:todo/task/:task/delete/', "TaskController@delete");
// $router->post('/dashboard/:todo/task/:task', "TaskController@update");
// $router->post('/dashboard/:todo/task/:task/check', "TaskController@check");
// $router->post('/dashboard/:todo/', "TodoController@update");
// $router->post('/dashboard/:todo/delete/', "TodoController@delete");

$router->run();
