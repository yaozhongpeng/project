<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // 与模型类对应的数据表
    protected $table = 'orders';

    // 设置是否自动维护时间戳 created_at updated_at
    public $timestamps = false; // true 为自动

    // 可被批量赋值的属性
    // protected $fillable = ['name','password','email','status','token','phone'];

    // 修改器
    public function getStatusAttribute($value){
    	$status = [0=>'待付款',1=>'禁用',2=>'已付款',3=>'待收货',4=>'待评价'];
    	return $status[$value];
    }

    // User 模型类 和 Userinfo 关联「会员详情」
    public function info(){
    	return $this->hasOne('App\Models\Orderinfo','order_id');
    }
}
