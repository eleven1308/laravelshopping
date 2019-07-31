<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/bgimg.css"/>
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font.css"/>
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <script type="text/javascript" src="js/vendor/jquery-3.4.1.min.js"></script>
  <!--   <script type="text/javascript" src="js/main.js"></script> -->
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css/toastr.css') }}">
</head>
<body>
  <div class="background"></div>
  <div class="backdrop"></div>
   @yield('content')
@if(session()->has('messages'))
  <script type="text/javascript">
    toastr.success('{{ session()->get('messages') }}', 'Thông Báo',  {timeOut: 5000, progressBar : true })
  </script>
@endif
<script type="text/javascript"  src="{{ url('admin/js/toastr.min.js')}}"></script>
</body>

</html>