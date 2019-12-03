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

Route::get('/', function () {
    return view('welcome');
});



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::get('/sss', function (){
        echo '222';
    });
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


//接口路由
$api = app('Dingo\Api\Routing\Router');

// 将所有的 Exception 全部交给 App\Exceptions\Handler 来处理
app('api.exception')->register(function (Exception $exception) {
    $request = Illuminate\Http\Request::capture();
    return app('App\Exceptions\Handler')->render($request, $exception);
});


$api->version('v1', ['namespace' => 'App\Api\Controllers'], function ($api) {

    $api->get('member/{id}', 'MemberController@show');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
