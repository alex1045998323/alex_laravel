<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : CodeListController
 *| CreateTime ：15:44
 *| Notes      : 类说明
 *|--------------------------------------------------------------------------
 */

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;

class AuthController extends \App\Http\Controllers\Common\BaseController
{
    public function __construct (\App\Http\Services\Api\AuthService $Service)
    {
        $this->Service = $Service;
    }

    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        return response()->json($this->Service->login($request));
    }

    /**
     * 退出登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(){
        return response()->json($this->Service->logout());
    }

    /**
     * 更新用户Token
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken()
    {
        return response()->json($this->Service->refreshToken());
    }

    /**
     * 登录后返回用户数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->Service->me());
    }

}