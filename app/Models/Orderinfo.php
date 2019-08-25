<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderinfo extends Model
{
    //
    // 与Order模型对应的数据表
	protected $table = 'order_goods';

    // 自动维护时间戳
    public $timestamps = false;
}
