@extends('layout.admin.index')

@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">

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
            <li  class="active"><a href="/admin/type">分类列表</a></li>
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
        分类管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/user">分类管理</a>
        </li>
        <li class="active">分类列表</li>
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
                分类列表
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
                                    名称
                                </th>
                                <th>
                                    Pid
                                </th>
                                <th>
                                    Path
                                </th>
                                <th>
                                    显示
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp @foreach($rs as $k=>$v)
                            <tr class="gradeA">
                                <td>
                                    {{$i++}}
                                </td>
                                <td class="tname" name="{{$v->id}}">
                                    {{$v->name}}
                                </td>
                                <td>
                                    {{$v->pid}}
                                </td>
                                <td>
                                    {{$v->path}}
                                </td>
                                <td class="col-md-2">
                                    <div class="col-lg-10 input-group">
                                        <div class="slide-toggle">
                                            <div style="position: relative;left:100px">
                                                @if(($v->display)==1)
                                                <input type="checkbox" value="{{$v->id}}" name="{{$v->display}}" class="js-switch"
                                                checked/>
                                                @else
                                                <input type="checkbox" value="{{$v->id}}" name="{{$v->display}}" class="js-switch"
                                                />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center" class="col-md-3">
                                    <a class="btn btn-info" href="/admin/addchild/{{$v->id}}/{{$v->path}}">
                                        添加子分类
                                    </a>
                                    <a class="btn btn-success" href="/admin/typechild/{{$v->id}}">
                                        查看子分类
                                    </a>
                                    <form action="/admin/type/{{$v->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-warning" onclick="return confirm('确定删除?')">删除分类</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    名称
                                </th>
                                <th>
                                    Pid
                                </th>
                                <th>
                                    Path
                                </th>
                                <th>
                                    显示
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
    //显示按钮ajax操作
        $('.slide-toggle').click(function(){

            var id = $(this).find('input').val();

            var dis = $(this).find('input').attr('name');

            $.get('/admin/type/display/'+dis+'/'+id,{},function(res){

            })
        })

    //错误提示消息
    setTimeout(function(){
        $('#errormessage').slideUp(1000);
    },2000)

    //name修改ajax操作
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    


    $('.tname').dblclick(function(){

         um = $(this);

        //获取td里面的内容
        var ux = $(this).text().trim();

        //创建input输入框
        var ipu = $('<input type="text" />');

        $(this).empty();

        $(this).append(ipu);

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
            ids = um.attr('name');

            $.post('/admin/type/nameajax',{name:uv,id:ids},function(data){
                console.log(data);

                if(data == '1'){

                    um.text(uv);

                } else {

                    um.text(ux);
                }
            })
        })
    })

</script>
@stop
