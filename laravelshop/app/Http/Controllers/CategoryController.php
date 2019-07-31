<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Validator;
use DB;
use Hash;
use App\Category;
use Datetime;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
   
    
    public function index()
    {
        // $test = Category::find(36)->productType;
        // dd($test);
        $datacate = Category::orderBy('id','DESC')->paginate(6);
        return view('admin.category.show', compact('datacate'));
    }


    public function postAdd(Request $request)
    {
        $rules = array(
            'name'      =>  'required|min:3|max:100|unique:category,name',
        );
        $errorvalidate = array(
            'name.required'  => 'Bạn chưa chọn tên cho danh mục thể loại',
            'name.unique'  => 'Tên danh mục đã bị trùng',
            'name.min'  => 'Tên danh mục phải chứa ít nhất 2 ký tự',
            'name.max'  => 'Tên danh mục không quá 200 kí tự'
        );
        $error = Validator::make($request->all(), $rules , $errorvalidate);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

             $data = new Category();
             $data->name = $request->name;
             $data->slug = str_slug($request->name);
             $data->status = $request->status;
             $data->created_at = new Datetime();
             $data->save();
        // Categories::create($data);

        return response()->json(['success' => 'Thêm thành công', 'data' => $data]);
    }
    
    public function editPost(Request $request)
    {
        $id = $request->hidden_id;

        $rules = array(
            'name'      =>  'required|min:3|max:100|unique:category,name',
        );
        $errorvalidate = array(
            'name.required'  => 'Bạn chưa chọn tên cho danh mục thể loại',
            'name.unique'  => 'Tên danh mục đã bị trùng',
            'name.min'  => 'Tên danh mục phải chứa ít nhất 2 ký tự',
            'name.max'  => 'Tên danh mục không quá 200 kí tự'
        );
        $error = Validator::make($request->all(), $rules , $errorvalidate);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        // $created_at = Categories::select('created_at')->whereId($id)->get();
        // $form_data = array(
        //     'id'             =>   $request->hidden_id,
        //     'name'           =>   $request->name,
        //     'slug'           =>   str_slug($request->name),
        //     'parent_id'      =>   $request->sltcate,
        //     'images'         =>   $image_name,
        //     // 'created_at'     =>   $created_at,
        //     'updated_at'     =>    new Datetime()
        // );
        $data = Category::findOrFail($id);
        $data->name = $request->name;
        $data->slug = str_slug($request->name);
        $data->status = $request->status;
        $data->updated_at =  new Datetime();
        $data->save();
        return response()->json(['data' => $data, 'success' => 'Chỉnh sửa thành công']);
            
        // $update_category = Categories::whereId($id)->update($form_data);
        // $data = Categories::select('id', 'name', 'images', 'slug', 'parent_id', 'created_at')->whereId($id)->get();

    }

    public function getEdit($id)
    {
        if(request()->ajax())
        {
            $data = Category::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    
    }

    public function deletePost(Request $request){
        
        // if(request()->ajax()){
        //     $data = $request->all();
        //      return response()->json($data);
        // }
        $cate = Category::findOrFail($request->id)->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }

    public function deletechecked(Request $request)
    {
       $id_array = $request->input('id');

       $category = Category::whereIn('id', $id_array);

       if($category->delete())
       {
           return response()->json(['success' => 'Đã Xóa Thành Công']);
       }

    

    }


}
