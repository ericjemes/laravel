<?php
//Menu
$router->post('menu/delete/{id}', 'Ajax\MenuController@delete');
$router->post('menu/add', 'Ajax\MenuController@add');
$router->post('menu/update', 'Ajax\MenuController@update');

//Role
$router->post('role/delete/{id}', 'Ajax\RoleController@delete');
$router->post('role/add', 'Ajax\RoleController@add');
$router->post('role/update', 'Ajax\RoleController@update');

//User
$router->post('user/delete/{id}', 'Ajax\UserController@delete');
$router->post('user/add', 'Ajax\UserController@add');
$router->post('user/update', 'Ajax\UserController@update');

//Token
$router->post('token/delete/{id}', 'Ajax\TokenController@delete');
$router->post('token/add', 'Ajax\TokenController@add');
$router->post('token/update', 'Ajax\TokenController@update');

//Book
$router->post('book/delete/{id}', 'Ajax\BookController@delete');
$router->post('book/add', 'Ajax\BookController@add');
$router->post('book/update', 'Ajax\BookController@update');
