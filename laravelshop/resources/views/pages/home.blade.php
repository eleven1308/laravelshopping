@extends('layouts.master')
@section('content')
<!-- START SLIDER AREA -->
<div class="slider-area  plr-185  mb-80">
            <div class="container-fluid">
                <div class="slider-content">
                    <div class="row">
                        <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                            <!-- layer-1 Start -->
                        @foreach($slide as $value)
                            <div class="col-md-12">
                                <div class="layer-1">
                                    <div class="slider-img">
                                        <img src="{{ URL::to('/') }}/images/slide/{{$value->images}}" alt="">
                                    </div>
                                    <div class="slider-info gray-bg">
                                        <div class="slider-info-inner">
                                            <h1 class="slider-title-1 text-uppercase text-black-1">{{ $value->name}}</h1>
                                            <div class="slider-brief text-black-2">
                                                <p>{{ $value->description }}</p>
                                            </div>
                                            <a href="#" class="button extra-small button-black">
                                                <span class="text-uppercase">Mua ngay</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <!-- layer-1 end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- END SLIDER AREA -->
<section id="page-content" class="page-wrapper">
   <!-- BANNER-SECTION START -->
   {{-- <div class="banner-section ptb-60">
      <div class="container">
         
         <div class="row">
            <!-- banner-item start -->
            <div class="col-md-4 col-sm-6 col-xs-12">
               <div class="banner-item banner-2">
                  <div class="banner-img">
                     <a href="#"><img src="img/banner/2.jpg" alt=""></a>
                  </div>
                  <h3 class="banner-title-2"><a href="#">sony smartphone</a></h3>
                  <h3 class="pro-price">$ 869.00</h3>
                  <div class="banner-button">
                     <a href="#">Shop now <i class="zmdi zmdi-long-arrow-right"></i></a> 
                  </div>
               </div>
            </div>
            <!-- banner-item end -->
            <!-- banner-item start -->
            <div class="col-md-4 col-sm-6 col-xs-12">
               <div class="banner-item banner-3">
                  <div class="banner-img">
                     <a href="#"><img src="img/banner/3.jpg" alt=""></a>
                  </div>
                  <div class="banner-info">
                     <h3 class="banner-title-2"><a href="#">Product Name</a></h3>
                     <ul class="banner-featured-list">
                        <li>
                           <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                        </li>
                        <li>
                           <i class="zmdi zmdi-check"></i><span>amet, consectetur</span>
                        </li>
                        <li>
                           <i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span>
                        </li>
                        <li>
                           <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                        </li>
                        <li>
                           <i class="zmdi zmdi-check"></i><span>labore et dolore.</span>
                        </li>
                     </ul>
                     <div class="banner-button">
                        <a href="#">Discover <i class="zmdi zmdi-long-arrow-right"></i></a> 
                     </div>
                  </div>
               </div>
            </div>
            <!-- banner-item end -->
            <!-- banner-item start -->
            <div class="col-md-4 hidden-sm col-xs-12">
               <div class="banner-item banner-4">
                  <div class="banner-img">
                     <a href="#"><img src="img/banner/4.jpg" alt=""></a>
                  </div>
                  <h3 class="banner-title-2"><a href="#">phone name</a></h3>
                  <div class="banner-button">
                     <a href="#">Shop now <i class="zmdi zmdi-long-arrow-right"></i></a> 
                  </div>
               </div>
            </div>
            <!-- banner-item end -->
         </div>
        
      </div>
   </div> --}}
   <!-- BANNER-SECTION END --> 
   <!-- FEATURED PRODUCT SECTION START -->
   <div class="featured-product-section section-bg-tb pt-80 pb-55">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-title text-left mb-20">
                  <h2 class="uppercase">Đang được yêu thích</h2>
                  <h6>các sản phẩm hiện có</h6>
               </div>
            </div>
         </div>
         <div class="featured-product">
            <div class="row active-featured-product slick-arrow-2">
               <!-- product-item start -->
               @foreach ($product_love as $value)
               <div class="col-xs-12">
                  <div class="product-item product-item-2">
                     <div class="product-img">
                        <a href="single-product.html">
                        <img src="{{ URL::to('/') }}/images/product/{{$value->image}}" alt=""/>
                        </a>
                     </div>
                     <div class="product-info">
                        <h6 class="product-title">
                           <a href="{{ route('single-product',  [$value->slug, $value->id]) }}">{{ $value->name }}</a>
                        </h6>
                        <h6 class="brand-name">{!! str_limit($value->title, $limit = 30, $end = '...')  !!}</h6>
                        <h3 class="pro-price">{{ number_format($value->util_price) }} VNĐ</h3>
                     </div>
                     <ul class="action-button">
                        <li>
                            <button class="cart-love"  data-id = "{{ $value->id }}" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></button>
                        </li>
                        <li>
                           <a href="#" data-toggle="modal"  data-target="#productModal" title="Xem nhanh"><i class="zmdi zmdi-zoom-in"></i></a>
                        </li>
                        <li>
                           <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                        </li>
                        <li>
                           <button class="addCart" data-id = "{{ $value->id }}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></button>
                        </li>
                     </ul>
                  </div>
               </div>
               @endforeach
               <!-- product-item end -->
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-title text-left mb-20">
                  <h2 class="uppercase">Hàng mới về</h2>
                  <h6>các sản phẩm hiện có</h6>
               </div>
            </div>
         </div>
         <div class="featured-product">
            <div class="row active-featured-product slick-arrow-2">
               <!-- product-item start -->
               @foreach ($product as $value)
               <div class="col-xs-12">
                  <div class="product-item product-item-2">
                     <div class="product-img">
                        <a href="single-product.html">
                        <img src="{{ URL::to('/') }}/images/product/{{$value->image}}" alt=""/>
                        </a>
                     </div>
                     <div class="product-info">
                        <h6 class="product-title">
                           <a href="{{ route('single-product',  [$value->slug, $value->id]) }}">{{ $value->name }}</a>
                        </h6>
                        <h6 class="brand-name">{!! str_limit($value->title, $limit = 30, $end = '...')  !!}</h6>
                        <h3 class="pro-price">{{ number_format($value->util_price) }} VNĐ</h3>
                     </div>
                    <ul class="action-button">
                        <li>
                            <button class="cart-love"  data-id = "{{ $value->id }}" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></button>
                        </li>
                        <li>
                           <a href="#" data-toggle="modal"  data-target="#productModal" title="Xem nhanh"><i class="zmdi zmdi-zoom-in"></i></a>
                        </li>
                        <li>
                           <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                        </li>
                        <li>
                           <button class="addCart" data-id = "{{ $value->id }}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></button>
                        </li>
                     </ul>
                  </div>
               </div>
               @endforeach
               <!-- product-item end -->
            </div>
         </div>
      </div>
       <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-title text-left mb-20">
                  <h2 class="uppercase">Được mua nhiều nhất</h2>
                  <h6>các sản phẩm hiện có</h6>
               </div>
            </div>
         </div>
         <div class="featured-product">
            <div class="row active-featured-product slick-arrow-2">
               <!-- product-item start -->
               @foreach ($product as $value)
               <div class="col-xs-12">
                  <div class="product-item product-item-2">
                     <div class="product-img">
                        <a href="single-product.html">
                        <img src="{{ URL::to('/') }}/images/product/{{$value->image}}" alt=""/>
                        </a>
                     </div>
                     <div class="product-info">
                        <h6 class="product-title">
                           <a href="{{ route('single-product',  [$value->slug, $value->id]) }}">{{ $value->name }}</a>
                        </h6>
                        <h6 class="brand-name">{!! str_limit($value->title, $limit = 30, $end = '...')  !!}</h6>
                        <h3 class="pro-price">{{ number_format($value->util_price) }} VNĐ</h3>
                     </div>
                     <ul class="action-button">
                        <li>
                            <button class="cart-love"  data-id = "{{ $value->id }}" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></button>
                        </li>
                        <li>
                           <a href="#" data-toggle="modal"  data-target="#productModal" title="Xem nhanh"><i class="zmdi zmdi-zoom-in"></i></a>
                        </li>
                        <li>
                           <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                        </li>
                        <li>
                           <button class="addCart" data-id = "{{ $value->id }}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></button>
                        </li>
                     </ul>
                  </div>
               </div>
               @endforeach
               <!-- product-item end -->
            </div>
         </div>
      </div>
   </div>
   <!-- FEATURED PRODUCT SECTION END -->
   <!-- UP COMMING PRODUCT SECTION START -->
   {{-- 
   <div class="up-comming-product-section ptb-60">
      <div class="container">
         <div class="row">
            <!-- up-comming-pro -->
            <div class="col-md-8 col-sm-12 col-xs-12">
               <div class="up-comming-pro gray-bg up-comming-pro-2 clearfix">
                  <div class="up-comming-pro-img f-left">
                     <a href="#">
                     <img src="img/up-comming/2.jpg" alt="">
                     </a>
                  </div>
                  <div class="up-comming-pro-info f-left">
                     <h3><a href="#">Dummy Product Name</a></h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitest, sed do eiusmod tempor incididunt ut labore et dolores top magna aliqua. Ut enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea commodo consequat. laborum. </p>
                     <div class="up-comming-time-2 clearfix">
                        <div data-countdown="2017/01/15"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 hidden-sm col-xs-12">
               <div class="banner-item banner-1">
                  <div class="ribbon-price">
                     <span>$ 896.00</span>
                  </div>
                  <div class="banner-img">
                     <a href="#"><img src="img/banner/1.jpg" alt=""></a>
                  </div>
                  <div class="banner-info">
                     <h3><a href="#">Product Name</a></h3>
                     <ul class="banner-featured-list">
                        <li>
                           <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                        </li>
                        <li>
                           <i class="zmdi zmdi-check"></i><span>amet, consectetur</span>
                        </li>
                        <li>
                           <i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span>
                        </li>
                        <li>
                           <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                        </li>
                        <li>
                           <i class="zmdi zmdi-check"></i><span>labore et dolore.</span>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   --}}
   <!-- UP COMMING PRODUCT SECTION END -->
   <!-- PRODUCT TAB SECTION START -->
   <div class="product-tab-section section-bg-tb pt-80 pb-55">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
               <div class="section-title text-left mb-40">
                  <h2 class="uppercase">Danh sách sản phẩm</h2>
                  <h6>Các sản phẩm hiện có</h6>
               </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
               <div class="pro-tab-menu pro-tab-menu-2 text-right">
                  <!-- Nav tabs -->
                  <ul class="" >
                     <li class="active"><a href="#popular-product" data-toggle="tab">Điện thoại </a></li>
                     <li><a href="#new-arrival" data-toggle="tab">Máy tính bảng</a></li>
                     <li><a href="#best-seller"  data-toggle="tab">Laptop</a></li>
                     <li><a href="#special-offer"  data-toggle="tab">Phụ kiện</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="product-tab">
            <!-- Tab panes -->
            <div class="tab-content">
               <!-- popular-product start -->
               <div class="tab-pane active" id="popular-product">
                  <div class="row">
                     @foreach ($product_phone as $value)
                     <!-- product-item start -->
                     <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="product-item product-item-2">
                           <div class="product-img">
                              <a href="single-product.html">
                              <img  src="{{ URL::to('/') }}/images/product/{{$value->image}}" alt=""/>
                              </a>
                           </div>
                           <div class="product-info">
                              <h6 class="product-title">
                                 <a href="{{ route('single-product',  [$value->slug, $value->id]) }}">{{ $value->name }}</a>
                              </h6>
                              <h6 class="brand-name">{!! str_limit($value->title, $limit = 30, $end = '...')  !!}</h6>
                              <h3 class="pro-price">{{ number_format($value->util_price) }} VNĐ</h3>
                           </div>
                           <ul class="action-button">
                              <li>
                                  <button class="cart-love"  data-id = "{{ $value->id }}" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></button>
                              </li>
                              <li>
                                 <a href="#" data-toggle="modal"  data-target="#productModal" title="Xem nhanh"><i class="zmdi zmdi-zoom-in"></i></a>
                              </li>
                              <li>
                                 <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                              </li>
                              <li>
                                 <button class="addCart" data-id = "{{ $value->id }}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></button>
                              </li>
                           </ul>
                        </div>
                     </div>
                     @endforeach
                     <!-- product-item end -->
                  </div>
               </div>
               <!-- popular-product end -->
               <!-- new-arrival start -->
               <div class="tab-pane" id="new-arrival">
                  <div class="row">
                     @foreach ($product_maytinhbang as $value)
                     <!-- product-item start -->
                     <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="product-item product-item-2">
                           <div class="product-img">
                              <a href="single-product.html">
                              <img  src="{{ URL::to('/') }}/images/product/{{$value->image}}" alt=""/>
                              </a>
                           </div>
                           <div class="product-info">
                              <h6 class="product-title">
                                 <a href="{{ route('single-product',  [$value->slug, $value->id]) }}">{{ $value->name }}</a>
                              </h6>
                              <h6 class="brand-name">{!! str_limit($value->title, $limit = 30, $end = '...')  !!}</h6>
                              <h3 class="pro-price">{{ number_format($value->util_price) }} VNĐ</h3>
                           </div>
                           <ul class="action-button">
                              <li>
                                  <button class="cart-love"  data-id = "{{ $value->id }}" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></button>
                              </li>
                              <li>
                                 <a href="#" data-toggle="modal"  data-target="#productModal" title="Xem nhanh"><i class="zmdi zmdi-zoom-in"></i></a>
                              </li>
                              <li>
                                 <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                              </li>
                              <li>
                                 <button class="addCart" data-id = "{{ $value->id }}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></button>
                              </li>
                           </ul>
                        </div>
                     </div>
                     @endforeach
                     <!-- product-item end -->
                  </div>
               </div>
               <!-- new-arrival end -->
               <!-- best-seller start -->
               <div class="tab-pane" id="best-seller">
                  <div class="row">
                     @foreach ($product_laptop as $value)
                     <!-- product-item start -->
                     <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="product-item product-item-2">
                           <div class="product-img">
                              <a href="single-product.html">
                              <img  src="{{ URL::to('/') }}/images/product/{{$value->image}}" alt=""/>
                              </a>
                           </div>
                           <div class="product-info">
                              <h6 class="product-title">
                                 <a href="{{ route('single-product',  [$value->slug, $value->id]) }}">{{ $value->name }}</a>
                              </h6>
                              <h6 class="brand-name">{!! str_limit($value->title, $limit = 30, $end = '...')  !!}</h6>
                              <h3 class="pro-price">{{ number_format($value->util_price) }} VNĐ</h3>
                           </div>
                          <ul class="action-button">
                              <li>
                                  <button class="cart-love"  data-id = "{{ $value->id }}" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></button>
                              </li>
                              <li>
                                 <a href="#" data-toggle="modal"  data-target="#productModal" title="Xem nhanh"><i class="zmdi zmdi-zoom-in"></i></a>
                              </li>
                              <li>
                                 <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                              </li>
                              <li>
                                 <button class="addCart" data-id = "{{ $value->id }}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></button>
                              </li>
                           </ul>
                        </div>
                     </div>
                     @endforeach
                     <!-- product-item end -->
                  </div>
               </div>
               <!-- best-seller end -->
               <!-- special-offer start -->
               <div class="tab-pane" id="special-offer">
                  <div class="row">
                     @foreach ($product_phukien as $value)
                     <!-- product-item start -->
                     <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="product-item product-item-2">
                           <div class="product-img">
                              <a href="single-product.html">
                              <img  src="{{ URL::to('/') }}/images/product/{{$value->image}}" alt=""/>
                              </a>
                           </div>
                           <div class="product-info">
                              <h6 class="product-title">
                                 <a href="{{ route('single-product',  [$value->slug, $value->id]) }}">{{ $value->name }}</a>
                              </h6>
                              <h6 class="brand-name">{!! str_limit($value->title, $limit = 30, $end = '...')  !!}</h6>
                              <h3 class="pro-price">{{ number_format($value->util_price) }} VNĐ</h3>
                           </div>
                           <ul class="action-button">
                              <li>
                                  <button class="cart-love"  data-id = "{{ $value->id }}" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></button>
                              </li>
                              <li>
                                 <a href="#" data-toggle="modal"  data-target="#productModal" title="Xem nhanh"><i class="zmdi zmdi-zoom-in"></i></a>
                              </li>
                              <li>
                                 <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                              </li>
                              <li>
                                 <button class="addCart" data-id = "{{ $value->id }}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></button>
                              </li>
                           </ul>
                        </div>
                     </div>
                     @endforeach
                     <!-- product-item end -->
                  </div>
                  >
               </div>
               <!-- special-offer end -->
            </div>
         </div>
      </div>
   </div>
   <!-- PRODUCT TAB SECTION END -->
   <!-- BLOG SECTION START -->
  {{--  <div class="blog-section-2 pt-60 pb-30">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-title text-left mb-40">
                  <h2 class="uppercase">Latest blog</h2>
                  <h6>There are many variations of passages of brands available,</h6>
               </div>
            </div>
         </div>
         <div class="blog">
            <div class="row active-blog-2">
               <!-- blog-item start -->
               <div class="col-xs-12">
                  <div class="blog-item-2">
                     <div class="row">
                        <div class="col-md-6 col-xs-12">
                           <div class="blog-image">
                              <a href="single-blog.html"><img src="img/blog/4.jpg" alt=""></a>
                           </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                           <div class="blog-desc">
                              <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                              <p>There are many variations of passages of in psum available, but the majority have sufe ered on in some form...</p>
                              <div class="read-more">
                                 <a href="#">Read more</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- blog-item end -->
               <!-- blog-item start -->
               <div class="col-xs-12">
                  <div class="blog-item-2">
                     <div class="row">
                        <div class="col-md-6 col-xs-12">
                           <div class="blog-image">
                              <a href="single-blog.html"><img src="img/blog/5.jpg" alt=""></a>
                           </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                           <div class="blog-desc">
                              <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                              <p>There are many variations of passages of in psum available, but the majority have sufe ered on in some form...</p>
                              <div class="read-more">
                                 <a href="#">Read more</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- blog-item end -->
               <!-- blog-item start -->
               <div class="col-xs-12">
                  <div class="blog-item-2">
                     <div class="row">
                        <div class="col-md-6 col-xs-12">
                           <div class="blog-image">
                              <a href="single-blog.html"><img src="img/blog/4.jpg" alt=""></a>
                           </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                           <div class="blog-desc">
                              <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                              <p>There are many variations of passages of in psum available, but the majority have sufe ered on in some form...</p>
                              <div class="read-more">
                                 <a href="#">Read more</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- blog-item end -->
            </div>
         </div>
      </div>
   </div> --}}
   <!-- BLOG SECTION END -->   
   <!-- NEWSLETTER SECTION START -->
   <div class="newsletter-section section-bg-tb pt-60 pb-80">
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
               <div class="newsletter">
                  <div class="newsletter-info text-center">
                     <h2 class="newsletter-title">Nhận bản tin</h2>
                     <p>Nhập email của bạn để đăng ký nhận bản tin</p>
                  </div>
                  <div class="subcribe clearfix">
                     <form action="#">
                        <input type="text" name="email" placeholder="Enter your email here..."/>
                        <button class="submit-btn-2 btn-hover-2" type="submit">subcribe</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- NEWSLETTER SECTION END -->            
</section>
@endsection