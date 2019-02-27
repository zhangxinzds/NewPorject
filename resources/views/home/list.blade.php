@extends('layout.home.index')

@section('title',$title)

@section('content')
    <!-- Hero Section-->
    <section class="hero">
      <div class="container">
        
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h2 class="hero-heading">{{$type}}</h2>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">欢迎来到鑫鑫的购物网站</p></div>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row">
        <!-- Grid -->
        <div class="products-grid col-xl-9 col-lg-8 order-lg-2">
            <!-- product-->
          <div class="row">
            @foreach($goods as $k => $v)
            <div class="col-xl-4 col-sm-6">
              <div class="product">
                <div class="product-image">
                  <img src="{{$v['imgs'][0]['pic']}}" alt="product" style="width:255px;height:382px" class="img-fluid"/>
                  <div class="product-hover-overlay"><a class="product-hover-overlay-link"></a>
                    <div class="product-hover-overlay-buttons"><a class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a><a href="/home/details/{{$v['id']}}" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">View</span></a><a id="{{$v['id']}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-dark btn-product-right kuaisu"><i class="fa fa-expand-arrows-alt"></i></a>
                    </div>
                  </div>
                </div>
                <div class="py-2">
                  <p class="text-muted text-sm mb-1">{{$v['company']}}</p>
                  <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">{{$v['name']}}</a></h3><span class="text-muted">${{$v['price']}}</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
            <!-- /product-->


          <nav aria-label="page navigation" class="d-flex justify-content-center mb-5 mt-3">       
            {{$goods->links('common.pagination')}}
          </nav>
        </div>
        <!-- / Grid End-->
        <!-- Sidebar-->
        <div class="sidebar col-xl-3 col-lg-4 order-lg-1">
          <div class="sidebar-block px-3 px-lg-0 mr-lg-4">
          <a data-toggle="collapse" href="#categoriesMenu" aria-expanded="false" aria-controls="categoriesMenu" class="d-lg-none block-toggler">Product Categories</a>
            <div id="categoriesMenu" class="expand-lg collapse">
              <div class="nav nav-pills flex-column mt-4 mt-lg-0">
              <a href="#" class="nav-link d-flex justify-content-between mb-2 "><span>{{$ptype['name']}}</span></a>
                <div class="nav nav-pills flex-column ml-3">
                @foreach($types as $k => $v)
	                <a href="/home/list/{{$v['id']}}"  @if($v['name'] == $type) class="nav-link mb-2 active"@else class="nav-link mb-2" @endif>{{$v['name']}}</a>
	            @endforeach
              	</div>
            </div>
          </div>

          <div class="sidebar-block px-3 px-lg-0 mr-lg-4"><a data-toggle="collapse" href="#priceFilterMenu" aria-expanded="false" aria-controls="priceFilterMenu" class="d-lg-none block-toggler">Filter by price</a>
            <div id="priceFilterMenu" class="expand-lg collapse">
              <h6 class="sidebar-heading d-none d-lg-block">价格范围</h6>
              <div id="slider-snap" class="mt-4 mt-lg-0"> </div>
              <div class="nouislider-values">
                <div class="min">$<span id="slider-snap-value-lower"></span></div>
                <div class="max">$<span id="slider-snap-value-upper"></span></div>
              </div>
            </div>
          </div>
          <div class="sidebar-block px-3 px-lg-0 mr-lg-4"><a data-toggle="collapse" href="#brandFilterMenu" aria-expanded="true" aria-controls="brandFilterMenu" class="d-lg-none block-toggler">Filter by brand</a>
            <!-- Brand filter menu - this menu has .show class, so is expanded by default-->
            <div id="brandFilterMenu" class="expand-lg collapse show">
              <h6 class="sidebar-heading d-none d-lg-block">品牌</h6>
              <form action="/home/list/{{$id}}" method="get" class="mt-4 mt-lg-0"> 
              @php
                $brand = isset($_GET['brand'])?$_GET['brand']:$company;
              @endphp
              @foreach($company as $k => $v)
                <div class="form-group mb-1">
                  <div class="custom-control custom-checkbox">
                    <input id="brand{{$k}}" type="checkbox" name="brand[]" value="{{$v}}" @if($brand != $company)  @if(in_array($v,$brand)) checked @endif @endif class="custom-control-input">
                    <label for="brand{{$k}}" class="custom-control-label">{{$v}}</label>
                  </div>
                </div>
              @endforeach
          <button class="btn btn-outline-secondary">搜索</button>
          <input type="text" name="lower" class="lowerprice" value="" hidden>
          <input type="text" name="upper" class="upperprice" value="" hidden>
              </form>
            </div>   
          </div>
          </div>
        </div>
        <!-- /Sidebar end-->
      </div>
    </div>
@stop
@section('js')


<script>
      //获取url地址中的参数
      function Get(name) { 
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
        var r = window.location.search.substr(1).match(reg); //获取url中"?"符后的字符串并正则匹配
        var context = ""; 
        if (r != null) 
        context = r[2]; 
        reg = null; 
        r = null; 
        return context == null || context == "" || context == "undefined" ? "" : context; 
      }

      var snapSlider = document.getElementById('slider-snap');
      var lower = Get('lower')?Get('lower'):10;
      var upper = Get('upper')?Get('upper'):140;
      noUiSlider.create(snapSlider, {
      	start: [ lower, upper ],
      	snap: false,
      	connect: true,
          step: 1,
      	range: {
      		'min': 0,
      		'max': 250
      	}
      });
      var snapValues = [
      	document.getElementById('slider-snap-value-lower'),
      	document.getElementById('slider-snap-value-upper')
      ];
      snapSlider.noUiSlider.on('update', function( values, handle ) {
      	snapValues[handle].innerHTML = values[handle];
        $('.lowerprice').val(values[0]);
        $('.upperprice').val(values[1]);
      });
      
    </script>
@stop