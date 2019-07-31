@extends('admin.layouts.master')
@section('content')
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3 style="font-weight: bold;">Danh Mục Sản Phẩm</h3>
         </div>
         <div class="title_right" align="right">
            <button type="button" name="refresh" id="refresh" class="btn btn-info btn-sm glyphicon glyphicon-refresh">Làmmới</button>
           <a href="{{ route('admin.slide.getAdd') }}" class="btn btn-success btn-sm glyphicon glyphicon-plus" >Thêmmới</a>
            <button type="button" name="create_record" id="delete_record" class="btn btn-danger btn-sm glyphicon glyphicon-trash">Xóa</button>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Danh sách danh mục</h2>
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
                           <th class="column-title">Images</th>
                           <th class="column-title">Description</th>
                           <th class="column-title">Link</th>
                           <th class="column-title">Created</th>
                           <th class="column-title">Updated</th>
                           <th class="text-center" width="150px"><span class="nobr">Action</span>
                           </th>
                           <th class="bulk-actions" colspan="8">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($slide as $value)
                        <tr class="even pointer slide{{$value->id}}">
                           <td class="a-center ">
                              <input type="checkbox" class="flat" value="{{ $value->id }}" name="table_records">
                           </td>
                           <td class=" ">{{ $value->id }}</td>
                           <td class=" ">{{ $value->name }}</td>
                           <td class=" "><img src={{ URL::to('/') }}/images/slide/{{$value->images}} style="width: 70px;" class='img-thumbnail' /></td>
                           <td class=" ">{!! str_limit($value->description, $limit = 300, $end = '...')  !!}</td>
                           <td class=" ">{{ $value->link }}</td>
                           <td class=" last">{{ $value->created_at->format('d/m/Y') }}</td>
                           <td class=" last">{{ $value->updated_at->format('d/m/Y') }}</td>
                           <td>
                               <button class="btn btn-info btn-sm" title="" data-toggle="modal" data-target="#show" type="button" data-id=""><i class="fa fa-eye"></i></button>
                               <button class="btn btn-warning btn-sm edit-modal" title="" data-toggle="modal" data-target="#edit" type="button" 
                               data-id="{{ $value->id }}" id="{{ $value->id }}"><i class="glyphicon glyphicon-pencil"></i></button>
                               <button class="btn btn-danger btn-sm delete-modal" title="" data-toggle="modal" data-target="#delete" data-name="{{$value->name}}" type="button" data-id="{{ $value->id }}"><i class="glyphicon glyphicon-trash"></i></button>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
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
                      Bạn có chắc chắn muốn xóa <span class="name"></span> không ?
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
   /*======================================LaydulieuformEdit=======================================*/
     $(document).on('click', '.edit-modal', function() {
        var id = $(this).attr('id');
        // var id = '143';
        // $('#form_result').html('');
        $.ajax({
            url: "{{ url('admin/slide/edit')}}/" + id,
            dataType: "json",
            success: function($data) {
                var html = '';
                $.each($data.category,function($key,$value){
                  if($value['id'] == $data.slide.category_id){
                     html += '<option value='+$value['id']+' selected>';
                        html += $value['name'];
                     html += '</option>'; 
                  }else{
                     html += '<option value='+$value['id']+'>';
                        html += $value['name'];
                     html += '</option>';
                  }  
                });
                $('#category_id').html(html);
                $('.deleteContent').hide();
                $('.form-horizontal').show();
                $('#fid').val($data.slide.id);
                $('#store_image').html("<img src={{ URL::to('/') }}/images/slide/" + $data.slide.images + " width='200px' class='img-thumbnail' />");
                $('#store_image').append("<input type='hidden' name='hidden_image' value='" + $data.slide.images + "' />");
                $('#namee').val($data.slide.name);
                $('#hidden_id').val($data.slide.id);
                // $('#fid').val($(this).data('id'));
                $('#myModal').modal('show');

                if($data.slide.status == 1){
                     $('.ht').attr('selected','selected');
                }else{
                     $('.kht').attr('selected','selected');
                }
            }
         });
      });
/*======================================UpdateEdit=======================================*/
     $('.modal-footer').on('click', '.edit', function() {
           var formData = new FormData($('#submit_form')[0]);
           $.ajax({
               url: "",
               method: "POST",
               data: formData,
               contentType: false,
               cache: false,
               processData: false,
               dataType: "json",
               success: function(data) {
                 console.log(data);
                   var html = '';
                   if((data.errors)){
                      html += '<i class="fa fa-check">' + data.errors;
                         html += '</i>';
                      // $('.error').show();
                      $('.errorname').html(html);
                      // for (var count =  data.errors.length-1; count >= 0 ; count--) {
                      //    toastr.error(data.errors[count] ,'Thông Báo', {timeOut: 10000, progressBar : true })
                      //  }
                   }else{
                         toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                         $('#myModal').modal('hide');
                          // location.reload(true);

                   }
                 
               },
               error: function(error) {
                   console.log(error);
               }
           });
      });

  /*=============================================Delete==============================================*/
      $(document).on('click', '.delete-modal', function() {
          $('.id').text($(this).data('id'));
          $('.name').text($(this).data('name'));
          $('.deleteContent').show();
          $('#deleteModal').modal('show'); 
      });
      
      $('.modal-footer').on('click', '.delete', function() {
          // var id = $(this).attr('id');
          $.ajax({
              type: 'POST',
              url: '{{ route('admin.slide.postDelete')}}',
              data: {
                  // '_token': $('input[name=_token]').val(),
                  'id': $('.id').text()
              },
              success: function(data) {
                  console.log('OK');
                  toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                  $('.slide' + $('.id').text()).remove();
                  $('#deleteModal').modal('hide');
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
                 url  : '{{ route('admin.slide.deletechecked') }}',
                 data: {
                   'id' : id
                 },
                 success : function(data){
                  toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                   $.each($("input[class='flat']:checked"), function(){            
                      $('.slide' + $("input[class='flat']:checked").val()).remove();
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