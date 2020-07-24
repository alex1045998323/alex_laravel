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
}
