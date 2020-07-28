<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class AdminRepository extends BaseRepository
{
    /**
         * @var array
         */
        protected $fieldSearchable = [
        ];
        /**
         * 设置默认的查询条件
         * @throws \Prettus\Repository\Exceptions\RepositoryException
         */
        public function boot(){
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
