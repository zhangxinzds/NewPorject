@extends('layout.home.index')

@section('title',$title)

@section('content')
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item active">收货地址</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">收货地址</h1>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-8 col-xl-9">
            <form action="/home/addressedit" method="post">
            {{csrf_field()}}
              <div class="block">
                <!-- Invoice Address-->
                <div class="block-header">
                  <h6 class="text-uppercase mb-0">修改收货地址</h6>
                </div>
                @if (session('empty'))
                  <div class="alert alert-success" id="errormessage">
                    {{ session('empty') }}
                  </div>
                @endif
                @if (session('success'))
                  <div class="alert alert-success" id="errormessage">
                    {{ session('success') }}
                  </div>
                @endif
                @if (count($errors) > 0)
                  <div class="alert alert-danger" id="errormessage">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
               @endif
                <div class="block-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="fullname_invoice" class="form-label">姓名</label>
                      <input type="text" name="tname" placeholder="{{$userinfo['tname']}}" id="fullname_invoice" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="emailaddress_invoice" class="form-label">电话</label>
                      <input type="text" name="phone" placeholder="{{$userinfo['phone']}}" id="emailaddress_invoice" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="emailaddress_invoice" class="form-label">邮箱</label>
                      <input type="text" name="email" placeholder="{{$userinfo['email']}}" id="emailaddress_invoice" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="street_invoice" class="form-label">收货地址</label>
                      <input type="text" name="address" placeholder="{{$userinfo['address']}}" id="street_invoice" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-outline-dark"><i class="far fa-save mr-2"></i>修改</button>
              </div>
            </form>
          </div>
          <!-- Customer Sidebar-->
          <div class="col-xl-3 col-lg-4 mb-5">
            <div class="customer-sidebar card border-0"> 
               <div class="customer-profile"><a href="#" class="d-inline-block"><img src="{{$user['header']}}" class="img-fluid rounded-circle customer-image"></a>
                <h5>{{$user['name']}}</h5>
              </div>
              <nav class="list-group customer-nav">
                  <a href="/home/orders" class="list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#paper-bag-1"> </use>
                    </svg>订单</span>
                  <div class="badge badge-pill badge-light font-weight-normal px-3">{{$num}}</div></a>
                    <a href="/home/address" class="active list-group-item d-flex justify-content-between align-items-center"><span>
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
<script>
    $('#errormessage').delay(2000).slideUp(1000);
</script>
@stop