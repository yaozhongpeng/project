<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    // 与User模型对应的数据表
	protected $table = 'user_info';

    // 自动维护时间戳
    public $timestamps = false;
}
