<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Permission;
use App\Http\Model\Admin\Manager;
use App\Http\Model\Admin\Role;
use DB;
class PerController extends Controller
{
    public function index()
    {   
        //一定要排序,不然前台遍历的时候会乱
    	$rs = Permission::orderBy('group')->get();

    	return view('admin.permission.permission',['title'=>'权限管理','rs'=>$rs]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
        'pername' => 'required',
        'url' => 'required'
        ],[
        'pername.required' => '请添加权限名',
        'url.required' => '请输入url地址'
        ]);
    	$rs = $request->except('_token');

    	$res = Permission::insert($rs);

    	if($res){
    		return back()->with('success','添加成功');
    	}else{
    		return back()->with('error','添加失败');
    	}
    }

    public function edit(Request $request)
    {
         $this->validate($request, [
        'prename' => 'nullable|regex:/\p{Han}/u',
        'url' => 'nullable'
        ],[
        'prename.required' => '请添加权限名',
        'prename.regex' => '请输入权限名称',
        'url.required' => '请输入url地址'
        ]);
    	$rs = array_filter($request->except('_token','id'));
        $id = $request->id;
        $res = Permission::where('id',$id)->update($rs);

        if($res){
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    public function delete($id)
    {
        $rs = Permission::where('id',$id)->delete();

        if($rs){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    public function managerrole($id)
    {
        $rs = Manager::find($id);
        $result = $rs->role;
        $array = [];
        foreach($result as $k => $v){
            $array[] = $v['id'];
        }
        $role = Role::all();
        return view('admin.manager.permission',['title'=>'管理员角色','rs'=>$rs,'role'=>$role,'array'=>$array]);
    }

    public function managerroleadd(Request $request,$id)
    {
        $rs = $request->only('role');
        if(count($rs)==0){
            $result = DB::table('user_role')->where('user_id',$id)->delete();
            if($result){
                return back()->with('success','保存成功');
            }else{
                return back()->with('error','保存失败');
            }
        }

        $array = [];
        foreach($rs['role'] as $k => $v){
            $arr = [];
            $arr['user_id'] = $id;
            $arr['role_id'] = $v;
            $array[] = $arr;
        }
        
        //清除原来的角色
        $result = DB::table('user_role')->where('user_id',$id)->delete();
        //添加新角色
        $res = DB::table('user_role')->insert($array);

        if($res){
            return back()->with('success','保存成功');
        }else{
            return back()->with('error','保存失败');
        }

    }
}
