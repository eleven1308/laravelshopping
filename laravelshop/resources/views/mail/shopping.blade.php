<base href="{{ asset('') }}">
<div class="tab-pane" id="order-complete">
   <div class="order-complete-content box-shadow">
      <div class="thank-you p-30 text-center">
         <h6 class="text-black-5 mb-0">Cảm ơn {{ $bill->name }}. Đơn hàng của bạn đã được nhận.</h6>
      </div>
      <div class="order-info p-30 mb-10">
         <ul class="order-info-list">
            <li>
               <h6>Mã đơn hàng</h6>
               <p>{{ $bill->code_order }}</p>
            </li>
         </ul>
      </div>
      <div class="row">
         <!-- our order -->
         <div class="col-md-6">
            <div class="payment-details p-30">
               <h6 class="widget-title border-left mb-20">Danh sách đơn hàng</h6>
               <table>
               @foreach($billdetail as $b)
                  <tr>
                     <td class="td-title-1">{{ $b->product->name }}</td>
                     <td class="td-title-2">{{ $b->price}}</td>
                  </tr>
               @endforeach
                  <tr>
                     <td class="order-total">Tổng thanh toán</td>
                     <td class="order-total-price">{{ $b->subtotal }}</td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="col-md-6">
            <div class="bill-details p-30">
               <h6 class="widget-title border-left mb-20">billing details</h6>
               <ul class="bill-address">
                  <li>
                     <span>Address:</span>
                     28 Green Tower, Street Name, New York City, USA
                  </li>
                  <li>
                     <span>email:</span>
                     info@companyname.com
                  </li>
                  <li>
                     <span>phone : </span>
                     (+880) 19453 821758
                  </li>
               </ul>
            </div>
            <div class="bill-details pl-30">
               <h6 class="widget-title border-left mb-20">billing details</h6>
               <ul class="bill-address">
                  <li>
                     <span>Address:</span>
                     28 Green Tower, Street Name, New York City, USA
                  </li>
                  <li>
                     <span>email:</span>
                     info@companyname.com
                  </li>
                  <li>
                     <span>phone : </span>
                     (+880) 19453 821758
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>