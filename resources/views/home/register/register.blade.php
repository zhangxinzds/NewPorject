@extends('layout.home.index')
@section('title',$title)
@section('content')
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
<!--         <ol class="breadcrumb justify-content-center">
  <li class="breadcrumb-item"><a href="/">主页</a></li>
  <li class="breadcrumb-item active">用户注册</li>
</ol> -->
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading mb-0">注册</h1>
        </div>
      </div>
    </section>
    <!-- customer login-->
    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="block">
              <div class="block-header">
                <h6 class="text-uppercase mb-0">注册<a href="{{route('login')}}">登录</a></h6>
              </div>
              <div class="block-body"> 
                @if (count($errors) > 0)
    			      <div class="alert alert-danger" id="errormessage">
	        		     <ul>
	           		@foreach ($errors->all() as $error)
	                	  <li>{{ $error }}</li>
           			@endforeach
        			     </ul>
    			      </div>
				        @endif
                <p class="text-muted">随着我们注册新的时尚世界，梦幻般的折扣和更多打开给你！整个过程不会超过一分钟！</p>
                <hr>
                <form action="{{route('doregister')}}" method="post">
                {{csrf_field()}}
                  <div class="form-group">
                    <label for="name" class="form-label">用户名</label>
                    <input id="name" type="text" name="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="text" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password" class="form-label">密码</label>
                    <input id="password" type="password" name="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password" class="form-label">确认密码</label>
                    <input id="password" type="password" name="repassword" class="form-control">
                  </div>
                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-outline-dark"><i class="far fa-user mr-2"></i>注册</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop

@section('js')
	<script>
		$('#errormessage').delay(2000).slideUp(1000);

	</script>
@stop