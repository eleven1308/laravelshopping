<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Cart;
use Auth;
use App\User;
use App\Category;
use App\ProductType;
use App\Product;

class ShoppingCartController extends Controller
{
   public function __construct(){
        // if(Auth::check()){
        //     $user = Auth::user();
        //     View::share(['user' => $user]);
        // }
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        View::share(['category' => $category,'producttype' => $producttype]);
    }

    public function getList()
    {
      $cart = cart::content();
      $price = str_replace(',', '', Cart::subtotal());
      return view('cart.index', compact('cart', 'price'));
    }
    public function getaddCart(Request $request)
    {
      if($request->ajax())
      {
        $id = $request->id;
        $product = Product::find($id);
        if($request->qty){
         $qty = $request->qty;
        }else{
         $qty = 1;
        }

        if($product->promotion_price > 0){
         $price = $product->promotion_price;
        }else{
         $price = $product->util_price;
        }
        $cart = ['id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $price, 'weight' => 550, 'options' => ['img' => $product->image, 'trademark' => $product->trademark ]];
        $data_cart = Cart::add($cart);
        $count_cart = Cart::count();
      // // dd(Cart::content());
        return response()->json(['count_cart' => $count_cart, 'success' => 'Thêm giỏ hàng thành công'], 200);
      }
    }

    public function getupdateCart(Request $request)
    {
      if($request->qty <= 0){
          return response()->json(['error' => 'Số lượng sản phẩm tối thiểu phải bằng 1'  ]);
      }else{
       $update_cart = Cart::update($request->rowId, $request->qty);
       // $data = Cart::find($request->rowId);
          return response()->json(['success' => 'Update thành công']);
      }
    }

    public function getdeleteCart(Request $request)
    {
      if(request()->ajax()){

        Cart::remove($request->rowId);
          return response()->json(['success' => 'Xóa thành công thành công']);
      }

    }

    public function cartLove(Request $request)
    {

      if(request()->ajax()){
        $id = $request->id;
        // $data_like = Product::find($id);
        // $test = $data_like->like;
        // $test++;
        // $data = Product::where('id', $id)->update(['like' => $test]);
        // return response()->json($test);
          $data_like = Product::where('id', $id)->get();
          foreach ($data_like as $value) {
            $like = $value->like;
            $like++;
            $update_like = $value->update(['like' => $like]);
          }

          return response()->json([ 'data' => $update_like, 'success' => 'Đã thêm vào sản phẩm yêu thích'], 200);
      }

    }
    public function checkout()
    {
      $user = Auth::user();
      if($user)
      {
        $price = str_replace(',', '', Cart::subtotal());
        return view('cart.checkout',compact('user','price'));
      }else{
        return back()->with('error', 'Vui lòng đăng nhập để tiếp tục');
      }
     
    }    

}

