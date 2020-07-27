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
use Prettus\Validator\Contracts\ValidatorInterface;
class BaseService implements ServiceInterface
{
    use \App\Http\Traits\ServiceTrait;
    const RULE_CREATE = ValidatorInterface::RULE_CREATE;
    const RULE_UPDATE = ValidatorInterface::RULE_UPDATE;
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
     * laravel 查询构造分页
     * @param null  $limit
     * @param array $columns
     * @return mixed
     */
    public function getPaginate($limit = null, $columns = ['*']){
        $result = $this->repository->paginate($limit,$columns)->toArray();
        // todo    处理需要返回分页的数据格式等等
        return V(1,'获取成功',$result);
    }

    /**
     * laravel 简单分页
     * @param null  $limit
     * @param array $columns
     * @return mixed
     */
    public function simplePaginate($limit = null, $columns = ['*']){
        $result = $this->repository->simplePaginate($limit,$columns);
        // todo    处理需要返回分页的数据格式等等
        return V(1,'获取成功',$result);
    }

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
            try{
                if($list = $this->repository->update($request->all(),$id)){
                    return V(1,'修改成功',$list->toArray());
                };
                throw new \Exception('修改失败');
            }catch (\Exception $e){
                throw new \Exception($e->getMessage());
            }
        }catch (ValidatorException $e){
            // 返回第一条错误信息
            $error = $this->validator->errors()[0];
            return V(0,$error);
        }
    }

}
