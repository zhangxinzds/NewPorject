<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Cart;
use App\Http\Model\Admin\Color;
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\Orders;
use App\Http\Model\Admin\OrderInfo;
use App\Http\Model\Admin\Goods;
use App\Http\Model\Admin\ColorImg;
use App\Http\Model\Admin\Size;
use DB;
class CheckoutController extends Controller
{
    public function index(Request $request)
    {
    	$rs = Cart::where('uid',session('id'))->get();
    	$req = $request->all();
    	$arr = [];
    	foreach($req['sl'] as $k => $v){
    		$arr[] = $v;
    	}
    	foreach($rs as $ke => $va){
    		$va['num'] = $arr[$ke];
    	}

    	$user = User::with('info')->where('id',session('id'))->first();
      $userinfo = DB::table('user_info')->where('uid',session('id'))->first();
      $order['tname'] = $userinfo->tname;
    	$order['number'] = date('Ymdhis').substr(microtime(),2,4);
    	$order['uname'] = $user['name'];
    	$order['phone'] = $user['info']['phone'];
    	$order['payway'] = '未支付';
    	$order['addtime'] = time();
    	$order['status'] = 0;
    	$order['total'] = $req['total'];
    	$order['address'] = $user['info']['address'];
  		//order表
    	$res = Orders::create($order);
    	$id = $res->id;
    	$or = $res::find($id);

    	$orderinfo = [];
   		foreach($rs as $key => $val){
   			$ci = ColorImg::where('cid',$val['cid'])->first();
   			$color = Color::where('id',$val['cid'])->first();
        $size = Size::where('id',$val['sid'])->first();
   			$ar['pic'] = $ci['pic'];
   			$ar['color'] = $color['color'];
   			$ar['sid'] = $val['sid'];
   			$ar['size'] = $size['size'];
   			$ar['name'] = $val['name'];
   			$ar['price'] = $val['price'];
   			$ar['num'] = $val['num'];
   			$ar['total'] = $val['num']*$val['price'];
   			$orderinfo[] = $ar;
   		}
   		//orderinfo表
   		$ru = $or->info()->createMany($orderinfo);

   		//清除cart表和seesion('cart')中的商品
   		$rus = Cart::where('uid',session('id'))->delete();
   		\Session::forget('cart');
   		if($res&&$ru&&$rus){

   			return redirect('/home/checkout1/'.$id);
   			
   		}else{

   			return back();
   		}
    }


    public function checkout1($id)
    {
    	$user = User::where('id',session('id'))->first();
        $name = $user['name'];
        $order = Orders::where('id',$id)->where('uname',$name)->where('status',0)->first();
        $orderinfo = OrderInfo::where('oid',$id)->get();
    	return view('home.checkout.checkout1',['title'=>'订单确认','order'=>$order,'orderinfo'=>$orderinfo,'id'=>$id]);
    }

    public function checkout2($id)
    {
    	  $user = User::where('id',session('id'))->first();
        $name = $user['name'];
        $order = Orders::where('id',$id)->where('uname',$name)->where('status',0)->first();
        $orderinfo = OrderInfo::where('oid',$id)->get();
    	return view('home.checkout.checkout2',['title'=>'地址确认','id'=>$id,'order'=>$order,'orderinfo'=>$orderinfo]);
    }

    public function checkout3(Request $request,$id)
    {
    	$rs = $request->all();
    	if($rs){
	    	$this->validate($request, [
		        'phone' => 'required|regex:/1[3456789]\d{9}/',
		        'address' => 'required',
			],[
				'phone.required' => '请输入手机号',
				'address.required' => '请填写收货地址',
				'phone.regex' => '手机号码格式不正确',
			]);
	    	Orders::where('id',$id)->update($rs);
    	}

		$user = User::where('id',session('id'))->first();
	    $name = $user['name'];
	    $order = Orders::where('id',$id)->where('uname',$name)->where('status',0)->first();
	    $orderinfo = OrderInfo::where('oid',$id)->get();
		return view('home.checkout.checkout3',['title'=>'付款方式','id'=>$id,'order'=>$order,'orderinfo'=>$orderinfo]);
    }

    public function checkout4(Request $request,$id)
    {
    	$this->validate($request, [
	        'payway' => 'required',
		],[
			'payway.required' => '请选择一种支付方式',
		]);
		$rs = $request->all();
		Orders::where('id',$id)->update($rs);

		$user = User::where('id',session('id'))->first();
	    $name = $user['name'];
	    $order = Orders::where('id',$id)->where('uname',$name)->where('status',0)->first();
	    $orderinfo = OrderInfo::where('oid',$id)->get();
		return view('home.checkout.checkout4',['title'=>'支付','id'=>$id,'order'=>$order,'orderinfo'=>$orderinfo]);
    }

    public function checkout5($id)
    {
    	//改变订单的status
    	$rs = Orders::where('id',$id)->update(['status'=>1]);
    	if($rs){
    		return view('home.checkout.checkout5',['title'=>'完成']);
    	}else{
    		return view('home.checkout.checkout5',['title'=>'完成']);
    	}
    }
}
