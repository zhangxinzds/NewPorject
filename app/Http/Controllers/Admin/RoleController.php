<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Role;
use App\Http\Model\Admin\Permission;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs = Role::all();

        return view('admin.role.role',['title'=>'角色管理','rs'=>$rs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        'name' => 'required',
        ],[
        'name.required' => '请填写角色名'
        ]);
        $rs = $request->name;

        $role['rolename'] = $rs;

        $res = Role::create($role);

        if($res){
            return back()->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
    //修改
    public function ajax(Request $request)
    {
        $id = $request->id;
        $name = $request->name;

        $rs = Role::where('id',$id)->update(['rolename'=>$name]);
        if($rs){
            echo 1;
        }else{
            echo 2;
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
        $rs = Role::where('id',$id)->delete();

        if($rs){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    //角色权限添加
    public function peradd($id)
    {
        $rs = Role::find($id);
        //一定要排序,不然前台遍历的时候会乱
        $per = Permission::orderBy('group')->get();
        $arr = $rs->per;
        $array = [];
        foreach($arr as $k => $v){
            $array[] = $v['id'];
        }
        return view('admin.role.peradd',['title'=>'角色权限','rs'=>$rs,'per'=>$per,'array'=>$array]);
    }

    public function persave(Request $request,$id)
    {
        $rs = $request->all();
        $arr = [];
        foreach($rs['per'] as $k => $v){
            $array = [];
            $array['role_id']=$id;
            $array['per_id']=$v;
            $arr[] = $array;
        }
        //先清除原来的权限
        $result = DB::table('role_permission')->where('role_id',$id)->delete();
        //添加权限
        $res = DB::table('role_permission')->insert($arr);

        if($res){
            return back()->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
}
