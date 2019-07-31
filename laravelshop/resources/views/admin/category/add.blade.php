@extends('admin.layouts.master') 
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 style="font-weight: bold;">Danh Mục Thể Loại</h3>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li class="active">Add</li>
                </ol>
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
                        <h2>Thêm <small>Danh mục sản phẩm</small></h2>
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
                      @if(count($errors) > 0)
                                <div class="alert alert-danger col-md-6" >
                                    @foreach($errors->all() as $err)
                                    <i class="fa fa-check"></i> {{$err}}
                                    <br> @endforeach
                                </div>
                      @endif
                      @if (Session::has('messages'))
                                 <div class="alert alert-success">
                                    <strong>Notification:</strong> {{ Session::get('messages') }}            
                                 </div>
                      @endif
                    <div class="x_content">
                        <br />

                        
                          <br />
                        <form id="demo-form2" action="{{ route('admin.category.postAdd') }}" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên danh mục <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="name" type="text" id="first-name" value="{!! old('name') !!}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                           {{--  <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Slug <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name" name="last-name"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> --}}

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh mục cha<span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="sltcate" >
                                  <option value="0">---Danh mục gốc---</option>
                                  <?php menuMuti($data, 0, $str= "--|", old('sltcate')) ?>
                                  <br />
                                </select>
                              </div>
                            </div>
                            
                            {{-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female" checked=""> Female
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                           {{--  <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                </div>
                            </div> --}}
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

       {{--  <script type="text/javascript">
            $(document).ready(function() {
                $('#birthday').daterangepicker({
                    singleDatePicker: true,
                    calender_style: "picker_4"
                }, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });
            });
        </script> --}}

    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <div class="copyright-info">
            <p class="pull-right">ELEVEN <a href="">eleven130896@gmail.com</a>
            </p>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

</div>

@endsection