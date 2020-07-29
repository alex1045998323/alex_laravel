<?php
/*
|--------------------------------------------------------------------------
| Author  : 1045998323@qq.com
| Class   : BaseService
| Notes   : Service公共类
|--------------------------------------------------------------------------
*/
namespace App\Http\Services\Common;
use \App\Http\Interfaces\ServiceInterface;
use Illuminate\Http\Request;
use \Prettus\Validator\Contracts\ValidatorInterface;
class BaseService implements ServiceInterface
{
    use \App\Http\Traits\ServiceTrait;
    const RULE_CREATE = ValidatorInterface::RULE_CREATE;    //新增
    const RULE_UPDATE = ValidatorInterface::RULE_UPDATE;    //修改
    const RULE_ADMIN_LOGIN = 'admin_login';                 //登录验证
    /**
     * 指定使用的repository
     * @var
     */
    protected $repository;
    /**
     * 指定使用的验证器
     * @var
     */
    protected $validator;

    /**
     * 新增数据
     * @param Request $request
     * @return array|void
     */
    public function create (Request $request)
    {
        try{
            $this->validator->with($request->all())->passesOrFail(self::RULE_CREATE);
            //进行添加动作
            $this->repository->create($request->all());

        }catch (ValidatorException $e){
            // 返回第一条错误信息
            $error = $this->validator->errors()[0];
            return V(0,$error);
        }
    }

    /**
     * 修改数据
     * @param Request $request
     * @param         $id
     * @return array|mixed
     * @throws \Exception
     */
    public function update (Request $request, $id)
    {
        try{
            $this->validator->with($request->all())->passesOrFail(self::RULE_UPDATE);
            //进行修改动作
            if($list = $this->repository->update($request->all(),$id)){
                return V(1,'修改成功',$list->toArray());
            };
            throw new \Exception('修改失败');
        }catch (ValidatorException $e){
            // 返回第一条错误信息
            $error = $this->validator->errors()[0];
            return V(0,$error);
        }catch (\Exception $e){
            return V(0,$e->getMessage());
        }
    }

    /**
     * 删除
     * @param $id
     * @return array
     */
    public function destroy($id){
        try{
            if($this->repository->delete($id)===true){
                return V(1,'删除成功');
            }
            throw new \Exception('删除失败');
        }catch (\Exception $e){
            return V(0,$e->getMessage());
        }
    }

}
