<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Orders;
use App\Http\Model\Admin\OrderInfo;
class OrdersController extends Controller
{
    public function index()
    {
    	$order = Orders::all();
    	$array = ['0'=>'未支付','1'=>'待发货','2'=>'已发货','3'=>'已收货','4'=>'已评价'];
	    foreach($order as $k => $v){
	    	$v['status'] = $array[$v['status']];
	    }
    	return view('admin.order.order',['title'=>'订单列表','order'=>$order]);
    }

    public function status(Request $request)
    {
    	//当前操作
    	$ope = $request->val;
    	//订单id
    	$id = $request->id;

    	if($ope == '发货'){
    		$res = Orders::where('id',$id)->update(['status'=>2]);
    		if($res){
    			echo '已发货';
    		}else{
    			echo '操作失败';
    		}
    	}
    }

    public function orderinfo($id)
    {
    	$order = Orders::find($id);
    	$info = OrderInfo::where('oid',$id)->get();
    	return view('admin.order.orderinfo',['title'=>'订单详情','info'=>$info,'order'=>$order]);
    }
}
