<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use A; // 导入自定义类 A

class PayController extends Controller
{
	public function pay(){
    	pay();	
    }

    // 调用发送短信
    function sendphone(){
    	$a = new A();
    	$a->sendphone();
    }

    // 调用短信接口
    public function sendsphone(){
        sendsphone('13701064818');
    }

    // 调用支付宝接口
    public function pays(){
    	pays(time(),'充气娃娃','0.01','好评送闺蜜');
    }

    // 支付成功时候跳转的界面
    public function returnurl(){
        echo '商品支付成功页面';
    }
}
