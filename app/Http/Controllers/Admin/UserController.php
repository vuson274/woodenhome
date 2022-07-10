<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller implements ICRUD
{
    
    public function list(){
        $list = User:: orderBy('id','ASC')->paginate($this->paginateItems);
        // dd(count($list));
        return view('be.user.list',compact('list'));
        
    }

    
    public function add(){

        return view('be.user.add');
    }




    public function doAdd(Request $request){
        $request->validate([
            'email'=>'required|email|',
            'name'=>'required',
            'password'=>'required|min:8',
            'phone'=>'required|numeric',
        ],[
            'email.required' =>'email không được để trống',
            'email.email'=>'email không đúng đinh dạng',
            'name.required'=>'Tên không được để trống',
            'password.required'=>'mật khẩu không được để trống',
            'password.min'=> 'mật khẩu ít nhất phải có 8 ký tự',
            'phone.required'=> 'số điện thoại không được để trống',
            'phone.numeric' => 'số điện thoại chưa đúng định dạng',
        ]);

        try {
            $data = $request ->all();
            $data['password']= Hash::make($data['password']);
            unset($data['_token']);
            User::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Thêm mới thất bại');
        }
        return redirect()->back()->with('success','Thêm mới thành công');

    // $data = $request ->all();
    // $data['password']= Hash::make($data['password']);
    // unset($data['_token']);
    // // dd($data);
    // User::create($data);
    }
    


    public function edit($id){
       $obj = User:: find($id);
    //    dd($obj);
        return view('be.user.edit',compact('obj'));
    }

    public function doEdit($id,Request $request){  
    
        $request->validate([
            'email'=>'required|email',
            'name'=>'required',
            'password'=>'required|min:8',
            'phone'=>'required|numeric',
        ],[
            'email.required' =>'email không được để trống',
            'email.email'=>'email không đúng đinh dạng',
            'name.required'=>'Tên không được để trống',
            'password.required'=>'mật khẩu không được để trống',
            'password.min'=> 'mật khẩu ít nhất phải có 8 ký tự',
            'phone.required'=> 'số điện thoại không được để trống',
            'phone.numeric' => 'số điện thoại chưa đúng định dạng',
        ]);

        try {
            $data = $request ->all();
            $data['password']= Hash::make($data['password']);
            unset($data['_token']);
            User::where('id',$id)->update($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Cập nhật thất bại');
        }
        return redirect()->back()->with('success','Cập nhật thành công');     
        
     }




    public function delete($id){

        try {
            User::where('id',$id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }

}
