<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Category;
use Carbon\Carbon;
use Validator;

class AjaxController extends Controller
{
    
    public function getProducttype(Request $request)
    {
    	$producttype = ProductTyPe::where('category_id', $request->idCate)->get();
    	return response()->json($producttype,200);
    }


}
