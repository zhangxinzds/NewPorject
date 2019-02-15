@extends('layout.admin.index')

@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">

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
        <li class="active">角色列表</li>
    </ul>
</div>
@stop

@section('content')
<style type="text/css">   
    .float{      
        float:left;  
        border: 1px solid #CCCCCC;    
        border-radius: 10px;    
        padding: 5px;    
        margin: 5px;    
    }    
    #img{    
        position: relative;    
    }    
    .result{    
        width: 200px;    
        height: 200px;    
        text-align: center;    
        box-sizing: border-box;    
    }   
  
  
    #file_input{  
        display: none;  
    }  
  
  
    .delete{  
        width: 200px;  
        height:200px;  
        position: absolute;  
        text-align: center;  
        line-height: 200px;  
        z-index: 10;  
        font-size: 30px;  
        background-color: rgba(255,255,255,0.8);  
        color: #777;  
        opacity: 0;  
        transition-duration: 0.7s;  
        -webkit-transition-duration: 0.7s;   
    }  
  
  
    .delete:hover{  
        cursor: pointer;  
        opacity: 1;  
    }     

	th,td{
		text-align:center;
	}

	i{
		font:bold 10px '宋体';
	}

</style>
 <div class="wrapper">
        <div class="row">
        	<div class="col-sm-12">
		        <section class="panel">
		            <header class="panel-heading">
		                角色表
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
		            </header>
                    @if (session('success'))
                        <div class="alert alert-success" id="message">
                            {{ session('success') }}
                        </div>
                    @endif                    
                    @if (session('error'))
                        <div class="alert alert-success" id="message">
                            {{ session('error') }}
                        </div>
                    @endif
			        <div class="btn-group" style="margin:10px">
		                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
		                    添加角色 <i class="fa fa-plus"></i>
		                </button>
		            </div>
	                <section id="unseen">
	                    <table class="table table-bordered table-striped table-condensed">
	                        <thead>
	                        <tr>
	                            <th>ID</th>
                                <th>角色</th>
	                            <th colspan="2">操作</th>
	                        </thead>
	                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($rs as $k => $v)
	                        <tr>
                               <td style="line-height:80px">{{$i++}}</td>
                               <td class="rolename" id="{{$v['id']}}" style="line-height:80px">{{$v['rolename']}}</td>
	                           <td style="">
                                <button class="btn btn-success edit" style="margin-left:-100px;display: inline">修改</button>
                                <form action="/admin/role/{{$v['id']}}" method="post" style="margin-top:-34px;">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                    <button class="btn btn-warning" onclick="confirm('确定删除?')" style="margin-left:30px">删除</button>
                                </form>
                                <a href="/admin/peradd/{{$v['id']}}" class="btn btn-info" style="float:right;position:relative;right:387px;width:122px">添加权限</a>
                                </td>
	                        </tr>
                            @endforeach
	                        </tbody>
	                    </table>
	                </section>
	            </div>
	        </section>
        </div>
    </div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px;">
	<div class="modal-dialog" style="width:1000px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					添加角色
				</h4>
			</div>
			<div class="modal-body">
			<!-- 内容start -->
				 <form role="form" action="/admin/role" method="post" class="form-horizontal adminex-form"  enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}}
                    <div class="form-group has-success">
                        <label class="col-lg-3 control-label">角色名称</label>
                        <div class="col-lg-6 input-group-lg">
                            <input type="text" name="name" placeholder="" id="f-name" class="form-control">
                        </div>
                    </div>
                <!-- 内容end -->
			</div>
			<div class="modal-footer">
				<a type="button" class="btn btn-default" data-dismiss="modal">关闭</a>
				<button  class="btn btn-primary">提交</button>
            	</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
@stop

@section('js')

<script>
    $('#message').delay(2000).slideUp(1000);

    //name修改ajax操作
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.edit').click(function(){

         um = $(this).parents('tr').find('.rolename');

        //获取td里面的内容
        var ux = um.text().trim();

        //创建input输入框
        var ipu = $('<input type="text" />');

        um.empty();

        um.append(ipu);

        ipu.val(ux);

        ipu.focus();

        ipu.select();

        ipu.blur(function(){
            //获取输入的新值
            var uv = $(this).val().trim();

            if(uv == ''){

                alert('输入的值不能为空');

                um.text(ux);

                return;
            }

            //获取id
            id = um.attr('id');

            $.post('/admin/roleajax',{name:uv,id:id},function(res){

                if(res == '1'){

                    um.text(uv);

                } else {

                    um.text(ux);
                }
            })
        })
    })
</script>


@stop