<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class CartController extends Controller
{
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

    	$rs = $request->except('_token');
    	$rs['num'] = ltrim($rs['num'],'0');
    	Session::push('cart',$rs);
    	dump(session('cart'));
    }

    public function index()
    {
    	
    }
}
