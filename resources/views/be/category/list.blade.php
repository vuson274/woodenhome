@extends('be.layout')
@section('main-content')

<div class="col-md-12">
<div><a class="btn btn-primary"  href="{{route('admin.category.add')}}" style="padding: 5px 20px; margin-bottom: 10px;">Thêm mới </a></div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body" style="text-align: center" >
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên</th>
                      <th>Danh mục</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($list as $items)
                    <tr>
                      <td>{{$items->id}}</td>
                      <td>{{$items->name}}</td>
                      <td>
                        @if($items->parentCategory)
                          <span class="badge badge-primary">{{$items->parentCategory->name}}</span>
                        @else
                          <span class="badge badge-primary">Không có danh mục cha</span>
                        @endif
                      </td>
                    <td>
                          <a class="btn btn-warning" href="{{route('admin.category.edit',['id'=>$items->id])}}">Sửa</a>
                          <a class="btn btn-danger" onclick="return confirm('bạn có muốn xóa?')" href="{{route('admin.category.delete',['id'=>$items->id])}}">Xóa</a>
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