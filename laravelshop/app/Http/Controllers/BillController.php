<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Bill_Detail;
use DB;
class BillController extends Controller
{
    public function getBill()
    {
    	
    	$bill_detailt = Bill_Detail::paginate(7);
    	return view('admin.bill.list',compact('bill_detailt'));

    }

    public function updateBill(Request $request)
    {

    	$bill_update = Bill::where('id',$request->id)->update(['status' => 1]);
    	return response()->json(['success' => 'Xác nhận thanh toán đơn hàng thành công']);

    }

    public function deleteBill(Request $request)
    {

    	$id = $request->id;

        $bill_detailt = DB::table('bill_detail')
                        ->where('bill_id',$id)->get();
        foreach($bill_detailt as $value) {
               $data = Bill_Detail::find($value->id);
               $data->delete();
        }
        
    	return response()->json(['success' => 'Hủy đơn hàng thành công']);

    }

}	
