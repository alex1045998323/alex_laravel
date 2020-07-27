<?php

namespace App\Http\Services\Api;
use App\Http\Repositories\TestRepository;
use App\Http\Validator\TestValidator;
use Illuminate\Http\Request;
use \Prettus\Validator\Exceptions\ValidatorException;

class TestService extends \App\Http\Services\Common\BaseService
{
    public function __construct (TestRepository $repository,TestValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
}
