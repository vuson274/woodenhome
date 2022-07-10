@extends('be.layout')
@section('main-content')
<div class="col-md-12">
    <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('admin.category.doAdd')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input name="name" type="text" class="form-control" id="Name" placeholder="Enter name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="">Parent Category</label>
                    <select name="parent_id" class="form-control">
                      <option value="0">No parent</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
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