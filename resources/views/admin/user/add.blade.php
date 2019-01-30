@extends('layout.admin.index')

@section('title',$title)

@section('menu')
<ul class="nav nav-pills nav-stacked custom-nav">
    <li class=""><a href="{{route('admin')}}"><i class="fa fa-home"></i> <span>首页</span></a></li>

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>管理员</span></a>
        <ul class="sub-menu-list">
            <li><a href="blank_page.html">管理员列表</a></li>
            <li><a href="boxed_view.html">新增管理员</a></li>
        </ul>
    </li>

    <li class="menu-list nav-active"><a href=""><i class="fa fa-laptop"></i> <span>用户管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/user">用户列表</a></li>
            <li class="active"><a href="/admin/user/create">用户添加</a></li>
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
</ul>
@stop

@section('page-heading')
<div class="page-heading">
    <h3>
        用户管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/user">用户管理</a>
        </li>
        <li class="active">用户添加</li>
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
                <form role="form" action="/admin/user" method="post" class="form-horizontal adminex-form" enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}}
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">用户名</label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="text" name="name" placeholder="" id="f-name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">密码</label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="password" name="password" placeholder="" id="l-name" class="form-control">
                        </div>
                    </div>
                        <div class="form-group has-success">
                        <label class="col-lg-1 control-label">权限</label>
                        <div class="col-lg-5">
                        <!-- <input type="" placeholder="" id="email2" class="form-control"> -->
                            <select class="form-control input-lg m-bot15" name="level">
                                <option value="0">普通用户</option>
                                <option value="1">会员</option>
                                <option value="2">VIP会员</option>
                            </select>
                        </div>
                    </div>		
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">确认密码</label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="password" name="repassword" placeholder="" id="email2" class="form-control">
                        </div>
                    </div>



                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label" >头像</label>
                        <div class="col-lg-10 input-group-lg">
                           <div class="col-md-9">
            	                <div class="fileupload fileupload-new" data-provides="fileupload">
            	                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
            	                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
            	                    </div>
            	                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            	                    <div>
            	                           <span class="btn btn-default btn-file">
            	                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i>选择图片</span>
            	                           <span class="fileupload-exists"><i class="fa fa-undo"></i>修改</span>
            	                           <input type="file" name="header" class="default">
            	                           </span>
            	                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>移除</a>
            	                    </div>
            	                </div>
                            <br>
                        	</div>
                   		</div>
                    </div>

                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">状态</label>
                        <div class="col-lg-10 input-group-lg">
            	            <div class="slide-toggle">
            	                <div>
            	                    <input type="checkbox" name="status" class="js-switch" checked/>
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
    setTimeout(function(){
        $('#errormessage').slideUp(1000);

    },3000)
</script>
@stop