<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Manager;
use Hash;
class IndexController extends Controller
{
    public function index()
    {
    	return view('admin.index',['title'=>'后台首页']);
    }

    public function header(Request $request)
    {
    	$id = session('uid');
    	$rs = $request->except('_token','header');
        $res = Manager::find($id);
        $header = $res->header;
    	if($request->hasFile('header')){
            $file = $request->file('header');

            $name = rand(1111,9999).time();

            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads/',$name.'.'.$suffix);

            $rs['header'] = '/uploads/'.$name.'.'.$suffix;
            //删除原头像
            //默认头像不删除
            if($header != 'man.jpg'){
                @unlink('.'.$header);
            }
        }else{
        	return back();
        }
        $result =  Manager::where('id',$id)->update($rs);

        if($result){
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    public function mpassword()
    {
    	return view('admin.manager.mpassword',['title'=>'修改密码']);
    }

    public function dompassword(Request $request)
    {
    	$this->validate($request, [
    		'prevpassword' => 'required',
        	'newpassword' => 'required|regex:/\w{6,12}/',
            'repassword' => 'same:newpassword'
   		],[
   			'prevpassword.required' =>'请输入旧密码',
			'newpassword.required' =>'新密码不能为空',
            'newpassword.regex' => '密码格式不正确',
            'repassword.same' =>'两次输入密码不一致'
		]);

    	$rs = Manager::find(session('uid'));

    	if (!Hash::check($request->prevpassword,$rs->password)){
  			
  			return back()->with('error','旧密码错误');

		}	

		$password = Hash::make($request->newpassword);

		$arr['password'] = $password;

		$res = Manager::where('id',session('uid'))->update($arr);

		if($res){
			return redirect('/admin')->with('success','修改成功');
		}else{
			return back();
		}
    }
}
