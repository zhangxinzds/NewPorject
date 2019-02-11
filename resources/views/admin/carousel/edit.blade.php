@extends('layout.admin.index')

@section('title',$title)
<!-- 富文本编辑器 -->


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

    <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>商品管理</span></a>
        <ul class="sub-menu-list">
            <li><a href="/admin/goods">商品列表</a></li>
            <li><a href="/admin/goods/create">商品添加</a></li>
        </ul>
    </li>

    <li class="menu-list  nav-active"><a href=""><i class="fa fa-laptop"></i> <span>轮播管理</span></a>
        <ul class="sub-menu-list">
            <li class="active"><a href="/admin/carousel">轮播列表</a></li>
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
        轮播管理
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/goods">轮播管理</a>
        </li>
        <li class="active">轮播修改</li>
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
        width: 500px;    
        height: 200px;
        text-align: center;    
        box-sizing: border-box;    
    }   
  
  
    #file_input{  
        display: none;  
    }  
  
  
    .delete{  
        width: 500px;  
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

    .subPic{
        width:500px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                商品修改
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
                <form role="form" action="/admin/carousel/{{$carousel[0]['lid']}}" method="post" class="form-horizontal adminex-form"  enctype="multipart/form-data" style="margin-top:20px">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group has-success">
                        <label class="col-lg-2 control-label">原图(单击删除图片)</label>
                        <div class="col-lg-9 input-group-lg">
                            @foreach($carousel as $k => $v)
                            <div style="float:left;border: 1px solid #CCCCCC;border-radius: 10px;padding: 5px;margin: 5px;width:512px;">
                                    <img src="{{$v->pic}}" value="{{$v->id}}" class="cpic" style='width:500px;height:200px'>
                            </div>
                            @endforeach
                        </div>
                    </div>       
                    <div class="form-group has-success">
                        <div class="xxx" style="float:left;width:1200px;margin-left:295px;">
                        </div>   
                        <label class="col-lg-2 control-label">图片</label>
                        <div class="col-lg-6 input-group-lg">
                               <a id="select" class="btn btn-success">选择图片</a>  
                               <a id="add" class="btn btn-warning">(追加)图片</a>  
                                <input type="file" name="pic[]" id="file_input" multiple/>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-10">
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
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>    
<script type="text/javascript">    

//错误提示效果
$('#errormessage').delay(2000).slideUp(1000);

//ajax删除原图
$('.cpic').click(function(){
    var cfm = confirm('确定删除');
    if(!cfm) return; 
    var id = $(this).attr('value');
    var that = $(this);
    $.get('/admin/carajax',{id:id},function(res){
        if(res == '1'){
            alert('删除成功');
            that.parent().remove();
            that.remove();
        }else{
            alert('删除失败');
        }
    })
})

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
    }　　　　　//handler    
    
        
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
                result = '<div style="float:left" class="delete">delete</div><div class="result"><img id="img" class="subPic" src="'+this.result+'" style="height:200px" alt="'+this.fileName+'"/></div>';    
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
  
  
   
}     
</script> 
@endsection