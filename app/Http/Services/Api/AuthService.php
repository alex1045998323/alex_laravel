<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : AuthService
 *| CreateTime ：10:06
 *| Notes      : 类说明
 *|--------------------------------------------------------------------------
 */

namespace App\Http\Services\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthService extends \App\Http\Services\Common\BaseService
{
    public $repository;
    public function __construct (\App\Http\Repositories\UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 登录
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function login(Request $request){
        $user = $this->repository->scopeQuery(function ($q){
            return $q->where('phone','=','15522222222');
        })->first();
        if (!$token = Auth::guard('api')->login($user)) return V(0,'系统错误，无法生成令牌');
        return V(1,'登录成功',['token'=>$token]);
    }

    /**
     * 退出登录成功
     * @return array
     */
    public function logout(){
        Auth::guard('api')->logout();
        return V(1,'退出成功');
    }

    /**
     * 更新用户token
     * @return array
     */
    public function refreshToken()
    {
        if (!$token = Auth::guard('api')->refresh(true, true)) return V('5000','系统错误，无法生成令牌');
        return V('1','刷新成功',[
            'access_token'=>$token,
            'expires_in'=>strval(time() + 86400)
        ]);
    }

    /**
     * 登录后返回用户数据
     * @return array
     */
    public function me()
    {
        return V(1,'获取成功',Auth::guard('api')->user());
    }
}