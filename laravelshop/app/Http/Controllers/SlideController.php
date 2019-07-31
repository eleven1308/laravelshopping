<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\SlideRequest;
use Carbon\Carbon;

class SlideController extends Controller
{

	public function getList()
    {

    	$slide = Slide::orderBy('id','DESC')->get();
    	return view('admin.slide.show', compact('slide'));
    }

    public function getAdd()
    {
        
        return view('admin.slide.add');

    }

    public function postAdd(SlideRequest $request)
    {
      // dd($request->all());
        if($request->hasFile('images'))
        {
          $file = $request->images;

          $file_name = $file->getClientOriginalName();

          $file_type = $file->getmimeType();
           
          $file_size = $file->getSize();

          $file_extension = $file->getClientOriginalExtension();
          $date = Carbon::now()->format('d-m-Y');  
          $new_file = $date.'_'.rand().'_'.$file_extension;
          $file->move('images/slide', $new_file);
        }
          // $path = $new_file->store('images');
        $slide = new slide();
        $slide->name = $request->name;
        $slide->title = $request->title;
        $slide->price = $request->price;
        $slide->description = $request->description;
        $slide->images =  $new_file;
        if($slide->save())
        { 
            session()->flash('messages', 'Thêm Thành Công');
            return redirect()->route('admin.slide.list');
        }
        else
        {
            return back();
        }

    }

    public function postDelete(Request $request)
    {
        $slide = Slide::findOrFail($request->id)->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }

    public function deletechecked(Request $request)
    {
       $id_array = $request->input('id');
       $slide = Slide::whereIn('id', $id_array)->delete();
       return response()->json(['success' => 'Bạn Đã Xóa Thành Công']);

    }
    
}
