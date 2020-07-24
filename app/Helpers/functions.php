<?php
/**
 * 公共帮助函数
 */
if (!function_exists('objToArray')) {
    /** 对象转为数组
     * @param $object
     * @return mixed
     */
    function objToArray ($object)
    {
        //先编码成json字符串，再解码成数组
        return json_decode(json_encode($object), true);
    }
}

if (!function_exists('V')) {
    /**
     * 统一返回数据格式
     * @param int $code
     * @param string $msg
     * @param array $data
     * @return array
     */
    function V($code = 0, $msg = '', $data = [])
    {
        if (is_null($data)) $data = [];
        return compact('code', 'msg', 'data');
    }
}



