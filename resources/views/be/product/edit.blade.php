@extends('be.layout')
@section('main-content')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<div class="col-md-12">
    <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" action="{{route('admin.product.doAdd')}}">
                @csrf
                <div class="card-body">
                  <div id="preview" class="preview" style=" display:flex;"></div>
                  <input type="file" name="img[]" id="img" class="img-select" multiple accept="image/gif,image/png, image/jpeg" onchange="PreviewImages()">
                  <br><br>
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input name="name" type="text" class="form-control" id="Name" placeholder="Name" value="{{$obj->name}}">
                  </div>
                  <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input name="quantity" type="number" class="form-control" id="quantity" placeholder="quantity" value="{{$obj->quantity}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" type="number" class="form-control" id="quantity" placeholder="price" value="{{$obj->price}}">
                  </div>
                  <div class="form-group">
                    <label for="short_desc">Short Description</label>
                    <textarea name="short_desc" id="short_desc" cols="30" rows="5" class="form-control" placeholder="short_desc">{{$obj->short_desc}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="tag_line">Tag line</label>
                    <textarea name="tag_line" id="tag_line" cols="30" rows="5" class="form-control" placeholder="tag_line">{{$obj->tag_line}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="5" class="form-control" placeholder="content">{{$obj->content}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="seo_keyword">Seo Keyword</label>
                    <textarea name="seo_keyword" id="seo_keyword" cols="30" rows="5" class="form-control" placeholder="seo_keyword">{{$obj->seo_keyword}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="seo_description">Seo Description</label>
                    <textarea name="seo_description" id="seo_description" cols="30" rows="5" class="form-control" placeholder="seo_description">{{$obj->seo_description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                      @foreach($categories as $category)
                      <option <?php if($obj-> category_id ==$category->id){ echo 'selected="selected"';} ?> value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Discount</label>
                    <select name="discount_id" class="form-control">
                      @foreach($discounts as $discount)
                      <option <?php if($obj->discount_id == $discount->id){ echo 'selected="selected"';} ?> value="{{$discount->id}}">{{$discount->amount}}</option>
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
<script>
  function PreviewImages(){
    // for (let i = 0; i < document.querySelector('.img-select').files.length; i++){
    //   const reader = new FileReader();
    //   await readAsDataURL(document.querySelector('.img-select').file);
    //   reader.onload = function file(){
    //     const preview = document.querySelector('.preview');
    //     const img = document.createElement('img');
    //     img.setAttribute('src',file.target.result);
    //     img.classList.add('thumb');
    //     preview.appendChild(img);
    //   }

    // }
   
    // alert(1);
  
  

  }
  CKEDITOR.replace( 'content' );

</script>

@endsection
