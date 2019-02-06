@extends('layout.home.index')
@section('title',$title)

@section('content')
	<section class="hero" style="height:500px">
      <div class="container" style="margin-top:100px">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">邮箱验证</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">邮箱验证</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">感谢您注册我们的网站,在登录前需要进行邮箱验证,请前往您的注册邮箱完成验证</p></div>
          </div>
        </div>
      </div>
    </section>
@stop