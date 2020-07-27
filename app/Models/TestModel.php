<?php

namespace App\Models;

class TestModel extends \App\Models\Common\BaseModel
{
    protected $table = 'test';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['phone'];//开启白名单字段
}
