@extends('layout.admin.index')
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
@section('title',$title)

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

    <li class="menu-list   nav-active"><a href=""><i class="fa fa-laptop"></i> <span>轮播管理</span></a>
        <ul class="sub-menu-list">
            <li class="active"><a href="/admin/carousel">轮播列表</a></li>
            <li><a href="/admin/carousel/create">轮播添加</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>友链管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/link">友链列表</a></li>
            <li><a href="/admin/link/create">友链添加</a></li>
        </ul>
    </li>

    <li><a href="/admin/orders"><i class="fa fa-bullhorn"></i><span>订单管理</span></a></li>
</ul>
@stop

@section('page-heading')
<div class="page-heading">
    <h3>
        轮播管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/carousel">轮播管理</a>
        </li>
        <li class="active">轮播列表</li>
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
                轮播列表
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
                                    组号
                                </th>
                                <th>
                                    轮播图
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            @php $i = 0;$j = 0;$l=0; @endphp 
                            @for($x = 0;$x < $num; $x++)
                            <tr class="gradeA">
                                <td  style="line-height:280px;font-size:25px">
                                    {{++$i}}
                                </td>
                                <td class="tname" style="line-height:280px;font-size:25px">
                                    {{$array[$j++]}}
                                </td>
                                <td width="700">
                                    <section class="panel" style="margin-bottom: 10px">
                                        <div class="carousel slide auto panel-body" id="{{$i}}-slide">
                                            <ol class="carousel-indicators out">
                                            @php $n = 0; @endphp
                                            @foreach($rs as $k=>$v)
                                                @if($v->lid == $array[$l])
                                                <li data-target="#{{$i}}-slide" data-slide-to="{{$n++}}"></li>
                                                @endif
                                            @endforeach
                                            </ol>
                                            <div class="carousel-inner" width="700">
                                            @foreach($rs as $k=>$v)
                                                @if($v->lid == $array[$l])
                                                    <div class="item text-center" width="700">
                                                       <img src="{{$v->pic}}" width="700">
                                                    </div>
                                                @endif
                                            @endforeach
                                            </div>
                                            <a class="left carousel-control" href="#{{$i}}-slide" data-slide="prev">
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                            <a class="right carousel-control" href="#{{$i}}-slide" data-slide="next">
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </section>
                                </td>
                                <td style="text-align: center" class="col-md-3">
                                    <a style="margin-top: 130px;margin-right: 20px;"  class="btn btn-info" href="/admin/carousel/{{$array[$l]}}/edit">修改</a>
                                    <form method="post" action="/admin/carousel/{{$array[$l++]}}" style="float:left;margin-left: 100px;margin-top:130px">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-success" onclick="return confirm('确定删除?')">删除</button>
                                    </form>
                                </td>
                            </tr>
                           @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    组号
                                </th>
                                <th>
                                    轮播图
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
    //轮播图
        var x = $('.carousel-inner');
        var a = x.find('div:first');
        for(var k in a){
            $(a[k]).addClass('active');
        }

        var y = $('ol');
        var b = y.find('l7:first');
        for(var k in b){
            $(b[k]).addClass('active');
        }
</script>
@stop
