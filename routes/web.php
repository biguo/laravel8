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

//接口路由
$api = app('Dingo\Api\Routing\Router');
$api->version('v1',  ['namespace' => 'App\Api\Controllers'], function ($api) {

    $api->get('member/{id}', 'MemberController@show');
});
