<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : CodeListModel
 *| CreateTime ：15:33
 *| Notes      : 类说明
 *|--------------------------------------------------------------------------
 */

namespace App\Models;

class CodeListModel extends \App\Models\Common\BaseModel
{
    protected $table = 'ls_code_list';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'openid','nickname','phone'];//开启白名单字段
}