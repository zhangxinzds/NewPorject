@extends('layout.admin.index')

@section('title',$title)

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

    <li class="menu-list nav-active"><a href=""><i class="fa fa-gears"></i> <span>系统管理</span></a>
        <ul class="sub-menu-list">
            <li class="active"><a class="menuchild" href="/admin/role">角色管理</a></li>
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
        角色管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/role">角色管理</a>
        </li>
        <li class="active">权限编辑</li>
    </ul>
</div>
@stop

@section('content')
<style>
    td,th{text-align:center}
</style>    
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <section class="panel">
                    <header class="panel-heading">
                        权限编辑
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    @if (session('error'))
                        <div class="alert alert-success" id="message">
                            {{ session('error')}}
                        </div>
                    @endif                    
                    @if (session('success'))
                        <div class="alert alert-success" id="message">
                            {{ session('success')}}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form role="form" class="form-horizontal adminex-form" style="margin-top:20px">
                            <div class="form-group has-success">

                    <label><input type="checkbox" class="quanxuan">全选</label>

                            <label class="col-lg-1 control-label">角色</label>
                                <div class="col-lg-2 input-group-lg">
                                    <input type="text" name="name" placeholder="" value="{{$rs['rolename']}}" id="f-name" value="" readonly class="form-control">
                                </div>
                            </div>
                            </div>
                        </form>
                    <div class="panel-body">
                    <div class="col-sm-6" style="float:left;margin-top: -90px;margin-left:300px">
                    <section class="panel">
                        <div class="panel-body">
                            <form action="/admin/persave/{{$rs['id']}}" method="get" class="quanxian">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>模块</th>
                                        <th>权限</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $j=1; @endphp 
                                    @foreach($per as $k => $v)
                                        @php
                                            $num = DB::table('permission')->where('group',$v['group'])->count();
                                        @endphp
                                    <tr>
                                        @if($j%$num == 1)
                                        <td rowspan="{{$num}}" style="line-height:{{$num*55}}px;">
                                            <label><input num="{{$num}}" type="checkbox" class="group">{{$v['group']}}</label>
                                        </td>
                                        @elseif($num == 1)
                                        <td rowspan="{{$num}}">
                                            <label><input num="{{$num}}" type="checkbox" class="group">{{$v['group']}}</label>
                                        </td>
                                        @endif
                                        <td>
                                        @if(in_array($v['id'],$array))
                                            <label><input name="per[]" class="single" value="{{$v['id']}}" type="checkbox" checked>{{$v['pername']}}</label>
                                        @else
                                            <label><input name="per[]" class="single" value="{{$v['id']}}" type="checkbox">{{$v['pername']}}</label>
                                        @endif
                                        </td>
                                    </tr>
                                     @php
                                        if($num != $j){
                                            $j++;
                                        }else{
                                            $j = 1;
                                            echo '</tbody><tbody>';
                                        }
                                    @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                                <button>保存</button>
                            </form>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
@stop

@section('js')
<script>
    //全选
    $('.quanxuan').click(function(){
        var singles = $('input:checkbox');

        if($(this).attr('checked')){
             for (var i = 0; i< singles.length;i++) {
                $(singles[i]).attr('checked','true');
            }
        }else{
            for (var i = 0; i< singles.length;i++) {
                $(singles[i]).removeAttr('checked');
            }
        }
    })

    //模块多选
    $('.group').click(function(){
       var singles = $(this).parents('tbody').find('.single');

        if($(this).attr('checked')){
            for (var i = 0; i< singles.length;i++) {
                $(singles[i]).attr('checked','true');
            }
        }else{
            for (var i = 0; i< singles.length;i++) {
                $(singles[i]).removeAttr('checked');
            }
        }
        quanxuan();
    })

    //single有一个不选中,group也不被选中
    //若一个模块的所有权限都被选中,模块也要被选中
    $('.single').click(function(){
        var group = $(this).parents('tbody').find('.group');
        if(!$(this).attr('checked')){
            group.removeAttr('checked');
        }

        //该模块的single集合
        var singles = $(this).parents('tbody').find('.single');

        //将每一个single的选中状态放入一个数组arr[],如果该数组中的每一个元素都为checked,那么使group为选中状态
        var arr = [];
        singles.each(function(){
            var sta = $(this).attr('checked');
            arr.push(sta);
        })

        var num = 0;
        for(var i = 0;i<arr.length;i++){
            if(arr[i]=='checked'){
                num++;
            }
        }
        if(num == arr.length){
            group.attr('checked','checked');
        }
        quanxuan();
    })

    //页面初始化时,如果一开始所有模块中的权限被选中,那么group也要被选中
    $(function(){
        var that = $('.quanxian');
        var gr = that.find('tbody');
        gr.each(function(){
            var singles = $(this).find('.single');
            var group = $(this).find('.group');
            var arr = [];
            singles.each(function(){
                var sta = $(this).attr('checked');
                arr.push(sta);
            })

            var num = 0;
            for(var i = 0;i<arr.length;i++){
                if(arr[i]=='checked'){
                    num++;
                }
            }
            if(num == arr.length){
                group.attr('checked','checked');
            }
        })
        quanxuan();
    })

    //如果所有single被选中,那么全选也要被选中
    function quanxuan(){
        var singles = $('.single');
        var array = [];
        singles.each(function(){
            var sta = $(this).attr('checked');
            array.push(sta)
        })

        var num = 0;
        for(var i = 0;i<array.length;i++){
            if(array[i] == 'checked'){
                num++;
            }
        }
        if(num == array.length){
            $('.quanxuan').attr('checked','checked');
        }else{
            $('.quanxuan').removeAttr('checked');
        }
    }

    //消息提示
    $('#message').delay(2000).slideUp(1000);
</script>
@stop