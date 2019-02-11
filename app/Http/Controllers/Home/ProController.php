<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\UserInfo;
use App\Http\Model\Admin\Orders;
use App\Http\Model\Admin\OrderInfo;
use Hash;
class ProController extends Controller
{
    public function pass()
    {
    	$user = User::where('id',session('id'))->first();
    	$num = Orders::where('uname',$user['name'])->count();
    	return view('home.pass',['title'=>'密码修改','user'=>$user,'num'=>$num]);
    }

    //头像密码修改
    public function pedit(Request $request)
    {
    	$rs = $request->except('_token');
    	
		$this->validate($request, [
			'prevpassword' => 'required',
			'newpassword' => 'required|regex:/\w{6,12}/',
			'repassword' => 'same:newpassword'
		],[
			'prevpassword.required' =>'请输入旧密码',
			'newpassword.required' => '请输入新密码',
			'newpassword.regex' => '密码格式不正确',
			'repassword.same' =>'两次输入密码不一致'
		]);


		$user = User::where('id',session('id'))->first();

		if (Hash::check($rs['prevpassword'],$user['password'])) {
			//新旧密码不能相同		
			if($request->prevpassword == $request->newpassword){
				return back()->with('diff','新旧密码不能相同');
			}
			//加密
			$pass = Hash::make($request->newpassword);
			//修改面膜
			$res = User::where('id',session('id'))->update(['password'=>$pass]);
			if($res){
				return back()->with('success','修改成功');
			}
		}else{
			return back()->with('err','旧密码不正确');
		}
    }

    public function header()
    {
    	$user = User::where('id',session('id'))->first();
    	$num = Orders::where('uname',$user['name'])->count();
    	return view('home.header',['title'=>'头像修改','user'=>$user,'num'=>$num]);
    }

    public function hedit(Request $request)
    {	
    	$result = User::find(session('id'));
        $header = $result['header'];
    	$this->validate($request, [
			'header' => 'required',
		],[
			'header.required' =>'请添加头像',
		]);

    	if($request->hasFile('header')){

            $file = $request->file('header');

            $name = rand(1111,9999).time();

            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads/',$name.'.'.$suffix);

            $rs['header'] = '/uploads/'.$name.'.'.$suffix;
            //默认头像不能删除
            if($header != '/common/image/man.jpg'){
                @unlink('.'.$header);
            }

        }
        $res = User::where('id',session('id'))->update($rs);
		if($res){
			return back()->with('success','修改成功');
		}
    }

    public function address()
    {
    	$user = User::where('id',session('id'))->first();
    	$userinfo = UserInfo::where('uid',session('id'))->first();
    	$num = Orders::where('uname',$user['name'])->count();
    	return view('home.address',['title'=>'个人资料','user'=>$user,'num'=>$num,'userinfo'=>$userinfo]);
    }

    public function addressedit(Request $request)
    {
    	$rs = $request->except('_token');
    	$this->validate($request, [
			'tname' =>'nullable|regex:/^[\x{4e00}-\x{9fa5}]+$/u',
			'phone' =>'nullable|regex:/1[3456789]\d{9}/',
			'email' =>'nullable|email',
		],[
			'tname.regex' =>'请输入正确姓名',
			'phone.regex' =>'手机号格式不正确',
			'email.email' =>'邮箱格式不正确', 
		]);
		$res = array_filter($rs);
		if(!$res){
			return back()->with('empty','请输入修改内容');
		}
		$result = UserInfo::where('uid',session('id'))->update($res);
		if($result){
			return back()->with('success','修改成功');
		}	
    }
}
