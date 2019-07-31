@extends('admin.layouts.master')
@section('content')

<div class="right_col" role="main">
   <div class="page-title">
      <div class="title_left">
         <h3 style="font-weight: bold;">Danh Mục Thể Loại</h3>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li class="active">Show</li>
                </ol>
      </div>
      <div align="right">
         <button type="button" name="refresh" id="refresh" class="btn btn-info btn-sm glyphicon glyphicon-refresh">Làmmới</button>
         <button type="button" name="create_record" id="create_record" class="create-modal btn btn-success btn-sm glyphicon glyphicon-plus">Thêmmới</button>
         <button type="button" name="create_record" id="delete_record" class="btn btn-danger btn-sm glyphicon glyphicon-trash">Xóa</button>
      </div>
      <br />
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
              <div class="table table-responsive">
                  <table id="table" class="table table-striped responsive-utilities jambo_table bulk_action ">
                     <thead>
                        <tr class="headings">
                          <th>
                              <input type="checkbox" id="check-all" class="flat">
                           </th>
                           <th class="column-title" width="150px">STT</th>
                           <th class="column-title">Name</th>
                           <th class="column-title">Slug</th>
                           <th class="column-title">Status</th>
                           <th class="column-title">Created</th>
                           <th class="column-title">Updated</th>
                           <th class="text-center" width="150px">
                              <span class="nobr">Action</span>
                           </th>
                           <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        {{ csrf_field() }}
                        <?php  $no= 1; ?>
                        @foreach ($datacate as $value)
                        <tr class="even pointer post{{$value->id}}">
                           <td class="a-center ">
                             <input type="checkbox" value="{{ $value->id }}" class="flat" name="table_records">
                           </td>
                           <td>{{ $value->id }}</td>
                           <td>{{ $value->name }}</td>
                           <td>{{ $value->slug }}</td>
                           <td>
                               @if($value->status == 1)
                                 <span class="btn btn-round btn-success btn-xs" >{{ "Hiện thị" }}</span>
                               @else
                                 <span class="btn btn-round btn-warning btn-xs" >{{ "Không hiển thị" }}</span>
                               @endif
                           </td>
                           <td>{{ $value->created_at->format('d/m/Y') }}</td>
                           <td>{{ $value->updated_at->format('d/m/Y') }}</td>
                           <td class="a-right a-right ">
                              <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" data-body="{{$value->body}}">
                              <i class="fa fa-eye"></i>
                              </a>
                              <a href="#" class="edit-modal btn btn-warning btn-sm" id="{{ $value->id }}" data-id="{{$value->id}}" data-name="{{$value->name}}" data-body="{{$value->body}}">
                              <i class="glyphicon glyphicon-pencil"></i>
                              </a>
                              <a href="#" class="delete-modal btn btn-danger btn-sm" 
                              data-id="{{$value->id}}" data-name="{{$value->name}}" data-body="{{$value->body}}">
                              <i class="glyphicon glyphicon-trash"></i>
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {!! $datacate->links() !!}
              </div>
              {{-- {{$datacate->links()}} --}}
            </div>
         </div>
      </div>
   </div>
</div>
<!-- ========================================Formadd====================================== -->
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 style="font-weight: bold;"><i class="glyphicon glyphicon-thumbs-up"></i> Thêm thể loại</h1>
      </div>
      <div class="modal-body">
        <span id="form_result">
         </span>
        <form class="form-horizontal" role="form"  method="POST" id="myform" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="name">Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ old('name') }}"  id="name" name="name"
              placeholder="Nhập tên ở đây" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Trạng Thái :</label>
            <div class="col-sm-10">
              <select class="form-control" name="status" id="status">
                  <option value="1">Hiện Thị</option>
                  <option value="0"> Không Hiện Thị</option>
              </select>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Save
            </button>
            <button class="btn btn-warning pull-right" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remove"></span>Close
            </button>
          </div>
    </div>
  </div>
</div>


<!-- ========================================EDIT========================================= -->
<div id="myModal"class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header  modal-header-info">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h1 style="font-weight: bold;"><i class="glyphicon glyphicon-thumbs-up"></i> Chỉnh sửa thể loại</h1>
         </div>
         <div class="modal-body">
           <span id="edit_message">
           </span>
            <form class="form-horizontal" role="modal" id="submit_form" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="id">ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fid" name="id" disabled>
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="name">Name :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namee" name="name"
                     required>
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Trạng Thái :</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="status" id="status">
                        <option value="1" class="ht">Hiện Thị</option>
                        <option value="0" class="kht"> Không Hiện Thị</option>
                    </select>
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
<!-- ========================================Delete=========================================== -->
<div id="deleteModal"class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header modal-header-danger">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h1 style="font-weight: bold;"><i class="glyphicon glyphicon-thumbs-up"></i> Xóa thể loại</h1>
{{--             <h4 class="modal-title">Xóa danh mục</h4>
 --}}         
         </div>
         <div class="modal-body">
            <div class="deleteContent" style="color: red; font-weight: bold;">
              Bạn có chắc chắn muốn xóa <span class="name"></span> không ?
               <span class="hidden id"></span>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger delete" >
            <span id="footer_delete" class="glyphicon glyphicon-trash"></span>Delete
            </button>
            <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span>close
            </button>
         </div>
      </div>
   </div>
</div>
<!-- Enddiv -->
@endsection
@section('script')

<script type="text/javascript">

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function(){

    $(document).on('click', '.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Thêm Danh Mục');
    });
    
    /*===================================ADDCATE===============================================*/
     $("#add").click(function() {
     // $(document).on('click', '#add', function() {
        // var form = new FormData($('#myform')[0]);
        var form = $('#myform').serialize();
        $.ajax({
            type: 'POST',
            url: 'addPost',
            data: form,
            // cache: false,
            // contentType: false,
            // processData: false,
            success: function(data) {
                // var html = '';
                if ((data.errors)) {
                //     html = '<div class="alert alert-danger">';
                    for (var count =  data.errors.length-1; count >= 0 ; count--) {
                        // html += '<p>' + '<i class="fa fa-check"></i>'+ data.errors[count] + '</p>';
                         toastr.error(data.errors[count] ,'Thông Báo', {timeOut: 10000, progressBar : true })
                          //   toastr.options = {
                          //   "closeButton": false,
                          //   "debug": false,
                          //   "newestOnTop": false,
                          //   "progressBar": true,
                          //   "positionClass": "toast-top-right",
                          //   "preventDuplicates": false,
                          //   "onclick": null,
                          //   "showDuration": "300",
                          //   "hideDuration": "1000",
                          //   "timeOut": "5000",
                          //   "extendedTimeOut": "1000",
                          //   "showEasing": "swing",
                          //   "hideEasing": "linear",
                          //   "showMethod": "fadeIn",
                          //   "hideMethod": "fadeOut"
                          // }
                       }
                } else {
                    var html = '';
                    html += "<tr class='even pointer post" + data.data.id + "'>" +
                        "<td class='a-center'>" +
                        "<input type='checkbox'  value='" +data.data.id + "' class='flat' name='table_records'>" +
                        "</td>" +
                        "<td>" + data.data.id + "</td>" +
                        "<td>" + data.data.name + "</td>" +
                        "<td>" + data.data.slug + "</td>";
                        if((data.data.status) == 1){
                          html += "<td>Hiển thị</td>";
                        }else{
                          html += "<td>Khong hiển thị</td>";
                        }
                    $('#table').prepend(
                        html +
                        "<td>" + data.data.created_at + "</td>" +
                        "<td>" + data.data.updated_at + "</td>" +
                        "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.data.id + "' data-name='" + data.data.name + "' data-body='" + data.data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' id = '" + data.data.id + "' data-id='" + data.data.id + "' data-name='" + data.data.name + "' data-sltcate='" + data.data.parent_id + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.data.id + "' data-name='" + data.data.name + "' data-body='" + data.data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>" +
                        "</tr>");
                    // html = '<div class="alert alert-success" id="message" >' + data.success + '</div>';
                      toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                    $('#create').modal('hide');

                }//end else
                // $('#form_result').html(html);
            },
        });
        $('#name').val('');
        // $('#images').val('');
        // $('#thumb-output').remove();

    });

    /*=======================================EDIT=================================================*/

    $(document).on('click', '.edit-modal', function() {
        var id = $(this).attr('id');
        // var id = '143';
        // $('#form_result').html('');
        $.ajax({
            url: "{{ url('admin/category/edit')}}/" + id,
            dataType: "json",
            success: function(html) {
                $('.modal-title').text('Chỉnh Sửa Danh Mục');
                $('.deleteContent').hide();
                $('.form-horizontal').show();
                $('#fid').val(html.data.id);
                $('#namee').val(html.data.name);
                $('#hidden_id').val(html.data.id);
                if(html.data.status == 1)
                {
                   $('.ht').attr('selected', 'selected');
                }else
                {
                   $('.kht').attr('selected', 'selected');
                }
                // $('#fid').val($(this).data('id'));
                // $('#sltcate').val($(this).data('sltcate'));
                $('#myModal').modal('show');

            }
        })
    });

    $('.modal-footer').on('click', '.edit', function() {
        //co 3 cach gui form o dang image theo ajax
        //2 cach duoi day khong can them datatype va contenType
        // var formData = $('#submit_form').serialize();
        // var formData = $(this).serialize();
        //cach nay can phai them datatype:false voi contenType: false,
        // var form_data = new FormData(); khoi tao mot form data
        // truyen vao form data bang phuong thuc  formData.append('key1', 'value1');
        var formData = $('#submit_form').serialize();
        // formData.append('key1', 'value1');
        // formData.append('key2', 'value2');
        // formData.append('key3', 'value3');
        $.ajax({
            url: "{{route('admin.category.editPost')}}",
            method: "POST",
            data: formData,
            // contentType: false,
            // cache: false,
            // processData: false,
            dataType: "json",
            success: function(data) {
              console.log(data);
                // var html = '';
                if ((data.errors)) {
                    // html = '<div class="alert alert-danger">';
                    // for (var count = 0; count < data.errors.length; count++) {
                    //     html += '<p>' + '<i class="fa fa-check"></i>'+ data.errors[count] + '</p>';
                    //   }
                   for (var count =  data.errors.length-1; count >= 0 ; count--) {
                        // html += '<p>' + '<i class="fa fa-check"></i>'+ data.errors[count] + '</p>';
                      toastr.error(data.errors[count] ,'Thông Báo', {timeOut: 10000, progressBar : true })
                    }
                } else {
                  var html = '';
                      html +=   "<tr class='post" + data.data.id + "'>" +
                      "<td class='a-center'>" +
                      "<input type='checkbox' value='" +data.data.id + "' class='flat' name='table_records'>" +
                      "</td>" +
                      "<td>" + data.data.id + "</td>" +
                      "<td>" + data.data.name + "</td>" +
                      "<td>" + data.data.slug + "</td>";

                       if((data.data.status) == 1){
                          html += "<td>Hiển thị</td>";
                        }else{
                          html += "<td>Không hiển thị</td>";
                        }
                   $('.post' + data.data.id).replaceWith(" " +
                    html +
                    "<td>" + data.data.created_at + "</td>" +
                    "<td>" + data.data.updated_at + "</td>" +
                    "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.data.id + "' data-name='" + data.data.name + "' data-slug='" + data.data.slug + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.data.id + "' id = '" + data.data.id + "' data-name='" + data.data.name + "' data-slug='" + data.data.slug + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.data.id + "' data-name='" + data.data.name + "' data-slug='" + data.data.slug + "'><span class='glyphicon glyphicon-trash'></span></button></td>" +
                    "</tr>");
                      toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                      $('#myModal').modal('hide');
                     // html = '<div class="alert alert-success message" id="message" >' + data.success + '</div>';
                }
                 // $('#edit_message').html(html);
                 // setTimeout(function(){
                 //  $('#message').remove();
                 // }, 2000);
              
            },
            error: function(error) {
                alert('Loi Ajax');
            }
        });
    });
    /*================================Delete===============================================*/
    $(document).on('click', '.delete-modal', function() {
        $('.id').text($(this).data('id'));
        // var a = $('.id').text();
        // console.log(a);
        $('.name').text($(this).data('name'));
        // var a = $('.name').text();
        // console.log(a);
        $('.deleteContent').show();
        $('#deleteModal').modal('show'); 
    });
    
    $('.modal-footer').on('click', '.delete', function() {
        // var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.category.deletepost')}}',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data) {
                toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                $('.post' + $('.id').text()).remove();
                $('#deleteModal').modal('hide');
            }
        });
    });
 
    /*=============================Delete Checked================================================*/
    $('#delete_record').click(function(){
      var id = [];
      
         if(confirm("Bạn có chắc chắn muốn xóa danh mục đã chọn"))
         {
           $.each($("input[class='flat']:checked"), function(){            
                  id.push($(this).val()); 
                  // dung ham each phai di kem voi $this
              });
         }
         if((id.length) > 0)
         {
            $.ajax({
               type : 'POST',
               url  : '{{ route('admin.category.deletechecked') }}',
               data: {
                 'id' : id
                 // '_token': '{{csrf_token()}}' 
               },
               success : function(data){
                  toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                  $.each($("input[class='flat']:checked"), function(){            
                      $('.post' + $("input[class='flat']:checked").val()).remove();
                  });
               }
            });
         }
         else
         {
            alert('Ban chua chon danh muc click');
         }

          
    });

    /*=============================Jquery images thumbnai on upload ================================*/
    $('#images').on('change', function() { //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            $('#thumb-output').html(''); //clear html of output element
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file) { //loop though each file
                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file) { //trigger function on successful read
                        return function(e) {
                            var img = $('<img/ width="200px">').addClass('thumb').attr('src', e.target.result); //create image element 
                            $('#thumb-output').append(img); //append image to output element
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
        } else {
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });

    $(document).on('click', '#refresh', function() { 
     
     location.reload();

    });

});

</script>
@endsection