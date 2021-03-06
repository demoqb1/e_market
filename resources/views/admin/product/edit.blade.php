@extends('admin.master')
@section('main')

  <div class="clearfix">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<form action="" method="POST"  enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label class="" for="">Tên Sản Phẩm</label>
    <input class="form-control" type="text"  id="name" name="name" value="{{$product->name}}" placeholder="Nhập Tên sản phẩm" onkeyup="ChangeToSlug()">
    @if($errors->has('name'))
      <div class="alert alert-danger" role="alert">
      {{$errors->first('name')}}
     </div>
      @endif
  </div>

  <div class="form-group">
    <label  for="">Slug</label>
    <input class="form-control" type="text"  id="slug" name="slug" value="{{$product->slug}}" placeholder="Nhap-Ten-san-pham">
  </div>

  <div class="form-group">
        <label class="" for="">Danh Mục</label>
        
        <select class="form-control" name="cate_id">
          @foreach($category as $cate)
          <option value="{{$cate->id}}" {{($product->cate_id == $cate->id)? 'selected' : 
            ''}}>{{$cate->name}}</option>
          @endforeach
        </select>
      </div>

   <div class="form-group">
    <label  for="">Giá</label>
    <input  class="form-control" type="text"  id="" name="price" placeholder="Nhập Giá" value="{{$product->price}}">
    @if($errors->has('price'))
      <div class="alert alert-danger" role="alert">
      {{$errors->first('price')}}
     </div>
      @endif
  </div>
   <div class="form-group">
    <label  for="">Giá Khuyến Mãi</label>
    <input  class="form-control" type="text"  id="" name="sale_price" placeholder="Nhập Giá KM" value="{{$product->sale_price}}">
  </div>

   <div class="form-group">
    <label  for="">Mô Tả Sản Phẩm</label>
    <input  class="form-control" type="text"  id="" name="description" placeholder="Mô Tả" value="{{$product->description}}">
    @if($errors->has('description'))
      <div class="alert alert-danger" role="alert">
      {{$errors->first('description')}}
     </div>
      @endif
  </div>

     
       <div class="form-group">
          <label  for="">Chọn ẢNh</label>
          <input type="file"    name="image"  value="{{url('')}}\uploads\{{$product->image}}">
          <img src="{{url('')}}\uploads\{{$product->image}}" alt="" width="50px">
          </div>
        @if($errors->has('image'))
      <div class="alert alert-danger" role="alert">
      {{$errors->first('image')}}
     </div>
      @endif
        
        <div class="form-group">
        <img src="" alt="" id="showImg" class="img-responsive">
        </div>  
      </div>
        
      </div>
      <div class="form-group">
        <label  for="">Trạng Thái</label>
        <input type="radio"  id=""  name="status" value="0">Ẩn
        <input type="radio"  id=""  name="status" value="1" checked="">Hiện
        @if($errors->has('status'))
      <div class="alert alert-danger" role="alert">
      {{$errors->first('status')}}
     </div>
      @endif
      </div>
      
      <div class="form-group">
        <label  for="">Sản Phẩm Bán Chạy</label>
        <input type="radio"  id=""  name="hot_pro" value="0">Không
        <input type="radio"  id=""  name="hot_pro" value="1" checked="">Có
        @if($errors->has('hot_pro'))
      <div class="alert alert-danger" role="alert">
      {{$errors->first('hot_pro')}}
     </div>
      @endif
      </div>

  <button type="submit" class="btn btn-primary">OK</button>
</form>
</div>

  </div>
 


@stop


<script>
  function ChangeToSlug()
{   
  // alert('dada');
    var name, slug;
 
    //Lấy text từ thẻ input title 
    //name trong trường id='name' của ô nhập sản phẩm
    name = document.getElementById("name").value;
    console.log(name);
    //Đổi chữ hoa thành chữ thường
    slug = name.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}
</script>


