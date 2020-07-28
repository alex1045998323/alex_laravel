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
}
