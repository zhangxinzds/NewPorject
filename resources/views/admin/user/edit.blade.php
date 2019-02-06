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

    <li class="menu-list nav-active"><a href=""><i class="fa fa-laptop"></i> <span>用户管理</span></a>
        <ul class="sub-menu-list">
            <li class="active"><a href="/admin/user">用户列表</a></li>
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
        <li class="active">修改信息</li>
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
                <!-- 表单内容 start -->
                <form role="form" action="/admin/user/{{$rs->id}}" method="post" class="form-horizontal adminex-form"
                enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}} {{method_field('PUT')}}
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            用户名
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="text" name="name" placeholder="" id="f-name" value="{{$rs->name}}"
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            权限
                        </label>
                        <div class="col-lg-5">
                            <!-- <input type="" placeholder="" id="email2" class="form-control"> -->
                            <select class="form-control input-lg m-bot15" name="level">
                                <option value="0" {{($rs->
                                    level==0)?'selected':''}}>普通用户
                                </option>
                                <option value="1" {{($rs->
                                    level==1)?'selected':''}}>会员
                                </option>
                                <option value="2" {{($rs->
                                    level==2)?'selected':''}}>VIP会员
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            头像
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <div class="col-md-9">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img @if($rs->
                                        header) src="{{$rs->header}}" @else src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                        @endif>
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                    </div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-new">
                                                <i class="fa fa-paper-clip">
                                                </i>
                                                选择图片
                                            </span>
                                            <span class="fileupload-exists">
                                                <i class="fa fa-undo">
                                                </i>
                                                修改
                                            </span>
                                            <input type="file" name="header" class="default">
                                        </span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                                            <i class="fa fa-trash">
                                            </i>
                                            移除
                                        </a>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            状态
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <div class="slide-toggle">
                                <div>
                                     @if(($rs->status)=='1')
                                        <input type="checkbox"  name="status"  class="js-switch" checked/>
                                    @else
                                        <input type="checkbox"  name="status"  class="js-switch"/>
                                    @endif
                                </div>
                            </div>
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


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                详细信息
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;">
                    </a>
                    <a class="fa fa-times" href="javascript:;">
                    </a>
                </span>
            </header>
            <div class="panel-body">
                <div role="form" class="form-horizontal adminex-form" style="margin-top:20px">
                    {{csrf_field()}}
                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            姓名
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="text" name="tname" placeholder="" id="f-name" value="{{$rs['info']['tname']}}"
                            class="form-control">
                        </div>
                    </div>

                     <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            地址
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="text" name="address" placeholder="" id="f-name" value="{{$rs['info']['address']}}"
                            class="form-control">
                        </div>
                    </div>

                     <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            电话
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="text" name="phone" placeholder="" id="f-name" value="{{$rs['info']['phone']}}"
                            class="form-control">
                        </div>
                    </div>

                     <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            邮件
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <input type="text" name="email" placeholder="" id="f-name" value="{{$rs['info']['email']}}"
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group has-success">
                        <label class="col-lg-1 control-label">
                            性别
                        </label>
                        <div class="col-lg-10 input-group-lg">
                            <div class="slide-toggle">
                                <div>
                                   <label>男&nbsp;&nbsp;<input type="radio" value="1" name="sex" @if(!isset($rs['info']['sex'])) checked @endif {{($rs['info']['sex'] == '1')?'checked':''}}></label>&nbsp;&nbsp;
                                   <label>女&nbsp;&nbsp;<input type="radio" value="0" name="sex" {{($rs['info']['sex'] == '0')?'checked':''}}></label>&nbsp;&nbsp;
                                   <label>保密&nbsp;&nbsp;<input type="radio" value="2" name="sex" {{($rs['info']['sex'] == '2')?'checked':''}}></label>&nbsp;&nbsp;
                                </div>
                            </div>
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
                </form>
                <!-- 表单内容 end -->
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