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
.clearfix::after{ display:block; content:''; height:0; overflow:hidden; clear:both;} 
/*星星样式*/
.content{ width:600px; margin:0 auto; padding-top:20px;}
.title{ font-size:14px; background:#dfdfdf; padding:10px; margin-bottom:10px;}
.block{ width:100%; margin:0 0 20px 0; padding-top:10px; padding-left:50px; line-height:21px;}
.block .star_score{ float:left;}
.star_list{height:21px;margin:50px; line-height:21px;}
.block p,.block .attitude{ padding-left:20px; line-height:21px; display:inline-block;}
.block p span{ color:#C00; font-size:16px; font-family:Georgia, "Times New Roman", Times, serif;}
.star_score { background:url(/homes/images/stark2.png); width:160px; height:21px;  position:relative; }
.star_score a{ height:21px; display:block; text-indent:-999em; position:absolute;left:0;}
.star_score a:hover{ background:url(/homes/images/stars2.png);left:0;}
.star_score a.clibg{ background:url(/homes/images/stars2.png);left:0;}
#starttwo .star_score { background:url(/homes/images/starky.png);}
#starttwo .star_score a:hover{ background:url(/homes/images/starsy.png);left:0;}
#starttwo .star_score a.clibg{ background:url(/homes/images/starsy.png);left:0;}
/*星星样式*/
.show_number li{ width:240px; border:1px solid #ccc; padding:10px; margin-right:5px; margin-bottom:20px;}
.atar_Show{background:url(/homes/images/stark2.png); width:160px; height:21px;  position:relative; float:left; }
.atar_Show p{ background:url(/homes/images/stars2.png);left:0; height:21px; width:134px;}
.show_number li span{ display:inline-block; line-height:21px;}
.pagination{margin-left:300px}
</style>
<section class="product-details">
      <div class="container">

        <div class="row">
          <div class="col-lg-7 pt-4 order-2 order-lg-1">
            <div class="row">   
            <!-- 缩略图 -->
              <div class="col-2 pr-0">
                <div data-slider-id="1" class="owl-thumbs">
				  @foreach($colorimg as $k => $v)
                  <button class="owl-thumb-item detail-thumb-item mb-3"><img src="{{$v['pic']}}" class="img-fluid"></button>
				  @endforeach
                </div>
              </div>
            <!-- 缩略图end -->
            <!-- 大图 -->
	          <div class="col-10 detail-carousel aaa">
	              <div class="ribbon ribbon-info">Fresh</div>
	              <div class="ribbon ribbon-primary">Sale</div>
	              <div data-slider-id="1" class="owl-carousel detail-slider">
					@foreach($colorimg as $k => $v)
	                  <div class="item"><a data-gallery="product-gallery"><img src="{{$v['pic']}}" alt="Modern Jacket 1" class="img-fluid"></a></div>
					@endforeach
	              </div>
	          </div>
            <!-- 大图end -->
            </div>
          </div>

          <div class="col-lg-5 pl-lg-4 order-1 order-lg-2">
            <ul class="breadcrumb undefined">
              <li class="breadcrumb-item"><a href="/">主页</a></li>
              <li class="breadcrumb-item"><a href="/home/list/{{$goods['tid']}}">{{$typename}}</a></li>
              <li class="breadcrumb-item active">{{$goods['name']}}</li>
            </ul>
            <h1 class="mb-4">{{$goods['name']}}</h1>
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
              <ul class="list-inline mb-2 mb-sm-0">
                <li class="list-inline-item h4 font-weight-light mb-0">${{$goods['price']}}</li>
              </ul>
              <div class="d-flex align-items-center">
                <ul class="list-inline mr-2 mb-0">
                  <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                  <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                  <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                  <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                  <li class="list-inline-item mr-0"><i class="fa fa-star text-gray-300"></i></li>
                </ul>
              </div>
            </div>
            <p class="mb-4 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
			@if (count($errors) > 0)
			    <div class="alert alert-danger" id="errormessage">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			 @endif
       @if (session('success'))
        <div class="alert alert-success" id="errormessage">
            {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-success" id="errormessage">
            {{ session('error') }}
        </div>
      @endif
            <form action="/home/cart/addcart" method="post">
            {{csrf_field()}}
            	<input type="text" name="price" value="{{$goods['price']}}" hidden>
            	<input type="text" name="name"  value="{{$goods['name']}}" hidden>
              <div class="row">
				<!-- 颜色 -->
                <div class="col-12 detail-option mb-3">
                  <h6 class="detail-option-heading">颜色<span>(必填)</span></h6>
                  <ul class="list-inline mb-0 colours-wrapper">
                  @foreach($color as $k => $v)
                    <li class="list-inline-item">
                      <label for="colour_{{$v['color']}}" style="background-color:{{$v['color']}}" class="btn-colour"> </label>
                      <input type="radio" name="cid" value="{{$v['id']}}" required id="colour_{{$v['color']}}" class="input-invisible xzc">
                    </li>
                  @endforeach
                  </ul>
                </div>
                <!-- 颜色end -->

              	<!-- 尺寸 -->
                <div class="col-sm-6 col-lg-12 detail-option mb-3 chicun">
                 <h6 class="detail-option-heading">尺寸<span>(必填)</span></h6>
                 <label><h6 class="detail-option-heading"><span>请先选择颜色</span></h6></label>
                </div>
                <!-- 尺寸end -->

                <!-- 数量 -->
                <div class="col-12 detail-option mb-5">
                  <label class="detail-option-heading font-weight-bold">数量<span>(必填)</span></label>
                 <span class="btn btn-outline-secondary btn-md plus" style="position:relative;left:54px;top:41px">＋</span>
                  <input name="num" type="text" value="1" class="form-control detail-quantity num" style="margin-left:45px">
                 <span class="btn btn-outline-secondary btn-md min" style="position:relative;left:0px;top:-41px">－</span>
                  <h7 class="stock" style="margin-left:-43px"></h7>
                </div>
                <!-- 数量end -->

              </div>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <button type="submit" class="btn btn-dark btn-lg mb-1"> <i class="fa fa-shopping-cart mr-2"></i>添加至购物车</button>
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="mt-5">
      <div class="container">
        <ul role="tablist" class="nav nav-tabs flex-column flex-sm-row">
          <li class="nav-item"><a data-toggle="tab" href="#description" role="tab" class="nav-link detail-nav-link active">详情</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#additional-information" role="tab" class="nav-link detail-nav-link">附加信息</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#reviews" role="tab" class="nav-link detail-nav-link">评论</a></li>
        </ul>
        <div class="tab-content py-4">
          <div id="description" role="tabpanel" class="tab-pane active px-3">
            {!!($goods['content'])!!}
          </div>
          <div id="additional-information" role="tabpanel" class="tab-pane">
            <div class="row">
              <div class="col-lg-6">
                <table class="table text-sm">
                  <tbody>
                    <tr>
                      <th class="text-uppercase font-weight-normal border-0">产品名</th>
                      <td class="text-muted border-0">{{$goods['name']}}</td>
                    </tr>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">可用包装</th>
                      <td class="text-muted ">塑料密封包装</td>
                    </tr>
                  </tbody>
                </table>
              </div>              
              <div class="col-lg-6">
                <table class="table text-sm">
                  <tbody>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">厂家</th>
                      <td class="text-muted ">{{$goods['company']}}</td>
                    </tr>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">上架时间</th>
                      <td class="text-muted ">{{date('Y-m-d H:i:s',$goods['addtime'])}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="reviews" role="tabpanel" class="tab-pane">
            <div class="row mb-5">
              <div class="col-lg-10 col-xl-9">
              @if(count($comment) == 0)
                <p>暂无评论</p>
              @else
                @foreach($comment as $k => $v)
                @php
                  $user = DB::table('user')->where('id',$v['uid'])->first();
                @endphp
                  <div class="media review">
                    <div class="text-center mr-4 mr-xl-5"><img src="{{$user->header}}" alt="Han Solo" class="review-image">
                      <h5 class="mt-2 mb-1">{{$user->name}}</h5>
                      <span class="text-uppercase text-muted">{{date('Y-m-d H:i:s',$v['addtime'])}}</span>
                    </div>
                    <div class="media-body">
                    <!-- 评分星级 -->
                    <ul class="show_number clearfix">
                       <li>
                        <div class="atar_Show">
                          <p tip="{{$v['score']}}"></p>
                        </div>
                        <span></span>
                       </li>
                    </ul>
                    <!-- 评分星级end -->
                      <div class="mb-2"><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i>
                      </div>
                      <p class="text-muted">{{$v['comment']}}</p>
                    </div>
                  </div>
                @endforeach
              {{$comment->links('common.pagination')}}
              @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop

@section('js')

<script type="text/javascript" src="/homes/js/startScore.js"></script>
<script>
	//错误提示消息
	$('#errormessage').delay(2000).slideUp(1000);

	//购买数量加
	$('.plus').click(function(){
		var num = $('.num').val();
		var stock = $(this).parent().children('h7').attr('stock');
		num++;
		if(num >= stock){
			$('.num').val(stock);
		}else{
			$('.num').val(num);
		}
	})
	//购买数量减
	$('.min').click(function(){
		var num = $('.num').val();
		num--;
		if(num < 1){
			$('.num').val(1);
		}else{
			$('.num').val(num);
		}
	})
	//输入数量判断
	$(".num").bind("input propertychange",function(){
    	var stock = $(this).parent().children('h7').attr('stock');
    	var now = $(this).val();
    	var num = now - stock;
    	//正则验证
    	var reg = /^[0-9]*$/;
    	if(reg.test(now)){
	    	//数量超过库存
	    	if(num>=0){
	    		$('.num').val(stock);
	    	}
    	}else{
    		$('.num').val(1);
    	}
	})
	//数量失去焦点时不能为0
	$(".num").blur(function(){
       	var now = $(this).val();
	   	if(now==0){
	    	$('.num').val(1);
    	}
	})

	//大图的对象集合
	var imgs = $('.aaa').children().find('img');

	$('.xzc').click(function(){
		var cid = $(this).val();
		$.get('/home/detail/colorimgajax',{cid:cid},function(res){
			//删除之前的缩略图
			$('.owl-thumbs').empty();
			for(var i = 0;i<res.length;i++){
				//缩略图添加
				$('.owl-thumbs').append('<button class="owl-thumb-item detail-thumb-item mb-3"><img src="'+res[i].pic+'" class="img-fluid"></button>');
				//替换大图
				$(imgs[i]).attr('src',res[i].pic);
			}
		},'json');
			
	})

	//查询size表中的信息
	$('.xzc').click(function(){
		var cid = $(this).val();
		$('.stock').empty();
		$.get('/home/detail/sizeajax',{cid:cid},function(res){
			$('.chicun').children('label').remove();
			//size表中的信息
			sss = res;
			for(var i = 0;i<res.length;i++){
				$('.chicun').append('<label for="size_'+i+'" class="btn btn-sm btn-outline-secondary detail-option-btn-label">'+res[i].size+'<input type="radio" name="sid" value="'+res[i].id+'" id="size_'+i+'" num="'+i+'" class="input-invisible bbb" required></label>');
			}
		},'json');
	})

	//尺寸选中效果
	$(document).on('click','.bbb',function(){
		$(this).parent().parent().children('label').removeClass('active');
		$(this).parent().addClass('active');
		//显示对应尺寸的库存
		var num = $(this).attr('num');
		$('.stock').empty();
		//库存显示
		$('.stock').append('库存:'+sss[num].stock);
		//辅助
		$('.stock').attr('stock',sss[num].stock);
		$('.num').val(1);
	})


   $(".show_number li p").each(function(index, element) {
      var num=$(this).attr("tip");
      var www=num*2*16;
      $(this).css("width",www);
      $(this).parent(".atar_Show").siblings("span").text(num+"分");
   });


    </script>
@stop
