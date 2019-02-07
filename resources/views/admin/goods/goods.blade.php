@extends('layout.admin.index')

@section('title',$title)

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

    <li class="menu-list nav-active"><a href=""><i class="fa fa-laptop"></i> <span>商品管理</span></a>
        <ul class="sub-menu-list">
            <li class="active"><a href="/admin/goods">商品列表</a></li>
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
</ul>
@stop

@section('page-heading')
<div class="page-heading">
    <h3>
        商品管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/goods">商品管理</a>
        </li>
        <li class="active">商品列表</li>
    </ul>
</div>
@stop

@section('content')
<style>
    th{text-align: center}
</style>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                商品列表
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down">
                    </a>
                    <a href="javascript:;" class="fa fa-times">
                    </a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered" id="hidden-table-info" style="text-align:center">
                        <thead>
                            <tr>
                                <th>
                                   ID
                                </th>
                                <th>
                                   名称
                                </th>
                                <th>
                                   价格
                                </th>
                                <th class="hidden-phone">
                                   分类
                                </th>
                                <th class="hidden-phone">
                                   厂家
                                </th>
                                <th class="hidden-phone">
                                   销量
                                </th>
                                <th class="hidden-phone">
                                   上架时间
                                </th>
                                <th class="hidden-phone">
                                   状态
                                </th>
                                <th>
                                   操作
                                </th>                                
                                <th hidden>
                                   内容
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                        @foreach($rs as $k=>$v)
                            @if($k%2 == 0)
                            <tr class="gradeA">
                            @else
                            <tr class="gradeC">
                            @endif
                                <td  style="line-height: 45px">
                                    {{$i++}}
                                </td>
                                <td  style="line-height: 45px">
                                    {{$v->name}}
                                </td>
                                <td  style="line-height: 45px">
                                    {{$v->price}}
                                </td>                                
                                <td  style="line-height: 45px">
                                    {{category($v->tid)}}
                                </td>                                
                                <td  style="line-height: 45px">
                                    {{$v->company}}
                                </td>                                                            
                                <td  style="line-height: 45px">
                                    {{$v->sale}}
                                </td>                                  
                                <td  style="line-height: 45px">
                                    {{date('Y-m-d',$v->addtime)}}
                                </td>                                
                                <td class="center hidden-phone"  style="line-height: 45px" > 
                                    <div class="col-lg-10 input-group" >
                                        <div class="slide-toggle">
                                            <div style="position: relative;left:70px">
                                            @if(($v->status)=='1')
                                                <input type="checkbox" value="{{$v->id}}" name="{{$v->status}}"  class="js-switch" checked/>
                                            @else
                                                <input type="checkbox" value="{{$v->id}}" name="{{$v->status}}"  class="js-switch"/>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="/admin/goods/{{$v->id}}/edit">修改</a>&nbsp;
                                    <a class="btn btn-success" href="/admin/spe/{{$v->id}}">颜色规格</a>&nbsp;
                                    <form action="/admin/goods/{{$v->id}}" method="post" style="display:inline">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-warning" onclick="return confirm('确定删除?')">删除</button>
                                    </form>
                                </td>  
                                <td hidden>
                                   {!!$v->content!!}
                                </td> 
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
       
@stop

@section('js')
    <script>
        $('.slide-toggle').click(function(){
            var id = $(this).find('input').val();
            var sta = $(this).find('input').attr('name');
            $.get('/admin/goods/status/'+sta+'/'+id,{},function(res){
            })
        })
    </script>
@stop

@section('dy')
    <script src="/admins/js/dynamic_table_init_goods.js"></script>
@stop