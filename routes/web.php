<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//-----------------------project start Admin start-------------
// 后台登录,退出
Route::resource('/adminlogin','Admin\AdminLoginController');
// 测试 Redis
Route::get('/redistest','Admin\ArticleController@redistest');

//后台路由组 adminlogin 后台登录中间件规则名
Route::group(['middleware'=>'adminlogin'],function(){
	// 后台首页
	Route::resource('/admin','Admin\AdminController');
	// 会员模型
	Route::resource('/adminuser','Admin\UserController');
	// 会员详情
	Route::get('/userinfo/{id}','Admin\UserController@userinfo');
	// 会员收货地址
	Route::get('/useraddress/{id}','Admin\UserController@useraddress');
	// 后台分类
	Route::resource('admincate','Admin\CateController');
	// 后台管理员
	Route::resource('/adminusers','Admin\AdminuserController');
	// 分配角色
	Route::get('/adminuserrole/{id}','Admin\AdminuserController@adminuserrole');
	// 保存角色
	Route::post('/saverole','Admin\AdminuserController@saverole');
	// 角色管理
	Route::resource('/role','Admin\RoleController');
	// 分配权限
	Route::get('/adminauth/{id}','Admin\RoleController@adminauth');
	// 保存权限
	Route::post('/saveauth','Admin\RoleController@saveauth');
	// 权限管理
	Route::resource('/auth','Admin\AuthController');
	// 后台公告
	Route::resource('/adminarticle','Admin\ArticleController');
	// 后台公告 redis
	Route::resource('/adminarticleredis','Admin\ArticlerController');
 	// Ajax 删除公告
	Route::get('/articledel','Admin\ArticleController@del');
	// 友情链接
	Route::resource('/adminlink','Admin\LinkController');
	// 友情链接开关
	Route::get('/linkup','Admin\LinkController@linkup');
	// 后台轮播图管理
	Route::resource('/adminimg','Admin\ImgController');
	// 后台商品
	Route::resource('/admingoods','Admin\GoodsController');
	// 后台商品详情
	Route::get('/admingoodshow/{id}','Admin\GoodsController@show');
	// 商品评价管理
	Route::resource('/goodsping','Admin\PingController');
	// 商品评价
	Route::any('/ping/{id}','Admin\PingController@ping');
	// ajax 单个删除 redis 公告
	Route::get('/ajaxdel','Admin\ArticlerController@ajaxdel');
	// 后台资讯管理
	Route::resource('/adminnews','Admin\NewsController');
	// 后台订单管理
	Route::resource('/adminorder','Admin\OrderController');
	// 后台订单详情
	Route::get('/orderinfo/{id}','Admin\OrderController@orderinfo');
});

//-----------------------project start Admin end---------------
//-----------------------Home start--------------
// 测试邮件发送
Route::get("/send","Home\RegisterController@send");
// 测试邮件发送2
// Route::get("/send1","Home\RegisterController@sendMail");
// 前台首页
Route::resource('/homeindex','Home\IndexController');
// 前台注册 邮箱
Route::resource('/homeregister','Home\RegisterController');
// 激活用户 邮箱
Route::get('/jihuo','Home\RegisterController@jihuo');
// 生成校验码
Route::get('/code','Home\RegisterController@code');
// 手机号注册
Route::post('/registerphone','Home\RegisterController@registerphone');
// 检测手机号是否唯一 Ajax
Route::get('/checkphone','Home\RegisterController@checkphone');
// 发送短信验证码 Ajax
Route::get('/registersendphone','Home\RegisterController@registersendphone');
// 检测手机验证码
Route::get('/checkcode','Home\RegisterController@checkcode');
// 前台登录
Route::resource('/homelogin','Home\LoginController');
// 加载选择找回密码方式模板
Route::get('/forget','Home\LoginController@forget');

// 通过邮箱--------------------------------
Route::get('/useemail','Home\LoginController@useemail');
// 发送找回密码邮件
Route::post('/doemail','Home\LoginController@doemail');

// 通过手机--------------------------------
Route::get('/usephone','Home\LoginController@usephone');
// 发送找回密码短信
Route::post('/dophone','Home\LoginController@dophone');
// 检测手机号是否注册
Route::get('/dophone','Home\LoginController@dophone');
// ajax 发送短信
Route::get('/dophonesendphone','Home\LoginController@dophonesendphone');
// 检测短信
Route::get('/checkpcode','Home\LoginController@checkpcode');

// 通过保密问题-------------------------------
// Route::get('/usequestion','Home\LoginController@usequestion');

// 加载密码重置模板
Route::get('/reset','Home\LoginController@reset');
// 重置密码 密码修改
Route::post('/doreset','Home\LoginController@doreset');

// 公告管理
Route::resource('/homearticle','Home\ArticleController');
// 前台商品列表
Route::resource('/goods','Home\GoodsController');
// 前台商品列表
Route::get('/goods/list/{id}','Home\GoodsController@list');
// 前台商品详情页
Route::get('/goods/show/{id}','Home\GoodsController@show');
// 前台友情链接管理
Route::resource('/applylink','Home\LinkController');
// 前台用户修改资料
// Route::resource('/member','Home\MemberController');
// 前台用户修改资料
Route::get('/member/{id}/edit','Home\MemberController@edit');
// 前台会员中心
Route::get('/member/{id}','Home\MemberController@member');
// 前台用户详情
Route::get('/memberinfo/{id}','Home\MemberController@memberinfo');
// 前台收货地址
Route::get('/memberaddress/{id}','Home\MemberController@memberaddress');

// Route::group(['middleware'=>'login'],function(){
	// 购物车
	Route::resource('/cart','Home\CartController');
	// 清空购物车
	Route::get('/delall','Home\CartController@delall');
	// Ajax 减
	Route::get('/cartdown','Home\CartController@cartdown');
	// Ajax 加
	Route::get('/cartup','Home\CartController@cartup');
	// 勾选选择购买的商品
	Route::get('/carttot','Home\CartController@carttot');
	// 结算
	Route::get('/jiesuan','Home\OrderController@jiesuan');
	// 跳转结算页面
	Route::any('/homeorder/insert','Home\OrderController@insert');
	// 获取城市级联数据 ajax
	Route::get('/address','Home\AddressController@address');
	// 插入收货地址
	Route::post('/addressinsert','Home\AddressController@insert');
	// 选择收货地址
	Route::get('/choose','Home\AddressController@choose');
	// 提交订单
	Route::post('/order/create','Home\OrderController@ordergoodsinsert');
	// 支付完毕,跳转
	Route::get('/returnurl','Home\OrderController@returnurl');
// });
// 退出
Route::get('/homelogout','Home\IndexController@logout');
//-----------------------Home end----------------
// 会员中心首页
Route::resource('/mb/','Member\MemberController');
// 订单管理
Route::resource('/myorder','Member\OrderController');
// 评价管理
Route::resource('/pingjia','Member\PingController');
// 评价
Route::get('/pinglun/create/{id}','Member\PingController@create');

// 地址管理
Route::resource('/myaddress','Member\AddressController');

// 个人信息
Route::resource('/person','Member\PersonController');
// 宝贝数仓
Route::resource('/hide','Member\HideController');

//分词搜索
Route::get('/search','Home\IndexController@search');


