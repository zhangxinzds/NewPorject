@extends('layout.home.index')

@section('title',$title)


@section('content')
<style>
body,li,p,ul { 
    margin: 0;
    padding: 0;
}
ul, li, ol { list-style: none; }
/* 重置文本格式元素 */
a { text-decoration: none; cursor: pointer; color:#333333; font-size:14px;}
a:hover { text-decoration: none; }
.clearfix::after{ display:blocks; content:''; height:0; overflow:hidden; clear:both;} 
/*星星样式*/
.content{ width:600px; margin:0 auto; padding-top:20px;}
.title{ font-size:14px; background:#dfdfdf; padding:10px; margin-bottom:10px;}
.blocks{ width:100%; margin:0 0 20px 0; padding-top:10px; padding-left:50px; line-height:21px;}
.blocks .star_score{ float:left;}
.star_list{height:21px;margin:50px; line-height:21px;}
.blocks p,.blocks .attitude{ padding-left:20px; line-height:21px; display:inline-blocks;}
.blocks p span{ color:#C00; font-size:16px; font-family:Georgia, "Times New Roman", Times, serif;}
.star_score { background:url(/homes/images/stark2.png); width:160px; height:21px;  position:relative; }
.star_score a{ height:21px; display:blocks; text-indent:-999em; position:absolute;left:0;}
.star_score a:hover{ background:url(/homes/images/stars2.png);left:0;}
.star_score a.clibg{ background:url(/homes/images/stars2.png);left:0;}
#starttwo .star_score { background:url(/homes/images/starky.png);}
#starttwo .star_score a:hover{ background:url(/homes/images/starsy.png);left:0;}
#starttwo .star_score a.clibg{ background:url(/homes/images/starsy.png);left:0;}
/*星星样式*/
.show_number{ padding-left:50px; padding-top:20px;}
.show_number li{ width:240px; border:1px solid #ccc; padding:10px; margin-right:5px; margin-bottom:20px;}
.atar_Show{background:url(/homes/images/stark2.png); width:160px; height:21px;  position:relative; float:left; }
.atar_Show p{ background:url(/homes/images/stars2.png);left:0; height:21px; width:134px;}
.show_number li span{ display:inline-blocks; line-height:21px;}
</style>
@if (session('success'))
    <div class="alert alert-success" id="message">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-success" id="message">
        {{ session('error') }}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger" id="message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                    <div class="col-5">商品</div>
                    <div class="col-3">价格</div>
                    <div class="col-2">数量</div>
                    <div class="col-2">小计</div>
                  </div>
                </div>
                <div class="cart-body">
                  <!-- Product-->
                  @php $i =1; @endphp
                  @foreach($order as $k => $v)
                  @php
                    $rs = DB::table('goods')->where('name',$v['name'])->first();
                    $id = $rs->id;
                    $comment = DB::table('comment')->where('uid',session('id'))->where('gid',$id)->where('number',$or['number'])->get();
                  @endphp
                  <div class="cart-item">
                    <div class="row d-flex align-items-center text-center">
                      <div class="col-5">
                        <div class="d-flex align-items-center"><a><img src="{{$v['pic']}}" class="cart-item-img"></a>
                          <div class="cart-title text-left"><a class="text-uppercase text-dark"><strong class="goodname" id="{{$id}}">{{$v['name']}}</strong></a><br><span class="text-muted text-sm">尺寸: {{$v['size']}}</span><br><span class="text-muted text-sm">颜色: {{$v['color']}}</span>
                          </div>
                          <!-- 订单状态为已收货,并且超过评论3次不再给与评论权限 -->
                          @if($or['status'] == '3'&& count($comment) <= '2')
                          <button class="btn btn-outline-dark pinjia"  data-toggle="modal" data-target="#exampleModal"  style="margin-left:30px">评价</button>
                          @endif
                        </div>
                      </div>
                      <div class="col-3">${{$v['price']}}</div>
                      <div class="col-2">{{$v['num']}}</div>
                      <div class="col-2 text-center">${{$v['total']}}</div>
                    </div>
                  </div>
                  @php $i++; @endphp
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
    <!-- 模态框-->
    <div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade">
      <div role="document" class="modal-dialog" >
        <div class="modal-content" style="width:800px;margin-left:-100px">


          <button type="button" data-dismiss="modal" aria-label="Close" class="close modal-close">
            <svg class="svg-icon w-100 h-100 svg-icon-light align-middle">
              <use xlink:href="#close-1"></use>
            </svg>
          </button>
          <form action="/home/comment" method="post">
          {{csrf_field()}}
          <div class="modal-body text-center">
            <h2 id="exampleModalLabel" class="modal-title mb-4 goodname2"></h2>
            <!-- 分数评价 -->
            <div class="content">
              <div id="startone"  class="blocks clearfix">
                <div class="star_score"></div>
                  <p style="float:left;">您的评分：<span class="fenshu"></span> 分</p>
                <div class="attitude"></div>
              </div>
            </div>
            <!-- 分数评价end -->
            <p class="text-muted">
                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="10"></textarea>
                  <input type="text" value="{{$or['number']}}" name="number" style="display:none">
                  <input type="text" class="fen" value="" name="score" style="display:none">
                  <input type="text" class="gid" value="" name="gid" style="display:none">
                </div>
            </p>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark">关闭</button>
            <button class="btn btn-dark" class="submit">提交</button>
          </div>
          </form>
        </div>
      </div>
    </div>
@stop

@section('js')
<script type="text/javascript" src="/homes/js/startScore.js"></script>
  <script>
     $('#message').delay(2000).slideUp(1000);

     $(".show_number li p").each(function(index, element) {
        var num=$(this).attr("tip");
        var www=num*2*16;
        $(this).css("width",www);
        $(this).parent(".atar_Show").siblings("span").text(num+"分");
     });

    scoreFun($("#startone"))
    scoreFun($("#starttwo"),{
    fen_d:22,//每一个a的宽度
    ScoreGrade:5//a的个数 10或者
    })

    $('.pinjia').click(function(){
      var name = $(this).parents('.cart-item').find('.goodname').text();
      var id = $(this).parents('.cart-item').find('.goodname').attr('id');
      $('.goodname2').text(name);
      $('.gid').val(id);
    })
  </script>
@stop