<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : ResourceInterface
 *| CreateTime ：11:02
 *| Notes      : Service 业务处理接口
 */

namespace App\Http\Interfaces;
use Illuminate\Http\Request;

interface ServiceInterface
{
    /**
     * @param string $limit
     * @param array  $columns
     * @return mixed
     */
    public function getPaginate($limit='',$columns=['*']);

    /**
     * 获取全部数据
     * @return mixed
     */
    public function getList();

    /**
     * 获取详情
     * @param $id
     * @return mixed
     */
    public function getDetail($id);

    /**
     * 新增数据
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request);

    /**
     * 修改数据
     * @param Request $request
     * @param         $id
     * @return mixed
     */
    public function update(Request $request,$id);


    /**
     * 删除数据
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}