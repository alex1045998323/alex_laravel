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
use Illuminate\Support\Facades\Artisan;
Route::get('/Artisan/AlexCreate/{module}/{name}',function ($module,$name){
    // 自动创建 controller
    Artisan::call('make:AlexController', [
        'name' => $module.'\\'.$name
    ]);
    // 自动创建 Service
    Artisan::call('make:AlexService', [
        'name' => $module.'\\'.$name
    ]);
    // 自动创建 model
    Artisan::call('make:AlexModel', [
        'name' => $name
    ]);
    // 自动创建 Repository
    Artisan::call('make:AlexRepository', [
        'name' => $name
    ]);
    // 自动创建 Validator
    Artisan::call('make:AlexValidator', [
        'name' => $name
    ]);
});
