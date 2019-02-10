@extends('layout.home.index')

@section('title',$title)

@section('content')
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item active">订单已确认</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">订单已确认</h1>
        </div>
      </div>
    </section>
    <section class="pb-5">
      <div class="container text-center">
        <div class="icon-rounded bg-primary mb-3 mx-auto text-white">
          <svg class="svg-icon w-2rem h-2rem align-middle">
            <use xlink:href="#checkmark-1"></use>
          </svg>
        </div>
        <h4 class="mb-3 ff-base">您的订单已确认。</h4>
        <p class="text-muted mb-5">您的订单尚未发货,等待商家确认。</p>
        <p> <a href="/home/orders" class="btn btn-outline-dark">查看或管理您的订单</a></p>
      </div>
    </section>
@stop

@section('js')

@stop