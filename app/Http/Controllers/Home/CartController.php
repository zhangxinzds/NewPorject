<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Cart;
use App\Http\Model\Admin\Size;
use App\Http\Model\Admin\Color;
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
        $rs = $request->except('_token');
        $rs['num'] = ltrim($rs['num'],'0');
        //更新size表中的库存
        $size = Size::where('id',$request->sid)->first();
        $stock = $size['stock'];    
        $min = $stock - $request->num;
        $ress = Size::where('id',$request->sid)->update(['stock'=>$min]);
        if(!$ress){
            return back()->with('error','购买失败');
        }

        //如何该颜色的所有库存都被买光了,则下架该颜色
        $sizes = Size::where('cid',$request->cid)->get();
        $nu = 0; 
        foreach($sizes as $k => $v){
            if($v['stock'] == '0'){
                $nu++;
            }
        }
        if($nu == count($sizes)){
           $rsss = Color::where('id',$request->cid)->update(['display'=>'0']);
        }
        //已经登录
        if(session('id')){
            $cart = Cart::where('uid',session('id'))->where('sid',$request->sid)->first();
            if($cart){
                $numb = $cart['num'];
                $pls = $numb + $request->num;
                Cart::where('uid',session('id'))->where('sid',$request->sid)->update(['num'=>$pls]);
            }else{
                $rs['uid'] = session('id');
                Cart::insert($rs);
            }
        }else{
        	//尚未登录先存入session
            $arr = [];
            $array = [];
            //用$sta判断此次购买的商品之前是否已经添加到购物车
            $sta = 0;
            if(count(session('cart')) >= 1){
                foreach(session('cart') as $k => $v){
                    //如果购买的商品session中已经存在了,那么只要改变数量即可
                    if($v['sid'] == $request->sid){
                        $v['num'] += $request->num;
                        $arr = $v;
                        $sta = 1;
                    }else{
                        $arr = $v;
                    }
                    $array[] = $arr;
                }
                if($sta == 0){
                    //没有添加过
                    Session::push('cart',$rs); 
                }else{
                    //删除原来的session('cart'),重新添加session
                    Session::forget('cart');
                    //$array为新session('cart')
                    foreach($array as $k => $v){
                        Session::push('cart',$v);
                    }
                }
            }else{
                //第一次添加空购物车
               Session::push('cart',$rs); 
            }
        }
        return back()->with('success','商品已添加至购物车');
    }

    public function delete(Request $request)
    {
    	$id = $request->id;
        //删除购物车商品的时候要将库存加回去
        $res = Cart::where('id',$id)->first();
        //购买数量
        $num = $res['num'];
        //size表中的id
        $sid = $res['sid'];

        $size = Size::where('id',$sid)->first();

        $stock = $size['stock'];

        $pls = $stock + $num;

        $result = Size::where('id',$sid)->update(['stock'=>$pls]);

    	$rs = Cart::where('id',$id)->delete();

    	if($rs&&$result){
    		echo 1;
    	}
    }
}
