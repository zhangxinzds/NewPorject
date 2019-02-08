<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Type;
use App\Http\Model\Admin\Goods;
class ListController extends Controller
{
    public function index($id)
    {
    	//分类名称
    	$rs = Type::find($id);
    	$type = $rs['name'];
    	$types = Type::where('pid',$rs['pid'])->get();
    	$result = Type::find($rs['pid']);
    	$ptype['name'] = $result['name'];
    	$ptype['id'] = $result['id'];
    	//商品
    	$goods = Goods::with('imgs')->where('tid',$id)->where('status',1)->paginate(6);
    	/*dump($goods[0]['imgs'][0]['pic']);exit;*/
    	return view('home.list',['title'=>'列表页','type'=>$type,'types'=>$types,'ptype'=>$ptype,'goods'=>$goods]);
    }
}
