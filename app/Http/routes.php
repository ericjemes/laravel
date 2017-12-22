<?php

/*
|--------------------------------------------------------------------------
| Application Routes gg
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Page\IndexController@home');
Route::get('login', 'Page\IndexController@login')->name('login');
Route::get('logout', 'Page\IndexController@logout')->name('logout');

Route::get('register', 'Page\IndexController@register')->name('register');

Route::get('welcome', 'Page\IndexController@welcome')->name('welcome');


Route::group(['prefix' => '/'], function ($router) {
    $router->group(['middleware' => ['CheckLogin']], function ($router) {
        $router->get('home', 'Page\IndexController@home')->name('home');

        //User
        $router->get('user/list', 'Page\UserController@lists')->name('user.lists');
        $router->get('user/profile', 'Page\UserController@profile')->name('user.profile');
        $router->get('user/add', 'Page\UserController@add')->name('user.add');
        $router->get('user/show/{id}', 'Page\UserController@show')->name('user.show');
        $router->get('user/update/{id}', 'Page\UserController@update')->name('user.update');
        $router->get('user/alignRole/{id}', 'Page\UserController@alignRole')->name('role.alignRole');
        $router->get('user/headImage', 'Page\UserController@headImage')->name('user.headImage');

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
        $router->get('role/alignMenu/{id}', 'Page\RoleController@alignMenu')->name('role.alignMenu');

        //coach
        $router->get('coach/list', 'Page\CoachController@lists')->name('coach.list');


    });
});



Route::group(['prefix' => 'ajax'], function ($router) {
    $router->group(['middleware' => ['CheckLogin']], function ($router) {
        //User
        $router->post('user/delete/{id}', 'Manage\UserController@delete');
        $router->post('user/add', 'Manage\UserController@add');
        $router->post('user/update', 'Manage\UserController@update');
        //menu
        $router->post('menu/delete/{id}', 'Manage\MenuController@delete');
        $router->post('menu/add', 'Manage\MenuController@add');
        $router->post('menu/update', 'Manage\MenuController@update');

        //role
        $router->post('role/delete/{id}', 'Manage\RoleController@delete');
        $router->post('role/add', 'Manage\RoleController@add');
        $router->post('role/update', 'Manage\RoleController@update');
    });
    //user ajax
    $router->post('register', 'Manage\UserController@register');
    $router->post('login', 'Manage\UserController@login');
});




