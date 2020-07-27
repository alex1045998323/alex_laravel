<?php

namespace App\Http\Validator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class TestValidator extends LaravelValidator
{
    protected $rules = [
            ValidatorInterface::RULE_CREATE => [
            ],
            ValidatorInterface::RULE_UPDATE => [
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
