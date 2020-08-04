<?php

namespace App\Http\Services\Admin;
use App\Http\Repositories\AdminRepository;
use App\Http\Validator\AdminValidator;
use Illuminate\Http\Request;
use \Prettus\Validator\Exceptions\ValidatorException;

class AdminService extends \App\Http\Services\Common\BaseService
{
    public function __construct (AdminRepository $repository,AdminValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

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
}
