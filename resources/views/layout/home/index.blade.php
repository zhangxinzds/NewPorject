<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Price Slider Stylesheets -->
    <link rel="stylesheet" href="/homes/css/nouislider.css">
    <!-- Google fonts - Playfair Display-->
    <link rel="stylesheet" href="/homes/css/0544c10aa29f4f3d962e7bb59481b3f9.css">
    <link rel="stylesheet" href="/homes/css/stylesheet.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="/homes/css/owl.carousel.css">
    <!-- Ekko Lightbox-->
    <link rel="stylesheet" href="/homes/css/ekko-lightbox.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/homes/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/homes/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/sell/1-2-2/img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="/homes/js/html5shiv.min.js"></script>
        <script src="/homes/js/respond.min.js"></script><![endif]-->
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/homes/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
    <link rel="stylesheet" href="/homes/css/regular.css" integrity="sha384-avJt9MoJH2rB4PKRsJRHZv7yiFZn8LrnXuzvmZoD3fh1aL6aM6s0BBcnCvBe6XSD" crossorigin="anonymous">
    <link rel="stylesheet" href="/homes/css/brands.css" integrity="sha384-7xAnn7Zm3QC1jFjVc1A6v/toepoG3JXboQYzbM0jrPzou9OFXm/fY6Z/XiIebl/k" crossorigin="anonymous">
    <link rel="stylesheet" href="/homes/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">
  </head>
  <body>
    <header class="header">
      <!-- Top Bar-->
      <div class="top-bar">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-sm-7 d-none d-sm-block">
              <ul class="list-inline mb-0">
                <li class="list-inline-item pr-3 mr-0">
                  <svg class="svg-icon mr-2">
                    <use xlink:href="#calls-1"> </use>
                  </svg>020-800-456-747
                </li>
                <li class="list-inline-item px-3 border-left d-none d-lg-inline-block">订单满$300免运费</li>
              </ul>
            </div>
            <div class="col-sm-5 d-flex justify-content-end">
              <!-- Language Dropdown-->
              <div class="dropdown border-right px-3"><a id="langsDropdown" href="https://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle topbar-link"><img src="/homes/picture/united-kingdom.svg" alt="english" class="topbar-flag">English</a>
                <div aria-labelledby="langsDropdown" class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item text-sm"><img src="/homes/picture/germany.svg" alt="german" class="topbar-flag">German</a><a href="#" class="dropdown-item text-sm"> <img src="/homes/picture/france.svg" alt="french" class="topbar-flag">French</a></div>
              </div>
              <!-- Currency Dropdown-->
              <div class="dropdown pl-3 ml-0"><a id="currencyDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle topbar-link">USD</a>
                <div aria-labelledby="currencyDropdown" class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item text-sm">EUR</a><a href="#" class="dropdown-item text-sm"> GBP</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Top Bar End-->
      <!-- Navbar-->
      <nav class="navbar navbar-expand-lg navbar-sticky navbar-airy navbar-light bg-white bg-fixed-white">
        <div class="container-fluid">  
          <!-- Navbar Header  --><a href="/" class="navbar-brand">
            <svg class="navbar-brand-svg" viewBox="0 0 65 16" width="85" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="navbar-brand-svg-text" d="M5.72266 18.1562C4.88281 18.1562 4.08529 18.0033 3.33008 17.6973C2.58138 17.3913 1.94661 16.9355 1.42578 16.3301C0.911458 15.7181 0.582682 14.9759 0.439453 14.1035L2.90039 13.4785C2.98503 14.2988 3.28776 14.9173 3.80859 15.334C4.33594 15.7507 4.98698 15.959 5.76172 15.959C6.23698 15.959 6.64714 15.8841 6.99219 15.7344C7.33724 15.5781 7.59766 15.3665 7.77344 15.0996C7.94922 14.8327 8.03711 14.5332 8.03711 14.2012C8.03711 13.804 7.91341 13.4655 7.66602 13.1855C7.42513 12.9056 7.1224 12.6745 6.75781 12.4922C6.39323 12.3099 5.89193 12.0918 5.25391 11.8379C4.42057 11.5059 3.74674 11.1999 3.23242 10.9199C2.7181 10.6335 2.27539 10.2363 1.9043 9.72852C1.53971 9.2207 1.35742 8.57943 1.35742 7.80469C1.35742 7.01693 1.54948 6.33659 1.93359 5.76367C2.32422 5.18424 2.84505 4.74479 3.49609 4.44531C4.15365 4.14583 4.8763 3.99609 5.66406 3.99609C6.54948 3.99609 7.35677 4.19792 8.08594 4.60156C8.8151 4.9987 9.40755 5.60417 9.86328 6.41797L7.80273 7.67773C7.56185 7.20898 7.24609 6.84766 6.85547 6.59375C6.46484 6.33333 6.03841 6.20312 5.57617 6.20312C5.25065 6.20312 4.95443 6.26497 4.6875 6.38867C4.42708 6.51237 4.21875 6.68815 4.0625 6.91602C3.91276 7.13737 3.83789 7.39128 3.83789 7.67773C3.83789 8.0293 3.95182 8.32878 4.17969 8.57617C4.40755 8.82357 4.69401 9.0319 5.03906 9.20117C5.39062 9.37044 5.86914 9.57227 6.47461 9.80664C7.33398 10.1387 8.0306 10.4512 8.56445 10.7441C9.09831 11.0371 9.55729 11.4473 9.94141 11.9746C10.3255 12.502 10.5176 13.1693 10.5176 13.9766C10.5176 14.8229 10.3027 15.5618 9.87305 16.1934C9.44987 16.8249 8.8737 17.3099 8.14453 17.6484C7.41536 17.987 6.60807 18.1562 5.72266 18.1562ZM16.8906 4.20117H26.0703V6.47656H19.3711V9.96289H25.6113V12.2383H19.3711V15.6562H26.0703V18H16.8906V4.20117ZM33.0586 4.20117H35.5391V15.6562H41.4375V18H33.0586V4.20117ZM47.4492 4.20117H49.9297V15.6562H55.8281V18H47.4492V4.20117Z" transform="translate(0 -3)" fill="#212529"/>
            <path class="text-primary" d="M62.0254 15.4219H64.418V18H62.0254V15.4219Z" transform="translate(0 -3)" fill="#9A6EE2"/>
            </svg></a>
          <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
          <!-- Navbar Collapse -->
          <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
              <!-- Megamenu-->

              @php
                use App\Http\Model\Admin\Type;
                use App\Http\Model\Admin\Cart;
                use App\Http\Model\Admin\ColorImg;
                use App\Http\Model\Admin\Color;
                use App\Http\Model\Admin\User;
                use App\Http\Model\Admin\Orders;
                $total = 0;
                $type = Type::where('pid',0)->get();
              @endphp

              @foreach($type as $k => $v)
              @if($v['pid'] == 0)
              <li class="nav-item dropdown position-static"><a href="#" data-toggle="dropdown" class="nav-link">{{$v['name']}}<i class="fa fa-angle-down"></i></a>
                <div class="dropdown-menu megamenu py-lg-0">
                  <div class="row">
                    <div class="col-lg-9">
                      @php
                      $pid = $v['id'];
                      $type2 = Type::where('pid',$pid)->get();        
                      @endphp
                      <div class="row p-3 pr-lg-0 pl-lg-5 pt-lg-5">
                        @foreach($type2 as $key => $val)
                        <div class="col-lg-2">
                          <!-- Megamenu list-->
                          <h6 class="text-uppercase">{{$val['name']}}</h6>
                          <ul class="megamenu-list list-unstyled">
                            @php
                              $pid = $val['id'];
                              $type3 = Type::where('pid',$pid)->get();
                            @endphp
                            @foreach($type3 as $ke => $va)
                            <li class="megamenu-list-item"><a href="/home/list/{{$va['id']}}" class="megamenu-list-link">{{$va['name']}}</a></li>
                            @endforeach
                          </ul>
                        </div>
                        @endforeach  
                      </div>

                      <div class="row megamenu-services d-none d-lg-flex">
                        <div class="col-xl-3 col-lg-6 d-flex">
                          <div class="megamenu-services-item">
                            <svg class="svg-icon megamenu-services-icon">
                              <use xlink:href="#delivery-time-1"></use>
                            </svg>
                            <div>
                              <h6 class="text-uppercase">Free shipping &amp; return</h6>
                              <p class="mb-0 text-muted text-sm">Free Shipping over $300</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 d-flex">
                          <div class="megamenu-services-item">
                            <svg class="svg-icon megamenu-services-icon">
                              <use xlink:href="#money-1"> </use>
                            </svg>
                            <div>
                              <h6 class="text-uppercase">Money back guarantee</h6>
                              <p class="mb-0 text-muted text-sm">30 Days Money Back</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 d-flex">
                          <div class="megamenu-services-item">
                            <svg class="svg-icon megamenu-services-icon">
                              <use xlink:href="#customer-support-1"> </use>
                            </svg>
                            <div>
                              <h6 class="text-uppercase">020-800-456-747</h6>
                              <p class="mb-0 text-muted text-sm">24/7 Available Support</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 d-flex">
                          <div class="megamenu-services-item">
                            <svg class="svg-icon megamenu-services-icon">
                              <use xlink:href="#secure-payment-1"> </use>
                            </svg>
                            <div>
                              <h6 class="text-uppercase">Secure Payment</h6>
                              <p class="mb-0 text-muted text-sm">Secure Payment</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 d-none d-lg-block"><img src="/homes/picture/megamenu.jpg" alt="" class="bg-image"></div>
                  </div>
                </div>
              </li>
              @endif
              @endforeach
              <!-- /Megamenu end-->
              <!-- Multi level dropdown end-->
              <li class="nav-item"><a href="contact.html" class="nav-link">联系我们</a>
              </li>
             
            </ul>
            <div class="d-flex align-items-center justify-content-between justify-content-lg-end mt-1 mb-2 my-lg-0">
              <!-- Search Button-->
              <div data-toggle="search" class="nav-item navbar-icon-link">
                <svg class="svg-icon">
                  <use xlink:href="#search-1"> </use>
                </svg>
              </div>
              <!-- User Not Logged - link to login page-->
              @if(session('id'))
              <div class="nav-item dropdown">
                <a id="userdetails" href="https://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle navbar-icon-link">
                  <svg class="svg-icon">
                    <use xlink:href="#male-user-1"> </use>
                  </svg>
                </a>
              <div aria-labelledby="userdetails" class="dropdown-menu dropdown-menu-right"> 
                <a href="/home/orders" class="dropdown-item">订单</a>
                <a href="/home/address" class="dropdown-item">个人资料</a>
                <a href="/home/pass" class="dropdown-item">密码</a>
                <a href="/home/header" class="dropdown-item">头像</a>
                <div class="dropdown-divider my-0"></div>
                <a href="/home/logout" class="dropdown-item">注销</a>
                </div>
              </div>
              @else
              <div class="nav-item">
                <a href="{{route('login')}}" class="navbar-icon-link">
                    <svg class="svg-icon"><use xlink:href="#male-user-1"></use></svg>
                    <span class="text-sm ml-2 ml-lg-0 text-uppercase text-sm font-weight-bold d-none d-sm-inline d-lg-none">Login</span>
                </a>
              </div>
              @endif
              <!-- Cart Dropdown-->
              <div class="nav-item dropdown"><a href="cart.html" class="navbar-icon-link d-lg-none"> 
                  <svg class="svg-icon">
                    <use xlink:href="#cart-1"> </use>
                  </svg><span class="text-sm ml-2 ml-lg-0 text-uppercase text-sm font-weight-bold d-none d-sm-inline d-lg-none">View cart</span></a>
                <div class="d-none d-lg-block"><a id="cartdetails" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="cart.html" class="navbar-icon-link dropdown-toggle">
                    <svg class="svg-icon">
                      <use xlink:href="#cart-1"> </use>
                    </svg>
                    <!-- 登录 -->
                    @if(session('id'))
                    @php
                        $cart = DB::table('cart')->where('uid',session('id'))->count();
                        $carts = Cart::where('uid',session('id'))->get(); 
                    @endphp
                    <div class="navbar-icon-link-badge">{{$cart}}</div></a>
                    @else
                    <!-- 未登录 -->
                    <div class="navbar-icon-link-badge">{{count(session('cart'))}}</div></a>
                    @endif
                  <div aria-labelledby="cartdetails" class="dropdown-menu dropdown-menu-right p-4">
                    <div class="navbar-cart-product-wrapper">
                      <!-- cart item-->
                      <!-- 登录 -->
                      @if(session('id'))
                              @if($carts)
                                @foreach($carts as $k => $v)
                                @php  
                                  $img = ColorImg::where('cid',$v['cid'])->first();
                                  $color = Color::where('id',$v['cid'])->first();
                                  $gid = $color['gid'];
                                @endphp
                                <div class="navbar-cart-product"> 
                                  <div class="d-flex align-items-center"><a href="/home/details/{{$gid}}"><img src="{{$img['pic']}}" class="img-fluid navbar-cart-product-image"></a>
                                    <div class="w-100"><a href="#" class="close text-sm mr-2"><i class="fa fa-times"></i></a>
                                      <div class="pl-3"> <a href="/home/details/{{$gid}}" class="navbar-cart-product-link">{{$v['name']}}</a><small class="d-block text-muted">数量:{{$v['num']}}</small><strong class="d-block text-sm">${{$v['price']}}</strong></div>
                                    </div>
                                  </div>
                                </div>
                                @php
                                    $total += $v['num']*$v['price'];
                                @endphp
                                @endforeach
                                <div class="navbar-cart-total"><span class="text-uppercase text-muted">总价</span><strong class="text-uppercase">${{$total}}</strong></div>
                            @else
                                <div class="navbar-cart-total"><strong class="text-uppercase">暂无商品</strong></div>
                            @endif
                      @else
                        <!-- 未登录 -->
                        @if(session('cart'))
                          @foreach(session('cart') as $k => $v)
                          @php  
                            $img = ColorImg::where('cid',$v['cid'])->first();
                            $color = Color::where('id',$v['cid'])->first();
                            $gid = $color['gid'];
                          @endphp
                          <div class="navbar-cart-product"> 
                            <div class="d-flex align-items-center"><a href="/home/details/{{$gid}}"><img src="{{$img['pic']}}" class="img-fluid navbar-cart-product-image"></a>
                              <div class="w-100"><a href="#" class="close text-sm mr-2"><i class="fa fa-times"></i></a>
                                <div class="pl-3"> <a href="/home/details/{{$gid}}" class="navbar-cart-product-link">{{$v['name']}}</a><small class="d-block text-muted">数量:{{$v['num']}}</small><strong class="d-block text-sm">${{$v['price']}}</strong></div>
                              </div>
                            </div>
                          </div>
                          @php
                              $total += $v['num']*$v['price'];
                          @endphp
                          @endforeach
                          <div class="navbar-cart-total"><span class="text-uppercase text-muted">总价</span><strong class="text-uppercase">${{$total}}</strong></div>
                        @else
                          <div class="navbar-cart-total"><strong class="text-uppercase">暂无商品</strong></div>
                        @endif

                      @endif
                    <!-- total price-->
                    <!-- buttons-->
                    <div class="d-flex justify-content-between"><a href="{{route('cart')}}" class="btn btn-outline-dark">查看购物车</a></div>
                    @if(session('id'))
                      @php
                        $user = User::where('id',session('id'))->first();
                        $name = $user['name'];
                        $order = Orders::where('uname',$name)->where('status',0)->get();
                      @endphp
                      @if(count($order))
                         <div class="d-flex justify-content-between"><a href="/home/orders" class="btn btn-outline-dark">有未支付订单!前往查看</a></div>         
                      @endif
                    @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- /Navbar -->
      
      <!-- Fullscreen search area-->
      <div class="search-area-wrapper">
        <div class="search-area d-flex align-items-center justify-content-center">
          <div class="close-btn">
            <svg class="svg-icon svg-icon-light w-3rem h-3rem">
              <use xlink:href="#close-1"> </use>
            </svg>
          </div>
          <form action="#" class="search-area-form">
            <div class="form-group position-relative">
              <input type="search" name="search" id="search" placeholder="What are you looking for?" class="search-area-input">
              <button type="submit" class="search-area-button">
                <svg class="svg-icon">
                  <use xlink:href="#search-1"> </use>
                </svg>
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- /Fullscreen search area-->
    </header>
    <!-- Hero Section-->
    @section('content')
 
    @show
    <!-- Footer-->
    <footer class="main-footer">
      <!-- Services block-->
      <div class="bg-gray-100 text-dark-700 py-6">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 service-column">
              <svg class="svg-icon service-icon">
                <use xlink:href="#delivery-time-1"> </use>
              </svg>
              <div class="service-text">
                <h6 class="text-uppercase">Free shipping &amp; return</h6>
                <p class="text-muted font-weight-light text-sm mb-0">Free Shipping over $300</p>
              </div>
            </div>
            <div class="col-lg-4 service-column">
              <svg class="svg-icon service-icon">
                <use xlink:href="#money-1"> </use>
              </svg>
              <div class="service-text">
                <h6 class="text-uppercase">Money back guarantee</h6>
                <p class="text-muted font-weight-light text-sm mb-0">30 Days Money Back Guarantee</p>
              </div>
            </div>
            <div class="col-lg-4 service-column">
              <svg class="svg-icon service-icon">
                <use xlink:href="#customer-support-1"> </use>
              </svg>
              <div class="service-text">
                <h6 class="text-uppercase">020-800-456-747</h6>
                <p class="text-muted font-weight-light text-sm mb-0">24/7 Available Support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Main block - menus, subscribe form-->
      <div class="py-6 bg-gray-300 text-muted"> 
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
              <div class="font-weight-bold text-uppercase text-lg text-dark mb-3">Sell<span class="text-primary">.</span></div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#" target="_blank" title="twitter" class="text-muted text-hover-primary"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="facebook" class="text-muted text-hover-primary"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="instagram" class="text-muted text-hover-primary"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="pinterest" class="text-muted text-hover-primary"><i class="fab fa-pinterest"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="vimeo" class="text-muted text-hover-primary"><i class="fab fa-vimeo"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">
              <h6 class="text-uppercase text-dark mb-3">Shop</h6>
              <ul class="list-unstyled">
                <li> <a href="#" class="text-muted">For Women</a></li>
                <li> <a href="#" class="text-muted">For Men</a></li>
                <li> <a href="#" class="text-muted">Stores</a></li>
                <li> <a href="#" class="text-muted">Our Blog</a></li>
                <li> <a href="#" class="text-muted">Shop</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">
              <h6 class="text-uppercase text-dark mb-3">Company</h6>
              <ul class="list-unstyled">
                <li> <a href="#" class="text-muted">Login</a></li>
                <li> <a href="#" class="text-muted">Register</a></li>
                <li> <a href="#" class="text-muted">Wishlist</a></li>
                <li> <a href="#" class="text-muted">Our Products</a></li>
                <li> <a href="#" class="text-muted">Checkouts</a></li>
              </ul>
            </div>
            <div class="col-lg-4">
              <h6 class="text-uppercase text-dark mb-3">Daily Offers & Discounts</h6>
              <p class="mb-3"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
              <form action="#" id="newsletter-form">
                <div class="input-group mb-3">
                  <input type="email" placeholder="Your Email Address" aria-label="Your Email Address" class="form-control bg-transparent border-secondary border-right-0">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary border-left-0"> <i class="fa fa-paper-plane text-lg text-dark"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright section of the footer-->
      <div class="py-4 font-weight-light bg-gray-800 text-gray-300">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left">
              <p class="mb-md-0">&copy; 2018 Your company.  All rights reserved.</p>
            </div>
            <div class="col-md-6">
              <ul class="list-inline mb-0 mt-2 mt-md-0 text-center text-md-right">
                <li class="list-inline-item"><img src="/homes/picture/visa.svg" alt="..." class="w-2rem"></li>
                <li class="list-inline-item"><img src="/homes/picture/mastercard.svg" alt="..." class="w-2rem"></li>
                <li class="list-inline-item"><img src="/homes/picture/paypal.svg" alt="..." class="w-2rem"></li>
                <li class="list-inline-item"><img src="/homes/picture/western-union.svg" alt="..." class="w-2rem"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- /Footer end-->
    
    <!-- JavaScript files-->
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to Bootstrapious website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://demo.bootstrapious.com/sell/1-2-0/icons/orion-svg-sprite.svg'); 
      
    </script>
    <!-- jQuery-->
    <script src="/homes/js/jquery.min.js"></script>
    <!-- PopperJS (Bootstrap's dependency)-->
    <script src="/homes/js/popper.min.js"> </script>
    <!-- Bootstrap JavaScript-->
    <script src="/homes/js/bootstrap.min.js"></script>
    <!-- Owl Carousel-->
    <script src="/homes/js/owl.carousel.js"></script>
    <script src="/homes/js/owl.carousel2.thumbs.min.js"></script>
    <!-- NoUI Slider (price slider)-->
    <script src="/homes/js/nouislider.min.js"></script>
    <!-- Smooth scrolling-->
    <script src="/homes/js/smooth-scroll.polyfills.min.js"></script>
    <!-- Lightbox -->
    <script src="/homes/js/ekko-lightbox.min.js"></script>
    <!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
    <script src="/homes/js/ofi.min.js"></script>
    <script src="/homes/js/jquery.cookie.js"> </script>
    <script src="/homes/js/demo.js"></script>
    <script>
      var basePath = ''
      
    </script>
    <script src="/homes/js/theme.js"></script>
    @section('js')

    @show
  </body>
</html>