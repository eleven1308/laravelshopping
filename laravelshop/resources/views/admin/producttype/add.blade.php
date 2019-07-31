@extends('admin.layouts.master')
@section('content')
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
              <h3 style="font-weight: bold;">Danh Mục Loại Sản Phẩm</h3>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Producttype</a></li>
                    <li class="active">Add</li>
                </ol>
         </div>
       {{--   <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                  </span>
               </div>
            </div>
         </div> --}}
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Thêm loại sản phẩm</h2>
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
                <form id="demo-form2" method="POST" action="{{route('admin.producttype.postAdd')}}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên danh mục<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="name" name="name"  value="{{ old('name') }}" class="form-control col-md-7 col-xs-12">
                            @if( $errors->has('name'))
                               <div class="row col-lg-12">
                                 <span class="required" style="color: red;">*{{ $errors->first('name') }}</span>
                               </div>
                            @endif
                           {{-- @error('title')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror --}}
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Trạng thái<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select id="status" name="status" class="form-control col-md-7 col-xs-12">
                              <option value="">--Vui Lòng Chọn--</option>
                              <option value="1">Hiện Thị</option>
                              <option value="0">Không Hiện Thị</option>
                           </select>
                           @if( $errors->has('status'))
                               <div class="row col-lg-12">
                                 <span class="required" style="color: red;">*{{ $errors->first('status') }}</span>
                               </div>
                            @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Thể loại<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select id="category_id" name="category_id" class="form-control col-md-7 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="images">Images<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="file" id="images" name="images"  class="form-control col-md-7 col-xs-12">
                           <div id="thumb-output"></div>
                           {{--  @if( $errors->has('images'))
                               <div class="row col-lg-12">
                                 <span class="required" style="color: red;">*{{ $errors->first('images') }}</span>
                               </div>
                            @endif --}}
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <a class="btn btn-primary" href="{{ route('admin.producttype.list') }}">Cancel</a>
                           <button id="add" type="submit" class="btn btn-success">Submit</button>
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
<script type="text/javascript">
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
</script>
@endsection