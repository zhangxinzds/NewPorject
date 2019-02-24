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
        用户管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="#">用户管理</a>
        </li>
        <li class="active">修改密码</li>
    </ul>
</div>
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                基本信息
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;">
                    </a>
                    <a class="fa fa-times" href="javascript:;">
                    </a>
                </span>
            </header>
            <div class="panel-body">
                <!-- 错误提示 start -->
                @if (count($errors) > 0)
                <div class="alert alert-danger" id="errormessage">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- 错误提示 end -->
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" id="errormessage">
                        {{ session('error')}}
                    </div>
                @endif
                <!-- 表单内容 start -->
                <form role="form" action="/admin/dompassword" method="post" class="form-horizontal adminex-form"
                enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}}
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            旧密码
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="password" name="prevpassword" placeholder="" id="f-name" class="form-control">
                        </div>
                    </div>                    
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            新密码
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="password" name="newpassword" placeholder="" id="f-name" class="form-control">
                        </div>
                    </div>                    
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            重复密码
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="password" name="repassword" placeholder="" id="f-name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-10">
                            <button class="btn btn-info btn-lg" type="submit">
                                    提交
                            </button>
                        </div>
                    </div>
            </div>
        </section>
    </div>
</div>

@stop

@section('js')
<script>
    setTimeout(function(){
        $('#errormessage').slideUp(1000);
    },2000)
</script>
@stop