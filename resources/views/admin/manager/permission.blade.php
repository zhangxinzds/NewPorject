@extends('layout.admin.index')

@section('title',$title)

@section('menu')
<ul class="nav nav-pills nav-stacked custom-nav">
    <li class=""><a href="{{route('admin')}}"><i class="fa fa-home"></i> <span>首页</span></a></li>

    <li class="menu-list nav-active" ><a href=""><i class="fa fa-laptop"></i> <span>管理员</span></a>
        <ul class="sub-menu-list">
            <li  class="active"><a href="/admin/manager">管理员列表</a></li>
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

    <li><a href="/admin/orders"><i class="fa fa-bullhorn"></i><span>订单管理</span></a></li>
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
        <li class="active">角色编辑</li>
    </ul>
</div>
@stop

@section('content')
            <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        角色编辑
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    @if (session('error'))
                        <div class="alert alert-success" id="message">
                            {{ session('error') }}
                        </div>
                    @endif                    
                    @if (session('success'))
                        <div class="alert alert-success" id="message">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="panel-body">
                    <form role="form" class="form-horizontal adminex-form" style="margin-top:20px">
                        <div class="form-group has-success">
                        <label class="col-lg-1 col-md-offset-1 control-label">用户名</label>
                            <div class="col-lg-2 input-group-lg">
                                <input type="text" name="name" placeholder="" id="f-name" value="{{$rs['name']}}" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form class="form-horizontal bucket-form" action="/admin/managerroleadd/{{$rs['id']}}" method="post">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" style="margin-left:10px">权限</label>
                                        <div class="col-sm-11 icheck col-md-offset-1" style="margin-top:-22px">
                                            @foreach($role as $k => $v)
                                            <div class="flat-blue single-row">
                                                @if(in_array($v['id'],$array))
                                                <div class="radio ">
                                                    <label><input type="checkbox" name="role[]" value="{{$v['id']}}" checked>
                                                    {{$v['rolename']}}</label>
                                                </div>
                                                @else
                                                <div class="radio ">
                                                    <label><input type="checkbox" name="role[]" value="{{$v['id']}}">
                                                    {{$v['rolename']}}</label>
                                                </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <button class="btn btn-info" style="margin-left:330px;margin-top:40px">保存</button>
                    </div>
                </section>
            </div>
        </div>
@stop

@section('js')
<script>
    setTimeout(function(){
        $('#message').slideUp(1000);
    },2000)
</script>
@stop