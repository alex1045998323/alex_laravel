<?php

namespace App\Http\Services\Admin;
use App\Http\Repositories\AdminRepository;
use App\Http\Validator\AdminValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Prettus\Validator\Exceptions\ValidatorException;

class LoginService extends \App\Http\Services\Common\BaseService
{
    public function __construct (AdminRepository $repository,AdminValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * 后台登录
     * @param $request
     * @return array
     */
    public function signIn($request){
        try{
            $this->validator->with($request->all())->passesOrFail(self::RULE_ADMIN_LOGIN);
            // 查询是否有这个用户
            if(!$admin_info = $this->repository->scopeQuery(function($query) use ($request){
                return $query->where('user_name','=',$request->get('user_name'));
            })->first()) throw new \Exception('用户不存在');
            //查询密码是否正确
            if($admin_info->password != $request->get('password')) throw new \Exception('密码错误');
            if (!$token = Auth::guard('admin')->login($admin_info)) return V(0,'系统错误，无法生成令牌');
                return V(1,'登录成功',['token'=>$token]);
        }catch (ValidatorException $e){
            // 返回第一条验证错误信息
            $error = $this->validator->errors()[0];
            return V(0,$error);
        }catch (\Exception $e){
            // 返回其他错误信息
            return V(0,$e->getMessage());
        }
    }

    /**
     * 后台退出
     * @param $request
     * @return array
     */
    public function signOut($request){
        Auth::guard('admin')->logout();
        return V(1,'退出成功');
    }

    /**
     * 获取当前admin登录用户信息
     * @return array
     */
    public function getAdminInfo(){
        return V(1,'获取成功',Auth::guard('admin')->user());
    }
}
