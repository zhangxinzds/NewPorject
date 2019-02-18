<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Goods;
use App\Http\Model\Admin\Type;
class IndexController extends Controller
{
	public function index(){

    	return view('home.index',['title'=>'前台首页']);

	}

	//搜索
	public function search(Request $request)
	{
		//查询条件
		$search = $request->search;
		$res = Goods::where('name','like','%'.$search.'%')->get();
		if(count($res)==0){
			return view('home.emptylist',['title'=>'列表页']);
		}
		$id = $res[0]['tid'];
		$rs = Type::find($id);
    	$type = $rs['name'];
    	$types = Type::where('pid',$rs['pid'])->get();
    	$result = Type::find($rs['pid']);
    	$ptype['name'] = $result['name'];
    	$ptype['id'] = $result['id'];
    	//商品
    	$goods = Goods::with('imgs')->where('name','like','%'.$search.'%')->where('tid',$id)->where('status',1)->paginate(6);
    	/*dump($goods[0]['imgs'][0]['pic']);exit;*/

    	return view('home.list',['title'=>'列表页','type'=>$type,'types'=>$types,'ptype'=>$ptype,'goods'=>$goods]);
	}

}
