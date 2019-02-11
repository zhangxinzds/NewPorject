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
              <div class="block-header"><strong class="text-uppercase">修改密码</strong></div>
              <div class="block-body">
                <form action="/home/pedit" method="post" enctype="multipart/form-data">
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
                <div class="alert alert-success" id='errormessage'>
                {{ session('success') }}
                </div>
                @endif                
                @if (session('err'))
                <div class="alert alert-danger" id='errormessage'>
                {{ session('err') }}
                </div>
                @endif
                @if (session('diff'))
                <div class="alert alert-danger" id='errormessage'>
                {{ session('diff') }}
                </div>
                @endif
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="password_old" class="form-label">旧密码</label>
                        <input id="password_old" type="password" name="prevpassword" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="password_1" class="form-label">新密码</label>
                        <input id="password_1" type="password" name="newpassword" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="password_2" class="form-label">重复密码</label>
                        <input id="password_2" type="password" name="repassword" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="mt-4">
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
                    <a href="/home/pass" class="active list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#male-user-1"> </use>
                    </svg>密码</span></a>
                    <a href="/home/header" class="list-group-item d-flex justify-content-between align-items-center"><span>
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
  
  $('#errormessage').delay(2000).slideUp(1000);
              
</script>
@stop