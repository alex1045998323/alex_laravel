<?php
namespace App\Http\Controllers\Admin;
use App\Http\Services\Admin\AdminService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : AdminController
 *| CreateTime ：2020-07-29
 *| Notes      : 后台管理员路由部分
 *|--------------------------------------------------------------------------
 */
class AdminController extends \App\Http\Controllers\Common\BaseController
{
    public function __construct (AdminService $Service)
    {
        $this->Service = $Service;
    }

    /**
     * showdoc
     * @catalog 接口文档/后台部分/管理员
     * @title 管理员列表
     * @description 管理员列表API
     * @method get
     * @url /api/admin
     * @header Accept 必选 string application/vnd.alex_laravel.v1+json
     * @header Authorization 必选 string Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g
     * @param search 可选（搜索条件） string name:John;email:john@gmail.com&searchFields=name:like;email:=
     * @return {"code":1,"msg":"获取成功","data":[{"id":"1","username":"12154545","password":"123456"}]}
     * @return_param username string 用户昵称
     * @return_param password string 密码
     * @remark 这里是备注信息
     * @number 4
     */
    public function index ()
    {
        return self::responseJson($this->Service->getPaginate());
    }

    /**
     * showdoc
     * @catalog 接口文档/后台部分/管理员
     * @title 管理员详情
     * @description 管理员详情API
     * @method get
     * @url /api/admin/{id}
     * @header Accept 必选 string application/vnd.alex_laravel.v1+json
     * @header Authorization 必选 string Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g
     * @return {"code":1,"msg":"获取成功","data":{"id":"1","username":"12154545","password":"123456"}}
     * @return_param username string 用户昵称
     * @return_param password string 密码
     * @remark 这里是备注信息
     * @number 5
     */
    public function show($id){
        return self::responseJson($this->Service->getDetail($id));
    }

    /**
     * showdoc
     * @catalog 接口文档/后台部分/管理员
     * @title 管理员新增
     * @description 管理员新增API
     * @method post
     * @url /api/admin
     * @header Accept 必选 string application/vnd.alex_laravel.v1+json
     * @header Authorization 必选 string Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g
     * @param username 必选 string 15615898763
     * @param password 必选 string 123456
     * @return {"code":1,"msg":"操作成功","data":{"id":"1","username":"15615898763","password":"123456"}}
     * @return_param username string 用户昵称
     * @return_param password string 密码
     * @remark 这里是备注信息
     * @number 6
     */
    public function store(Request $request){
        return self::responseJson($this->Service->Create($request));
    }


    /**
     * showdoc
     * @catalog 接口文档/后台部分/管理员
     * @title 管理员修改
     * @description 管理员修改API
     * @method put
     * @url /api/admin/{id}
     * @header Accept 必选 string application/vnd.alex_laravel.v1+json
     * @header Authorization 必选 string Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g
     * @param password 可选 string 123456
     * @param 其他params 可选 string ..........
     * @return {"code":1,"msg":"修改成功","data":{"id":"1","username":"15615898763","password":"123456"}}
     * @return_param username string 用户昵称
     * @return_param password string 密码
     * @remark 这里是备注信息
     * @number 7
     */
    public function update(Request $request, $id){
        return self::responseJson($this->Service->update($request,$id));
    }

    /**
     * showdoc
     * @catalog 接口文档/后台部分/管理员
     * @title 管理员删除
     * @description 管理员删除API
     * @method delete
     * @url /api/admin/{id}
     * @header Accept 必选 string application/vnd.alex_laravel.v1+json
     * @header Authorization 必选 string Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g
     * @return {"code":1,"msg":"操作成功","data":{}}
     * @remark 这里是备注信息
     * @number 8
     */
    public function destroy($id){
        return self::responseJson($this->Service->destroy($id));
    }
}
