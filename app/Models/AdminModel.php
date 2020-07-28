<?php

namespace App\Models;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AdminModel extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'ls_admin';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [];//开启白名单字段
    /**
     * @author AdamTyn
     * @description 获取JWT中用户标识
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @author AdamTyn
     * @description 获取JWT中用户自定义字段
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
