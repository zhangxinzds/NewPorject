<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Manager;
use App\Http\Requests\Admin\ManagerAdd;
use Hash;
class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs = Manager::all();
        return view('admin.manager.manager',['title'=>'管理员列表页','rs'=>$rs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.manager.add',['title'=>'管理员添加页']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerAdd $request)
    {
        $rs = $request->except('_token','header','repassword');

        if($request->hasFile('header')){
            $file = $request->file('header');

            $name = rand(1111,9999).time();

            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads/',$name.'.'.$suffix);

            $rs['header'] = '/uploads/'.$name.'.'.$suffix;

        }else{
        //默认头像
            $rs['header'] = '/common/image/man.jpg';
        }

        if($request->status){
            $rs['status'] = '1';
        }else{
            $rs['status'] = '0';
        }
        $rs['addtime'] = time();

        $rs['password'] = Hash::make($request->password);

        try {
            $res = Manager::create($rs);
            if($res){
               return redirect('/admin/manager');
            }
        } catch (\Exception $e) {
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
        $rs = Manager::find($id);
        return view('admin.manager.edit',['title'=>'管理员修改页','rs'=>$rs]);
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
            'name'=>'required|regex:/\w{4,16}/',
            'tname' => 'required|regex:/\p{Han}/u'
        ],[
            'name.required' => '请输入用户名',
            'name.regex' => '用户名格式不正确',
            'tname.required' => '请输入姓名',
            'tname.regex' => '请输入真实姓名'
        ]);
        $rs = $request->except('_token','_method','header');
        $res = Manager::find($id);
        $header = $res->header;
        if($request->hasFile('header')){
            $file = $request->file('header');

            $name = rand(1111,9999).time();

            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads/',$name.'.'.$suffix);

            $rs['header'] = '/uploads/'.$name.'.'.$suffix;
            //删除原头像
            //默认头像不删除
            if($header != 'man.jpg'){
                @unlink('.'.$header);
            }
        }

        if($request->status){
            $rs['status'] = '1';
        }else{
            $rs['status'] = '0';
        }

        $res = Manager::where('id',$id)->update($rs);

        if($res){
            return redirect('/admin/manager');
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
        $res = Manager::find($id);
        $header = $res->header;
        $rs = Manager::where('id',$id)->delete();
        if($rs){
            //默认头像不删除
            if($header != '/common/image/man.jpg'){
                unlink('.'.$header);
            }
            return redirect('/admin/manager');
        }else{
            return back();
        }
    }

    public function ajax(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        if($status == '1'){
            Manager::where('id',$id)->update(['status'=>'0']);
        }else{
            Manager::where('id',$id)->update(['status'=>'1']);
        }
    }
}
