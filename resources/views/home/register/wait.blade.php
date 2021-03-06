@extends('layout.home.index')
@section('title',$title)

@section('content')
	<section class="hero" style="height:500px">
      <div class="container" style="margin-top:100px">
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">邮箱已激活</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted" style="font-size:35px"><span class="second">4</span>秒后跳转至登录页</p></div>
          </div>
        </div>
      </div>
    </section>
@stop

@section('js')
  
  <script>
    function jishi(){
      var times = $('.second');

      var time = $(times).text();

      time -= 1;

      $(times).html(time);

      if(time == 0){

        location.href='/home/login';

      }
    }

    setInterval('jishi()',1000);
  </script>

@stop