@extends('admin-layout')
@section('admin_content')
   <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Blog
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Blog</label>
                                    <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Nhập Tên Blog" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Blog">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giới Thiệu Blog</label>
                                    <textarea type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Blog" rows="5" style="resize: none" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Blog"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Content Blog</label>
                                    <textarea type="text" id="product-blog" data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Blog" rows="5" style="resize: none" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Blog"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta keywords ( CEO )</label>
                                    <textarea type="text"  data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Blog" rows="5" style="resize: none" name="ceo_keywords" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Blog"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta des ( CEO )</label>
                                    <textarea type="text"  data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Blog" rows="5" style="resize: none" name="ceo_des" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Blog"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh Blog</label>
                                    <input type="file" data-validation="length" data-validation-length="min1" data-validation-error-msg="Nhập Tên Blog" name="product_images" class="form-control" id="exampleInputEmail1" placeholder="Tên Blog">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh Mục</label>
                                    <select name="category_id" class="form-control input-sm m-bot15">
                                        @foreach ($category_id as $item=>$cate)
                                            
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Người Đăng</label>
                                    <select name="author_id" class="form-control input-sm m-bot15">
                                        @foreach ($author_id as $item=>$author)
                                            
                                        <option value="{{$author->author_id}}">{{$author->author_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thể Loại</label>
                                    <select name="type_id" class="form-control input-sm m-bot15">
                                        @foreach ($type_id as $item=>$type)
                                        
                                        <option value="{{$type->type_id}}">{{$type->type_name}}</option>


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
                                <button type="submit" name="add_product" class="btn btn-info">Thêm Blog</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>

 @endsection