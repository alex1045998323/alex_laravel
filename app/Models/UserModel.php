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
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserModel extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'ls_user';
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