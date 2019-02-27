@extends('layout.home.index')
@section('title',$title)
@section('content')
    <section class="hero">
      <div class="container">
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading mb-0">登录</h1>
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
                <h6 class="text-uppercase mb-0">登录 <a href="{{route('register')}}">注册</a></h6>
              </div>
              <div class="block-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger" id="errormessage1">
                   <ul>
                @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                @endforeach
                   </ul>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error')}}
                </div>
                @endif
                @if (session('errorss'))
                    <div class="alert alert-danger">
                        {{ session('errorss')}}
                    </div>
                @endif
                @if (session('captcha'))
                    <div class="alert alert-danger">
                        {{ session('captcha')}}
                    </div>
                @endif
                <p class="text-muted">欢迎光临我们的网站,在这里你可以轻松便捷地购物!</p>
                <hr>
                <form action="/home/dologin" method="post">
                  <div class="form-group">
                    <label for="email" class="form-label">用户名/邮箱</label>
                    <input id="email" type="text" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password" class="form-label">密码</label>
                    <input id="password" type="password" name="password" class="form-control">
                  </div>
                  <div class="form-group" style="width:300px">
                    <label for="captcha" class="form-label">验证码</label>
                    <input id="captcha" type="text" name="captcha" class="form-control">
                     <img src="{{route('hcaptcha')}}" style="position: absolute;left:343px;top:327px;border-radius:5px" onclick='this.src=this.src += "?1"'>
                  </div>
                  <div class="form-group text-center">
                  {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-dark"><i class="fa fa-sign-in-alt mr-2"></i>登录</button>
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
    $('.alert-danger').delay(2000).slideUp(1000);
	</script>
@stop