@extends('layout.home.index')

@section('title',$title)

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
</style>
 <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item active">个人资料</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">个人资料</h1>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-xl-9">
            <div class="block mb-5">
              <div class="block-header"><strong class="text-uppercase">头像修改</strong></div>
              <div class="block-body">
                <form action="/home/hedit" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
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
                <div class="row">
                  <div class=" form-group has-success">
                      <div class="xxx" style="float:left;width:1200px;margin-left:10px">
                      </div>   
                      <label class="form-label">修改头像</label>
                      <div class="input-group-lg">
                          <a id="select" class="btn btn-outline-secondary">选择头像</a>  
                          <input type="file" name="header" id="file_input"/>
                      </div>
                  </div>
                </div>
                  <div class="text-center mt-4">
                    <button type="submit" class="btn btn-outline-dark"><i class="far fa-save mr-2"></i>修改</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Customer Sidebar-->
           <div class="col-xl-3 col-lg-4 mb-5">
            <div class="customer-sidebar card border-0"> 
              <div class="customer-profile"><a href="#" class="d-inline-block"><img src="{{$user['header']}}" class="img-fluid rounded-circle customer-image"></a>
                <h5>{{$user['name']}}</h5>
              </div>
              <nav class="list-group customer-nav">
                  <a href="/home/orders" class="list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#paper-bag-1"> </use>
                    </svg>订单</span>
                  <div class="badge badge-pill badge-light font-weight-normal px-3">{{$num}}</div></a>
                    <a href="/home/address" class="list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#navigation-map-1"></use>
                    </svg>个人资料</span></a>
                    <a href="/home/pass" class="list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#male-user-1"> </use>
                    </svg>密码</span></a>
                    <a href="/home/header" class="active list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#navigation-map-1"></use>
                    </svg>头像</span></a>
                    <a href="/home/logout" class="list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#exit-1"> </use>
                    </svg>注销</span></a>
              </nav>
            </div>
          </div>
          <!-- /Customer Sidebar-->
        </div>
      </div>
    </section>
@stop

@section('js')
<script>
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
@stop