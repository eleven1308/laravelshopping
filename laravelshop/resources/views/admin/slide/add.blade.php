@extends('admin.layouts.master')
@section('content')
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3>Danh Mục Slide</h3>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Thêm slide</h2>
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
                <form id="demo-form2" method="POST" action="{{route('admin.slide.postAdd')}}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="name" name="name"  class="form-control col-md-7 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="title" name="title"  class="form-control col-md-7 col-xs-12">
                            @if( $errors->has('title'))
                               <div class="row col-lg-12">
                                 <span class="required" style="color: red;">*{{ $errors->first('title') }}</span>
                               </div>
                            @endif
                           {{-- @error('title')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror --}}
                        </div>
                     </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="price" name="price"  class="form-control col-md-7 col-xs-12">
                            @if( $errors->has('price'))
                               <div class="row col-lg-12">
                                 <span class="required" style="color: red;">*{{ $errors->first('price') }}</span>
                               </div>
                            @endif
                           {{-- @error('title')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror --}}
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea type="text" id="description" name="description"  class="form-control col-md-7 col-xs-12"></textarea>
                            @if( $errors->has('description'))
                               <div class="row col-lg-12">
                                 <span class="required" style="color: red;">*{{ $errors->first('description') }}</span>
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
                            @if( $errors->has('images'))
                               <div class="row col-lg-12">
                                 <span class="required" style="color: red;">*{{ $errors->first('images') }}</span>
                               </div>
                            @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <a class="btn btn-warning" href="{{ route('admin.slide.list') }}"> <i class="fa fa-remove"></i>
                                        <span>Cancel</span></a>
                           <button id="add" type="submit" class="btn btn-success"> <i class="fa fa-save"></i>
                            <span>Save</span></button>
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