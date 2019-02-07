<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Goods;
use App\Http\Model\Admin\GoodsImg;
use App\Http\Model\Admin\Type;
use App\Http\Model\Admin\Color;
use App\Http\Model\Admin\ColorImg;
use App\Http\Model\Admin\Size;
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


    public function status($sta,$id)
    {
        if($sta == '0'){
            $rs = Goods::where('id',$id)->update(['status'=> '1']);
        }else{
            $rs = Goods::where('id',$id)->update(['status'=> '0']);
        }
    }

    public function ajax(Request $request)
    {
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

    public function spe($id)
    {
        $rs = Goods::find($id)->color()->get();

        return view('admin.goods.spe',['title'=>'颜色规格','gid'=>$id,'rs'=>$rs]);
    }
    //新增颜色
    public function color(Request $request)
    {
        $this->validate($request, [
            'color' => 'required',
            'pic'  => 'required',
        ],[
            'color.required' => '请填写颜色',
            'pic.required' => '请添加图片',
        ]);

        $rs = $request->except('_token','pic');

        //color表添加颜色
        $res = Color::create($rs);
        $id = $res['id'];
        $coid = $res::find($id);


        $cid = $res['id'];
        if($request->hasFile('pic')){
            $file = $request->file('pic');

            $array = [];
            foreach($file as $k => $v){
                $arr = [];

                $arr['cid'] = $cid;

                //设置名字
                $name = rand(1111,9999).time();

                //获取后缀
                $suffix = $v->getClientOriginalExtension();

                //移动文件
                $v->move('./uploads/colorimg', $name.'.'.$suffix);

                //存储图片的路径
                $arr['pic'] = '/uploads/colorimg/'.$name.'.'.$suffix;

                $array[] = $arr;
            }
        }
        //往color_img表中添加对应颜色的图片
        $result = $coid->colorimg()->createMany($array);

        if($res&&$result){

            return back()->with('success','添加成功');

        }else{

            return back()->with('error','添加失败');
        }

    }

    //颜色上下架
    public function colorajax(Request $request)
    {
        $sta = $request->sta;
        $id = $request->id;
        $res = Size::where('cid',$id)->first();

        //没有库存无法上架
        if(!$res){
            echo 1;exit;
        }

        if($sta == '0'){
            $rs = Color::where('id',$id)->update(['display'=> '1']);
        }else{
            $rs = Color::where('id',$id)->update(['display'=> '0']);
        }
    }
    //删除颜色
    public function colordelete($id)
    {
        //删除颜色
        $rs = Color::where('id',$id)->delete();
        $res = ColorImg::where('cid',$id)->get();
        //删除对应的size
        $ress = Size::where('cid',$id)->delete();
        //删除颜色对应的图片
        foreach($res as $k=>$v){
            unlink('.'.$v->pic);
        }

        $result = ColorImg::where('cid',$id)->delete();

        if($rs&&$ress){
            return back();
        }else{
            echo 111;
        }
    }
    //规格修改
    public function sizeupdateajax(Request $request)
    {
        $id = $request->id;
        $arr['size'] = $request->size;
        $arr['stock'] = $request->stock;
        $res = Size::where('id',$id)->update($arr);
        if($res){
            echo 1;
        }
    }
    //规格添加
    public function sizeaddajax(Request $request)
    {
        $arr['cid'] = $request->cid;
        $arr['stock'] = $request->stock;
        $arr['size'] = $request->size;
        $res = Size::insert($arr);
        if($res){
            echo 1;
        }
        
    }
    //规格删除
    public function sizedeleteajax(Request $request)
    {
        $id = $request->id;

        $res = Size::where('id',$id)->delete();

        if($res){
            echo 1;
        }
    }
}
