<?php
// 前台接口路由定义部分
$api->group(['namespace'=>'App\Http\Controllers\Api'],function ($api){
    $api->post('login','AuthController@login');
    $api->post('logout','AuthController@logout');
    $api->resource('code-list','CodeListController');
    $api->resource('test','TestController');
    $api->group(['middleware'=>['auth'] ],function ($api){
        $api->post('refresh','AuthController@refreshToken');
        $api->post('me','AuthController@me');
    });
});
