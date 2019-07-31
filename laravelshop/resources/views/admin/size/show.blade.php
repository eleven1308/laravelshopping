@extends('admin.layouts.master')
@section('content')
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3>Size</h3>
         </div>
         <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Size content</h2>
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
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
{{--                      <input type="hidden" name="_token" value="{{csrf_token()}}">
 --}}                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Number_Size<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="number_size" name="number_size"  class="form-control col-md-7 col-xs-12">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Số lượng<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="quantity" name="quantity"  class="form-control col-md-7 col-xs-12">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea type="text" id="description" name="description"  class="form-control col-md-7 col-xs-12">
                           </textarea>
                        </div>
                     </div>
                  </form>
                     <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <button class="btn btn-primary">Cancel</button>
                           <button id="add" class="btn btn-success">Submit</button>
                        </div>
                     </div>
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
@section('script')
<script type="text/javascript">
   $.ajaxSetup({
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });

   $(document).ready(function(){
       $(document).on('click', '#add', function() {
            var number_size = $('#number_size').val();
            var quantity = $('#quantity').val();
            var description = $('#description').val();
         $.ajax({
            url  : '{{ route('admin.size.postSize')}}', 
            type : 'POST',
            data : {
               'number_size' : number_size,
               'quantity' : quantity,
               'description' : description
            },
            // dataType : 'json',
            success : function(data){
               console.log(data.data);
                  if(data.errors)
                  {
                       for (var count =  data.errors.length-1; count >= 0 ; count--) {
                            toastr.error(data.errors[count] ,'Thông Báo', {timeOut: 10000, progressBar : true })
                          }
                  }
                  else
                  {         
                            $('#number_size').val('');
                            $('#quantity').val('');
                            $('#description').val('');
                            toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
                            
                  }      
                  
            }

          });
       });
   });

</script>
@endsection
@endsection