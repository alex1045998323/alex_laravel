<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : CodeListController
 *| CreateTime ：15:44
 *| Notes      : 类说明
 *|--------------------------------------------------------------------------
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class CodeListController extends \App\Http\Controllers\Common\BaseController
{
    public function __construct (\App\Http\Services\Api\CodeListService $service)
    {
        $this->Service = $service;
    }
    public function index(){
        return self::responseJson($this->Service->getPaginate(3));
    }

    public function store (Request $request)
    {
        return self::responseJson($this->Service->Create($request));
    }
}