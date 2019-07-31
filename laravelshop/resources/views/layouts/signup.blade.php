@extends('login')
@section('content')
<div class="login-form-container" id="login-form">
   <div class="login-form-content">
      <div class="login-form-header">
         <div class="logo">
            <img style="width: 90px;" src="images/logo.jpg"/>
         </div>
         <h3>Đăng ký tài khoản</h3>
      </div>
      <form method="POST" action="{{ route('postRegister') }}" class="login-form">
        @csrf
         <div class="input-container">
            <i class="fa fa-user"></i>
            <input type="name" class="input" name="name" placeholder="Nhập họ tên"/>
         </div>
            @if( $errors->has('name'))
              <div class="row col-lg-12">
                <span class="required" style="color: red;">*{{ $errors->first('name') }}</span>
              </div>
            @endif
         <div class="input-container">
            <i class="fa fa-envelope"></i>
            <input type="email" class="input" name="email" placeholder="Nhập email"/>
         </div>
            @if( $errors->has('email'))
              <div class="row col-lg-12">
                <span class="required" style="color: red;">*{{ $errors->first('email') }}</span>
              </div>
            @endif
         <div class="input-container">
            <i class="fa fa-lock"></i>
            <input type="password"  id="login-password" class="input" name="password" placeholder="Nhập mật khẩu"/>
            <i id="show-password" class="fa fa-eye"></i>
         </div>
            @if( $errors->has('password'))
              <div class="row col-lg-12">
                <span class="required" style="color: red;">*{{ $errors->first('password') }}</span>
              </div>
            @endif
         <div class="input-container">
            <i class="fa fa-lock"></i>
            <input type="password"  id="login-password" class="input" name="re-password" placeholder="Nhập lại mật khẩu"/>
            <i id="show-password" class="fa fa-eye"></i>
         </div>
            @if( $errors->has('re-password'))
              <div class="row col-lg-12">
                <span class="required" style="color: red;">*{{ $errors->first('re-password') }}</span>
              </div>
            @endif
        {{--  <div class="rememberme-container">
            <input type="checkbox" name="rememberme" id="rememberme"/>
            <label for="rememberme" class="rememberme"><span>Lưu thông tin đăng nhập</span></label>
         </div> --}}
         <input type="submit" value="Đăng ký" class="button"/>
          <div class="separator">
         <span class="separator-text">Có tài khoản?</span>
         </div>
          <a href="login" class="register">Đăng nhập</a>
      </form>
     
     
       <div class="separator">
         <span class="separator-text">OR</span>
      </div>
      <div class="socmed-login">
         <a href="login/facebook" class="socmed-btn facebook-btn">
         <i class="fa fa-facebook"></i>
         <span>Login with Facebook</span>
         <a>
         <a href="#g-plus" class="socmed-btn google-btn">
         <i class="fa fa-google"></i>
         <span>Login with Google</span>
         <a>
      </div>
   </div>
</div>
@endsection