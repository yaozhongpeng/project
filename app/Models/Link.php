<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // 友情链接模型
    // 与模型类对应的数据表
    protected $table = 'links';

    // 设置是否自动维护时间戳 created_at updated_at
    public $timestamps = true; // true 为自动

    // 可被批量赋值的属性
    protected $fillable = ['keywords','link','status'];

    // 修改器
    public function getStatusAttribute($value){
    	$status = [0=>'已下架',1=>'上架中'];
    	return $status[$value];
    }
}
