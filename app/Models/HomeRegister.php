<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeRegister extends Model
{
    // 与User模型类对应的数据表user
    protected $table="user";
    // 模型自动维护时间戳 false 不开启 true 开启
    public $timestamps = true;
    // 可以被批量赋值的属性 在使用模型添加的时候 必须设置该属性,否则添加不成功
    protected $fillable = ['name','password','email','status','token','phone'];
}
