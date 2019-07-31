@extends('login')
@section('content')
<div class="login-form-container" id="login-form">
   <div class="login-form-content">
      <div class="login-form-header">
         <div class="logo">
            <img style="width: 90px;" src="images/logo.jpg"/>
         </div>
         <h3>Đăng nhập</h3>
      </div>
      <form method="post" action="{{ route('postLogin') }}" class="login-form">
         @csrf
         <div class="input-container">
            <i class="fa fa-envelope"></i>
            <input type="email" class="input" name="email" placeholder="Nhập email"/>
         </div>
         <div class="input-container">
            <i class="fa fa-lock"></i>
            <input type="password"  id="login-password" class="input" name="password" placeholder="Nhập mật khẩu"/>
            <i id="show-password" class="fa fa-eye"></i>
         </div>
         <div class="rememberme-container">
            <input type="checkbox" name="rememberme" id="rememberme"/>
            <label for="rememberme" class="rememberme"><span>Lưu thông tin đăng nhập</span></label>
            <a class="forgot-password" href="#">Quên mật khẩu?</a>
         </div>
         <input type="submit" name="signin" value="Đăng nhập" class="button"/>
         <a href="register" class="register">Đăng ký</a>
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