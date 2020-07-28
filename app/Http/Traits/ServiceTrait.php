<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : ServiceTrait
 *| CreateTime ：13:22
 *| Notes      : 业务 Trait
 *|--------------------------------------------------------------------------
 */
namespace App\Http\Traits;
use Illuminate\Http\Request;

trait ServiceTrait
{
    /**
     * @param string $limit
     * @param array  $columns
     * @return mixed|void
     */
    public function getPaginate($limit='',$columns=['*']){
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
     * 获取列表
     * @return mixed|void
     */
    public function getList(){
        return V(1,'成功');
    }

    /**
     * 获取单条数据
     * @param $id
     * @return mixed|void
     */
    public function getDetail ($id)
    {
        // TODO: Implement getDetail() method.
        return V(1,'成功');
    }

     /**
      * 新增数据
      * @param Request $request
      * @return array
      */
    public function create (Request $request)
    {
        // TODO: Implement create() method.
        return V(1,'成功');
    }

    /**
     * 修改数据
     * @param Request $request
     * @param         $id
     * @return mixed|void
     */
    public function update (Request $request, $id)
    {
        // TODO: Implement update() method.
        return V(1,'成功');
    }

    /**
     * 删除数据
     * @param $id
     * @return mixed|void
     */
    public function destroy ($id)
    {
        // TODO: Implement delete() method.
        return V(1,'成功');
    }

}