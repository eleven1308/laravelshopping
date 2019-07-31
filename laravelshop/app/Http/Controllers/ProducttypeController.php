<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProducttypeRequest;
use App\ProductType;
use App\Category;
use Carbon\Carbon;
use Validator;
use Auth;
use App\User;
use App\Customer;
class ProducttypeController extends Controller
{
    public function getList()
    {

    	$producttype = ProductType::orderBy('id','DESC')->paginate(6);
    	return view('admin.producttype.show', compact('producttype'));
    }

    public function getAdd()
    {
        
        $category = Category::select('name', 'id')->get();
         return view('admin.producttype.add', compact('category'));

    }

    public function postAdd(ProducttypeRequest $request)
    {
      
        if($request->hasFile('images'))
        {
          $file = $request->images;

          $file_name = $file->getClientOriginalName();

          $file_type = $file->getmimeType();
           
          $file_size = $file->getSize();

          $file_extension = $file->getClientOriginalExtension();
          // if($file_extension != 'jpg' || $file_extension !=  'png' || $file_extension != 'gif')
          // {
          //   if($file_size > 3145728)
          //   {
          //     session()->flash('error', 'Kích thước upload ảnh không quá 3M');
          //     return back();
          //   }
          //   session()->flash('error', 'Ảnh phải ở định dạng jpg, png hay gif');
          //       return back();
          // }

          $date = Carbon::now()->format('d-m-Y');  
          $new_file = $date.'_'.rand().'_'.$file_extension;
          $file->move('images/producttype', $new_file);
        }
          // $path = $new_file->store('images');
        $producttype = new ProductType();
        $producttype->name = $request->name;
        $producttype->slug = str_slug($request->name);
        $producttype->status = $request->status;
        $producttype->images =  $new_file;
        $producttype->category_id = $request->category_id;
        if($producttype->save())
        { 
            session()->flash('messages', 'Thêm Thành Công');
            return redirect()->route('admin.producttype.list');
        }
        else
        {
            return back();
        }

    }

    public function getEdit($id)
    {
        if(request()->ajax())
        {
            $producttype = ProductType::findOrFail($id);
            $category = Category::where('status', 1)->get();
            return response()->json(['producttype' => $producttype , 'category' => $category]);
        }
    
    }

    public function postEdit(Request $request)
    {
        // if(request()->ajax()){
        //     $data = $request->all();
        //     return response()->json($data);

        // }else{
        //     return response()->json([ 'Loi' => 'Kiem tra lai' ]);
        // }
        $id = $request->hidden_id;
        $image_name = $request->hidden_image;
        $image = $request->file('images');
        if($image != '')
        {
            $rules = array(
                'name'      =>  'required|min:2|max:200',
                'images'     =>  'image|max:2048'
            );
            $errorvalidate = array(
                'name.required'  => 'Bạn chưa chọn tên cho danh mục',
                'name.min' => 'Tên danh mục phải ít nhất phải chứa 2 kí tự',
                'name.max' => 'Tên danh mục tối đa 200 kí tự',
                'images.image' => 'Ảnh phải ở đạnh dang jpg ,png, gif',
                'images.max' => 'Dung lượng không được quá 2048',
            );
            $error = Validator::make($request->all(), $rules , $errorvalidate);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
            $date = Carbon::now()->format('d-m-Y');  
            $image_name = $date.'_'.rand().'_'. $image->getClientOriginalExtension();
            $image->move(public_path('images/producttype'), $image_name);
        }
        else
        {
            $rules = array(
                'name'    =>  'required'
            );
            $errorvalidate = array(
                'name.required'  => 'Bạn chưa chọn tên cho danh mục'
            );
            $error = Validator::make($request->all(), $rules, $errorvalidate);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }
        $producttype = ProductType::findOrFail($id);
        $producttype->name = $request->name;
        $producttype->slug = str_slug($request->name);
        $producttype->images = $image_name;
        $producttype->status = $request->status;
        $producttype->category_id = $request->category_id;
        $producttype->updated_at = Carbon::now();
        $producttype->save();
        return response()->json(['producttype' => $producttype, 'success' => 'Chỉnh sửa thành công']);
            
    }

    public function postDelete(Request $request)
    {
        $producttype = ProductType::findOrFail($request->id)->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }

    public function deletechecked(Request $request)
    {
       $id_array = $request->input('id');
       $category = ProductType::whereIn('id', $id_array)->delete();
       return response()->json(['success' => 'Bạn Đã Xóa Thành Công']);


    }


}
