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
                    <li class="active">Adddetailt</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm chi tiết sản phẩm</h2>
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
                        <form id="demo-form2" method="POST" action="{{ route('admin.product.postaddDetailt', ['id' => $product->id]) }}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">Sản phẩm<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <h2 style="font-weight: bold;" >{{ $product->name }}</h2>
                                       @if( $errors->has('category_id'))
                                           <div class="row col-lg-12">
                                             <span class="required" style="color: red;">*{{ $errors->first('category_id') }}</span>
                                           </div>
                                        @endif
                                </div>
                            </div>
                       {{--      
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">Hình ảnh<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <h2><img src={{ URL::to('/') }}/images/product/{{$product->images}}  class='img-thumbnail' /></h2>
                                       @if( $errors->has('category_id'))
                                           <div class="row col-lg-12">
                                             <span class="required" style="color: red;">*{{ $errors->first('category_id') }}</span>
                                           </div>
                                        @endif
                                </div>
                            </div>
 --}}
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">Màu Sắc<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                     <select id="color_id" name="color_id" class="form-control col-md-7 col-xs-12">
                                          <option value="">--Vui Lòng Chọn--</option>
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
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">Hình Ảnh Chi Tiết<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <div class="dropzone" id="my-dropzone" name="myDropzone">
                                        
                                    </div>
                                  {{--   @if( $errors->has('file'))
                                           <div class="row col-lg-12">
                                             <span class="required" style="color: red;">*{{ $errors->first('file') }}</span>
                                           </div>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-4 col-xs-12">
                                    <button type="submit" class="btn btn-success pull-right">
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
    {{-- <script src="{{ asset('admin/dist/js/dropzone.js') }}"></script> --}}
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                // console.log(name);
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ route('productdetailt.deleteclient') }}',
                    data: {filename: name},
                    success: function (data){
                        console.log(data);
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
                // var test = []
                var name = file.upload.filename;
                console.log(name);
                $('.dropzone').append('<input type="hidden" value="'+name +'" name="images_hidden[]" id="images_hidden">');

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