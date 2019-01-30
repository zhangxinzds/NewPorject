<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Goods;
use App\Http\Model\Admin\GoodsImg;
use App\Http\Model\Admin\Type;
use DB;
use App\Http\Requests\Admin\GoodsAdd;
use App\Http\Requests\Admin\GoodsEdit;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs = Goods::all();

        return view('admin.goods.goods',['title'=>'商品列表页','rs'=>$rs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $rs = DB::select('select *,concat(path,id) as paths from type ORDER BY paths');

        foreach($rs as $k=> $v){

            //改变catename 分类名
            $level = substr_count($v->path, ',')-1;

            $v->name = str_repeat('--',$level).$v->name;
        }
        return view('admin.goods.add',['title'=>'商品添加页','rs'=>$rs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsAdd $request)
    {
        $rs = $request->except('_token','pic');

        $rs['addtime'] = time();

        if($request->status){
            $rs['status'] = "1";
        }else{
            $rs['status'] = "0";
        }

        $gid = Goods::insertGetId($rs);
        if(!$gid){
            return back();
        }
        if($request->hasFile('pic')){
            $file = $request->file('pic');

            $res = [];
            foreach($file as $k => $v){
                $arr = [];

                $arr['gid'] = $gid;

                //设置名字
                $name = rand(1111,9999).time();

                //获取后缀
                $suffix = $v->getClientOriginalExtension();

                //移动文件
                $v->move('./uploads/goodsimg', $name.'.'.$suffix);

                //存储图片的路径
                $arr['pic'] = '/uploads/goodsimg/'.$name.'.'.$suffix;

                $res[] = $arr;
            }
        }
        $rs = Goodsimg::insert($res);        
        if($rs){
            return redirect('/admin/goods');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rs = DB::select('select *,concat(path,id) as paths from type ORDER BY paths');

        $goods = Goods::find($id);
        
        foreach($rs as $k=> $v){

            $level = substr_count($v->path, ',')-1;

            $v->name = str_repeat('--',$level).$v->name;
        }

        $goodsimg = GoodsImg::where('gid',$id)->get();

        return view('admin.goods.edit',['title'=>'商品修改页','rs'=>$rs,'goods'=>$goods,'goodsimg'=>$goodsimg]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsEdit $request, $id)
    {

        $rs = $request->except('_token','_method','pic');

        if($request->status){
            $rs['status'] = "1";
        }else{
            $rs['status'] = "0";
        }
        $result = Goods::where('id',$id)->update($rs);
        $info = 0;
        if($request->hasFile('pic')){
            $file = $request->file('pic');
            $res = [];
            $arr = [];
            foreach($file as $k=>$v){
                $arr['gid'] = $id;
                $name = rand(1111,9999).time();
                $suffix = $v->getClientOriginalExtension();
                $v->move('./uploads/goodsimg', $name.'.'.$suffix);
                $arr['pic'] = '/uploads/goodsimg/'.$name.'.'.$suffix;
                $res[] = $arr;
            }
                $info = GoodsImg::insert($res);      
        }

        if($result || $info){
            return redirect('/admin/goods')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = Goods::where('id',$id)->delete();

        $res = GoodsImg::where('gid',$id)->get();
        foreach($res as $k=>$v){
            unlink('.'.$v->pic);
        }
        $result = GoodsImg::where('gid',$id)->delete();
        if($rs&&$result){
            return redirect('/admin/goods')->with('success','删除成功');
        }else{
            return back();
        }
    }


    public function status($sta,$id){
        if($sta == '0'){
            $rs = Goods::where('id',$id)->update(['status'=> '1']);
        }else{
            $rs = Goods::where('id',$id)->update(['status'=> '0']);
        }
    }

    public function ajax(Request $request){
       $id = $request->id;
       $res = GoodsImg::where('id',$id)->first();
       $rs = GoodsImg::where('id',$id)->delete();
       unlink('.'.$res['pic']);
       if($rs){
          echo '1';
       }else{
          echo '2';
       }

    }
}
