<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 中间件数据过滤
        // 检测是否有用户登录sessionid
        if ($request->session()->has('email')) {
            // 执行下一请求
            return $next($request);
        }else{
            // 返回到登录页面
            return redirect('/homelogin/create');
        }       
    }
}
