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

use App\Attribute;
use App\Content;
use App\Group;
use App\Media;
use App\Setting;
use Illuminate\Support\Facades\Response;

function svg($icon, $classes = '')
{
    $path = public_path() . '/unicons/svg/' . $icon . '.svg';
    $svgContent = file_exists($path) ? file_get_contents($path) : '';

    return '<span class="uim-svg '. $classes .'">' . $svgContent . '</span>';
}

/**
 * Pass data to api or view based on URL scheme
 */
function frontend($path, $data = []) {
    return request()->is('api/*') ? $data : view($path, $data);
}

Route::get('/', function () {
    return view('welcome');
});

Route::group(['as' => 'dashboard', 'prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::resources([
        '/' => 'DashboardController',
        'users' => 'UserController',
        'roles' => 'RoleController',
        'content' => 'ContentController',
        'attributes' => 'AttributeController',
        'media' => 'MediaController',
        'extensions' => 'ExtensionController'
    ]);

    Route::post('media/upload', 'MediaController@upload');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {
    $test = ['foo', 'bar', 'baz'];

    $actionName = $test[0];

    array_shift($test);

    dd($test);
});
