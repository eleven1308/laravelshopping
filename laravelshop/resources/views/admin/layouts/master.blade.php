<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel Shop| ADMIN </title>
  <!-- Bootstrap core CSS -->
  <link href="{{ url('admin/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ url('admin/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ url('admin/css/animate.min.css') }}" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="{{ url('admin/css/custom.css')}}" rel="stylesheet">
  <link href="{{ url('admin/css/icheck/flat/green.css') }}" rel="stylesheet" />
  <link href="{{ url('admin/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ url('admin/css/floatexamples.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ url('admin/js/jquery.min.js') }}"></script>
  <script src="{{ url('admin/js/nprogress.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> --}}
  <link rel="stylesheet" type="text/css" href="{{ url('admin/css/toastr.css') }}">
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="nav-md">

  <div class="container body">

    <div class="main_container">

      @include('admin.layouts.menu') 
      <!-- top navigation -->
      @include('admin.include.nav_bar') 
      <!-- /top navigation -->
      <!-- page content -->
      @yield('content')
      <!-- /page content -->

    </div>
  </div>
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="{{ url('admin/js/bootstrap.min.js')}}"></script>
   <script src =" https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js "></script>
  <!-- bootstrap progress js -->
  <script src="{{ url('admin/js/progressbar/bootstrap-progressbar.min.js') }}"></script>
  <script src="{{ url('admin/js/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <!-- icheck -->
  <script src="{{ url('admin/js/icheck/icheck.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ url('admin/js/datepicker/daterangepicker.js') }}" type="text/javascript" ></script>
  <script type="text/javascript"  src="{{ url('admin/js/toastr.min.js')}}"></script>
  <script type="text/javascript"  src="{{ url('admin/js/select2.min.js')}}"></script>
  <script src="{{ url('admin/js/custom.js')}}"></script>
  <script src="{{ url('admin/ckeditor/ckeditor.js')}}"></script>
  <script src="{{ url('admin/ckeditor/ckeditor.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
  <script type="text/javascript">
       CKEDITOR.replace('demo');
  </script>
  <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
  @if(session()->has('error'))
      <script type="text/javascript">
        toastr.error('{{ session()->get('error') }}', 'Thông Báo',  {timeOut: 5000, progressBar : true })
      </script>
  @endif
  @if(session()->has('messages'))
      <script type="text/javascript">
        toastr.success('{{ session()->get('messages') }}', 'Thông Báo',  {timeOut: 5000, progressBar : true })
      </script>
  @endif
  <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /select2 -->

  <!-- input tags -->
  <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    // $('#tags_1').tagsinput({
    //     width: 'auto'
    //   });
  </script>
  <!-- /input tags -->
  <!-- form validation -->
  <script type="text/javascript">
    $(document).ready(function() {

      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      // $.listen('parsley:field:validate', function() {
      //   validateFront();
      // });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /form validation -->
  <!-- editor -->
  <script>
    $(document).ready(function() {
      $('.xcxc').click(function() {
        $('#descr').val($('#editor').html());
      });
    });

    $(function() {
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
          ],
          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function(idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
          container: 'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
          })
          .change(function() {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
          })
          .keydown('esc', function() {
            this.value = '';
            $(this).change();
          });

        $('[data-role=magic-overlay]').each(function() {
          var overlay = $(this),
            target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange" in document.createElement("input")) {
          var editorOffset = $('#editor').offset();
          $('#voiceBtn').css('position', 'absolute').offset({
            top: editorOffset.top,
            left: editorOffset.left + $('#editor').innerWidth() - 35
          });
        } else {
          $('#voiceBtn').hide();
        }
      };

      function showErrorAlert(reason, detail) {
        var msg = '';
        if (reason === 'unsupported-file-type') {
          msg = "Unsupported format " + detail;
        } else {
          console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
          '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
      };
      initToolbarBootstrapBindings();
      // $('#editor').wysiwyg({
      //   fileUploadError: showErrorAlert
      // });
      window.prettyPrint && prettyPrint();
    });
  </script>

@yield('script')
{{--   <script src="admin/js/myjs.js"></script> --}}
</body>

</html>
