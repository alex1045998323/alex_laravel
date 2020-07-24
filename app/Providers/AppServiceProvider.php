<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Route::resourceVerbs([
            'index'  => 'index',      // 显示列表页面模板                 /user
            'create' => 'create',     // 显示新增页面表单模板             /user/create
            'edit'   => 'edit',       // 根据id显示编辑页面模板           /user/{user_id}/edit
            'show'   => 'show',       // 根据id显示对应的数据 GET                /user/{user_id}

            'store'  => 'store',        // 新增数据            POST【新增】      /user
            'update' => 'update',     // 根据id修改对应的数据 PUT/PATCH【修改】   /user/{user_id}
            'destroy'=> 'destroy'     // 根据id删除数据      DELETE【删除】      /user/{user_id}
        ]);
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
