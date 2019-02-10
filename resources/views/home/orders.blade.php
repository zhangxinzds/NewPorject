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
          <h1 class="hero-heading">你的订单</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead"</p></div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-xl-9">
            <table class="table table-borderless table-hover table-responsive-md">
              <thead class="bg-light">
                <tr>
                  <th class="py-4 text-uppercase text-sm">订单号</th>
                  <th class="py-4 text-uppercase text-sm">时间</th>
                  <th class="py-4 text-uppercase text-sm">金额</th>
                  <th class="py-4 text-uppercase text-sm">状态</th>
                  <th class="py-4 text-uppercase text-sm">操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($order as $k => $v)
                <tr>
                  <td class="py-4 align-middle">#{{$v['number']}}</td>
                  <td class="py-4 align-middle">{{date("Y-m-d H:i:s",$v['addtime'])}}</td>
                  <td class="py-4 align-middle">${{$v['total']}}</td>
                  <td class="py-4 align-middle"><span class="btn btn-outline-success">{{$v['status']}}</span></td>
                  <td class="py-4 align-middle"><a href="/home/order/{{$v['id']}}" class="btn btn-outline-dark btn-sm">View</a></td>
                </tr>
               @endforeach
              </tbody>
            </table>
          </div>
          <!-- Customer Sidebar-->
          <div class="col-xl-3 col-lg-4 mb-5">
            <div class="customer-sidebar card border-0"> 
              <div class="customer-profile"><a href="#" class="d-inline-block"><img src="{{$user['header']}}" class="img-fluid rounded-circle customer-image"></a>
                <h5>{{$user['name']}}</h5>
              </div>
              <nav class="list-group customer-nav"><a href="/home/orders" class="active list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#paper-bag-1"> </use>
                    </svg>订单</span>
                  <div class="badge badge-pill badge-light font-weight-normal px-3">{{$num}}</div></a>
                  <a href="/home/ziliao" class="list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#male-user-1"> </use>
                    </svg>个人资料</span></a>
                    <a href="/home/address" class="list-group-item d-flex justify-content-between align-items-center"><span>
                    <svg class="svg-icon svg-icon-heavy mr-2">
                      <use xlink:href="#navigation-map-1"> </use>
                    </svg>地址</span></a>
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