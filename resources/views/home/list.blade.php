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
          <header class="product-grid-header">
            <div class="mr-3 mb-3">
               
              Showing <strong>1-12 </strong>of <strong>158 </strong>products
            </div>
            <div class="mr-3 mb-3"><span class="mr-2">Show</span><a href="#" class="product-grid-header-show active">12    </a><a href="#" class="product-grid-header-show ">24    </a><a href="#" class="product-grid-header-show ">All    </a>
            </div>
            <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-1">Sort by</span>
              <select class="custom-select w-auto border-0">
                <option value="orderby_0">Default</option>
                <option value="orderby_1">Popularity</option>
                <option value="orderby_2">Rating</option>
                <option value="orderby_3">Newest first</option>
              </select>
            </div>
          </header>
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
              <h6 class="sidebar-heading d-none d-lg-block">Price  </h6>
              <div id="slider-snap" class="mt-4 mt-lg-0"> </div>
              <div class="nouislider-values">
                <div class="min">From $<span id="slider-snap-value-lower"></span></div>
                <div class="max">To $<span id="slider-snap-value-upper"></span></div>
              </div>
            </div>
          </div>
          <div class="sidebar-block px-3 px-lg-0 mr-lg-4"><a data-toggle="collapse" href="#brandFilterMenu" aria-expanded="true" aria-controls="brandFilterMenu" class="d-lg-none block-toggler">Filter by brand</a>
            <!-- Brand filter menu - this menu has .show class, so is expanded by default-->
            <div id="brandFilterMenu" class="expand-lg collapse show">
              <h6 class="sidebar-heading d-none d-lg-block">Brands </h6>
              <form action="#" class="mt-4 mt-lg-0"> 
                <div class="form-group mb-1">
                  <div class="custom-control custom-checkbox">
                    <input id="brand0" type="checkbox" name="clothes-brand" checked class="custom-control-input">
                    <label for="brand0" class="custom-control-label">Calvin Klein <small>(18)</small></label>
                  </div>
                </div>
                <div class="form-group mb-1">
                  <div class="custom-control custom-checkbox">
                    <input id="brand1" type="checkbox" name="clothes-brand" checked class="custom-control-input">
                    <label for="brand1" class="custom-control-label">Levi Strauss <small>(30)</small></label>
                  </div>
                </div>
                <div class="form-group mb-1">
                  <div class="custom-control custom-checkbox">
                    <input id="brand2" type="checkbox" name="clothes-brand" class="custom-control-input">
                    <label for="brand2" class="custom-control-label">Hugo Boss <small>(120)</small></label>
                  </div>
                </div>
                <div class="form-group mb-1">
                  <div class="custom-control custom-checkbox">
                    <input id="brand3" type="checkbox" name="clothes-brand" class="custom-control-input">
                    <label for="brand3" class="custom-control-label">Tomi Hilfiger <small>(70)</small></label>
                  </div>
                </div>
                <div class="form-group mb-1">
                  <div class="custom-control custom-checkbox">
                    <input id="brand4" type="checkbox" name="clothes-brand" class="custom-control-input">
                    <label for="brand4" class="custom-control-label">Tom Ford  <small>(110)</small></label>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="sidebar-block px-3 px-lg-0 mr-lg-4"> <a data-toggle="collapse" href="#sizeFilterMenu" aria-expanded="false" aria-controls="sizeFilterMenu" class="d-lg-none block-toggler">Filter by size</a>
            <!-- Size filter menu-->
            <div id="sizeFilterMenu" class="expand-lg collapse"> 
              <h6 class="sidebar-heading d-none d-lg-block">Size </h6>
              <form action="#" class="mt-4 mt-lg-0">  
                <div class="form-group mb-1">
                  <div class="custom-control custom-radio">
                    <input id="size0" type="radio" name="size" checked class="custom-control-input">
                    <label for="size0" class="custom-control-label">Small</label>
                  </div>
                </div>
                <div class="form-group mb-1">
                  <div class="custom-control custom-radio">
                    <input id="size1" type="radio" name="size" class="custom-control-input">
                    <label for="size1" class="custom-control-label">Medium</label>
                  </div>
                </div>
                <div class="form-group mb-1">
                  <div class="custom-control custom-radio">
                    <input id="size2" type="radio" name="size" class="custom-control-input">
                    <label for="size2" class="custom-control-label">Large</label>
                  </div>
                </div>
                <div class="form-group mb-1">
                  <div class="custom-control custom-radio">
                    <input id="size3" type="radio" name="size" class="custom-control-input">
                    <label for="size3" class="custom-control-label">X-Large</label>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="sidebar-block px-3 px-lg-0 mr-lg-4"><a data-toggle="collapse" href="#colourFilterMenu" aria-expanded="false" aria-controls="colourFilterMenu" class="d-lg-none block-toggler">Filter by colour</a>
            <!-- Size filter menu-->
            <div id="colourFilterMenu" class="expand-lg collapse">
              <h6 class="sidebar-heading d-none d-lg-block">Colour </h6>
              <div class="mt-4 mt-lg-0"> 
                <ul class="list-inline mb-0 colours-wrapper">
                  <li class="list-inline-item">
                    <label for="colour_sidebar_Blue" style="background-color: #668cb9" data-allow-multiple class="btn-colour"> </label>
                    <input type="checkbox" name="colour" value="value_sidebar_Blue" id="colour_sidebar_Blue" class="input-invisible">
                  </li>
                  <li class="list-inline-item">
                    <label for="colour_sidebar_White" style="background-color: #fff" data-allow-multiple class="btn-colour"> </label>
                    <input type="checkbox" name="colour" value="value_sidebar_White" id="colour_sidebar_White" class="input-invisible">
                  </li>
                  <li class="list-inline-item">
                    <label for="colour_sidebar_Violet" style="background-color: #8b6ea4" data-allow-multiple class="btn-colour"> </label>
                    <input type="checkbox" name="colour" value="value_sidebar_Violet" id="colour_sidebar_Violet" class="input-invisible">
                  </li>
                  <li class="list-inline-item">
                    <label for="colour_sidebar_Red" style="background-color: #dd6265" data-allow-multiple class="btn-colour"> </label>
                    <input type="checkbox" name="colour" value="value_sidebar_Red" id="colour_sidebar_Red" class="input-invisible">
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- /Sidebar end-->
      </div>
    </div>
    <!--快速浏览窗口-->
    <div id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade quickview">
      <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
          <button type="button" data-dismiss="modal" aria-label="Close" class="close modal-close">
            <svg class="svg-icon w-100 h-100 svg-icon-light align-middle">
              <use xlink:href="#close-1"> </use>
            </svg>
          </button>
          <div class="modal-body"> 
            <div class="ribbon ribbon-primary">Sale</div>
            <div class="row">
              <div class="col-lg-6">
                <div data-slider-id="1" class="owl-carousel owl-theme owl-dots-modern detail-full">
                  <div style="background: center center url('/homes/images/kyle-loftus-596319-detail-1.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                  <div style="background: center center url('/homes/images/kyle-loftus-596319-detail-2.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                  <div style="background: center center url('/homes/images/kyle-loftus-596319-detail-3.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                  <div style="background: center center url('/homes/images/kyle-loftus-594535-unsplash-detail-3.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                  <div style="background: center center url('/homes/images/kyle-loftus-594535-unsplash-detail-4.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center">
                <div>
                  <h2 class="mb-4 mt-4 mt-lg-1">Modern Jacket</h2>
                  <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
                    <ul class="list-inline mb-2 mb-sm-0">
                      <li class="list-inline-item h4 font-weight-light mb-0">$65.00</li>
                      <li class="list-inline-item text-muted font-weight-light"> 
                        <del>$90.00</del>
                      </li>
                    </ul>
                    <div class="d-flex align-items-center">
                      <ul class="list-inline mr-2 mb-0">
                        <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                        <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                        <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                        <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                        <li class="list-inline-item mr-0"><i class="fa fa-star text-gray-300"></i></li>
                      </ul><span class="text-muted text-uppercase text-sm">25 reviews</span>
                    </div>
                  </div>
                  <p class="mb-4 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                  <form action="#">
                    <div class="row">
                      <div class="col-sm-6 col-lg-12 detail-option mb-3">
                        <h6 class="detail-option-heading">Size <span>(required)</span></h6>
                        <label for="size_0" class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                           
                          Small
                          <input type="radio" name="size" value="value_0" id="size_0" required class="input-invisible">
                        </label>
                        <label for="size_1" class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                           
                          Medium
                          <input type="radio" name="size" value="value_1" id="size_1" required class="input-invisible">
                        </label>
                        <label for="size_2" class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                           
                          Large
                          <input type="radio" name="size" value="value_2" id="size_2" required class="input-invisible">
                        </label>
                      </div>
                      <div class="col-sm-6 col-lg-12 detail-option mb-3">
                        <h6 class="detail-option-heading">Type <span>(required)</span></h6>
                        <label for="material_0" class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                           
                          Hoodie
                          <input type="radio" name="material" value="value_0" id="material_0" required class="input-invisible">
                        </label>
                        <label for="material_1" class="btn btn-sm btn-outline-secondary detail-option-btn-label">
                           
                          College
                          <input type="radio" name="material" value="value_1" id="material_1" required class="input-invisible">
                        </label>
                      </div>
                      <div class="col-12 detail-option mb-3">
                        <h6 class="detail-option-heading">Colour <span>(required)</span></h6>
                        <ul class="list-inline mb-0 colours-wrapper">
                          <li class="list-inline-item">
                            <label for="colour_Blue" style="background-color: #668cb9" class="btn-colour"> </label>
                            <input type="radio" name="colour" value="value_Blue" id="colour_Blue" required class="input-invisible">
                          </li>
                          <li class="list-inline-item">
                            <label for="colour_White" style="background-color: #fff" class="btn-colour"> </label>
                            <input type="radio" name="colour" value="value_White" id="colour_White" required class="input-invisible">
                          </li>
                          <li class="list-inline-item">
                            <label for="colour_Violet" style="background-color: #8b6ea4" class="btn-colour"> </label>
                            <input type="radio" name="colour" value="value_Violet" id="colour_Violet" required class="input-invisible">
                          </li>
                          <li class="list-inline-item">
                            <label for="colour_Red" style="background-color: #dd6265" class="btn-colour"> </label>
                            <input type="radio" name="colour" value="value_Red" id="colour_Red" required class="input-invisible">
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 detail-option mb-5">
                        <label class="detail-option-heading font-weight-bold">Items <span>(required)</span></label>
                        <input name="items" type="number" value="1" class="form-control detail-quantity">
                      </div>
                    </div>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <button type="submit" class="btn btn-dark btn-lg mb-1"> <i class="fa fa-shopping-cart mr-2"></i>Add to Cart</button>
                      </li>
                      <li class="list-inline-item"><a href="#" class="btn btn-outline-secondary mb-1"> <i class="far fa-heart mr-2"></i>Add to wishlist</a></li>
                    </ul>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop
@section('js')


<script>

      var snapSlider = document.getElementById('slider-snap');
      
      noUiSlider.create(snapSlider, {
      	start: [ 40, 110 ],
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
      });
      
    </script>
@stop