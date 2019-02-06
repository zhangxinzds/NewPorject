<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Type;
use DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs = Type::where('pid','0')->get();
        return view('admin.type.type',['title'=>'分类管理页面','rs'=>$rs]);
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

        return view('admin.type.add',['title'=>'分类添加页面','rs'=>$rs]);
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
            'name' => 'required|regex:/^[\x{4e00}-\x{9fa5}]+(,[\x{4e00}-\x{9fa5}]+)*$/u',
        ],[
            'name.required' => '请填写类型',
            'name.regex' => '输入格式不正确'
        ]);

        $str = trim($request->name,',');
        //display获取
        if($request->display){
            $dis = '1';
        }else{
            $dis = '0';
        }
        //path获取
        if($request->pid=='0'){
            $path = '0,';
        }else{
            $res = Type::where('id',$request->pid)->first();
            $path = $res->path.$res->id.',';
        }
        //批量处理
        $arr = explode(',',$str);
        $a = 0;
        foreach($arr as $k=>$v){
            $array[$a]['name'] = $v; 
            $array[$a]['pid'] = $request->pid;
            $array[$a]['path'] = $path;
            $array[$a]['display'] = $dis;
            $a++;
        }
        $rs = Type::insert($array);
        if($rs){
            return redirect('/admin/type');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Type::where('pid',$id)->first();

        if($res!=''){
            return back()->with('error','删除分类中有子分类或商品');
        }else{
            $result = Type::where('id',$id)->first();
            $pid = $result['pid'];
            $rs = Type::where('id',$id)->delete();
            if($rs){
                return redirect('/admin/typechild/'.$pid);
            }else{
                return back();
            }
        }
    }

    public function display($dis,$id)
    {

        if($dis == '0'){
            $rs = Type::where('id',$id)->update(['display'=> '1']);
        }else{
            $rs = Type::where('id',$id)->update(['display'=> '0']);
        }       
    }

    public function nameajax(Request $request)
    {

        $id = $request->id;
        $rs = $request->only('name');
        $res = Type::where('id',$id)->update($rs);

        if($res){
            echo 1;
        } else {
            echo 0;
        }
    }

    public function addChild($id,$path)
    {
        return view('admin.type.addchild',['title'=>'子分类添加页面','id'=>$id,'path'=>$path]);
    }

    public function saveChild(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|regex:/^[\x{4e00}-\x{9fa5}]+(,[\x{4e00}-\x{9fa5}]+)*$/u',
        ],[
            'name.required' => '请填子分类',
            'name.regex' => '输入格式不正确'
        ]);
        $str = trim($request->name,',');
        //状态处理
        if($request->display=="on"){
            $dis = '1';
        }else{
            $dis = '0';
        }
        //批量处理
        $arr = explode(',',$str);
        $a = 0;
        foreach($arr as $k=>$v){
            $array[$a]['name'] = $v; 
            $array[$a]['pid'] = $request->pid;
            $array[$a]['path'] = $request->path;
            $array[$a]['display'] = $dis;
            $a++;
        }
        //添加后回到当前分类页面
        $rs = Type::insert($array);
        $res = Type::find($request->pid);
        $num = $res->pid; 
        if($rs){
            return redirect('/admin/typechild/'.$num);
        }else{
            return back();
        }
    }

    public function typeChild($id)
    {
        $rs = Type::where('pid',$id)->get();
        return view('admin.type.type',['title'=>'子分类页面','rs'=>$rs]);
    }

}
