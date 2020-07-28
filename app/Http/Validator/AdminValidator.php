<?php

namespace App\Http\Validator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class AdminValidator extends LaravelValidator
{
    protected $rules = [
            ValidatorInterface::RULE_CREATE => [
            ],
            ValidatorInterface::RULE_UPDATE => [
            ],
            'admin_login'=>[
                'user_name'=>'required',
                'password'=>'required'
            ]
        ];
        /**
         * 自定义属性名称
         * @var array
         */
        protected $attributes = [
        ];
        protected $messages = [
            'required' => '【:attribute】不能为空.',
            'regex'    => '【:attribute】格式错误.'
        ];
}
