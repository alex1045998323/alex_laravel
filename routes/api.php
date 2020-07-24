<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');
$api->version(['v1'], function ($api) {
    $api->group(['namespace'=>'App\Http\Controllers\Api'],function ($api){
        $api->post('login','AuthController@login');
        $api->post('logout','AuthController@logout');
        $api->resource('code-list','CodeListController');

        $api->group(['middleware'=>['auth'] ],function ($api){
            $api->post('refresh','AuthController@refreshToken');
            $api->post('me','AuthController@me');
        });
    });
});
