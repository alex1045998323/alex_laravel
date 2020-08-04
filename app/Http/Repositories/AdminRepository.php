<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class AdminRepository extends BaseRepository
{
    /**
         * @var array
         */
        protected $fieldSearchable = [
            'id',
            'status',
            'user_name'=>'like'
        ];
        /**
         * 设置默认的查询条件
         * @throws \Prettus\Repository\Exceptions\RepositoryException
         */
        public function boot(){
            $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        }
        /**
         * Specify Model class name
         *
         * @return string
         */
        public function model()
        {
            return "App\\Models\\AdminModel";
        }
}
