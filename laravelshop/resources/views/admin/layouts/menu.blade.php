<div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('index') }}" class="site_title"><i class="fa fa-paw"></i> <span>Laravelshop</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{ url('admin/images/user.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>Eleven</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-dashboard"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ route('admin.index') }}">Dashboard</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-industry"></i>Thể Loại sản phẩm<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ route('list.index') }}">Danh sách thể loại</a>
                    </li>
             {{--        <li><a href="media_gallery.html">Thêm thể loại</a>
                    </li>
                    <li><a href="typography.html">Chỉnh sủa thể loại</a>
                    </li> --}}
                  </ul>
                </li>
                <li><a><i class="fa fa-bar-chart"></i>Loại sản phẩm<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ route('admin.producttype.list') }}">Danh sách danh mục sản phẩm</a>
                    </li>
                    <li><a href="{{ route('admin.producttype.getAdd') }}">Thêm danh mục</a>
                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-diamond"></i>Sản phẩm<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ route('admin.product.list') }}">Danh sách sản phẩm</a>
                    </li>
                    <li><a href="{{ route('admin.product.getAdd') }}">Thêm sản phẩm</a>
                    </li>
                  </ul>
                </li>

                 <li><a><i class="fa fa-sliders"></i>Slide<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ route('admin.slide.list')}}">Danh sách slide</a>
                    </li>
                    <li><a href="{{ route('admin.slide.getAdd')}}">Thêm slide</a>
                    </li>
    
                  </ul>
                </li>

                <li><a><i class="fa fa-diamond"></i> Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="">Mặt hàng bán chạy</a>
                    </li>
                    <li><a href="">Mặt hàng được mua nhiều nhất</a>
                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-shopping-cart"></i> Quản lý đơn hàng <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ route('admin.bill.list') }}">Danh sách đơn hàng</a>
                    </li>
                  </ul>
                </li>
               
                <li><a><i class="fa fa-group"></i> Quản lý thành viên <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="">Danh sách thành viên</a>
                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-credit-card-alt"></i>Quản lý doanh thu <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="">Mặt hàng bán chạy</a>
                    </li>
                    <li><a href="">Mặt hàng được mua nhiều nhất</a>
                    </li>
                  </ul>
                </li>

                 <li><a><i class="fa fa-user"></i> Quản lý người dùng <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="">Danh sách người dùng</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
</div>