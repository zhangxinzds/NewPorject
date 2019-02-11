@extends('layout.home.index')

@section('title',$title)


@section('content')
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item"><a href="/home/orders">订单</a></li>
          <li class="breadcrumb-item active">订单详情</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">订单详情</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="text-muted">如果您有任何疑问，请随时与我们联系，我们的客户服务中心全天候为您服务。</p></div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-xl-9">
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
                  @foreach($order as $k => $v)
                  <div class="cart-item">
                    <div class="row d-flex align-items-center text-center">
                      <div class="col-6">
                        <div class="d-flex align-items-center"><a><img src="{{$v['pic']}}" class="cart-item-img"></a>
                          <div class="cart-title text-left"><a class="text-uppercase text-dark"><strong>{{$v['name']}}</strong></a><br><span class="text-muted text-sm">尺寸: {{$v['size']}}</span><br><span class="text-muted text-sm">颜色: {{$v['color']}}</span>
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
            <div class="row my-5">
              <div class="col-md-6">
                <div class="block mb-5">
                  <div class="block-header">
                    <h6 class="text-uppercase mb-0">订单摘要</h6>
                  </div>
                  <div class="block-body bg-light pt-1">
                    <p class="text-sm">总金额等于商品价格加运费及其他额外费用</p>
                    <ul class="order-summary mb-0 list-unstyled">
                      <li class="order-summary-item"><span>订单小计</span><span>${{$or['total']}}</span></li>
                      <li class="order-summary-item"><span>运费</span><span>免邮</span></li>
                      <li class="order-summary-item border-0"><span>总计</span><strong class="order-summary-total">${{$or['total']}}</strong></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="block-header">
                  <h6 class="text-uppercase mb-0">收货地址</h6>
                </div>
                <div class="block-body bg-light pt-1">
                  <p>{{$or['address']}}</p>
                </div>
                <div class="block-header">
                  <h6 class="text-uppercase mb-0">联系电话</h6>
                </div>
                <div class="block-body bg-light pt-1">
                  <p>{{$or['phone']}}</p>
                </div>
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
                  <a href="/home/orders" class="active list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#paper-bag-1"> </use>
                    </svg>订单</span>
                  <div class="badge badge-pill badge-light font-weight-normal px-3">{{$num}}</div></a>
                    <a href="/home/address" class="list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#navigation-map-1"></use>
                    </svg>个人资料</span></a>
                    <a href="/home/pass" class="list-group-item d-flex justify-content-between align-items-center"><span>
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

@stop