@extends('admin.layouts.master')
@section('content')
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3 style="font-weight: bold;">Danh Mục Đơn Hàng</h3>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Bill</a></li>
                    <li class="active">Show</li>
                </ol>
         </div>
         <div class="title_right" align="right">
            <button type="button" name="refresh" id="refresh" class="btn btn-info btn-sm glyphicon glyphicon-refresh">Làmmới</button>
            <button type="button" name="create_record" id="delete_record" class="btn btn-danger btn-sm glyphicon glyphicon-trash">Xóa</button>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Danh sách đơn hàng</h2>
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
                           <th class="column-title">Mã hóa đơn</th>
                           <th class="column-title">Tên khách hàng</th>
                           <th class="column-title">Sản phẩm</th>
                           <th class="column-title">Số lượng</th>
                           <th class="column-title">Địa chỉ</th>
                           <th class="column-title">Số điện thoại</th>
                           <th class="column-title">Thành tiền</th>
                           <th class="column-title">Xác nhận</th>
                           <th class="text-center" ><span class="nobr">Thao Tác</span>
                           </th>
                           <th class="bulk-actions" colspan="10">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($bill_detailt as $value)
                        <tr class="even pointer bill{{$value->id}}">
                           <td class="a-center ">
                              <input type="checkbox" class="flat" value="{{ $value->id }}" name="table_records">
                           </td>
                           <td class=" ">{{ $value->id }}</td>
                           <td class=" ">{{ $value->bill->code_order }}</td>
                           <td class=" ">{{ $value->bill->name }}</td>
                           <td class=" ">{!! str_limit($value->product->name, $limit = 40, $end = '...')  !!}</td>
                           <td class=" ">{{ $value->quantity }}</td>
                           <td class=" ">{{ $value->bill->address }}</td>
                           <td class=" ">{{ $value->bill->phone }}</td>
                           <td class=" ">{{ number_format($value->bill->payment) }} VNĐ</td>
                           <td>
                               @if($value->bill->status == 0)
                                 <span class="btn btn-round btn-warning btn-xs bill-modal" data-id="{{$value->bill->id }}" >{{ "Chưa thanh toán" }}</span>
                               @else
                                 <span class="btn btn-round btn-success btn-xs" >{{ "Đã thanh toán" }}</span>
                               @endif
                               {{--  <span class="btn btn-round btn-primary btn-xs" >{{ "Xem chi tiết" }}</span> --}}
                           </td>
                           <td>
                               <button style="text-align: center; " class="btn btn-danger btn-sm delete-modal" title="hủy đơn hàng" data-toggle="modal" data-target="#delete" data-name="{{$value->name}}" type="button" data-id="{{ $value->bill->id }}"><i class="glyphicon glyphicon-trash"></i></button>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                 {!! $bill_detailt->links() !!}
               </div>
            </div>
         </div>
      </div>
   </div>

<!-- =======================================FormEdit============================================ -->

   <div id="myModal"class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header modal-header-info">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 style="font-weight: bold;"><i class="glyphicon glyphicon-thumbs-up"></i> Chỉnh sửa danh mục</h1>
               <h4 class="modal-title" ></h4>
            </div>
            <div class="modal-body">
              <span id="edit_message">
              </span>
               <form class="form-horizontal" role="modal" id="submit_form" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                   <div class="form-group">
                     <label class="control-label col-sm-3" for="id">ID</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" id="fid" name="id" disabled>
                       <input type="hidden" name="hidden_id" id="hidden_id" />
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-3" for="name">Name :</label>
                     <div class="col-sm-9 ">
                       <input type="text" class="form-control" id="namee" name="name"
                        required>
                       <span class="errorname" style="color: red; font-size:15px;"></span>
                       {{-- <p class="error text-center alert alert-danger hidden"></p> --}}
                     </div>
                   </div>

                   <div class="form-group">
                     <label class="control-label col-sm-3">Trạng thái hiển thị :</label>
                     <div class="col-sm-9">
                       <select class="form-control" name="status" id="status">
                           <option value="1" class="ht">Hiện Thị</option>
                           <option value="0" class="kht">Không Hiện Thị</option>
                       </select>
                       <p class="error text-center alert alert-danger hidden"></p>
                     </div>
                   </div>

                   <div class="form-group">
                     <label class="control-label col-sm-3">Danh mục thể loại:</label>
                     <div class="col-sm-9">
                       <select class="form-control" name="category_id" id="category_id">
                       </select>
                       <p class="error text-center alert alert-danger hidden"></p>
                     </div>
                   </div>

                    <div class="form-group">
                     <label class="control-label col-sm-3" >Images :</label>
                     <div class="col-sm-9">
                       <input type="file" name="images" id="imagess" />
                       <span id="store_image"></span>
                       <p class="error text-center alert alert-danger hidden"></p>
                     </div>
                   </div>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-success edit" >
               <span id="footer_action_button" class="glyphicon glyphicon-ok"></span>Update
               </button>
               <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">
               <span class="glyphicon glyphicon-remove"></span>close
               </button>
            </div>
         </div>
      </div>
   </div>

 <!-- Endformadd -->
 <!-- =======================================Delete===================================== -->

  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-danger">
                    <button type="button" class="close" data-dismiss="modal"aria-hidden="true">×</button>
                    <h1 style="font-weight: bold;"><i class="glyphicon glyphicon-thumbs-up"></i> Xóa danh mục</h1>
                </div>
                <div class="modal-body">
                    <div class="deleteContent" style="color: red; font-weight: bold;">
                      Bạn có chắc chắn muốn hủy đơn hàng <span class="name"></span> không ?
                       <span class="hidden id"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger delete" >
                     <span id="" class="glyphicon glyphicon-trash"></span>Delete
                    </button>
                    <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">
                     <span class="glyphicon glyphicon-remove"></span>close
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal"aria-hidden="true">×</button>
                    <h1 style="font-weight: bold;"><i class="glyphicon glyphicon-thumbs-up"></i>Xác nhận đơn hàng </h1>
                </div>
                <div class="modal-body">
                    <div class="billContent" style="color: red; font-weight: bold;">
                      Xác nhận đơn hàng đã thanh toán<span class="name"></span>?
                       <span class="hidden idbill"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success bill" >
                     <span id="" class="glyphicon glyphicon-ok"></span>Ok
                    </button>
                    <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">
                     <span class="glyphicon glyphicon-remove"></span>close
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

   <!-- footer content -->
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

<!-- ==========================================EDIT========================================= -->
<script type="text/javascript">
     $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
   
  /*=============================================Delete==============================================*/
      $(document).on('click', '.delete-modal', function() {
          $('.id').text($(this).data('id'));
          $('.name').text($(this).data('name'));
          $('.deleteContent').show();
          $('#deleteModal').modal('show'); 
      });

      $(document).on('click', '.bill-modal', function() {
          $('.idbill').text($(this).data('id'));
          $('.billContent').show();
          $('#billModal').modal('show'); 
      });
      
      $('.modal-footer').on('click', '.bill', function() {
          $.ajax({
              type: 'GET',
              url: '{{ route('admin.bill.updateBill')}}',
              data: {
                  'id': $('.idbill').text()
              },
              success: function(data) {
                  toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                  $('#billModal').modal('hide');
                  location.reload();
              }
          });
      });

      $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'POST',
              url: '{{ route('admin.bill.deleteBill')}}',
              data: {
                  'id': $('.id').text()
              },
              success: function(data) {
                  console.log(data);
                  toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                  $('#delete-modal').modal('hide');
                  location.reload();
              }
          });
      });

    /*=======================================DeleteRecord==========================================*/
      $('#delete_record').click(function(){
        var id = [];
           if(confirm("Bạn có chắc chắn muốn xóa danh mục đã chọn"))
           {
             $.each($("input[class='flat']:checked"), function(){            
                    id.push($(this).val()); 
                });
             
             // alert(id);
           }
           if((id.length) > 0)
           {
              $.ajax({
                 type : 'POST',
                 url  : '{{ route('admin.category.deletechecked') }}',
                 data: {
                   'id' : id
                 },
                 success : function(data){
                  toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                   $.each($("input[class='flat']:checked"), function(){            
                      $('.bill' + $("input[class='flat']:checked").val()).remove();
                   });
                 }
              });
           }
           else
           {
              alert('Ban chua chon danh muc click');
           }   
      });

</script>
@endsection