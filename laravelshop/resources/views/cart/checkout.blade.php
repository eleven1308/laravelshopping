@extends('layouts.master')
@section('content')
<div class="breadcrumbs-section plr-200 mb-80">
   <div class="breadcrumbs overlay-bg">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div class="breadcrumbs-inner">
                  <h1 class="breadcrumbs-title">Checkout</h1>
                  <ul class="breadcrumb-list">
                     <li><a href="index.html">Home</a></li>
                     <li>Checkout</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- BREADCRUMBS SETCTION END -->
<!-- Start page content -->
<section id="page-content" class="page-wrapper">
   <!-- SHOP SECTION START -->
   <div class="shop-section mb-80">
      <div class="container">
         <div class="row">
            <div class="col-md-2">
              <ul class="cart-tab">
                  <li>
                     <a href="#shopping-cart" data-toggle="tab">
                     <span>01</span>
                     Đơn hàng
                     </a>
                  </li>
                  <li>
                     <a class="active" href="#checkout" data-toggle="tab">
                     <span>02</span>
                     Thanh toán
                     </a>
                  </li>
                  <li>
                     <a href="#order-complete" data-toggle="tab">
                     <span>03</span>
                     Xác nhận thanh toán
                     </a>
                  </li>
               </ul>
            </div>
            <div class="col-md-10">
               <!-- Tab panes -->
               <div class="tab-content">
                  <!-- checkout start -->
                  <div class="tab-pane active" id="checkout">
                     <div class="checkout-content box-shadow p-30">
                        <form action="#">
                           <div class="row">
                              <!-- billing details -->
                              <div class="col-md-6">
                                 <div class="billing-details pr-10">
                                    <h6 class="widget-title border-left mb-20">Thông tin khách hàng</h6>
                                    <div>
                                       <label class="">Tên khách hàng</label><span class="required customer_error">(*)</span>
                                       <input type="text" class="name"  value="{{ old('name') }}" name="name" placeholder="Nhập tên của bạn ở đây">
                                       <span class="name_error" style="color: red;"></span>
                                    </div>
                                    <div>
                                       <label>Địa chỉ email</label><span class="required customer_error">(*)</span>
                                       <input type="text" class="email"  value="{{ old('email') }}" name="email"  placeholder="Nhập địa chỉ email của bạn ở đây">
                                       <span class="email_error" style="color: red;"></span>
                                    </div>
                                    <div>
                                       <label>Số điện thoại</label><span class="required customer_error">(*)</span>
                                       <input type="text" class="phone_number"  value="{{ old('phone_number') }}" name="phone_number" placeholder="Nhập số điện thoại của bạn ở đây">
                                       <span class="phone_numbererror" style="color: red;"></span>
                                    </div>
                                    <div>
                                       <label>Giới tính</label><span class="required customer_error">(*)</span>
                                       <select class="custom-select gender" class="gender">
                                          <option value="">--Vui lòng chọn--</option>
                                          <option value="0">Nam</option>
                                          <option value="1">Nữ</option>
                                       </select>
                                       <span class="gender_error" style="color: red;"></span>
                                    </div>
                                    <div>
                                       <label>Địa chỉ liên hệ</label><span class="required customer_error">(*)</span>
                                       <textarea class="custom-textarea address"  value="{{ old('address') }}" name="address" placeholder="Nhập địa chỉ liên hệ ở đây">
                                       </textarea>
                                       <span class="addressError" style="color: red;"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <!-- our order -->
                                 <div class="payment-details pl-10 mb-50">
                                    <h6 class="widget-title border-left mb-20">Chi tiết hóa đơn</h6>
                                    <table>
                                       <tr>
                                          <td class="td-title-1">Tổng tiền</td>
                                          <td class="td-title-2">{{ number_format($price)}}</td>
                                       </tr>
                                       <tr>
                                          <td class="td-title-1">Giảm giá</td>
                                          <td class="td-title-2">Không</td>
                                       </tr>
                                       <tr>
                                          <td class="td-title-1">Phí vận chuyển</td>
                                          <td class="td-title-2">{{ number_format(50000) }}</td>
                                       </tr>
                                       <tr>
                                          <td class="order-total">Tổng thanh toán </td>
                                          <td class="order-total-price paytotal">{{ number_format($price + 50000)}}</td>
                                       </tr>
                                    </table>
                                 </div>
                                 <!-- payment-method -->
                                 <div class="payment-method">
                                    <h6 class="widget-title border-left mb-20">Phương thức thanh toán</h6>
                                    <div id="accordion">
                                       <div class="panel">
                                          <h4 class="payment-title box-shadow">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#bank-transfer" >
                                             Giao hàng theo địa chỉ có sẵn
                                             </a>
                                          </h4>
                                          <div id="bank-transfer" class="panel-collapse collapse in" >
                                             <div class="payment-content">
                                                <p>Chúng tôi sẽ giao đến địa chỉ này cho bạn</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel">
                                          <h4 class="payment-title box-shadow">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                             Chuyển trực tiếp qua ngân hàng
                                             </a>
                                          </h4>
                                          <div id="collapseTwo" class="panel-collapse collapse">
                                             <div class="payment-content">
                                                <p>Bạn phải ra ngân hàng để thanh toán vào STK</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel">
                                          <h4 class="payment-title box-shadow">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >
                                             PayPal
                                             </a>
                                          </h4>
                                          <div id="collapseThree" class="panel-collapse collapse" >
                                             <div class="payment-content">
                                                <p>Dùng thẻ paypal để thanh toán.</p>
                                                <ul class="payent-type mt-10">
                                                   <li><a href="#"><img src="img/payment/1.png" alt=""></a></li>
                                                   <li><a href="#"><img src="img/payment/2.png" alt=""></a></li>
                                                   <li><a href="#"><img src="img/payment/3.png" alt=""></a></li>
                                                   <li><a href="#"><img src="img/payment/4.png" alt=""></a></li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- payment-method end -->
                              </div>
                           </div>
                        </form>
                        <button class="submit-btn-1 mt-30 btn-hover-1 order" >Tiến hành thanh toán</button>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- SHOP SECTION END -->             
</section>
@endsection
<!-- End page content