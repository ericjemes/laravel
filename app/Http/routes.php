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
        include_once app_path() . '/Http/Route/Page/routes.php';
    });
});



Route::group(['prefix' => 'ajax'], function ($router) {
    $router->group(['middleware' => ['CheckLogin']], function ($router) {
        include_once app_path() . '/Http/Route/Ajax/routes.php';
    });
    //user ajax
    $router->post('register', 'Ajax\UserController@register');
    $router->post('login', 'Ajax\UserController@login');
});




