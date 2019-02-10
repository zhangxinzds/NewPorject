<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\UserInfo;
use App\Http\Model\Admin\Cart;
use Hash;
class LoginController extends Controller
{
    public function login()
    {
    	return view('home.login.login',['title'=>'登录页']);
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
        $builder->build($width = 90, $height = 45, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['hcode'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    public function dologin(Request $request)
    {
    	//1.检测用户名
    	//邮箱
    	$res = UserInfo::where('email',$request->email)->first();
    	$id = $res['uid'];
    	$result = User::find($id);
    	//用户名
		$rs = User::where('name',$request->email)->first();

		if(!($res||$rs)){

			return back()->with('error','用户名或密码错误');

		}
		//2.检测密码
		if($res){
			//邮箱
			if (!Hash::check($request->password,$result['password'])) {

			return back()->with('errorss','用户名或密码错误');
			}
		}else{
			//用户名
			if (!Hash::check($request->password,$rs['password'])) {

			return back()->with('errorss','用户名或密码错误');
			}
		}
		//3.检测验证码
		if($request->captcha != session('hcode')){

			return back()->with('captcha','验证码错误');

		}
		if($res){
            //邮箱登录
			session(['id'=>$id]);
		}else{
            //用户名登录
			session(['id'=>$rs['id']]);
		}

        //如果购物车有商品,要加入cart表
        if(session('cart')){
            foreach(session('cart') as $va){
                $va['uid'] = session('id');
                $arr[] = $va;
            }
            Cart::insert($arr);
            \Session::forget('cart');
        }

        //登录后如果cart表中有未支付的商品要存入session('cart'),方便前台显示
        $cart = Cart::where('uid',session('id'))->get();
        if($cart){
            foreach($cart as $k=>$v){
                $arr['uid'] = $v['uid'];
                $arr['cid'] = $v['cid'];
                $arr['sid'] = $v['sid'];
                $arr['name'] = $v['name'];
                $arr['price'] = $v['price'];
                $arr['num'] = $v['num'];
                \Session::push('cart',$arr);
            }
        }

		return redirect('/')->with('success','登录成功');
    }

    public function logout()
    {
    	session(['id'=>'']);

        \Session::forget('cart');

    	return redirect('/');
    }
}
