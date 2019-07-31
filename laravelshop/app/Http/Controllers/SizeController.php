<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
use App\Images;
use DB;
use Datetime;
use Validator;
class SizeController extends Controller
{

   public function getSize()
   {
     return view('admin.size.show');
   }


   public function postSize(Request $request)
   {
        $rules = array(
            'number_size'      =>  'required|unique:size,number_size',
            'quantity'     =>  'required'
        );
        $errorvalidate = array(
            'number_size.required'  => 'Bạn chưa chọn số size',
            'number_size.unique'        =>  'Tên size đã bị trùng',
            'quantity.required' => 'Bạn chưa chọn số lượng'
        );
        $error = Validator::make($request->all(), $rules , $errorvalidate);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $size = array(
	            'number_size'   =>   $request->number_size,
	            'quantity'      =>   $request->quantity,
	            'description'   =>   $request->description,
	            'created_at'    =>   new Datetime(),
          );
         $data = DB::table('size')->insert($size);
         return response()->json(['success' => 'Đã Thêm Thành Công', 'data' => $size]);
        // $size = new Size();
        // $size->number_size = $request->number_size;
        // $size->quantity = $request->quantity;
        // $size->description = $request->description;
        // $size->save();
        // return response()->json(['success' => 'Đã Thêm Thành Công']);
   }




    
}
