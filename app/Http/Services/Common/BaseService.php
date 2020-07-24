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
//    public function paginate($limit = null, $columns = ['*']){
//        $result = $this->repository->paginate($limit,$columns)->toArray();
//        // todo    处理需要返回分页的数据格式等等
//        return V(1,'获取成功',$result);
//    }

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

}
