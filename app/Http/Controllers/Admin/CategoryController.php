<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller implements ICRUD
{
    //
    public function list(){
        $list = Category:: orderBy('id','ASC')->paginate($this->paginateItems);
        // dd(count($list));
        return view('be.category.list',compact('list'));
        
    }

    
    public function add(){
        $categories = Category:: all();
        return view('be.category.add',compact('categories'));
    }




    public function doAdd(Request $request){
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Tên danh mục không được để trống',
        ]);

        try {
            $data = $request ->all();
            unset($data['_token']);
            Category::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Thêm mới thất bại');
        }
        return redirect()->back()->with('success','Thêm mới thành công');

    }
    


    public function edit($id){
       $obj = Category:: find($id);
       $categories = Category::where('id','<>',$id)->get();
    //    dd($obj);
        return view('be.category.edit',compact('obj','categories'));
    }

    public function doEdit($id,Request $request){  
    
      $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Tên danh mục không được để trống',
        ]);

        try {
            $data = $request ->all();
            unset($data['_token']);
            Category::where('id',$id)->update($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Cập nhật thất bại');
        }
        return redirect()->back()->with('success','Cập nhật thành công');     
        
     }




    public function delete($id){

        try {
            Category::where('id',$id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }
}
