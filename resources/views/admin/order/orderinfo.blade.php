@extends('layout.admin.index')

@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('menu')
<ul class="nav nav-pills nav-stacked custom-nav">
    <li class=""><a href="/admin"><i class="fa fa-home"></i> <span>首页</span></a></li>

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
            <li  class="active"><a href="/admin/type">分类列表</a></li>
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

    <li class="active"><a href="/admin/orders"><i class="fa fa-bullhorn"></i><span>订单管理</span></a></li>
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
        <li class="active">订单详情</li>
    </ul>
</div>
@stop

@section('content')

 <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">              
                    <div class="btn-group" style="margin:10px">
                        订单号:{{$order['number']}}
                    </div>
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>商品图片</th>
                                <th>商品名称</th>
                                <th>商品尺寸</th>
                                <th>商品颜色</th>
                                <th>单价</th>
                                <th>数量</th>
                                <th>小计</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($info as $k => $v)
                            <tr>
                                <td style="line-height:80px;text-align:center">{{$i++}}</td>
                                <td style="line-height:80px;text-align:center"><img src="{{$v['pic']}}" style="width:80px"></td>
                                <td style="line-height:80px;text-align:center">{{$v['name']}}</td>
                                <td style="line-height:80px;text-align:center">{{$v['size']}}</td>
                                <td style="line-height:80px;text-align:center">{{$v['color']}}</td>
                                <td style="line-height:80px;text-align:center">{{$v['price']}}</td>
                                <td style="line-height:80px;text-align:center">{{$v['num']}}</td>
                                <td style="line-height:80px;text-align:center">{{$v['total']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="btn-group" style="margin:10px">
                        订单信息:
                    </div>
                        <table class="table table-hover">
                            <tr><td>用户名:{{$order['uname']}}</td><td>联系电话:{{$order['phone']}}</td></tr>
                            <tr><td>收货地址:{{$order['address']}}</td><td>下单时间:{{date('Y-m-d H:i:s',$order['addtime'])}}</td></tr>
                        </table>
                    </section>
                </div>
            </section>
        </div>
   </div>
@stop

@section('js')
<script>

</script>
@stop
