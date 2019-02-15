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

    <li class="menu-list nav-active"><a href=""><i class="fa fa-list"></i> <span>分类管理</span></a>
        <ul class="sub-menu-list">
            <li><a class="menuchild" href="/admin/type">分类列表</a></li>
            <li class="active"><a class="menuchild" href="/admin/type/create">分类添加</a></li>
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
        分类管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/type">分类管理</a>
        </li>
        <li class="active">分类添加</li>
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
                @if (count($errors) > 0)
                    <div class="alert alert-danger" id="errormessage">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" action="/admin/type" method="post" class="form-horizontal adminex-form" enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}}
                    <div class="form-group has-success">
                        <label class="col-sm-1 control-label">分类添加:</label>
                        <div class="col-lg-10 input-group-lg" style="margin-left:-15px">
                            <div class="col-sm-10">
                                <textarea rows="6" name="name" class="form-control"></textarea>
                                <p class="help-block">多个类别用逗号隔开</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">分类</label>
                        <div class="col-lg-5">
                        <select class="form-control input-lg m-bot15" name="pid">
                                <option value="0">顶级分类</option>
                        @foreach($rs as $k=>$v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                        </select>
                        </div>
                    </div>  
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">显示</label>
                        <div class="col-lg-10 input-group-lg">
                            <div class="slide-toggle">
                                <div>
                                    <input type="checkbox" name="display" class="js-switch" checked/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-10">
                            <button class="btn btn-info btn-lg" type="submit">提交</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </section>
    </div>
</div>
@stop


@section('js')
    <script>
            $('#errormessage').delay(2000).fadeOut(1500);
    </script>
@stop
