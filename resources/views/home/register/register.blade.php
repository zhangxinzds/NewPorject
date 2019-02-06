@extends('layout.home.index')
@section('title',$title)
@section('content')
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Customer zone</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading mb-0">Customer zone</h1>
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
                <h6 class="text-uppercase mb-0">新账户注册</h6>
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
                <p class="lead">未注册账户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;已注册,去<a href="{{route('login')}}">登陆</a></p>
                <p class="text-muted">随着我们注册新的时尚世界，梦幻般的折扣和更多打开给你！整个过程不会超过一分钟！</p>
                <p class="text-muted">如果您有任何疑问，请随时<a href="contact.html">与我们联系</a>,我们的客户服务中心全天候为您服务。</p>
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