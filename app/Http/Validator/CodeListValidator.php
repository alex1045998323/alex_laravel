<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : UserValidator
 *| CreateTime ：13:00
 *| Notes      : 验证器
 *|--------------------------------------------------------------------------
 */

namespace App\Http\Validator;
use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class CodeListValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'phone' => 'required|unique:investor',
            'phone' => 'regex:/^1[345789][0-9]{9}$/',     //正则验证
            'nickname' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'phone' => 'required',
            'nickname' => 'required'
        ]
    ];
    /**
     * 自定义属性名称
     * @var array
     */
    protected $attributes = [
        'phone' => '手机号码'
    ];
    protected $messages = [
        'required' => '【:attribute】不能为空.',
        'regex'    => '【:attribute】格式错误.'
    ];
//    protected $messages = [
//        'phone.required' => '手机号码不能为空',
//    ];
}