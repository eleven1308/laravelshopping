<header class="header-area header-wrapper">
   <!-- header-top-bar -->
   <div class="header-top-bar plr-185">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-6 hidden-xs">
               <div class="call-us">
                  <p class="mb-0 roboto">+0356807372</p>
               </div>
            </div>

            <div class="col-sm-6 col-xs-12">
               @if( Auth::check() )
               <div class="top-link clearfix">
                  <ul class="link f-right">
                     <li>
                        <a href="">
                        <i class="zmdi zmdi-account"></i>
                        {{ Auth::user()->name }}
                        </a>
                     </li>
                     <li>
                        <a href="logout">
                        <i class="zmdi zmdi-lock"></i>
                         Logout
                        </a>
                     </li>
                  </ul>
               </div>
               @else
               <div class="top-link clearfix">
                  <ul class="link f-right">
                     <li>
                        <a href="">
                        <i class="zmdi zmdi-account"></i>
                        Tài khoản
                        </a>
                     </li>
                     <li>
                        <a href="">
                        <i class="zmdi zmdi-favorite"></i>
                        Sản phẩm ưa thích
                        </a>
                     </li>
                     <li>
                        <a href="login">
                        <i class="zmdi zmdi-lock"></i>
                        Đăng nhập
                        </a>
                     </li>
                  </ul>
               </div>
               @endif
            </div>
         </div>
      </div>
   </div>
   <!-- header-middle-area -->
   <div id="sticky-header" class="header-middle-area plr-185">
      <div class="container-fluid">
         <div class="full-width-mega-dropdown">
            <div class="row">
               <!-- logo -->
               <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="logo">
                     <a href="">
                     <img src="img/logo/icon.png" alt="main logo">
                     </a>
                  </div>
               </div>
               <!-- primary-menu -->
               <div class="col-md-8 hidden-sm hidden-xs">
                  <nav id="primary-menu">
                     <ul class="main-menu text-center">
                        <li>
                           <a href="">Trang chủ</a>
                        </li>
                        @foreach($category as $cate)
                        <li>
                           <a href="">{{ $cate->name }}</a>
                           <ul class="dropdwn">
                            @if(count($cate->productType) > 0)
                              @foreach($cate->productType as $protype)
                              <li>
                              <a href="{{ route('list-product') }}">{{ $protype->name }}</a>
                              </li>
                              @endforeach
                            @endif
                           </ul>
                        </li>
                        @endforeach
                        {{-- <li class="mega-parent">
                           <a href="shop.html">Sản phẩm</a>
                           <div class="mega-menu-area clearfix">
                              <div class="mega-menu-link f-left">
                              @foreach($category as $cate)
                                 <ul class="single-mega-item">
                                    <li class="menu-title">{{ $cate->name }}
                                    </li>
                                    @if(count($cate->productType) > 0)
                                    @foreach($cate->productType as $protype)
                                    <li>
                                       <a href="">{{ $protype->name }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                 </ul>
                               @endforeach
                              </div>
                              <div class="mega-menu-photo f-left">
                                 <a href="#">
                                 <img src="img/mega-menu/1.jpg" alt="mega menu image">
                                 </a>
                              </div>
                           </div>
                        </li> --}}
                        <li>
                           <a href="https://www.facebook.com/binhan1308">Giới thiệu</a>
                        </li>
                        <li>
                           <a  href="https://www.facebook.com/binhan1308">Liên hệ</a>
                        </li>
                     </ul>
                  </nav>
               </div>
               <!-- header-search & total-cart -->
               <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="search-top-cart  f-right">
                     <!-- header-search -->
                     <div class="header-search f-left">
                        <div class="header-search-inner">
                           <button class="search-toggle">
                           <i class="zmdi zmdi-search"></i>
                           </button>
                           <form action="#">
                              <div class="top-search-box">
                                 <input type="text" placeholder="Search here your product...">
                                 <button type="submit">
                                 <i class="zmdi zmdi-search"></i>
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!-- total-cart -->
                     <div class="total-cart f-left">
                        <div class="total-cart-in">
                           <div class="cart-toggler">
                              <a href="#">
                              <span class="cart-quantity">{{Cart::count()}}</span><br>
                              <span class="cart-icon">
                              <i class="zmdi zmdi-shopping-cart-plus"></i>
                              </span>
                              </a>                            
                           </div>
                           <ul>
                           {{--    <li>
                                 <div class="top-cart-inner your-cart">
                                    <h5 class="text-capitalize">Giỏ Hàng Của Bạn</h5>
                                 </div>
                              </li>
                              <li>
                                 <div class="total-cart-pro">
                                    <!-- single-cart -->
                                    <div class="single-cart clearfix">
                                       <div class="cart-img f-left">
                                          <a href="#">
                                          <img src="img/cart/1.jpg" alt="Cart Product" />
                                          </a>
                                          <div class="del-icon">
                                             <a href="#">
                                             <i class="zmdi zmdi-close"></i>
                                             </a>
                                          </div>
                                       </div>
                                       <div class="cart-info f-left">
                                          <h6 class="text-capitalize">
                                             <a href="#">Dummy Product Name</a>
                                          </h6>
                                          <p>
                                             <span>Brand <strong>:</strong></span>Brand Name
                                          </p>
                                          <p>
                                             <span>Model <strong>:</strong></span>Grand s2
                                          </p>
                                          <p>
                                             <span>Color <strong>:</strong></span>Black, White
                                          </p>
                                       </div>
                                    </div>
                                    <!-- single-cart -->
                                    <div class="single-cart clearfix">
                                       <div class="cart-img f-left">
                                          <a href="#">
                                          <img src="img/cart/1.jpg" alt="Cart Product" />
                                          </a>
                                          <div class="del-icon">
                                             <a href="#">
                                             <i class="zmdi zmdi-close"></i>
                                             </a>
                                          </div>
                                       </div>
                                       <div class="cart-info f-left">
                                          <h6 class="text-capitalize">
                                             <a href="#">Dummy Product Name</a>
                                          </h6>
                                          <p>
                                             <span>Brand <strong>:</strong></span>Brand Name
                                          </p>
                                          <p>
                                             <span>Model <strong>:</strong></span>Grand s2
                                          </p>
                                          <p>
                                             <span>Color <strong>:</strong></span>Black, White
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="top-cart-inner subtotal">
                                    <h4 class="text-uppercase g-font-2">
                                       Total  =  
                                       <span>$ 500.00</span>
                                    </h4>
                                 </div>
                              </li> --}}
                              <li>
                                 <div class="top-cart-inner view-cart">
                                    <h4 class="text-uppercase">
                                       <a href="{{ route('listCart')}}">XEM GIỎ HÀNG</a>
                                    </h4>
                                 </div>
                              </li>
                              <li>
                                 <div class="top-cart-inner check-out">
                                    <h4 class="text-uppercase">
                                       <a href="{{ route('checkoutCart') }}">THANH TOÁN</a>
                                    </h4>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="total-cart f-left">
                        <div class="total-cart-in">
                           <div class="cart-toggler">
                              <a href="#">
                              <span class="lovecart"></span><br>
                              <span class="cart-icon">
                              <i class="zmdi  zmdi-favorite"></i>
                              </span>
                              </a>                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- END HEADER AREA