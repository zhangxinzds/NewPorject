@extends('layout.home.index')

@section('title',$title)

@section('content')
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item active">付款方式</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">付款方式</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">请选择付款方式</p></div>
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
              <li class="nav-item w-25"><a href="/home/checkout1/{{$id}}" class="nav-link text-sm">确认订单</a></li>
              <li class="nav-item w-25"><a href="/home/checkout2/{{$id}}" class="nav-link text-sm ">收货信息</a></li>
              <li class="nav-item w-25"><a href="/home/checkout3/{{$id}}" class="nav-link text-sm active">付款方式</a></li>
              <li class="nav-item w-25"><a class="nav-link text-sm disabled">支付</a></li>
            </ul>
            @if (count($errors) > 0)
              <div class="alert alert-danger" id="errormessage">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
        <form action="/home/checkout4/{{$id}}" method="get">
            <div class="mb-5">
              <div id="accordion" role="tablist">
                <div class="block mb-3">
                  <div id="headingTwo" role="tab" class="block-header"><strong><a data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="accordion-link collapsed">支付宝</a></strong></div>
                  <div id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion" class="collapse">
                    <div class="block-body py-5 d-flex align-items-center">
                      <input type="radio" name="payway" value="支付宝" id="payment-method-1">
                      <label for="payment-method-1" class="ml-3"><strong class="d-block text-uppercase mb-2">使用支付宝支付</strong><span class="text-muted text-sm">Use Alipay payment</span></label>
                    </div>
                  </div>
                </div>
                <div class="block mb-3">
                  <div id="headingThree" role="tab" class="block-header"><strong><a data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="accordion-link collapsed">微信</a></strong></div>
                  <div id="collapseThree" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion" class="collapse">
                    <div class="block-body py-5 d-flex align-items-center">
                      <input type="radio" name="payway" value="微信" id="payment-method-2">
                      <label for="payment-method-2" class="ml-3"><strong class="d-block text-uppercase mb-2">使用微信支付</strong><span class="text-muted text-sm">Payment by Wechat</span></label>
                    </div>
                  </div>
                </div>
                <div class="block mb-3">
                  <div id="headingOne" role="tab" class="block-header"><strong><a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="accordion-link collapsed">货到付款</a></strong></div>
                  <div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" class="collapse">
                    <div class="block-body py-5 d-flex align-items-center">
                      <input type="radio" name="payway" value="货到付款" id="payment-method-3">
                      <label for="payment-method-3" class="ml-3"><strong class="d-block text-uppercase mb-2">货到付款</strong><span class="text-muted text-sm">Cash on Delivery</span></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-5 d-flex justify-content-between flex-column flex-lg-row"><a href="/home/checkout2/{{$id}}" class="btn btn-link text-muted"> <i class="fa fa-angle-left mr-2"></i>返回上一步</a><a><button  class="btn btn-dark">去支付</button><i class="fa fa-angle-right ml-2"></i></a></div>
          </div>
        </form>
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
  <script>
    $('#errormessage').delay(2000).slideUp(1000);
  </script>
@stop