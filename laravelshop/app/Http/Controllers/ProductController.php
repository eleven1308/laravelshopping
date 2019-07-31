<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Category;
use App\Product;
use App\Color;
use App\Images;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductdetailtRequest;
use Carbon\Carbon;
use Validator;
class ProductController extends Controller
{
  
    public function getList()
    {

    	$product = Product::orderBy('id','DESC')->paginate(5);
    	return view('admin.product.show', compact('product'));
    }

    public function getAdd()
    {

    	$category = Category::all();
    	$producttype = ProductType::all();
        return view('admin.product.add', compact('producttype','category'));

    }


    public function postAdd(ProductRequest $request)
    {     
          // $data = $request->all();
          // dd($data);
        
          $file = $request->images;

          $file_name = $file->getClientOriginalName();

          $file_type = $file->getmimeType();
           
          $file_size = $file->getSize();

          $file_extension = $file->getClientOriginalExtension();
          $date = Carbon::now()->format('d-m-Y');  
          $new_file = $date.'_'.rand().'_'.$file_extension;
          $file->move('images/product', $new_file);
        
          // $path = $new_file->store('images');
        $product = new Product();
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->trademark = $request->trademark;
        $product->util_price = $request->util_price;
        $product->promotion_price = $request->promotion_price;
        $product->status = 0;
        $product->is_hot = $request->is_hot;
        $product->image =  $new_file;
        $product->category_id = $request->category_id;
        $product->producttype_id = $request->producttype_id;
        $product->save();
        session()->flash('messages', 'Thêm Thành Công');
        return redirect()->route('admin.product.list');
    

    }

    public function getaddDetailt($id)
    {
        $color = Color::select('id', 'name')->get();
        $product = Product::find($id);
        return view('admin.product.adddetailt',compact('color', 'product'));

    }


    public function postaddDetailt(Request $request)
    {     
        $product_id = $request->id;
        $data = Product::find($product_id);
        $path = 'images/product/productdetailt';
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $imageFiles = $request->file('file');
                $url_image = $path . '/' . $imageFiles->getClientOriginalName();
                // set destination path
                $destinationFileName = $imageFiles->getClientOriginalName();
                $imageFiles->move($path, $destinationFileName);
            }
        }
        // $this->validate($request,
        //   [
        //       'color_id' => 'required', 
        //   ],
        //   [
        //       'required' => 'Màu sắc không được để trống',
        //   ]
        // );
        $images_hidden = [];
        $images_hidden = $request->images_hidden;
        if(is_array($images_hidden)){
          foreach($images_hidden as $data){
            $url_image = $path . '/' . $data; 
            $imageUpload = new Images();
            $imageUpload->filename = $data;
            $imageUpload->url_image = $url_image;
            $imageUpload->product_id = $request->id;
            $imageUpload->color_id = $request->color_id;
            $imageUpload->created_at = new Carbon();
            $imageUpload->updated_at = new Carbon();
            if($imageUpload->save()){
              Product::where('id', $product_id)->update(['status' => 1]);
            }
              //Do something.
          }

          session()->flash('messages', 'Thêm Thành Công');
          return redirect()->route('admin.product.list');
      }


    }

    public function fileDestroy(Request $request)
    {
        $path = 'images/product/productdetailt';
        $filename =  $request->get('filename');
        $path= $path.'/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }






    public function postDelete(Request $request)
    { 
        $images_product = Images::where('product_id', $request->id)->get();
        foreach ($images_product as $value) {
            $value->delete();
        }
        $product = Product::findOrFail($request->id)->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }


}
