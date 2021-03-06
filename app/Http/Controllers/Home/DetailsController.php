<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Color;
use App\Http\Model\Admin\Goods;
use App\Http\Model\Admin\ColorImg;
use App\Http\Model\Admin\Size;
use App\Http\Model\Admin\Type;
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\Comment;


class DetailsController extends Controller
{
    public function index($id)
    {
    	$goods = Goods::find($id);
        $type = Type::where('id',$goods['tid'])->first();
        $typename = $type['name'];
    	$color = Color::where('gid',$id)->where('display',1)->get();
    	//如何商品没有添加颜色规格
    	if(!count($color)){
    		return back();
    	}
    	foreach($color as $v){
    		if($v['color'] == '白色'){
    			$v['color'] = 'white';
    		}elseif($v['color'] == '红色'){
    			$v['color'] = 'red';
    		}elseif($v['color'] == '蓝色'){
    			$v['color'] = 'blue';
    		}elseif($v['color'] == '绿色'){
    			$v['color'] = 'green';
    		}elseif($v['color'] == '黑色'){
    			$v['color'] = 'black';
    		}elseif($v['color'] == '粉色'){
    			$v['color'] = 'pink';
    		}
    	}
    	$cid = $color[0]['id'];
    	$colorimg = ColorImg::where('cid',$cid)->get();
        $comment = Comment::where('gid',$id)->orderBy('addtime','desc')->paginate(5);
    	return view('home.details',['title'=>'商品详情页','color'=>$color,'colorimg'=>$colorimg,'goods'=>$goods,'typename'=>$typename,'comment'=>$comment]);
    }

    public function colorimgajax(Request $request)
    {
    	$cid = $request->cid;

    	$res = ColorImg::where('cid',$cid)->get();

    	echo json_encode($res);
    }

    public function sizeajax(Request $request)
    {
    	$cid = $request->cid;

    	$rs = Size::where('cid',$cid)->where('stock','>',0)->get();

    	echo json_encode($rs);
    }
}
