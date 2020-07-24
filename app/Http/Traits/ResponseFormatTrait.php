<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : ResponseTrait
 *| CreateTime ：15:47
 *| Notes      : 响应输出格式
 *|--------------------------------------------------------------------------
 */

namespace App\Http\Traits;


trait ResponseFormatTrait
{
    /**
     * 返回json格式
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJson($data=[]){
        return response()->json($data);
    }

    /**
     * 统一json 数据格式处理
     * @param int    $code
     * @param string $msg
     * @param array  $data
     * @return array
     */
    public function jsonFormat($code = 0, $msg = '', $data = []){
        if (is_null($data)) $data = [];
        return compact('code', 'msg', 'data');
    }
}