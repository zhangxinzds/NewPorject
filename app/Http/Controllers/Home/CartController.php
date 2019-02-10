<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Cart;
use Session;
class CartController extends Controller
{
    public function index()
    {
    	$cart = Cart::where('uid',session('id'))->get();
    	return view('home.cart',['title'=>'购物车页面','cart'=>$cart]);
    }

    public function addcart(Request $request)
    {
    	$this->validate($request, [
	        'cid' => 'required',
	        'sid' => 'required',
	        'num' => 'required|regex:/^[0-9]*$/'
		],[
			'cid.required' => '请选择颜色',
			'sid.required' => '请选择尺码',
			'num.required' => '请输入购买数量',
			'num.regex' => '请输入正确格式'
		]);

    	//尚未登录先存入session
    	$rs = $request->except('_token');
    	$rs['num'] = ltrim($rs['num'],'0');
    	Session::push('cart',$rs);

    	//已经登录
    	if(session('id')){
    		$rs['uid'] = session('id');
            Cart::insert($rs);
    	}
    	return back()->with('success','商品已添加至购物车');
    }

    public function delete(Request $request)
    {
    	$id = $request->id;

    	$rs = Cart::where('id',$id)->delete();

    	if($rs){
    		echo 1;
    	}
    }
}
