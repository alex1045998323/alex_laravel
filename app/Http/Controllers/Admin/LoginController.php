<?php

namespace App\Http\Controllers\Admin;
use App\Http\Services\Admin\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : LoginController
 *| CreateTime ：2020-07-29
 *| Notes      : 后台用户登录部分接口
 *|--------------------------------------------------------------------------
 */
class LoginController extends \App\Http\Controllers\Common\BaseController
{
    public function __construct (LoginService $Service)
    {
        $this->Service = $Service;
    }

    /**
     * showdoc
     * @catalog 接口文档/后台部分/登录
     * @title 管理员登录
     * @description 登录API
     * @method post
     * @url /api/admin/signin
     * @header Accept 必选 string application/vnd.alex_laravel.v1+json
     * @param username 必选 string 用户名
     * @param password 必选 string 密码
     * @return {"code":1,"msg":"登录成功","data":{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g"}}
     * @return_param username string 用户昵称
     * @return_param password string 密码
     * @remark 这里是备注信息
     * @number 1
     */
    public function signIn(Request $request){
        return self::responseJson($this->Service->signIn($request));
    }
    /**
     * showdoc
     * @catalog 接口文档/后台部分/登录
     * @title 管理员退出登录
     * @description 管理员退出登录API
     * @method post
     * @url /api/admin/signout
     * @header Accept 必选 string application/vnd.alex_laravel.v1+json
     * @header Authorization 必选【登录成功的token】 string Bearer空格token
     * @return {"code":1,"msg":"退出成功","data":{}}
     * @remark 这里是备注信息
     * @number 2
     */
    public function signOut(Request $request){
        return self::responseJson($this->Service->signOut($request));
    }
    /**
     * showdoc
     * @catalog 接口文档/后台部分/登录
     * @title 管理员信息
     * @description 管理员信息API
     * @method post
     * @url /api/admin/info
     * @header Accept 必选 string application/vnd.alex_laravel.v1+json
     * @header Authorization 必选 string Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g
     * @return {"code":1,"msg":"获取成功","data":{"id": 1,"user_name": "15615898763","password": "123456"}}
     * @remark 这里是备注信息
     * @number 3
     */
    public function getAdminInfo(){
        return self::responseJson($this->Service->getAdminInfo());
    }
}
