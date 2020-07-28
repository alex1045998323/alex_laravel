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
use Illuminate\Database\Eloquent\SoftDeletes;
class BaseModel extends Model
{
    use SoftDeletes;   //开启软删除
    protected $table = '';
    protected $primaryKey = 'id';
    protected $fillable = [];//开启白名单字段
    public $timestamps = true; //开启自动写入时间戳
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    const DELETED_AT = 'delete_at';
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