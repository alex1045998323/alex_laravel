<?php

namespace App\Http\Controllers\Admin;
use App\Http\Services\Admin\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : LoginController
 *| CreateTime ：2020-07-28
 *| Notes      : 后台登录控制器
 *|--------------------------------------------------------------------------
 */
class LoginController extends \App\Http\Controllers\Common\BaseController
{
    public function __construct (LoginService $Service)
    {
        $this->Service = $Service;
    }

    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signIn(Request $request){
        return self::responseJson($this->Service->signIn($request));
    }

    /**
     * 退出登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signOut(Request $request){
        return self::responseJson($this->Service->signOut($request));
    }

    /**
     * 获取当前后台用户登录的信息
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAdminInfo(){
        return self::responseJson($this->Service->getAdminInfo());
    }
}
