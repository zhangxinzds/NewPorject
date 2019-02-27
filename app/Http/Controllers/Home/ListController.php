<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Type;
use App\Http\Model\Admin\Goods;
class ListController extends Controller
{
    public function index(Request $request,$id)
    {
    	//分类名称
    	$rs = Type::find($id);
    	$type = $rs['name'];
    	$types = Type::where('pid',$rs['pid'])->get();
    	$result = Type::find($rs['pid']);
    	$ptype['name'] = $result['name'];
    	$ptype['id'] = $result['id'];
    	//商品
        $goods = Goods::orderBy('id','asc')
        ->where(function($query) use($request){
            //检测关键字
            //价格范围
            $price = [$request->lower,$request->upper];
            //品牌范围
            $brand = $request->brand;
            //如果价格不为空
            if(!empty($price[0])) {
                $query->whereBetween('price',$price);
            }
            //如果品牌不为空
            if(!empty($brand)) {
                $query->whereIn('company',$brand);
            }
        })
            ->where('tid',$id)->where('status',1)->paginate(6);
        //拿到商品厂家
        $res = Goods::where('tid',$id)->get();
        $arr = [];
        foreach($res as $k => $v){
            $arr[] = $v['company'];
        }
        $company = array_unique($arr);
    	return view('home.list',['title'=>'列表页','type'=>$type,'types'=>$types,'ptype'=>$ptype,'goods'=>$goods,'company'=>$company,'id'=>$id]);
    }
}
