<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\http\Model\Admin\User;
use App\http\Model\Admin\UserInfo;
use Hash;
use Mail;

class RegisterController extends Controller
{
    public function register()
    {
    	return view('home.register.register',['title'=>'注册页']);
    }

    public function doregister(Request $request)
    {
    	$this->validate($request, [
	        'name' => 'required|unique:user|regex:/\w{4,16}/',
            'password' => 'required|regex:/\w{6,12}/',
            'repassword' => 'same:password',
            'email' => 'email|unique:user_info'
   		],[
			'name.required' => '用户名不能为空',
            'name.unique' => '用户名已被使用',
            'name.regex' => '用户名格式不正确',
            'password.required' =>'密码不能为空',
            'password.regex' => '密码格式不正确',
            'repassword.same' =>'两次输入密码不一致',
            'email' => '邮箱格式不正确',
            'email.unique' => '邮箱已被注册'
		]);
    	$rs = $request->except('_token','repassword','email');

    	$rs['addtime'] = time();

    	$rs['password'] = Hash::make($rs['password']);

    	$rs['token'] = str_random(32);

    	$data = User::insertGetId($rs);

    	//user_info表要插入的数据
    	$arr = [];

    	$arr['uid'] = $data;

    	$arr['email'] = $request->email;

    	UserInfo::insert($arr);

    	$id = base64_encode($data);

    	$rs['email'] = $request->email;

    	if($data){
    		//发送邮件
    		Mail::send('home.register.jihuo', ['username' => $rs['name'],'id'=>$id,'token'=>$rs['token']], function ($m) use ($rs) {

            $m->from(env('MAIL_USERNAME'), 'zx的购物网站');

            $m->to($rs['email'],$rs['name'])->subject('购物信息!');
        });
    		//跳转至激活提示页面
    		return view('home.register.remind',['title'=>'邮件激活']);

    	}else{

    		echo '激活失败';
    	}
    }

    public function remind(Request $request)
    {
    	//1.解密id
    	$id = base64_decode($request->id);

    	$res = User::find($id);
    	//2.对比token
    	if($res['token'] == $request->token){
    		//3.修改状态
    		$rs = User::where('id',$id)->update(['status'=>'1']);

    		if($rs){

    			return view('home.register.wait',['title'=>'等待跳转']);

    		}else{

    			return back();
    		}

    	}else{

    		echo '激活失败';exit;
    	}
    }

    public function wait(){

    	return view('home.register.wait',['title'=>'跳转页面']); 
    }
}
