<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 公告模型
    // 与模型类对应的数据表
    protected $table = 'articles';

    // 设置是否自动维护时间戳 created_at updated_at
    public $timestamps = false; // true 为自动

    // 可被批量赋值的属性
    protected $fillable = ['title','descr','thumb','editor'];
}
