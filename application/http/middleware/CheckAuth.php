<?php

namespace app\http\middleware;

class CheckAuth
{
    public function handle($request, \Closure $next)
    {
    	//判断是否有session
    	if(!get_user_id()){
    		return redirect('/admin/login');
    	}
    	return $next($request);
    }
}
