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
                  <th class="py-4 text-uppercase text-sm">查看</th>
                  <th class="py-4 text-uppercase text-sm">操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($order as $k => $v)
                <tr>
                  <td class="py-4 align-middle">#{{$v['number']}}</td>
                  <td class="py-4 align-middle">{{date("Y-m-d H:i:s",$v['addtime'])}}</td>
                  <td class="py-4 align-middle">${{$v['total']}}</td>
                  <td class="py-4 align-middle status">{{$v['status']}}</td>
                  <td class="py-4 align-middle"><a href="/home/order/{{$v['id']}}" class="btn btn-outline-dark btn-sm">详情</a></td>
                  <td class="py-4 align-middle" id="{{$v['id']}}">
                    @switch($v['status'])
                    @case('未支付')
                        <a href="/home/checkout1/{{$v['id']}}" class="btn btn-primary">去支付</a>
                        <button class="btn btn-link cancel">取消订单</button>
                    @break
                    @case('待发货')
                        <button class="btn btn-default">已支付</button>
                    @break
                    @case('已发货')
                        <button class="btn btn-warning operation">确认收货</button>
                    @break
                    @case('已收货')
                        <button class="btn btn-success">去评价</button>
                    @break
                    @case('已评价')
                        <button class="btn btn-danger">已完成</button>
                    @break
                    @endswitch
                  </td>
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
  <script>
    $('.operation').click(function(){
        that = $(this);
        var val = $(this).text();
        var id = $(this).parent().attr('id');
        $.get('/home/status',{val:val,id:id},function(res){
            if(res == '已收货'){
                that.text('去评价').removeClass('btn-warning').addClass('btn-success');
                that.parents('tr').find('.status').text('已收货');
            }else{
                alert('操作失败');
            }
        }) 
    })

    //取消订单
    $('.cancel').click(function(){
        var cfm = confirm('确定取消订单?');
        if(!cfm) return;
        var id = $(this).parent().attr('id');
        $.get('/home/cancel',{id:id},function(res){
            if(res == 1){
              alert('删除成功');
              location.reload();
            }else{
              alert('删除失败');
            }
        })
    })
  </script>
@stop