@extends('layout.admin.index')

@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
@section('menu')

<ul class="nav nav-pills nav-stacked custom-nav">
    <li class=""><a href="{{route('admin')}}"><i class="fa fa-home"></i> <span>首页</span></a></li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>管理员</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/manager">管理员列表</a></li>
            <li><a href="/admin/manager/create">新增管理员</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>用户管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/user">用户列表</a></li>
            <li><a href="/admin/user/create">用户添加</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>分类管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/type">分类列表</a></li>
            <li><a href="/admin/type/create">分类添加</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>商品管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/goods">商品列表</a></li>
            <li><a href="/admin/goods/create">商品添加</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>轮播管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/carousel">轮播列表</a></li>
            <li><a href="/admin/carousel/create">轮播添加</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>友链管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/link">友链列表</a></li>
            <li><a href="/admin/link/create">友链添加</a></li>
        </ul>
    </li>

    <li><a href="/admin/role"><i class="fa fa-bullhorn"></i><span>角色管理</span></a></li>

    <li class="active"><a href="/admin/permission"><i class="fa fa-bullhorn"></i><span>权限管理</span></a></li>

    <li><a href="/admin/orders"><i class="fa fa-bullhorn"></i><span>订单管理</span></a></li>

</ul>
@stop

@section('page-heading')
<div class="page-heading">
    <h3>
        权限管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/goods">权限管理</a>
        </li>
        <li class="active">权限列表</li>
    </ul>
</div>
@stop

@section('content')
<style>
    th,td{text-align: center}
</style>
 <div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    权限列表
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down">
                        </a>
                        <a href="javascript:;" class="fa fa-times">
                        </a>
                    </span>
                </header>
                    @if (session('success'))
                        <div class="alert alert-success" id="errormessage">
                            {{ session('success') }}
                        </div>
                    @endif                    
                    @if (session('error'))
                        <div class="alert alert-success" id="errormessage">
                            {{ session('error') }}
                        </div>
                    @endif
                <div class="panel-body">
                    <div class="adv-table">
                        <div class="btn-group" style="margin:10px">
                            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                                添加权限<i class="fa fa-plus"></i>
                            </button>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger" id="errormessage">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <table class="display table table-bordered" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>
                                        模块
                                    </th>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        权限
                                    </th>
                                    <th>
                                        URL
                                    </th>
                                    <th>
                                        操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1;$j=1; @endphp 
                                @foreach($rs as $k => $v)
                                <tr class="gradeA">
                                    @php
                                    $num = DB::table('permission')->where('group',$v['group'])->count();
                                    @endphp
                                    @if($j%$num == 1)
                                    <td rowspan="{{$num}}" style="line-height:{{$num*55}}px;background-color:white">
                                        {{$v['group']}}
                                    </td>
                                    @endif
                                    <td style="background-color:white">
                                        {{$i++}}
                                    </td>
                                    <td style="background-color:white">
                                        {{$v['pername']}}
                                    </td>
                                    <td style="background-color:white">
                                        {{$v['url']}}
                                    </td>
                                   <td style="background-color:white">
                                       <button class="btn btn-success" data-toggle="modal" data-target="#myModal{{$v['id']}}">修改</button>
                                       <a href="/admin/permissiondelete/{{$v['id']}}" onclick="return confirm('确定删除?')" class="btn btn-danger">删除</a>
                                   </td>
                                </tr>
                                @php
                                    if($num != $j){
                                        $j++;
                                    }else{
                                        $j = 1;
                                    }
                                @endphp
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </section>
        </div>
</div> 
    </div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px;">
    <div class="modal-dialog" style="width:1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    添加权限
                </h4>
            </div>
            <div class="modal-body">
            <!-- 内容start -->
                 <form role="form" action="/admin/permissionadd" method="post" class="form-horizontal adminex-form"  enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}}
                    <div class="form-group has-success">
                        <label class="col-lg-3 control-label">所属分组</label>
                        <div class="col-lg-7 input-group-lg">
                            <select name="group" class="selectpicker">
                                <option value="管理员模块">管理员模块</option>
                                <option value="用户模块">用户模块</option>
                                <option value="分类模块">分类模块</option>
                                <option value="商品模块">商品模块</option>
                                <option value="轮播图模块">轮播图模块</option>
                                <option value="角色模块">角色模块</option>
                                <option value="权限模块">权限模块</option>
                                <option value="订单模块">订单模块</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="col-lg-3 control-label">权限名</label>
                        <div class="col-lg-3 input-group-lg">
                            <input type="text" name="prename" placeholder="" id="f-name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="col-lg-3 control-label">URL</label>
                        <div class="col-lg-7 input-group-lg">
                            <input type="text" name="url" placeholder="" id="f-name" class="form-control">
                        </div>
                    </div>
                 <!-- 内容end -->
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">关闭</a>
                <button  class="btn btn-primary">提交</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

@foreach($rs as $k => $v)
<div class="modal fade" id="myModal{{$v['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px;">
    <div class="modal-dialog" style="width:1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    添加权限
                </h4>
            </div>
            <div class="modal-body">
            <!-- 内容start -->
                 <form role="form" action="/admin/permissionedit" method="post" class="form-horizontal adminex-form"  enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}}
                    <div class="form-group has-success">
                        <label class="col-lg-3 control-label">权限名</label>
                        <div class="col-lg-3 input-group-lg">
                            <input type="text" name="prename" placeholder="{{$v['prename']}}" id="f-name" class="form-control">
                            <input type="text" name="id" value="{{$v['id']}}" style="display:none">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="col-lg-3 control-label">URL</label>
                        <div class="col-lg-7 input-group-lg">
                            <input type="text" name="url" placeholder="{{$v['url']}}" id="f-name" class="form-control">
                        </div>
                    </div>
                 <!-- 内容end -->
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">关闭</a>
                <button  class="btn btn-primary">提交</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
@endforeach
@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<script>
    $('#errormessage').delay(2000).slideUp(1000);
</script>


@stop