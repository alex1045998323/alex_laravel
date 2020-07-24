<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : CodeListService
 *| CreateTime ：10:06
 *| Notes      : 类说明
 *|--------------------------------------------------------------------------
 */

namespace App\Http\Services\Api;
use App\Http\Repositories\CodeListRepository;
use App\Http\Validator\CodeListValidator;
use \Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Http\Request;
class CodeListService extends \App\Http\Services\Common\BaseService
{
    /**
     * CodeListService constructor.
     * @param CodeListRepository $repository
     * @param CodeListValidator      $validator
     */
    public function __construct (CodeListRepository $repository,CodeListValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
    /**
     * 新增数据
     * @param Request $request
     * @return array|void
     */
    public function create (Request $request)
    {
        try{
            $this->validator->with($request->all())->passesOrFail(self::RULE_CREATE);
            //进行添加动作
            $this->repository->create($request->all());

        }catch (ValidatorException $e){
            // 返回第一条错误信息
            $error = $this->validator->errors()[0];
            return V(0,$error);
        }
    }

    public function update (Request $request, $id)
    {
        try{
            $this->validator->with($request->all())->passesOrFail(self::RULE_UPDATE);
            //进行添加动作
            $this->repository->update($request->all(),$id);
        }catch (ValidatorException $e){
            // 返回第一条错误信息
            $error = $this->validator->errors()[0];
            return V(0,$error);
        }
    }
}