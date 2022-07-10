<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;

class ProductController extends Controller implements ICRUD
 {
    public function list(){
        $list = Product:: orderBy('id','ASC')->paginate($this->paginateItems);
        // dd(count($list));
        return view('be.product.list',compact('list'));
    }

    public function add(){
        $categories = Category:: all();
        $discounts = Discount:: all();
        return view('be.product.add',compact('categories','discounts'));
    }

    public function doAdd(Request $request){
        // kiểm tra file ảnh
        $files = $request->file('img');
        if (!$files || count($files)==0) {
            return redirect()->back()->with('error','Vui lòng chọn ít nhất một hình ảnh');
        }


        try {
            DB::beginTransaction();
            // chèn sản phẩm
            $data = $request->all();
            unset ($data['_token']);
            unset($data['img']);
            $data['user_id'] =1;
            $product=Product::create($data);

            // dd($data);
            // upload ảnh
            for ($i=0; $i < count($files) ; $i++){ 
                $file = $files[$i];
                $fileName= time().$i.$file->getClientOriginalName();
                $file->storeAs('/products',$fileName,'public');
                // chèn vào bảng
                $image = new Image();
                $image->imageable_id = $product->id ;
                $image->imageable_type = Product::class ;
                $image->path = 'storage/products/'.$fileName;
                $image->save();    
            }            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Thêm mới thất bại');
        }
        return redirect()->back()->with('success','Thêm mới thành công'); 
    }


    public function edit($id){
        $obj = Product:: find($id);
        $categories = Category:: all();
        $discounts = Discount:: all();
        return view('be.product.edit', compact('categories','discounts','obj'));
    }


    public function doEdit($id,Request $request){
        
    }


    public function delete($id){}

 }  

