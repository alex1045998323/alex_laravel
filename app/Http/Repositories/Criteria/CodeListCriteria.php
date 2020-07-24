<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : CodeListCriteria
 *| CreateTime ：17:09
 *| Notes      : 公共查询
 *|--------------------------------------------------------------------------
 */

namespace App\Http\Repositories\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class CodeListCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('id','=',9);
        return $model;
    }
}