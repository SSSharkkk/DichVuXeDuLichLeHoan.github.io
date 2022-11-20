@extends('admin-layout')
@section('admin_content')
   <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhập Người Viết BLog
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
                                @foreach ($edit_author as $item=>$edit_author)
                                    
                                
                                <form role="form" action="{{URL::to('/update-author/'.$edit_author->author_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Người Viết</label>
                                    <input type="text" value="{{$edit_author->author_name}}" data-validation="length" data-validation-length="min1" data-validation-error-msg="Nhập Tên Người Viết" name="author_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Người Viết">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Người Viết</label>
                                    <textarea type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Bắt Buộc Nhập Mô Tả Người Viết" rows="5" style="resize: none" name="author_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả Người Viết">{{$edit_author->author_desc}} </textarea>
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
                                <button type="submit" name="add_author" class="btn btn-info">Cập Nhập Người Viết</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>
            </div>

 @endsection