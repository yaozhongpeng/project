<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    // 与 User 模型对应的数据表
    protected $table = 'address';

    // 自动维护时间戳
    public $timestamps = false;

    // 主键
    // protected $primaryKey = 'id';
}
