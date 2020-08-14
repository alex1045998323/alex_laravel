<?php
// 后台接口路由定义部分
$api->group(['namespace'=>'App\Http\Controllers\Admin'],function ($api){
    $api->post('admin/signin','LoginController@signIn');     // 登录
    $api->post('admin/signout','LoginController@signOut');   // 退出登录
    $api->group(['middleware'=>['auth_admin'] ],function ($api){
        $api->post('admin/info','LoginController@getAdmininfo'); //获取用户信息
        $api->get('admin/export','AdminController@exportExcel'); //导出报表
        $api->resource('admin','AdminController');
    });
});