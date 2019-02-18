@extends('layout.admin.index')

@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('menu')
<!--左侧菜单 start-->
<ul class="nav nav-pills nav-stacked custom-nav">
    <li><a href="{{ route('admin')}}"><i class="fa fa-home"></i> <span>首页</span></a></li>

    <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>管理员</span></a>
        <ul class="sub-menu-list">
            <li><a class="menuchild" href="/admin/manager">管理员列表</a></li>
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

    <li class="active"><a href="/admin/orders"><i class="fa fa-list-alt"></i><span>订单管理</span></a></li>
</ul>
@stop

@section('page-heading')
<div class="page-heading">
    <h3>
        订单管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/orders">订单管理</a>
        </li>
        <li class="active">订单列表</li>
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
                分类列表
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
                                    订单编号
                                </th>
                                <th>
                                    买家账号
                                </th>
                                <th>
                                    联系电话
                                </th>
                                <th>
                                    订单日期
                                </th>
                                <th>
                                    订单状态
                                </th>
                                <th>
                                    总金额
                                </th>
                                <th>
                                    查看
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                               $i = 1;
                           @endphp
                           @foreach($order as $k => $v)
                            <tr class="gradeA">
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$v['number']}}
                                </td>
                                <td>
                                    {{$v['uname']}}
                                </td>
                                <td>
                                    {{$v['phone']}}
                                </td>
                                <td>
                                    {{date('Y-m-d H:i:s',$v['addtime'])}}
                                </td>
                                <td class="status">
                                    {{$v['status']}}
                                </td>
                                <td>
                                    ${{$v['total']}}
                                </td>
                                <td>
                                    <a href="/admin/orderinfo/{{$v['id']}}" class="btn btn-default">查看详情</a>
                                </td>
                                <td id = "{{$v['id']}}">
                                    @switch($v['status'])
                                    @case('未支付')
                                        <button class="btn btn-primary">待支付</button>
                                    @break
                                    @case('待发货')
                                        <button class="btn btn-info operation">发货</button>
                                    @break
                                    @case('已发货')
                                        <button class="btn btn-warning">待收货</button>
                                    @break
                                    @case('已收货')
                                        <button class="btn btn-success">已完成</button>
                                    @break
                                    @endswitch
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
                                    订单编号
                                </th>
                                <th>
                                    买家账号
                                </th>
                                <th>
                                    联系电话
                                </th>
                                <th>
                                    订单日期
                                </th>
                                <th>
                                    订单状态
                                </th>
                                <th>
                                    总金额
                                </th>
                                <th>
                                    查看
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
    $('.operation').click(function(){
        that = $(this);
        var val = $(this).text();
        var id = $(this).parent().attr('id');
        $.get('/admin/orders/status',{val:val,id:id},function(res){
            if(res == '已发货'){
                that.text('待收货').removeClass('btn-info').addClass('btn-warning');
                that.parents('tr').find('.status').text('已发货');
            }
        }) 
    })
</script>
@stop
