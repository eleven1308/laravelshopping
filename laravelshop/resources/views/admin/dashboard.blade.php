@extends('admin.layouts.master') 
@section('content')
<div class="right_col" role="main">
   <!-- top tiles -->
   <div class="row tile_count">
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
         <div class="left"></div>
         <div class="right">
            <span class="count_top"><i class="fa fa-user"></i> Tổng Người Dùng</span>
            <div class="count">{{ $users }}</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
         </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
         <div class="left"></div>
         <div class="right">
            <span class="count_top"><i class="fa fa-shopping-cart"></i>Tổng đơn hàng</span>
            <div class="count">{{ $bills }}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
         </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
         <div class="left"></div>
         <div class="right">
            <span class="count_top"><i class="fa fa-bar-chart"></i> Tổng Thể Loại</span>
            <div class="count green">{{ $categories }}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
         </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
         <div class="left"></div>
         <div class="right">
            <span class="count_top"><i class="fa fa-diamond"></i>Tổng danh mục sản phẩm</span>
            <div class="count">{{ $producttypes }}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>12% </i> From last Week</span>
         </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
         <div class="left"></div>
         <div class="right">
            <span class="count_top"><i class="fa fa-user"></i> Tổng sản phẩm</span>
            <div class="count">{{ $products }}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
         </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
         <div class="left"></div>
         <div class="right">
            <span class="count_top"><i class="fa fa-picture-o"></i>Tổng Images</span>
            <div class="count">{{ $images }}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
         </div>
      </div>
   </div>
   <!-- /top tiles -->
   <!-- footer content -->
   <footer>
      <div class="copyright-info">
         <p class="pull-right">Eleven</p>
      </div>
      <div class="clearfix"></div>
   </footer>
   <!-- /footer content -->
</div>
@endsection