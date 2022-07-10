@extends('be.layout')
@section('main-content')
<style>
  img {
    width: 200px;
    padding: 0px;
    margin:0px;
  }

</style>

<div class="col-md-12">
<div><a class="btn btn-primary"  href="{{route('admin.product.add')}}" style="padding: 5px 20px; margin-bottom: 10px;">Thêm mới </a></div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body" style="text-align: center" >
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Hình ảnh </th>
                      <th>Tên sản phẩm</th>
                      <th>Danh mục</th>
                      <th>Số lượng</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($list as $items)
                    
                    <tr>
                      <td>{{$items->id}}</td>
                      <td>
                        @if($items->images && count($items->images)>0)
                          <img src="{{asset($items->images[0]->path)}}" alt="{{$items->name}}">
                        @else
                          <img src="https://via.placeholder.com/150

C/O https://placeholder.com/">
                        @endif
                      </td>
                      <td>{{$items->name}}</td>
                      <td>
                        @if($items->category)
                          <span class="badge badge-primary">{{$items->category->name}}</span>
                        @else
                          <span class="badge badge-primary">Không có danh mục</span>
                        @endif
                      </td>
                      <td>{{$items->quantity}}</td>
                      <td>
                        <a class="btn btn-primary" href="{{route('admin.product.edit',['id'=>$items->id])}}">Chi tiết</a>
                        <a class="btn btn-warning" href="{{route('admin.product.edit',['id'=>$items->id])}}">Sửa</a>
                        <a class="btn btn-danger" onclick="return confirm('bạn có muốn xóa?')" href="{{route('admin.product.delete',['id'=>$items->id])}}">Xóa</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">
                    {{$list->links()}}
                </div>
              </div>
            </div>
</div>
@endsection