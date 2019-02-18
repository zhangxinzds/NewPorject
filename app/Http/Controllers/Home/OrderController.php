<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\Comment;
use App\Http\Model\Admin\Size;
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
	    $array = ['0'=>'未支付','1'=>'待发货','2'=>'已发货','3'=>'已收货'];
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

    public function status(Request $request)
    {
        $ope = $request->val;
        $id = $request->id;
        if($ope == '确认收货'){
            $res = Orders::where('id',$id)->update(['status'=>3]);
            if($res){
                echo '已收货';
            }else{
                echo '操作失败';
            }
        }
    }

    public function cancel(Request $request)
    {
        $id = $request->id;
        $result = OrderInfo::where('oid',$id)->get();
        foreach($result as $k => $v){
            $sid = $v['sid'];
            $ress = Size::where('id',$v['sid'])->first();
            $stock = $v['num']+$ress['stock'];
            Size::where('id',$sid)->update(['stock'=>$stock]);
        }

        $rs = Orders::where('id',$id)->delete();
        $res = OrderInfo::where('oid',$id)->delete();
        if($rs&&$res){
            echo 1;
        }else{
            echo 2;
        }
    }

    public function comment(Request $request)
    {
        $this->validate($request, [
        'score' => 'required',
        'comment' => 'required',
        ],[
         'score.required' => '请对商品评分',
         'comment.required' => '请填写评价内容',
        ]);
        $arr = $request->except('_token');
        $arr['uid'] = session('id');
        $arr['addtime'] = time();
        $res = Comment::create($arr);

        if($res){

            return back()->with('success','评论成功');

        }else{

            return back()->width('error','评论失败');

        }

    }
}
