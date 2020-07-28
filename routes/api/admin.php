<?php
// 前台接口路由定义部分
$api->group(['namespace'=>'App\Http\Controllers\Admin'],function ($api){
    $api->resource('admin','AdminController');
    $api->post('admin/signin','LoginController@signIn');     // 登录
    $api->post('admin/signout','LoginController@signOut');   // 退出登录
    $api->group(['middleware'=>['auth_admin'] ],function ($api){
        $api->post('admin/info','LoginController@getAdmininfo'); //获取用户信息等
    });
});