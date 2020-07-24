<?php
/*
|--------------------------------------------------------------------------
| Author  : 1045998323@qq.com
| Class   : BaseModel
| Notes   : 后台公共数据库操作类
|--------------------------------------------------------------------------
*/
namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $table = '';
    protected $primaryKey = 'id';
    protected $fillable = [];//开启白名单字段
    public $timestamps = true; //开启自动写入时间
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    /**
     * 模型的数据字段的保存格式。
     * @var string
     */
    protected $dateFormat = 'U';

    public function __construct (array $attributes = [])
    {
        parent::__construct($attributes);
    }
}