@extends('admin-layout')
@section('admin_content')
   <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhập Danh Mục BLog
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
                                @foreach ($edit_type as $item=>$edit_type)
                                    
                                
                                <form role="form" action="{{URL::to('/update-type/'.$edit_type->type_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                                    <input type="text" value="{{$edit_type->type_name}}" data-validation="length" data-validation-length="min1" data-validation-error-msg="Nhập Tên Danh Mục" name="type_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
                                    <textarea type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Danh Mục" rows="5" style="resize: none" name="type_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$edit_type->type_desc}} </textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển Thị</label>
                                    <select name="type_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển Thị</option>
                                    </select>
                                </div> --}}
                                <div class="checkbox">
                
                                </div>
                                <button type="submit" name="add_type" class="btn btn-info">Cập Nhập Danh Mục</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>
            </div>

 @endsection