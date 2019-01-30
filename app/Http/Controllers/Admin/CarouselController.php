<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\http\Model\Admin\Carousel;
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs = Carousel::all();
        $arr=[];
        $array=[];
        foreach($rs as $v){
            $arr[] = $v['lid'];
        }
        $a = array_unique($arr);
        foreach($a as $v){
            $array[] = $v;
        }
        //计算轮播图组数的算法
        $num = count($array);
/*        foreach($rs as $k=>$v){
            if($k == 0){
                $pre = $v['lid'];
                $a = $pre;
            }elseif($k > 0){
                $pre = $rs[$k-1]['lid'];
            }
           if($pre != $v['lid']){
             $num++;
           }
        }*/

        return view('admin.carousel.carousel',['title'=>'轮播图列表页','rs'=>$rs,'num'=>$num,'array'=>$array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.add',['title'=>'轮播图添加页']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'lid' => 'required',
        'pic' => 'required',
        ],[
        'lid.required' => '请填写组号',
        'pic.required'  => '请添加图片',
        ]);

        $lid = $request->lid;

        if($request->hasFile('pic')){

            $file = $request->file('pic');

            $res = [];
            foreach($file as $k => $v){
                $arr = [];

                $arr['lid'] = $lid;

                //设置名字
                $name = rand(1111,9999).time();

                //获取后缀
                $suffix = $v->getClientOriginalExtension();

                //移动文件
                $v->move('./uploads/carousel', $name.'.'.$suffix);

                //存储图片的路径
                $arr['pic'] = '/uploads/carousel/'.$name.'.'.$suffix;

                $res[] = $arr;
            }
            $rs = Carousel::insert($res);
        }
        if($rs){
            return redirect('/admin/carousel')->with('success','添加成功');
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
        $carousel = Carousel::where('lid',$id)->get();
        return view('admin.carousel.edit',['title'=>'轮播图修改页','carousel'=>$carousel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pic' => 'required',
        ],[
            'pic.required' => '未做任何修改',
        ]);

        if($request->hasFile('pic')){

            $file = $request->file('pic');

            $res = [];
            foreach($file as $k => $v){
                $arr = [];

                $arr['lid'] = $id;

                //设置名字
                $name = rand(1111,9999).time();

                //获取后缀
                $suffix = $v->getClientOriginalExtension();

                //移动文件
                $v->move('./uploads/carousel', $name.'.'.$suffix);

                //存储图片的路径
                $arr['pic'] = '/uploads/carousel/'.$name.'.'.$suffix;

                $res[] = $arr;
            }
            $rs = Carousel::insert($res);
        }
        if($rs){
            return redirect('/admin/carousel')->with('success','修改成功');
        }else{
            return back();
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
        $res = Carousel::where('lid',$id)->get();
        foreach($res as $k=>$v){
            unlink('.'.$v->pic);
        }
        $rs = Carousel::where('lid',$id)->delete();

        if($rs&&$res){
            return redirect('/admin/carousel')->with('success','删除成功');
        }else{
            return back();
        }
    }

    public function ajax(Request $request)
    {
        $id = $request->id;
        $res = Carousel::find($id);
        $rs = Carousel::where('id',$id)->delete();
        unlink('.'.$res['pic']);
        if($rs){
            echo 1;
        }else{
            echo 2;
        }
    }
}
