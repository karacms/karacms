<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
function svg($icon)
{
    $path = public_path() . '/unicons/svg/' . $icon . '.svg';
    return file_exists($path) ? file_get_contents($path) : '';
}

Route::get('/', function () {
    return view('welcome');
});

Route::group(['as' => 'dashboard', 'prefix' => 'dashboard'], function () {
    Route::resources([
        'users' => 'UserController',
        'roles' => 'RoleController'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
