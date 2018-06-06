<?php

//Menu
$router->get('menu/list', 'Page\MenuController@lists')->name('menu.list');
$router->get('menu/add', 'Page\MenuController@add')->name('menu.add');
$router->get('menu/show/{id}', 'Page\MenuController@show')->name('menu.show');
$router->get('menu/update/{id}', 'Page\MenuController@update')->name('menu.update');

//Role
$router->get('role/list', 'Page\RoleController@lists')->name('role.list');
$router->get('role/add', 'Page\RoleController@add')->name('role.add');
$router->get('role/show/{id}', 'Page\RoleController@show')->name('role.show');
$router->get('role/update/{id}', 'Page\RoleController@update')->name('role.update');
$router->get('role/align/{id}', 'Page\RoleController@align')->name('role.align');

//User
$router->get('user/list', 'Page\UserController@lists')->name('user.list');
$router->get('user/add', 'Page\UserController@add')->name('user.add');
$router->get('user/show/{id}', 'Page\UserController@show')->name('user.show');
$router->get('user/update/{id}', 'Page\UserController@update')->name('user.update');

//Token
$router->get('token/list', 'Page\TokenController@lists')->name('token.list');
$router->get('token/add', 'Page\TokenController@add')->name('token.add');
$router->get('token/show/{id}', 'Page\TokenController@show')->name('token.show');
$router->get('token/update/{id}', 'Page\TokenController@update')->name('token.update');

//Book
$router->get('book/list', 'Page\BookController@lists')->name('book.list');
$router->get('book/add', 'Page\BookController@add')->name('book.add');
$router->get('book/show/{id}', 'Page\BookController@show')->name('book.show');
$router->get('book/update/{id}', 'Page\BookController@update')->name('book.update');
