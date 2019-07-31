<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Customer;
use App\Bill;
use Carbon\Carbon;
use App\Http\Requests\CustomerRequest;
use App\Bill_Detail;
use Cart;
use Mail;
use App\Mail\ShoppingMail;
class CustomerController extends Controller
{
    public function postAdd(CustomerRequest $request)
    {
    	if($request->ajax()){
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['code_order'] = 'order'.rand();
            $data['status'] = 0;
            $data['active'] = 0;
            $data['phone'] = $request->phone_number;
            $data['date_order'] = Carbon::now();
            $data['payment'] = str_replace(',', '', $request->paytotal);
            $data_customer = Customer::create($data);
            $customer_id = $data_customer->id;
            $data['customer_id'] = $customer_id;
            $bill = Bill::create($data);
            $billdetail = [];
            $billdetails = []; 
            foreach( Cart::content() as $key => $cart ){
                $billdetail['bill_id'] = $bill->id;
                $billdetail['product_id'] = $cart->id;
                $billdetail['quantity'] = $cart->qty;
                $billdetail['unit_price'] = $cart->price;
                $billdetails[$key] = Bill_Detail::create($billdetail);
                // Mail::to($bill->email)->send(new ShoppingMail($bill,$billdetails));
                Cart::destroy();
            }
          //   Customer::create($data);
            return response()->json('Thanh toán thành công',200);
        }
    	$data = $request->all();
    	$data['user_id'] = Auth::user()->id;
    }

 
}
