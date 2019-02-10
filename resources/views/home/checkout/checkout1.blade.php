@extends('layout.home.index')

@section('title',$title)

@section('content')
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item active">订单</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">订单</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">请确认您的订单</p></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Checkout-->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <ul class="custom-nav nav nav-pills mb-5">
              <li class="nav-item w-25"><a href="/home/checkout1/{{$id}}" class="nav-link text-sm active">确认订单</a></li>
              <li class="nav-item w-25"><a class="nav-link text-sm disabled">收货地址</a></li>
              <li class="nav-item w-25"><a class="nav-link text-sm disabled">付款方式</a></li>
              <li class="nav-item w-25"><a class="nav-link text-sm disabled">支付</a></li>
            </ul>
            <div class="mb-5">
              <div class="cart">
                <div class="cart-wrapper">
                  <div class="cart-header text-center">
                    <div class="row">
                      <div class="col-6">商品</div>
                      <div class="col-2">价格</div>
                      <div class="col-2">数量</div>
                      <div class="col-2">小计</div>
                    </div>
                  </div>
                  <div class="cart-body">
                    <!-- Product-->
                    @foreach($orderinfo as $k => $v)
                    <div class="cart-item">
                      <div class="row d-flex align-items-center text-center">
                        <div class="col-6">
                          <div class="d-flex align-items-center"><img src="{{$v['pic']}}" class="cart-item-img">
                            <div class="cart-title text-left"><a class="text-uppercase text-dark"><strong>{{$v['name']}}</strong></a><br><span class="text-muted text-sm">{{$v['size']}}</span><br><span class="text-muted text-sm">{{$v['color']}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-2">${{$v['price']}}</div>
                        <div class="col-2">{{$v['num']}}</div>
                        <div class="col-2 text-center">${{$v['total']}}</div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-5 d-flex justify-content-between flex-column flex-lg-row"><a class="btn btn-link text-muted"> <i class="fa fa-angle-left mr-2"></i></a><a href="/home/checkout2/{{$id}}" class="btn btn-dark">下一步<i class="fa fa-angle-right ml-2"></i></a></div>
          </div>
          <div class="col-lg-4">
            <div class="block mb-5">
              <div class="block-header">
                <h6 class="text-uppercase mb-0">订单摘要</h6>
              </div>
              <div class="block-body bg-light pt-1">
                <p class="text-sm">总费用等于运费及其他额外费用</p>
                <ul class="order-summary mb-0 list-unstyled">
                  <li class="order-summary-item"><span>商品总额</span><span>${{$order['total']}}</span></li>
                  <li class="order-summary-item"><span>运费</span><span>免邮</span></li>
                  <li class="order-summary-item border-0"><span>总计</span><strong class="order-summary-total">${{$order['total']}}</strong></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop

@section('js')

@stop