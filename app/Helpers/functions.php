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

if (!function_exists('upload')) {
    /**
     * 公共单文件上传
     * @param $request
     * @param $disk filesystems disks 下的配置
     * @return array|false|string
     */
    function upload($request, $disk = 'public')
    {
        if (!config('filesystems.disks')[$disk]) $disk = 'public';
        //获取上传信息
        $file = $request->file('file');
        if (!$file) return V(0, '上传失败');

        //获取文件的原文件名 包括扩展名
        $yuanname = $file->getClientOriginalName();

        //获取文件的扩展名
        $kuoname = $file->getClientOriginalExtension();

        //获取文件大小
        $fileSize = $file->getClientSize();

        //获取上传图片大小
        $img_size =  2 * 1024 * 1000 ;
        //验证图片格式
//        if (!in_array(strtolower($kuoname), $img_format))
//            return V(0, '文件格式不正确');
        //验证图片大小
        if ($fileSize > $img_size) return V(0, '文件超过规定大小');

        //获取文件的绝对路径，但是获取到的在本地不能打开
        $path = $file->getRealPath();

        //要保存的文件名 时间+扩展名
        $filename = date('Y-m-d') . '/' . uniqid() . '.' . $kuoname;

        //保存文件          配置文件存放文件的名字  ，文件名，路径
        if (!Illuminate\Support\Facades\Storage::disk($disk)->put($filename, file_get_contents($path))) {
            return V(0, '上传失败');
        }
        return V(1, '', ['filepath' => '/Uploads/' . $disk . '/' . $filename]);
    }

    /**
     * 数字转字母 （类似于Excel列标）
     * @param Int $index 索引值
     * @param Int $start 字母起始值
     * @return String 返回字母
     */
    if (!function_exists('IntToChr')) {
        function IntToChr($index, $start = 65)
        {
            $str = '';
            if (floor($index / 26) > 0) {
                $str .= IntToChr(floor($index / 26) - 1);
            }
            return $str . chr($index % 26 + $start);
        }
    }
}



