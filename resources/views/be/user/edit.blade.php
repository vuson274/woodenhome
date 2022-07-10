@extends('be.layout')
@section('main-content')
<div class="col-md-12">
    <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('admin.user.doEdit',['id'=>$obj->id])}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Email">Email</label>
                    <input name="email" type="email" class="form-control" id="Email" placeholder="Enter email" value="{{$obj->email}}">
                  </div>
                  <div class="form-group">
                    <label for="Name">User name</label>
                    <input name="name" type="text" class="form-control" id="Name" placeholder="Enter name" value="{{$obj->name}}">
                  </div>
                  <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input name="phone" type="phone" class="form-control" id="Phone" placeholder="Enter phone" value="{{$obj->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Enter password" value="{{$obj->password}}">
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                      <option value="1" <?php if($obj->level ==1){ echo 'selected="selected"';} ?>>Quản trị viên</option>
                      <option value="2" <?php if($obj->level ==2){ echo 'selected="selected"';} ?>>Nhân viên</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <ul class="alert text-danger">
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
              </ul>
            </div>
    </div>
</div>
@endsection