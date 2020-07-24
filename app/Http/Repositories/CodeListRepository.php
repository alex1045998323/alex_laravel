<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : PostRepository
 *| CreateTime ：15:29
 *| Notes      : 类说明
 *|--------------------------------------------------------------------------
 */

namespace App\Http\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;

class CodeListRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nickname'=>'like',
        'phone'=>'='
    ];
    /**
     * 设置默认的查询条件
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot(){
        //$this->pushCriteria(\App\Http\Repository\Criteria\CodeListCriteria::class);
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return "App\\Models\\CodeListModel";
    }
}