@extends('layout.home.index')

@section('title',$title)

@section('content')

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
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="category.html">Tops and Jackets</a></li>
              <li class="breadcrumb-item active">Modern Jacket    </li>
            </ul>
            <h1 class="mb-4">Modern Jacket</h1>
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

				<!-- 颜色 -->
                <div class="col-12 detail-option mb-3">
                  <h6 class="detail-option-heading">颜色<span>(必填)</span></h6>
                  <ul class="list-inline mb-0 colours-wrapper">
                  @foreach($color as $k => $v)
                    <li class="list-inline-item">
                      <label for="colour_{{$v['color']}}" style="background-color:{{$v['color']}}" class="btn-colour"> </label>
                      <input type="radio" name="colour" value="{{$v['id']}}" id="colour_{{$v['color']}}" required class="input-invisible  xzc">
                    </li>
                  @endforeach
                  </ul>
                </div>
                <!-- 颜色end -->

              	<!-- 尺寸 -->
                <div class="col-sm-6 col-lg-12 detail-option mb-3">
                  <h6 class="detail-option-heading">尺寸<span>(必填)</span></h6>
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
                <!-- 尺寸end -->

                <!-- 数量 -->
                <div class="col-12 detail-option mb-5">
                  <label class="detail-option-heading font-weight-bold">数量<span>(必填)</span></label>
                  <input name="items" type="number" value="1" class="form-control detail-quantity">
                </div>
                <!-- 数量end -->

              </div>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <button type="submit" class="btn btn-dark btn-lg mb-1"> <i class="fa fa-shopping-cart mr-2"></i>添加至购物车</button>
                </li>
                <li class="list-inline-item"><a href="#" class="btn btn-outline-secondary mb-1"> <i class="far fa-heart mr-2"></i>添加到愿望清单</a></li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="mt-5">
      <div class="container">
        <ul role="tablist" class="nav nav-tabs flex-column flex-sm-row">
          <li class="nav-item"><a data-toggle="tab" href="#description" role="tab" class="nav-link detail-nav-link active">Description</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#additional-information" role="tab" class="nav-link detail-nav-link">Additional Information</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#reviews" role="tab" class="nav-link detail-nav-link">Reviews</a></li>
        </ul>
        <div class="tab-content py-4">
          <div id="description" role="tabpanel" class="tab-pane active px-3">
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. LOLDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. LOLDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div id="additional-information" role="tabpanel" class="tab-pane">
            <div class="row">
              <div class="col-lg-6">
                <table class="table text-sm">
                  <tbody>
                    <tr>
                      <th class="text-uppercase font-weight-normal border-0">Product #</th>
                      <td class="text-muted border-0">Lorem ipsum dolor sit amet</td>
                    </tr>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">Available packaging</th>
                      <td class="text-muted ">LOLDuis aute irure dolor in reprehenderit</td>
                    </tr>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">Weight</th>
                      <td class="text-muted ">dolor sit amet</td>
                    </tr>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">Sunt in culpa qui</th>
                      <td class="text-muted ">Lorem ipsum dolor sit amet</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-lg-6">
                <table class="table text-sm">
                  <tbody>
                    <tr>
                      <th class="text-uppercase font-weight-normal border-0">Weight</th>
                      <td class="text-muted border-0">dolor sit amet                                </td>
                    </tr>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">Sunt in culpa qui</th>
                      <td class="text-muted ">Lorem ipsum dolor sit amet                                </td>
                    </tr>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">Product #</th>
                      <td class="text-muted ">Lorem ipsum dolor sit amet                                </td>
                    </tr>
                    <tr>
                      <th class="text-uppercase font-weight-normal ">Available packaging</th>
                      <td class="text-muted ">LOLDuis aute irure dolor in reprehenderit                                </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="reviews" role="tabpanel" class="tab-pane">
            <div class="row mb-5">
              <div class="col-lg-10 col-xl-9">
                <div class="media review">
                  <div class="text-center mr-4 mr-xl-5"><img src="static/picture/person-1.jpg" alt="Han Solo" class="review-image"><span class="text-uppercase text-muted">Dec 2018</span></div>
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Han Solo</h5>
                    <div class="mb-2"><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i>
                    </div>
                    <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections     </p>
                  </div>
                </div>
                <div class="media review">
                  <div class="text-center mr-4 mr-xl-5"><img src="static/picture/person-2.jpg" alt="Luke Skywalker" class="review-image"><span class="text-uppercase text-muted">Dec 2018</span></div>
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Luke Skywalker</h5>
                    <div class="mb-2"><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-gray-200"></i>
                    </div>
                    <p class="text-muted">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. &quot;What's happened to me?&quot; he thought. It wasn't a dream.     </p>
                  </div>
                </div>
                <div class="media review">
                  <div class="text-center mr-4 mr-xl-5"><img src="static/picture/person-3.jpg" alt="Princess Leia" class="review-image"><span class="text-uppercase text-muted">Dec 2018</span></div>
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Princess Leia</h5>
                    <div class="mb-2"><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-gray-200"></i><i class="fa fa-xs fa-star text-gray-200"></i>
                    </div>
                    <p class="text-muted">His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table.     </p>
                  </div>
                </div>
                <div class="media review">
                  <div class="text-center mr-4 mr-xl-5"><img src="static/picture/person-4.jpg" alt="Jabba Hut" class="review-image"><span class="text-uppercase text-muted">Dec 2018</span></div>
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Jabba Hut</h5>
                    <div class="mb-2"><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i><i class="fa fa-xs fa-star text-warning"></i>
                    </div>
                    <p class="text-muted">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.     </p>
                  </div>
                </div>
                <div class="py-5 px-3">
                  <h5 class="text-uppercase mb-4">Leave a review</h5>
                  <form id="contact-form" method="post" action="contact.php" class="form">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name" class="form-label">Your name *</label>
                          <input type="text" name="name" id="name" placeholder="Enter your name" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="rating" class="form-label">Your rating *</label>
                          <select name="rating" id="rating" class="custom-select focus-shadow-0">
                            <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733; (5/5)</option>
                            <option value="4">&#9733;&#9733;&#9733;&#9733;&#9734; (4/5)</option>
                            <option value="3">&#9733;&#9733;&#9733;&#9734;&#9734; (3/5)</option>
                            <option value="2">&#9733;&#9733;&#9734;&#9734;&#9734; (2/5)</option>
                            <option value="1">&#9733;&#9734;&#9734;&#9734;&#9734; (1/5)</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="form-label">Your email *</label>
                      <input type="email" name="email" id="email" placeholder="Enter your  email" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="review" class="form-label">Review text *</label>
                      <textarea rows="4" name="review" id="review" placeholder="Enter your review" required="required" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Post review</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="my-5">
      <div class="container">
        <header class="text-center">
          <h6 class="text-uppercase mb-5">You might also like</h6>
        </header>
        <div class="row">
          <!-- product-->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="product">
              <div class="product-image">
                <div class="ribbon ribbon-info">Fresh</div><img src="static/picture/serrah-galos-494312-unsplash.jpg" alt="product" class="img-fluid"/>
                <div class="product-hover-overlay"><a href="detail.html" class="product-hover-overlay-link"></a>
                  <div class="product-hover-overlay-buttons"><a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">View</span></a>
                  </div>
                </div>
              </div>
              <div class="py-2">
                <p class="text-muted text-sm mb-1">Jackets</p>
                <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">White Tee</a></h3><span class="text-muted">$40.00</span>
              </div>
            </div>
          </div>
          <!-- /product-->
          <!-- product-->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="product">
              <div class="product-image"><img src="static/picture/kyle-loftus-590881-unsplash.jpg" alt="product" class="img-fluid"/>
                <div class="product-hover-overlay"><a href="detail.html" class="product-hover-overlay-link"></a>
                  <div class="product-hover-overlay-buttons"><a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">View</span></a>
                  </div>
                </div>
              </div>
              <div class="py-2">
                <p class="text-muted text-sm mb-1">Denim</p>
                <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">Black blouse</a></h3><span class="text-muted">$40.00</span>
              </div>
            </div>
          </div>
          <!-- /product-->
          <!-- product-->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="product">
              <div class="product-image">
                <div class="ribbon ribbon-primary">Sale</div><img src="static/picture/kyle-loftus-596319-unsplash.jpg" alt="product" class="img-fluid"/>
                <div class="product-hover-overlay"><a href="detail.html" class="product-hover-overlay-link"></a>
                  <div class="product-hover-overlay-buttons"><a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">View</span></a>
                  </div>
                </div>
              </div>
              <div class="py-2">
                <p class="text-muted text-sm mb-1">Accessories</p>
                <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">College jacket</a></h3><span class="text-muted">$40.00</span>
              </div>
            </div>
          </div>
          <!-- /product-->
          <!-- product-->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="product">
              <div class="product-image"><img src="static/picture/ethan-haddox-484912-unsplash.jpg" alt="product" class="img-fluid"/>
                <div class="product-hover-overlay"><a href="detail.html" class="product-hover-overlay-link"></a>
                  <div class="product-hover-overlay-buttons"><a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">View</span></a>
                  </div>
                </div>
              </div>
              <div class="py-2">
                <p class="text-muted text-sm mb-1">Denim</p>
                <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">Carrot-fit jeans</a></h3><span class="text-muted">$40.00</span>
              </div>
            </div>
          </div>
          <!-- /product-->
          <!-- product-->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="product">
              <div class="product-image"><img src="static/picture/serrah-galos-494231-unsplash.jpg" alt="product" class="img-fluid"/>
                <div class="product-hover-overlay"><a href="detail.html" class="product-hover-overlay-link"></a>
                  <div class="product-hover-overlay-buttons"><a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">View</span></a>
                  </div>
                </div>
              </div>
              <div class="py-2">
                <p class="text-muted text-sm mb-1">Jackets</p>
                <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">Striped T-Shirt</a></h3><span class="text-muted">$40.00</span>
              </div>
            </div>
          </div>
          <!-- /product-->
          <!-- product-->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="product">
              <div class="product-image"><img src="static/picture/averie-woodard-319832-unsplash.jpg" alt="product" class="img-fluid"/>
                <div class="product-hover-overlay"><a href="detail.html" class="product-hover-overlay-link"></a>
                  <div class="product-hover-overlay-buttons"><a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">View</span></a>
                  </div>
                </div>
              </div>
              <div class="py-2">
                <p class="text-muted text-sm mb-1">Shirts</p>
                <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">Short top</a></h3><span class="text-muted">$40.00</span>
              </div>
            </div>
          </div>
          <!-- /product-->
        </div>
      </div>
    </section>
    <!-- Quickview Modal    -->
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
                  <div style="background: center center url('static/images/kyle-loftus-596319-detail-1.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                  <div style="background: center center url('static/images/kyle-loftus-596319-detail-2.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                  <div style="background: center center url('static/images/kyle-loftus-596319-detail-3.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                  <div style="background: center center url('static/images/kyle-loftus-594535-unsplash-detail-3.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
                  <div style="background: center center url('static/images/kyle-loftus-594535-unsplash-detail-4.jpg') no-repeat; background-size: cover;" class="detail-full-item-modal">  </div>
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
		$.get('/home/detail/sizeajax',{cid:cid},function(res){
			console.log(res);

		},'json');
	})
</script>

@stop