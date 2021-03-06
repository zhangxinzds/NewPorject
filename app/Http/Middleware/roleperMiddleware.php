<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Model\Admin\Manager;
use App\Http\Model\Admin\Role;
use App\Http\Model\Admin\Permission;

class roleperMiddleware
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
        $manager = Manager::find(session('uid'));
        $name = $manager['name'];
        //root用户拥有所有权限
        if($name == 'root'){
            return $next($request);
        }
        $role = $manager->role;

        $array = [];
        foreach($role as $k => $v){
            $data = $v->per;
            foreach($data as $key => $val){
                $rs = $val->url;
                $array[] = $rs;
            }
        }

        $info = array_unique($array);
        //一些默认给与的权限
        $info[] = 'App\Http\Controllers\Admin\IndexController@index';
        $info[] = 'App\Http\Controllers\Admin\IndexController@header';
        $info[] = 'App\Http\Controllers\Admin\IndexController@mpassword';
        $info[] = 'App\Http\Controllers\Admin\IndexController@dompassword';
        $info[] = 'App\Http\Controllers\Admin\LoginController@login';
        $info[] = 'App\Http\Controllers\Admin\LoginController@dologin';
        $info[] = 'App\Http\Controllers\Admin\LoginController@logout';
        $info[] = 'App\Http\Controllers\Admin\LoginController@logout';
        $info[] = 'App\Http\Controllers\Admin\LoginController@captcha';


        //怎么获取用户点击菜单的路径信息  perurl
        $rs = \Route::current()->getActionName();

        if(in_array($rs, $info)){

            return $next($request);

        } else {
            //如果角色没有权限  提示页面  没有权限不能访问
           return response()->view('admin.remind',['title'=>'没有权限不能访问']);

        }       
    }
}
