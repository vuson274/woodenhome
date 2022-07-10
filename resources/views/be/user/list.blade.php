@extends('be.layout')
@section('main-content')

<div class="col-md-12">
<div><a class="btn btn-primary"  href="{{route('admin.user.add')}}" style="padding: 5px 20px; margin-bottom: 10px;">Thêm mới </a></div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body" style="text-align: center" >
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên đăng nhập</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Chức vụ </th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($list as $items)
                    
                    <tr>
                      <td>{{$items->id}}</td>
                      <td>{{$items->name}}</td>
                      <td>{{$items->phone}}</td>
                      <td>{{$items->email}}</td>
                      @if($items->level == 1)
                        <td> Quản trị viên </td>
                      @else
                        <td>Nhân viên</td>
                      @endif
                      <td>
                          <a class="btn btn-warning" href="{{route('admin.user.edit',['id'=>$items->id])}}">Sửa</a>
                          <a class="btn btn-danger" onclick="return confirm('bạn có muốn xóa?')" href="{{route('admin.user.delete',['id'=>$items->id])}}">Xóa</a>
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