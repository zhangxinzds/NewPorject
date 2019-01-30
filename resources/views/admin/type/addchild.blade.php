@extends('layout.admin.index')

@section('title',$title)

@section('menu')
<ul class="nav nav-pills nav-stacked custom-nav">
    <li class=""><a href="/admin"><i class="fa fa-home"></i> <span>首页</span></a></li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>管理员</span></a>
        <ul class="sub-menu-list">
            <li><a href="blank_page.html">管理员列表</a></li>
            <li><a href="boxed_view.html">新增管理员</a></li>
        </ul>
    </li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>用户管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/user">用户列表</a></li>
            <li><a href="/admin/user/create">用户添加</a></li>
        </ul>
    </li>

	<li class="menu-list  nav-active"><a href=""><i class="fa fa-laptop"></i> <span>分类管理</span></a>
		<ul class="sub-menu-list">
			<li><a href="/admin/type">分类列表</a></li>
			<li  class="active"><a href="/admin/type/create">分类添加</a></li>
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
                <form role="form" action="/admin/savechild" method="post" class="form-horizontal adminex-form" style="margin-top:20px">
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
                    <div class="form-group has-success" hidden>
                        <label class="col-lg-1 control-label">pid</label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="password" name="pid" value="{{$id}}"  id="l-name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group has-success" hidden>
                        <label class="col-lg-1 control-label">path</label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="password" name="path" value="{{$path}}{{$id}},"  id="email2" class="form-control">
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
