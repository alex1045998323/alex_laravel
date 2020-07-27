<?php
/*
|--------------------------------------------------------------------------
| Author  : 1045998323@qq.com
| Class   : BaseController
| Notes   : Controller公共类
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\ResourceInterface;
use Illuminate\Http\Request;

#use Illuminate\Http\Request;

class BaseController extends Controller implements ResourceInterface
{
    use \App\Http\Traits\ResourceTrait,
        \App\Http\Traits\ResponseFormatTrait;
    /**
     * @var 定义使用的逻辑层
     */
    protected $Service;
    public function __construct (){
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(){
        return self::responseJson($this->Service->getPaginate());
    }

    public function store (Request $request)
    {
        return self::responseJson($this->Service->Create($request));
    }

    public function update (Request $request, $id)
    {
        return self::responseJson($this->Service->update($request,$id));
    }
}
