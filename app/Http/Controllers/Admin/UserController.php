<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\UserInfo;
use Hash;
use App\Http\Requests\Admin\UserAdd;
use App\Http\Requests\Admin\UserEdit;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users=User::all();
        // print($users);exit;

        $rs = User::with('info')->get();
        //用户等级
        $arr = ['普通用户','会员','VIP会员'];
        foreach($rs as $k=>$v){
            $v->level = $arr[$v->level];
        }

        return view('admin.user.user',['title'=>'用户列表','rs'=>$rs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAdd $request)
    {
        $rs = $request->except(['_token','repassword','header']);
        //时间处理
        $rs['addtime'] = time();
        //头像处理
        if($request->hasFile('header')){
            $file = $request->file('header');

            $name = rand(1111,9999).time();

            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads/',$name.'.'.$suffix);

            $rs['header'] = '/uploads/'.$name.'.'.$suffix;

        }else{
            $rs['header'] = '/common/image/man.jpg';
        }
        //状态处理
        if($request->status){
            $rs['status'] = "1";
        }else{
            $rs['status'] = "0";
        }
        
        //密码加密
        $rs['password'] = Hash::make($request->password);

        try {
            $data = User::create($rs);
            if($data){
                return redirect('/admin/user');
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
        $rs = User::with('info')->find($id);
        return view('admin.user.edit',['title'=>'用户修改','rs'=>$rs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEdit $request, $id)
    {
        //查询原来的头像
        $res = User::find($id);
        $header = $res->header;
        //user表信息
        $rs = $request->only('name','level','status');
        //user_info表信息
        $info = $request->only('tname','address','phone','email','sex');
        $info['uid'] = $id;
         //头像处理
        if($request->hasFile('header')){
            $file = $request->file('header');

            $name = rand(1111,9999).time();

            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads/',$name.'.'.$suffix);

            $rs['header'] = '/uploads/'.$name.'.'.$suffix;
            //删除原头像
            //默认头像不删除
            if($header != '/common/image/man.jpg'){
                @unlink('.'.$header);
            }
        }
        //状态处理
        if($request->status){
            $rs['status'] = "1";
        }else{
            $rs['status'] = "0";
        }
        //更新user表
        $result = User::where('id',$id)->update($rs);
        //更新user_info表
        if(UserInfo::where('uid',$id)->first()){
            //之前有数据就更新
            $resultInfo = UserInfo::where('uid',$id)->update($info);
        }else{
            //没有就添加
            $resultInfo = UserInfo::create($info);
        }
        if($result || $resultInfo){
            return redirect('/admin/user');
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
        $res = User::find($id);
        $header = $res['header'];
        $rs = User::where('id',$id)->delete();
        if($rs){
            //默认头像不删除
            if($header != '/common/image/man.jpg')
            {
                unlink('.'.$header);
            }
            return redirect('/admin/user');
        }else{
            return back();
        }
    }

    public function status($sta,$id){
        if($sta == '0'){
            $rs = User::where('id',$id)->update(['status'=> '1']);
        }else{
            $rs = User::where('id',$id)->update(['status'=> '0']);
        }
    }
}
