@extends('layout.home.index')
@section('title',$title)
@section('content')
<section class="home-full-slider-wrapper mb-10px">
  <!-- Hero Slider-->
  <div class="owl-carousel owl-theme owl-dots-modern home-full-slider">
    <div style="background: #f8d5cf;" class="item home-full-item"><img src="/homes/picture/matheus-ferrero-334418-unsplash.jpg" alt="" class="bg-image">
      <div class="container-fluid h-100 py-5">
        <div class="row align-items-center h-100">
          <div class="col-lg-8 col-xl-6 mx-auto text-white text-center">
            <h5 class="text-uppercase text-white font-weight-light mb-4 letter-spacing-5"> Just arrived</h5>
            <h1 class="mb-5 display-2 font-weight-bold text-serif">Denim Jackets</h1>
            <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

          </div>
        </div>
      </div>
    </div>
    <div class="item home-full-item bg-dark dark-overlay"><img src="/homes/picture/ian-dooley-347942-unsplash.jpg" alt="" class="bg-image">
      <div class="container-fluid h-100">
        <div class="row align-items-center h-100">
          <div class="col-lg-8 col-xl-6 mx-auto text-white text-center overlay-content">
            <h1 class="mb-4 display-2 text-uppercase font-weight-bold">Skeleton Tees</h1>
            <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

          </div>
        </div>
      </div>
    </div>
    <div class="item home-full-item"><img src="/homes/picture/haley-phelps-62815-unsplash.jpg" alt="" class="bg-image">
      <div class="container-fluid h-100">
        <div class="row align-items-center h-100">
          <div class="col-lg-8 col-xl-6 mx-auto text-white text-center">
            <h5 class="text-uppercase font-weight-light mb-4 letter-spacing-5"> Our bestseller</h5>
            <h1 class="mb-5 display-1 font-weight-bold text-serif">Skinny Jeans</h1>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container-fluid px-5px">
    <div class="row mx-0">
      <div class="col-md-6 mb-10px px-5px">
        <div class="card border-0 text-white text-center"><img src="/homes/picture/christopher-campbell-28571-unsplash.jpg" alt="Card image" class="card-img">
          <div class="card-img-overlay d-flex align-items-center"> 
            <div class="w-100 py-3">
              <h2 class="display-3 font-weight-bold mb-4">Top picks</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-10px px-5px">
        <div class="card border-0 text-white text-center"><img src="/homes/picture/marco-xu-496929-unsplash.jpg" alt="Card image" class="card-img">
          <div class="card-img-overlay d-flex align-items-center"> 
            <div class="w-100 py-3">
              <h2 class="display-3 font-weight-bold mb-4">New arrivals</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mx-0">
      <div class="col-lg-4 mb-10px px-5px">
        <div class="card border-0 text-center text-white"><img src="/homes/picture/benjamin-voros-260869-unsplash.jpg" alt="Card image" class="card-img">
          <div class="card-img-overlay d-flex align-items-center"> 
            <div class="w-100">
              <h2 class="display-4 mb-4">Jackets</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-10px px-5px">
        <div class="card border-0 text-center text-white"><img src="/homes/picture/malvestida-magazine-458585-unsplash.jpg" alt="Card image" class="card-img">
          <div class="card-img-overlay d-flex align-items-center"> 
            <div class="w-100">
              <h2 class="display-4 mb-4">Lookbook</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-10px px-5px">
        <div class="card border-0 text-center text-dark"><img src="/homes/picture/michael-frattaroli-221247-unsplash.jpg" alt="Card image" class="card-img">
          <div class="card-img-overlay d-flex align-items-center"> 
            <div class="w-100">
              <h2 class="display-4 mb-4">Try this</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop