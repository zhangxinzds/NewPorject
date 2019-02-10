@extends('layout.home.index')

@section('title',$title)

@section('content')
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item active">收货信息</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">收货信息</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">请填写您的收货地址</p></div>
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
              <li class="nav-item w-25"><a href="/home/checkout2/{{$id}}" class="nav-link text-sm active">收货信息</a></li>
              <li class="nav-item w-25"><a class="nav-link text-sm disabled">付款方式</a></li>
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
            <form action="/home/checkout3/{{$id}}" method="get">
              <div class="block">
                <!-- Invoice Address-->
                <div class="block-header">
                  <h6 class="text-uppercase mb-0">收货信息</h6>
                </div>
                  <div class="block-body">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="phone" class="form-label">电话号码</label>
                        <input type="text" name="phone" @if($order['phone'] == '暂未填写') placeholder="暂未填写" @else value="{{$order['phone']}}" @endif  id="phone" class="form-control" readonly>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="address" class="form-label">送货地址</label>
                        <input type="text" name="address"@if($order['address'] == '暂未填写') placeholder="暂未填写" @else value="{{$order['address']}}" @endif id="address" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                        <a class="btn btn-outline-secondary" style="margin-left:-15px;margin-top:10px">修改</a>
                    </div>
                    <!-- /Invoice Address-->
                  </div>
              </div>
              <div class="mb-5 d-flex justify-content-between flex-column flex-lg-row"><a href="/home/checkout1/{{$id}}" class="btn btn-link text-muted"> <i class="fa fa-angle-left mr-2"></i>返回上一步</a><a><button class="btn btn-dark">选择支付方式</button><i class="fa fa-angle-right ml-2"></i></a></div>
            </form>
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
  <script>
    $('#errormessage').delay(2000).slideUp(1000);

    $('.btn-outline-secondary').click(function(){
        $('input').removeAttr('readonly');
    })
  </script>
@stop