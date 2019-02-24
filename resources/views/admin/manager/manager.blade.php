@extends('layout.admin.index')

@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('menu')
<!--左侧菜单 start-->
<ul class="nav nav-pills nav-stacked custom-nav">
    <li><a href="{{ route('admin')}}"><i class="fa fa-home"></i> <span>首页</span></a></li>

    <li class="menu-list nav-active"><a href=""><i class="fa fa-user"></i> <span>管理员</span></a>
        <ul class="sub-menu-list">
            <li class="active"><a class="menuchild" href="/admin/manager">管理员列表</a></li>
            <li><a class="menuchild" href="/admin/manager/create">新增管理员</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-gears"></i> <span>系统管理</span></a>
        <ul class="sub-menu-list">
            <li><a class="menuchild" href="/admin/role">角色管理</a></li>
            <li><a class="menuchild" href="/admin/permission">权限管理</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-users"></i> <span>用户管理</span></a>
        <ul class="sub-menu-list">
            <li><a class="menuchild" href="/admin/user">用户列表</a></li>
            <li><a class="menuchild" href="/admin/user/create">用户添加</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-list"></i> <span>分类管理</span></a>
        <ul class="sub-menu-list">
            <li><a class="menuchild" href="/admin/type">分类列表</a></li>
            <li><a class="menuchild" href="/admin/type/create">分类添加</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-shopping-cart"></i> <span>商品管理</span></a>
        <ul class="sub-menu-list">
            <li><a class="menuchild" href="/admin/goods">商品列表</a></li>
            <li><a class="menuchild" href="/admin/goods/create">商品添加</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-picture-o"></i> <span>轮播管理</span></a>
        <ul class="sub-menu-list">
            <li><a class="menuchild" href="/admin/carousel">轮播列表</a></li>
            <li><a class="menuchild" href="/admin/carousel/create">轮播添加</a></li>
        </ul>
    </li>

    <li><a href="/admin/orders"><i class="fa fa-list-alt"></i><span>订单管理</span></a></li>
</ul>
@stop

@section('page-heading')
<div class="page-heading">
    <h3>
        管理员管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/manager">管理员管理</a>
        </li>
        <li class="active">管理员列表</li>
    </ul>
</div>
@stop

@section('content')
<style>
    td,th{text-align:center;}
</style>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                管理员列表
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down">
                    </a>
                    <a href="javascript:;" class="fa fa-times">
                    </a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    用户名
                                </th>
                                <th>
                                    姓名
                                </th>
                                <th>
                                    头像
                                </th>
                                <th>
                                    添加时间
                                </th>
                                <th>
                                    状态
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp 
                            @foreach($rs as $k=>$v)
                                    <!-- root用户不显示 -->
                                @php
                                    if($v['name'] == 'root'){
                                        continue;
                                    }
                                @endphp
                            <tr class="gradeA">
                                <td style="line-height:50px">
                                    {{$i++}}
                                </td>
                                <td class="tname" name="{{$v->id}}" style="line-height:50px">
                                    {{$v->name}}
                                </td>
                                <td style="line-height:50px">
                                    {{$v->tname}}
                                </td>
                                <td style="line-height:50px">
                                    <img src="{{$v->header}}" style="width:50px;height:50px";>
                                </td>
                                <td style="line-height:50px">
                                    {{date('Y-m-d H:i:s',$v->addtime)}}
                                </td>
                                <td class="col-md-2">
                                    <div class="col-lg-10 input-group" style="margin-top:10px">
                                        <div class="slide-toggle">
                                            <div style="position: relative;left:100px">
                                                @if(($v->status)==1)
                                                <input type="checkbox" value="{{$v->id}}" name="{{$v->status}}" class="js-switch"
                                                checked/>
                                                @else
                                                <input type="checkbox" value="{{$v->id}}" name="{{$v->status}}" class="js-switch"
                                                />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center" class="col-md-3">
                                <a href="/admin/managerrole/{{$v['id']}}" class="btn btn-success">角色</a>
                                    <a class="btn btn-info" href="/admin/manager/{{$v->id}}/edit">
                                        修改
                                    </a>
                                    <form action="/admin/manager/{{$v->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger" onclick="return confirm('确定删除?')">删除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    用户名
                                </th>
                                <th>
                                    姓名
                                </th>
                                <th>
                                    头像
                                </th>
                                <th>
                                    添加时间
                                </th>
                                <th>
                                    状态
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>    
@stop

@section('js')
    <script>
    //显示按钮ajax操作
        $('.slide-toggle').click(function(){

            var id = $(this).find('input').val();

            var status = $(this).find('input').attr('name');

            $.get('/admin/magajax',{id:id,status:status},function(res){

            })
        })
</script>
@stop
