@extends('admin-layout')
@section('admin_content')
   <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhập Blog
                        </header>
                        <?php
                        $message = Session::get('message');
	                               if ($message) {
	                    	           echo $message;
		                           Session::put('message',null);
                             	}                         
                         ?>

                        <div class="panel-body">
                            <div class="position-center">
                                @foreach ($edit_product as $item=>$edit)
                                    
                                
                                <form role="form" action="{{URL::to('/update-product/'.$edit->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Blog</label>
                                    <input type="text" value="{{$edit->product_name}}" data-validation="length" data-validation-length="min1" data-validation-error-msg="Nhập Tên Blog" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Blog">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giới Thiệu Blog</label>
                                    <textarea type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Blog" rows="5" style="resize: none" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Blog">{{$edit->product_desc}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Content Blog</label>
                                    <textarea type="text" id="product-blog" data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Blog" rows="5" style="resize: none" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Blog">{{$edit->product_content}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta keywords ( CEO )</label>
                                    <textarea type="text"  data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Blog" rows="5" style="resize: none" name="ceo_keywords" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Blog">{{$edit->ceo_keywords}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta des ( CEO )</label>
                                    <textarea type="text"  data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Blog" rows="5" style="resize: none" name="ceo_des" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Blog">{{$edit->ceo_des}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh Blog</label>
                                    <input type="file"  name="product_images" class="form-control" id="exampleInputEmail1" placeholder="Tên Blog">
                                    <img src="{{URL::to('public/images/uploads/'.$edit->product_images)}}" width="100" height="100" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh Mục</label>
                                    <select name="category_id" class="form-control input-sm m-bot15">
                                        @foreach ($category_id as $item=>$cate)
                                        @if ($cate->category_id==$edit->category_id)
                                            
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @else
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            
                                        @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Người Đăng</label>
                                    <select name="author_id" class="form-control input-sm m-bot15">
                                        @foreach ($author_id as $item=>$author)
                                        @if ($author->author_id==$edit->author_id)
                                            
                                        <option selected value="{{$author->author_id}}">{{$author->author_name}}</option>
                                        @else
                                        <option value="{{$author->author_id}}">{{$author->author_name}}</option>   
                                        @endif

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thể Loại</label>
                                    <select name="type_id" class="form-control input-sm m-bot15">
                                        @foreach ($type_id as $item=>$type)

                                        @if ($type->type_id==$edit->type_id)
                                        <option selected value="{{$type->type_id}}">{{$type->type_name}}</option>
                                            
                                        @else

                                        <option  value="{{$type->type_id}}">{{$type->type_name}}</option>
                                            
                                        @endif
                                        


                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển Thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển Thị</option>
                                    </select>
                                </div>

                                <div class="checkbox">
                
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">Cập Nhập Blog</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>
            </div>

 @endsection