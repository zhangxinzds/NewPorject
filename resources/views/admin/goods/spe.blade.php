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
        <li class="active">颜色添加</li>
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
		                颜色规格表
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
		            </header>
		            @if (count($errors) > 0)
	                    <div class="alert alert-danger" id="errormessage">
	                        <ul>
	                            @foreach ($errors->all() as $error)
	                                <li>{{ $error }}</li>
	                            @endforeach
	                        </ul>
	                    </div>
                	@endif
                	@if (session('success'))
					    <div class="alert alert-success" id="errormessage">
					        {{ session('success') }}
					    </div>
					@endif
					@if (session('error'))
					    <div class="alert alert-danger"  id="errormessage">
					        {{ session('error') }}
					    </div>
					@endif
			        <div class="btn-group" style="margin:10px">
		                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
		                    新增颜色 <i class="fa fa-plus"></i>
		                </button>
		            </div>
	                <section id="unseen">
	                    <table class="table table-bordered table-striped table-condensed">
	                        <thead>
	                        <tr>
	                            <th>颜色ID</th>
	                            <th>颜色分类</th>
	                            <th class="numeric">颜色图片</th>
	                            <th class="numeric">状态</th>
	                            <th class="numeric">库存</th>
	                            <th class="numeric">操作</th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                        @php
								use App\Http\Model\Admin\ColorImg;
								use App\Http\Model\Admin\Size;
	                        @endphp
	                        @foreach($rs as $k => $v)
	                        <tr>
	                            <td style="line-height:140px">{{$v['id']}}</td>
	                            <td style="line-height:140px">{{$v['color']}}</td>
	                            <td class="center-block">
	                            	@php
										$imgs = ColorImg::where('cid',$v['id'])->get();			
	                            	@endphp
	                            	@foreach($imgs as $key => $val)
										<img src="{{$val['pic']}}" style="width:100px;height:140px">
	                            	@endforeach
	                            </td>
	                            <td class="numerica">
	                            	<div class="input-group" style="margin-top:50px">
                                        <div class="slide-toggle display col-md-offset-4 col-lg-offset-4col-xl-offset-4">
                                            <div style="position: relative;left:20px">
                                            @if($v['display']=='1')
                                                <input type="checkbox" value="{{$v->id}}" name="{{$v->display}}"  class="js-switch" checked/>
                                            @else
                                                <input type="checkbox" value="{{$v->id}}" name="{{$v->display}}"  class="js-switch"/>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
	                            </td>
	                            <td>
	                            	<table class="col-md-offset-2" style="height:100px">
	                            	@php
										$size = Size::where('cid',$v['id'])->get();
	                            	@endphp 
	                            	@foreach($size as $ke => $va)
	                            		<tr>
	                            			<td style="height:25px;padding:2px"><i>型号</i>:<input style="width:80px;height:25px" type="text" value="{{$va['size']}}"></td>
	                            			<td style="height:25px;padding:2px"><i>库存</i>:<input style="width:80px;height:25px" type="text" value="{{$va['stock']}}"></td>
	                            			<td style="height:25px;padding:2px;"><a style="height:25px;line-height:12px" id="{{$va['id']}}" class="btn btn-info update">修改</a></td>
	                            			<td style="height:25px;padding:2px;"><a style="height:25px;line-height:12px" id="{{$va['id']}}" class="btn btn-danger 
	                            			remove">删除</a></td>
	                            		</tr> 	  	
									@endforeach
	                            	</table>
	                            </td>
	                            <td class="numeric">
    	                            	<a style="margin-top:50px" class="btn btn-success addkucun" >新增库存</a>
    	                            	<form action="/admin/color/delete/{{$v['id']}}" method="get" style="display:inline;position:relative;left:5px;top:24px">
                                            <button class="btn btn-warning" onclick="return confirm('确定删除?')">删除</button>
                                        </form> 
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
					添加颜色
				</h4>
			</div>
			<div class="modal-body">
			<!-- 内容start -->
				 <form role="form" action="/admin/color" method="post" class="form-horizontal adminex-form"  enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}}
                    <div class="form-group has-success">
                        <label class="col-lg-3 control-label">颜色名称</label>
                        <div class="col-lg-6 input-group-lg">
                            <input type="text" name="color" placeholder="" id="f-name" class="form-control">
                            <input type="text" name="gid" value="{{$gid}}" id="f-name" class="form-control" style="display:none">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <div class="xxx" style="float:left;width:800px;margin-left:100px;"></div>   
                        <label class="col-lg-3 control-label">图片</label>
                        <div class="col-lg-6 input-group-lg">
                           <a id="select" class="btn btn-success">(重新)选择图片</a>  
                           <a id="add" class="btn btn-warning">(追加)图片</a>  
                           <input type="file" name="pic[]" id="file_input" multiple/>
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
//添加规格
$('.addkucun').click(function(){
	var table = $(this).parent().prev().children('table');
	table.append('<tr><td style="height:25px;padding:2px"><i>型号</i>: <input style="width:80px;height:25px" type="text" value=""></td><td style="height:25px;padding:2px"><i>库存</i>: <input style="width:80px;height:25px" type="text" value=""></td><td style="height:25px;padding:2px;"><a style="height:25px;line-height:12px" class="btn btn-primary add">保存</a></td><td style="height:25px;padding:2px;"><a style="height:25px;line-height:12px" class="btn btn-danger remove" id="{{@$va['id']}}">删除</a></td></tr>')
})
//规格添加ajax
$('.add').live('click',function(){
	var obj = $(this).parent().parent().parent().parent().parent().parent().children();
	var cid = $(obj[0]).html();
	var stock = $(this).parent().prev().children('input').val();
	var size = $(this).parent().prev().prev().children('input').val();
	
	var a = $(this);
	$.get('/admin/size/addajax',{cid:cid,stock:stock,size:size},function(res){
		if(res == 1){
			alert('添加成功');
			a.html('修改');
			window.location.reload();
			a.removeClass();
			a.addClass('btn btn-info update');
		}
	})

})

//规格修改ajax
$('.update').click(function(){
	var id = $(this).attr('id');
	var stock = $(this).parent().prev().children('input').val();
	var size = $(this).parent().prev().prev().children('input').val();
	
	$.get('/admin/size/updateajax',{id:id,stock:stock,size:size},function(res){
		if(res == 1){
			alert('修改成功');
		}
	})
})
//规格删除ajax
$('.remove').click(function(){
	var tr = $(this).parent().parent();
	var cfm = confirm('确定删除?');
    if(!cfm) return;
	var id = $(this).attr('id');
	$.get('/admin/size/deleteajax',{id:id},function(res){
		if(res == 1){
			tr.remove();
			alert('删除成功');
		}
	})
})


//上下架ajax按钮
$('.display').click(function(){
    var id = $(this).find('input').val();
    var sta = $(this).find('input').attr('name');
    $.get('/admin/color/ajax',{sta:sta,id:id},function(res){
        if(res == 1){
            window.location.reload();
            alert('请先添加库存');
        }
    })
})


//错误提示
$('#errormessage').delay(2000).slideUp(1000);

//多图片预览    
window.onload = function(){    
    var input = document.getElementById("file_input");    
    var result;    
    var dataArr = []; // 储存所选图片的结果(文件名和base64数据)  
    var fd;  //FormData方式发送请求    
    var oSelect = document.getElementById("select");  
    var oAdd = document.getElementById("add");  
    var oSubmit = document.getElementById("submit");  
    var oInput = document.getElementById("file_input");  
     
    if(typeof FileReader==='undefined'){    
        alert("抱歉，你的浏览器不支持 FileReader");    
        input.setAttribute('disabled','disabled');    
    }else{    
        input.addEventListener('change',readFile,false);    
    }
    
        
    function readFile(){   
        fd = new FormData();    
        var iLen = this.files.length;  
        for(var i=0;i<iLen;i++){  
            if (!input['value'].match(/.jpg|.gif|.png|.jpeg|.bmp/i)){　　//判断上传文件格式    
                return alert("上传的图片格式不正确，请重新选择");    
            }  
            var reader = new FileReader();  
            fd.append(i,this.files[i]);  
            reader.readAsDataURL(this.files[i]);  //转成base64    
            reader.fileName = this.files[i].name;  
  
            reader.onload = function(e){   
                var imgMsg = {    
                    name : this.fileName,//获取文件名    
                    base64 : this.result   //reader.readAsDataURL方法执行完后，base64数据储存在reader.result里    
                }   
                dataArr.push(imgMsg);    
                result = '<div style="float:left" class="delete">delete</div><div class="result"><img id="img" class="subPic" src="'+this.result+'" alt="'+this.fileName+'"/></div>';    
                var div = document.createElement('div');  
                div.innerHTML = result;    
                div['className'] = 'float';  
                document.getElementsByClassName('xxx')[0].appendChild(div);  　　//插入dom树    
                var img = div.getElementsByTagName('img')[0];  
                img.onload = function(){    
                    var nowHeight = ReSizePic(this); //设置图片大小    
                    this.parentNode.style.display = 'block';    
                    var oParent = this.parentNode;    
                    if(nowHeight){    
                        oParent.style.paddingTop = (oParent.offsetHeight - nowHeight)/2 + 'px';    
                    }    
                }   
                div.onclick = function(){  
                    $(this).remove();                  // 在页面中删除该图片元素  
                }  
            }    
        }    
    }    
        
        
    function send(){   
        var submitArr = [];  
        $('.subPic').each(function () {
                submitArr.push({
                    name: $(this).attr('alt'),
                    base64: $(this).attr('src')
                });  
            }
        );
        $.ajax({    
            url : 'http://123.206.89.242:9999',    
            type : 'post', 
            data : JSON.stringify(submitArr),    
            dataType: 'json',    
            //processData: false,   用FormData传fd时需有这两项    
            //contentType: false,    
            success : function(data){    
                console.log('返回的数据：'+JSON.stringify(data))    
          　}
        })    
    }    
        
    oSelect.onclick=function(){   
        oInput.value = "";   // 先将oInput值清空，否则选择图片与上次相同时change事件不会触发  
        //清空已选图片  
        $('.float').remove();        
        oInput.click();   
    }   
  
  
    oAdd.onclick=function(){  
        oInput.value = "";   // 先将oInput值清空，否则选择图片与上次相同时change事件不会触发  
        oInput.click();   
    }   
  
  
    oSubmit.onclick=function(){    
        if(!dataArr.length){    
            return alert('请先选择文件');    
        }    
        send();    
    }    
}    
/*    
 用ajax发送fd参数时要告诉jQuery不要去处理发送的数据，    
 不要去设置Content-Type请求头才可以发送成功，否则会报“Illegal invocation”的错误，    
 也就是非法调用，所以要加上“processData: false,contentType: false,”    
 * */    
    
                
function ReSizePic(ThisPic) {    
    var RePicWidth = 200; //这里修改为您想显示的宽度值    
    
    var TrueWidth = ThisPic.width; //图片实际宽度    
    var TrueHeight = ThisPic.height; //图片实际高度    
        
    if(TrueWidth>TrueHeight){    
        //宽大于高    
        var reWidth = RePicWidth;    
        ThisPic.width = reWidth;    
        //垂直居中    
        var nowHeight = TrueHeight * (reWidth/TrueWidth);    
        return nowHeight;  //将图片修改后的高度返回，供垂直居中用    
    }else{    
        //宽小于高    
        var reHeight = RePicWidth;    
        ThisPic.height = reHeight;    
    }    
}                  
</script> 
</script>
@stop