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
                    <li class="active">Add</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm sản phẩm</h2>
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
                        <br />
                        <form id="demo-form2" method="POST" action="{{ route('admin.product.postAdd') }}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Tên Sản Phẩm<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <input type="text" id="name"  value="{{ old('name') }}" name="name" class="form-control col-md-7 col-xs-12">
                                    @if( $errors->has('name'))
                                    <div class="row col-lg-12">
                                    <span class="required" style="color: red;">*{{ $errors->first('name') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">Mô tả sản phẩm<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <input type="text" id="title" name="title"  value="{{ old('title') }}" class="form-control col-md-7 col-xs-12">
                                    @if( $errors->has('title'))
                                    <div class="row col-lg-12">
                                    <span class="required" style="color: red;">*{{ $errors->first('title') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">Nội dung sản phẩm<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <textarea type="text" id="demo"  value="{{ old('description') }}" name="description" class="form-control col-md-7 col-xs-12"></textarea>
                                    @if( $errors->has('description'))
                                    <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('description') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="trademark">Thương hiệu<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <input type="text" id="trademark"  value="{{ old('trademark') }}" name="trademark" class="form-control col-md-7 col-xs-12"> @if( $errors->has('trademark'))
                                    <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('trademark') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                      {{--       
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">Màu Sắc<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                     <select id="color_id" name="color_id" class="select2 multiple form-control col-md-7 col-xs-12">
                                          @foreach($color as $value)
                                          <option value="{{ $value->id }}">{{ $value->name }}</option>
                                          @endforeach
                                       </select>
                                       @if( $errors->has('color_id'))
                                           <div class="row col-lg-12">
                                             <span class="required" style="color: red;">*{{ $errors->first('color_id') }}</span>
                                           </div>
                                        @endif
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Đơn giá<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <input type="text" id="util_price"   value="{{ old('util_price') }}" name="util_price" class="form-control col-md-7 col-xs-12"> @if( $errors->has('util_price'))
                                    <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('util_price') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="promotion_price">Giá khuyến mại<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <input type="text" id="promotion_price"  value="{{ old('promotion_price') }}" name="promotion_price" class="form-control col-md-7 col-xs-12"> @if( $errors->has('promotion_price'))
                                    <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('promotion_price') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Sản phẩm hot<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                  <div class="checkbox" name="is_hot" >
                                      <input type="checkbox" name="is_hot" value="1" class="flat"> Có
                                      <input type="checkbox" name="is_hot" value="0" class="flat"> Không
                                  </div>
                                    @if( $errors->has('is_hot'))
                                    <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('is_hot') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="category_id">Thể loại<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <select id="category_id" name="category_id" class="form-control col-md-7 col-xs-12 category_id">
                                        <option value="">--Vui Lòng Chọn--</option>
                                        @foreach($category as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @if( $errors->has('category_id'))
                                    <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('category_id') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="producttype_id">Danh mục sản phẩm<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <select id="producttype_id" name="producttype_id" class="form-control col-md-7 col-xs-12 producttype_id">
                                        <option value="">--Vui Lòng Chọn--</option>
                                        @foreach($producttype as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @if( $errors->has('producttype_id'))
                                    <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('producttype_id') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="images">Images<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <input type="file" id="images" name="images"  value="{{ old('images') }}" class="form-control col-md-7 col-xs-12">
                                    @if( $errors->has('images'))
                                    <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('images') }}</span>
                                    </div>
                                    @endif
                                    <div id="thumb-output"></div>
                                </div>
                            </div>

                        {{--      <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">Hình Ảnh Chi Tiết<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <div class="dropzone" id="my-dropzone" name="myDropzone">
                                        @if( $errors->has('title'))
                                        <div class="row col-lg-12">
                                        <span class="required" style="color: red;">*{{ $errors->first('title') }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="">Cancel</a>
                                    <button id="add" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <button id="add" type="submit" class="btn btn-success pull-right">
                                        <i class="fa fa-save"></i>
                                        <span>Save</span>
                                    </button>
                                    <a href="{{ route('admin.product.list') }}" class="btn btn-warning pull-right">
                                        <i class="fa fa-remove"></i>
                                        <span>Cancel</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
    <!-- footer content -->
    <footer>
        <div class="copyright-info">
            <p class="pull-right">ADMIN <a href="">Eleven</a>
            </p>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
</div>
@endsection
@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
<script type="text/javascript">

     $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    /*==============================Laydanhsachtheotheloai========================================*/
     $('.category_id').on('change', function() {

        var idCate = $(this).val();
        $.ajax({
              type: 'GET',
              url: '{{ route('admin.getProducttype')}}',
              data: {

                  'idCate': idCate
              },
              dataType: 'json',
              success: function(data) {
                  console.log(data);
                  var html ='';
                   $.each(data, function($key, value){
                       html += '<option value='+value['id']+'>'
                          html += value['name'];
                       html += '</option>';
                   });

                   $('.producttype_id').html(html);
              }
        });

     });
    /*=============================Jquery images thumbnai on upload =============================*/
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
    Dropzone.options.myDropzone= {
           url: '{{ route('admin.product.postaddDetailt') }}',
           headers: {
               'X-CSRF-TOKEN': '{!! csrf_token() !!}'
           },
           maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("image/delete") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               // return false;
               console.log(response);
            }
       }
</script>
<style>
    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
    }
</style>
@endsection