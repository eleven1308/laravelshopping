@extends('admin.layouts.master')
@section('content')
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3 style="font-weight: bold;">Danh Mục Sản Phẩm</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Product</a></li>
                <li class="active">Show</li>
            </ol>
         </div>
         <div class="title_right" align="right">
            <button type="button" name="refresh" id="refresh" class="btn btn-info btn-sm glyphicon glyphicon-refresh">Làmmới</button>
           <a href="{{ route('admin.product.getAdd') }}" class="btn btn-success btn-sm glyphicon glyphicon-plus" >Thêmmới</a>
            <button type="button" name="create_record" id="delete_record" class="btn btn-danger btn-sm glyphicon glyphicon-trash">Xóa</button>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Danh sách sản phẩm</h2>
                  <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="#">Settings 1</a>
                           </li>
                           <li><a href="#">Settings 2</a>
                           </li>
                        </ul>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                  </ul>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                     <thead>
                        <tr class="headings">
                           <th>
                              <input type="checkbox" id="check-all" class="flat">
                           </th>
                           <th class="column-title">STT</th>
                           <th class="column-title">Name</th>
                           <th class="column-title">Title</th>
                           <th class="column-title">Description</th>
                           <th class="column-title">Images</th>
                           <th class="column-title">Info</th>
                           <th class="column-title">Category</th>
                           <th class="column-title">Producttype</th>
                           <th class="column-title">Hot</th>
                           <th class="column-title">View</th>
                           <th class="column-title">Status</th>
                        {{--    <th class="column-title">Created</th>
                           <th class="column-title">Updated</th> --}}
                           <th class="text-center" width="150px"><span class="nobr">Action</span>
                           </th>
                           <th class="bulk-actions" colspan="11">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($product as $key => $value)
                        <tr class="even pointer product{{$value->id}}">
                           <td class="a-center ">
                              <input type="checkbox" class="flat" value="{{ $value->id }}" name="table_records">
                           </td>
                           <td class=" ">{{ $key }}</td>
                           <td class=" ">{!! str_limit($value->name, $limit = 40, $end = '...')  !!}</td>
                           <td class=" ">{!! str_limit($value->title, $limit = 50, $end = '...')  !!}</td>
                           <td class=" " width="100px;">{!! str_limit($value->description, $limit = 100, $end = '...')  !!}</td>
                           <td class="" width="100px;"><img src={{ URL::to('/') }}/images/product/{{$value->image}} style="height: 80px; width: 80px;" class='img-thumbnail' /></td>
                           <td class="" width="200px;">
                                <b>Số lượng</b>: 35
                                <br/>
                                <b>Đơn giá</b>: {{ $value->util_price }}
                                <br/>
                                <b>Giá khuyến mại</b>: {{ $value->promotion_price }}
                                <br/>
                                <b>Thương hiệu</b>: {{ $value->trademark }}
                           </td>
                           <td class=" ">{{ $value->category->name }}</td>
                           <td class=" ">{{ $value->producttype->name}}</td>
                           <td>
                               @if($value->is_hot == 1)
                                 <span class="btn btn-round btn-danger btn-xs" >{{ "Yes" }}</span>
                               @else
                                 <span class="btn btn-round btn-warning btn-xs" >{{ "No" }}</span>
                               @endif
                           </td>
                           <td class=" ">
                            <a href="" class="btn btn-round btn-info btn-xs">Xem chi tiet</a>
                            <a href="adddetailt/{{ $value->id }}" class="btn btn-round btn-dark btn-xs">Thêm chi tiet</a>
                           </td>
                           <td>
                               @if($value->status == 1)
                                 <span class="btn btn-round btn-success btn-xs" >{{ "Hiện thị" }}</span>
                               @else
                                 <span title="Vui lòng thêm chi tiết sản phẩm" class="btn btn-round btn-warning btn-xs" >{{ "Chưa hiển thị" }}</span>
                               @endif
                           </td>
                          {{--  <td class=" last">{{ $value->created_at->format('d/m/Y') }}</td>
                           <td class=" last">{{ $value->updated_at->format('d/m/Y') }}</td> --}}
                           <td class="">
                               <button class="btn btn-info btn-sm" title="" data-toggle="modal" data-target="#show" type="button" data-id=""><i class="fa fa-eye"></i></button>
                               <button class="btn btn-warning btn-sm edit-modal" title="" data-toggle="modal" data-target="#edit" type="button" 
                               data-id="{{ $value->id }}" id="{{ $value->id }}"><i class="glyphicon glyphicon-pencil"></i></button>
                               <button class="btn btn-danger btn-sm delete-modal" title="" data-toggle="modal" data-target="#delete" data-name="{{$value->name}}" type="button" data-id="{{ $value->id }}"><i class="glyphicon glyphicon-trash"></i></button>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {!! $product->links() !!}
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- =====================================Delele ==========================================-->
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1 style="font-weight: bold;"><i class="glyphicon glyphicon-thumbs-up"></i> Xóa danh mục</h1>
            </div>
            <div class="modal-body">
                <div class="deleteContent" style="color: red; font-weight: bold;">
                    Bạn có chắc chắn muốn xóa <span class="name"></span> không ?
                    <span class="hidden id"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete">
                    <span id="" class="glyphicon glyphicon-trash"></span>Delete
                </button>
                <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>close
                </button>
            </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

   <footer>
      <div class="copyright-info">
         <p class="pull-right">ADMIN <a href="https://colorlib.com">Eleven</a>
         </p>
      </div>
      <div class="clearfix"></div>
   </footer>
   <!-- /footer content -->
</div>
@endsection

@section('script')
<script type="text/javascript">
     $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
     $(document).on('click', '.delete-modal', function() {
          $('.id').text($(this).data('id'));
          $('.name').text($(this).data('name'));
          $('.deleteContent').show();
          $('#deleteModal').modal('show'); 
      });
      
      $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'POST',
              url: '{{ route('admin.product.postDelete')}}',
              data: {
                  'id': $('.id').text()
              },
              success: function(data) {
                  toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                  $('.product' + $('.id').text()).remove();
                  $('#deleteModal').modal('hide');
              }
          });
      });
      


</script>
@endsection
