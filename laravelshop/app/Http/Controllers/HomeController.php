<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;
use App\Category;
use App\ProductType;
use App\Product;
use App\Images;
use App\Color;
use App\Slide;
use Illuminate\Support\Facades\View;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {  
        $category = Category::where('status',1)->get();
        $product = Product::where('status',1)->get();
        $product_love = Product::where('status',1)
                   ->orderBy('like', 'DESC')
                   ->get()
                   ->take(10);
        $product_phone = Product::where('category_id', 1)->get();
        $product_maytinhbang = Product::where('category_id', 2)->get();
        $product_laptop = Product::where('category_id', 3)->get();
        $product_phukien = Product::where('category_id', 4)->get();
        $producttype = ProductType::where('status',1)->get();
        $slide =  Slide::orderBy('id','DESC')->get();
        return view('pages.home',compact('category', 'product', 'producttype', 'product_phone', 'product_maytinhbang','product_laptop','product_phukien','slide','product_love'));
    }

    public function singleProduct($slug, $id)
    {   
        $array_color = array();
        $product = Product::find($id);
        // cach1 hien thi color
        // $color = DB::table('images')
        //     ->select('images.color_id')
        //     ->distinct('color_id')
        //     ->get()
        //     // ->groupBy('color_id')
        //     ->toArray();
        $color = DB::table('images')
            ->select('images.color_id')
            ->where('images.product_id', $id)
            ->get()
            ->groupBy('color_id')
            ->toArray();
        // dd($color);
        // cach2hienthicolor
        foreach ($color as $key => $value) {
             $data = Images::where('color_id', '=' , $key )->first();
             $data_color = $data->colors;
             $name_color = $data_color->name;
             array_push($array_color,$name_color);
        }
        // dd($array_color);
        $images = $product->images->toArray();
        $color_id = $images[0]['color_id'];
        $data = $images[0]['filename'];
        // dd($data);
        $images_color = Images::where('color_id', $color_id)->get();
        // dd($images);
        // $product_single = Product::find($id);
        // $product_single = DB::table('product')
        //     ->where('slug', $slug)
        //     ->orWhere('product.id', $id)
        //     ->join('images', 'product.id', '=', 'images.product_id')
        //     ->join('color', 'images.color_id', '=', 'color.id')
        //     ->select('product.*', 'images.filename', 'color.name as color_name')
        //     ->get();
        // dd($product_single);
        return view('pages.product-single', compact('images', 'product', 'images_color' ,'data', 'array_color'));
    }

    public function listProduct()
    {
        return view('pages.product');
    }

    public function __construct(){
        // if(Auth::check()){
        //     $user = Auth::user();
        //     View::share(['user' => $user]);
        // }
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        View::share(['category' => $category,'producttype' => $producttype]);
    }


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
}
