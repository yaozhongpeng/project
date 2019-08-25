<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 与模型类对应的数据表
    protected $table = 'user';

    // 设置是否自动维护时间戳 created_at updated_at
    public $timestamps = true; // true 为自动

    // 可被批量赋值的属性
    protected $fillable = ['name','password','email','status','token','phone'];

    // 修改器
    public function getStatusAttribute($value){
    	$status = [0=>'未激活',1=>'禁用',2=>'已激活'];
    	return $status[$value];
    }

    // User 模型类 和 Userinfo 关联「会员详情」
    public function info(){
    	return $this->hasOne('App\Models\Userinfo','user_id');
    }

    // User模型 和 Useraddress模型 关联「收货地址」
    public function address(){
        // "App\Models\Useraddress" 地址模型类 user_id 关联id
        return $this->hasMany('App\Models\Useraddress','user_id');
    }
}
