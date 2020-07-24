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
        return V(1,'成功');
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
    public function delete ($id)
    {
        // TODO: Implement delete() method.
        return V(1,'成功');
    }

}