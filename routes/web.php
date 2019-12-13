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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//接口路由
$api = app('Dingo\Api\Routing\Router');

// 将所有的 Exception 全部交给 App\Exceptions\Handler 来处理
app('api.exception')->register(function (Exception $exception) {
    $request = Illuminate\Http\Request::capture();
    return app('App\Exceptions\Handler')->render($request, $exception);
});


$api->version('v1', ['namespace' => 'App\Api\Controllers'], function ($api) {

    $api->get('member/{id}', 'MemberController@show');
    $api->post('member', 'MemberController@create');

//    jwt 系列
    $api->post('user/login', 'AuthController@login');  //登录授权
    $api->post('user/register', 'AuthController@register');
    $api->post('user/logout', 'AuthController@logout');
    $api->post('user/refresh', 'AuthController@refresh');
    $api->post('user/me', 'AuthController@me');
    $api->post('user/refreshTest', 'AuthController@refreshTest');
    $api->post('user/useTest', 'AuthController@useTest');
});

