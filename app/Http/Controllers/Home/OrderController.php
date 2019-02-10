<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\Orders;
use App\Http\Model\Admin\OrderInfo;

class OrderController extends Controller
{
    public function index()
    {
    	$user = User::where('id',session('id'))->first();
	    $name = $user['name'];
	    $order = Orders::where('uname',$name)->get();
	    $num = Orders::where('uname',$user['name'])->count();
	    $array = ['0'=>'未支付','1'=>'待发货','2'=>'待收货','3'=>'已完成'];
	    foreach($order as $k => $v){
	    	$v['status'] = $array[$v['status']];
	    }
    	return view('home.orders',['title'=>'用户订单','order'=>$order,'user'=>$user,'num'=>$num]);
    }

    public function order($id)
    {
    	$user = User::where('id',session('id'))->first();
    	$order = OrderInfo::where('oid',$id)->get();
    	$or = Orders::where('id',$id)->first();
    	$num = Orders::where('uname',$user['name'])->count();
    	return view('home.order',['title'=>'订单详情','order'=>$order,'or'=>$or,'user'=>$user,'num'=>$num]);
    }
}
