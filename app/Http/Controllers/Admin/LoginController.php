<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 
use App\Http\Model\Admin\Manager;
use Hash;

class LoginController extends Controller
{
    public function login()
    {
    	return view('admin.login',['title'=>'后台登录页']);
    }

    public function dologin(Request $request)
    {
	//dump($request->all());
	//1.检测用户名
		$rs = Manager::where('name',$request->name)->first();

		if(!$rs){

			return back()->with('error','用户名或密码错误');

		}
	//2.检测密码
		if (!Hash::check($request->password,$rs->password)) {

			return back()->with('errors','用户名或密码错误');

		}
	//3.检测验证码
        $cap = strtolower($request->captcha);
        $code = strtolower(session('code'));
		if($cap != $code){

			return back()->with('captcha','验证码错误');

		}

		session(['uid'=>$rs->id]);

		return redirect('/admin')->with('success','登录成功');
    }

    public function logout()
    {
    	session(['uid'=>'']);

    	return redirect('/admin/login');
    }

    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 110, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }
}
