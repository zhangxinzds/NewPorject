@extends('layout.home.index')

@section('title',$title)

@section('content')
    @php
      use App\Http\Model\Admin\Color;
      use App\Http\Model\Admin\ColorImg;
      use App\Http\Model\Admin\Size;
      $sum=0;
      $count = DB::table('cart')->where('uid',session('id'))->count();
    @endphp

    @if($count > 0)
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item active">购物车</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">购物车</h1>
      </div>
    </section>
    <!-- Shopping Cart Section-->
    <section>
      <div class="container neirong">
        <div class="row mb-5"> 
          <div class="col-lg-8">
            <div class="cart">
              <div class="cart-header text-center">
                <div class="row">
                  <div class="col-md-5">商品</div>
                  <div class="col-md-7 d-none d-md-block">
                    <div class="row">
                      <div class="col-md-3">价格</div>
                      <div class="col-md-4">数量</div>
                      <div class="col-md-3">小计</div>
                      <div class="col-md-2">操作</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cart-body">
              <form action="/home/checkout" method="get">
                <!-- Product-->
                @foreach($cart as $k => $v)
                @php
                  $rs = Color::where('id',$v['cid'])->first();
                  $res = Size::where('id',$v['sid'])->first();
                  $ress = ColorImg::where('cid',$v['cid'])->first();
                @endphp
                <div class="cart-item">
                  <div class="row d-flex align-items-center text-left text-md-center">
                    <div class="col-12 col-md-5">
                      <div class="d-flex align-items-center"><a href="/home/details/{{$rs['gid']}}"><img src="{{$ress['pic']}}" class="cart-item-img"></a>
                        <div class="cart-title text-left"><a href="/home/details/{{$rs['gid']}}" class="text-uppercase text-dark"><strong>{{$v['name']}}</strong></a><br><span class="text-muted text-sm">尺码:{{$res['size']}}</span><br><span class="text-muted text-sm">颜色:{{$rs['color']}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-7 mt-4 mt-md-0">
                      <div class="row align-items-center">
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-6 d-md-none text-muted">Price per item</div>
                            <div class="col-6 col-md-12 text-right text-md-center">$<span class="price">{{$v['price']}}</span></div>
                          </div>
                        </div>
                        @php
                          $total = $v['price']*$v['num'];
                        @endphp

                        <div class="col-md-4">
                          <div class="row align-items-center">
                            <div class="d-md-none col-7 col-sm-9 text-muted">Quantity</div>
                            <div class="col-5 col-sm-3 col-md-12">
                              <div class="d-flex align-items-center">
                                <a class="btn btn-outline-secondary btn-sm min" style="border:none">-</a>
                                <input type="text" value="{{$v['num']}}" name="sl[]" stock="{{$res['stock']}}" readonly class="form-control text-center border-0 border-md input-items num">
                                <a class="btn btn-outline-secondary btn-sm plus" style="border:none">+</a>
                              </div>
                                <input type="text" value="{{$v['id']}}" name="id[]" style="display:none">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3"> 
                          <div class="row">
                            <div class="col-6 d-md-none text-muted">Total price</div>
                            <div class="col-6 col-md-12 text-right text-md-center">$<span class="xiaoji">{{$total}}</span></div>
                          </div>
                        </div>
                        <div class="col-2 d-none d-md-block text-center"><a><a class="btn btn-outline-secondary btn-sm cart-remove" id="{{$v['id']}}">X</a></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                @php
                  $sum += $total;
                @endphp
              @endforeach
                                <input type="text" value="{{$sum}}" class="sum" name="total" style="display:none">
              </div>
            </div>
            <div class="my-5 d-flex justify-content-between flex-column flex-lg-row"><a href="category.html" class="btn btn-link text-muted"><i class="fa fa-chevron-left"></i>继续购物</a><a><button class="btn btn-dark">去结算</button><i class="fa fa-chevron-right"></i></a></div>
                      </form>
          </div>
          <div class="col-lg-4">
            <div class="block mb-5">
              <div class="block-header">
                <h6 class="text-uppercase mb-0">订单摘要</h6>
              </div>
              <div class="block-body bg-light pt-1">
                <p class="text-sm">总金额包含运费及其他额外费用</p>
                <ul class="order-summary mb-0 list-unstyled">
                  <li class="order-summary-item"><span>商品总计</span><span>$<span class="sum"></span></span></li>
                  <li class="order-summary-item"><span>运费及手续费</span><span>免邮</span></li>
                  <li class="order-summary-item border-0"><span>总计</span><strong class="order-summary-total">$<span class="sum"></span></strong></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    @else
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">主页</a></li>
          <li class="breadcrumb-item active">购物车</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">购物车为空</h1>
      </div>
    </section>
    @endif
    </section>
@stop

@section('js')
<script>
//计算总价
function zongjia(){
  var sum = 0;
  $('.xiaoji').each(function(){

    function accAdd(arg1,arg2){  
      var r1,r2,m;  
      try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
      try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
      m=Math.pow(10,Math.max(r1,r2))  
      return (arg1*m+arg2*m)/m  
    }

     var price = parseFloat($(this).text());
     
     sum = accAdd(sum,price); 
  })
    $('.sum').text(sum);
    $('.sum').val(sum);
}
zongjia();

//购买数量加
  $('.plus').click(function(){
    var num = $(this).prev().val();
    var stock = $(this).prev().attr('stock');
    num++;
    if(num > stock){
      $(this).prev().val(stock);
      num--;
    }else{
      $(this).prev().val(num);
    }

    //获取单价
    var price = $(this).parents('.cart-item').find('.price').text();

    //小计
    $(this).parents('.cart-item').find('.xiaoji').text(accMul(price,num));

    function accMul(arg1, arg2) {

            var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

            try { m += s1.split(".")[1].length } catch (e) { }

            try { m += s2.split(".")[1].length } catch (e) { }

            return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
      }
    zongjia();
  })
  //购买数量减
  $('.min').click(function(){
    var num = $(this).next().val();
    num--;
    if(num < 1){
      $(this).next().val(1);
      num++;
    }else{
      $(this).next().val(num);
    }
    //获取单价
    var price = $(this).parents('.cart-item').find('.price').text();

    //小计
    $(this).parents('.cart-item').find('.xiaoji').text(accMul(price,num));

    function accMul(arg1, arg2) {

            var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

            try { m += s1.split(".")[1].length } catch (e) { }

            try { m += s2.split(".")[1].length } catch (e) { }

            return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
      }
    zongjia();
  })

  //删除商品
  $('.cart-remove').click(function(){
     var id = $(this).attr('id');
     var that = $(this);
     $.get('/home/cart/delete',{id:id},function(res){
          if(res == 1){
            that.parents('.cart-item').remove();
            zongjia();
            
            var trs = $('.cart-body').children().length;

            if(trs == 0){
              $('.neirong').hide();
              $('.hero-heading').text('购物车为空');
              location.reload(true);
            }
          }
     })
  })
</script>
@stop