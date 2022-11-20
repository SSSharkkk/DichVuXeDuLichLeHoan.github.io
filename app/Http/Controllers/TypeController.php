<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class TypeController extends Controller
{      
  public function AuthLogin() {
    $admin_id = Session::get('admin_id');
    if ($admin_id) {
       return Redirect::to('/dashboard');
    } else {
       return Redirect::to('/login')->send();
    }
}
     public function add_type(){
        $this->AuthLogin();
        return view('admin.type.addType');
     }

     public function save_type(Request $request) {
      $this->AuthLogin();

        $data = array();
        $data['type_name'] = $request->type_name;
        $data['type_desc'] = $request->type_desc;
        $data['type_status'] = $request->type_status;

        DB::table('tbl_type')->insert($data);

        Session::put('message','Them Thanh Cong');

        return Redirect::to('/add-type');
 
     }

     public function all_type() {
      $this->AuthLogin();

       $all_type = DB::table('tbl_type')->get();
       $manage_type = view('admin.type.alltype')->with('all_type',$all_type);
       return view('admin-layout')->with('admin.alltype',$manage_type);
     }

     public function unactive_type($type_id) {
       DB::table('tbl_type')->where('type_id',$type_id)->update(['type_status'=>1]);
       Session::put('message','Cap Nhap Thanh Cong');
       
       return Redirect::to('/all-type');
     }
     public function active_type($type_id) {
       DB::table('tbl_type')->where('type_id',$type_id)->update(['type_status'=>0]);
       Session::put('message','Cap Nhap Thanh Cong');
       return Redirect::to('/all-type');
     }
     public function edit_type($type_id) {
      $this->AuthLogin();

       $edit_type = DB::table('tbl_type')->where('type_id',$type_id)->get();
       $manage_edit = view('admin.type.edittype')->with('edit_type',$edit_type);
       return view('admin-layout')->with('admin.type.edittype',$manage_edit);
     }

     public function update_type(request $request,$type_id) {
      $this->AuthLogin();

      $data = array();
      $data['type_name'] = $request->type_name;
      $data['type_desc'] = $request->type_desc;

      DB::table('tbl_type')->where('type_id',$type_id)->update($data);
      Session::put('message','Cap Nhap Thanh Cong');
      
      return Redirect::to('/all-type');
     }

     public function delete_type($type_id) {
       DB::table('tbl_type')->where('type_id',$type_id)->delete();
       Session::put('message','xoa thanh cong');
       return Redirect::to('/all-type');
     }

     // show type public
     public function type_full(Request $request,$type_id) {

      // seo
      $meta_desc = "Hãy cùng điểm qua một số vụ án kinh hoàng nhất trong lịch sử của các nước qua ... vào danh sách những kẻ giết người hàng loạt tàn bạo nhất trong lịch sử.";
      $meta_keywords = " SharkCreepy , vụ án hay , vụ án nổi tiếng của thế giới , những vụ án tâm linh , vụ án bí ẩn ,  ";
      $meta_title = "SharkCreepy";
      $url_canonical = $request->url();
      // seo

      $category = DB::table('tbl_category')->where('category_status','1')->orderBy('category_id','desc')->get();
      $type = DB::table('tbl_type')->where('type_status','1')->orderBy('type_id','desc')->get();
      $author = DB::table('tbl_author')->where('author_status','1')->orderBy('author_id','desc')->get();

      
      $product = DB::table('tbl_product')
      ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
      ->join('tbl_author','tbl_author.author_id','=','tbl_product.author_id')
      ->join('tbl_type','tbl_type.type_id','=','tbl_product.type_id')
      ->where('product_status','1')->where('tbl_product.type_id',$type_id)
      ->get();

      $type_name = DB::table('tbl_type')->where('type_id',$type_id)->get();
      
      return view('pages.showTypeProduct')->with(compact('category','type','author','product','type_name','meta_desc','meta_keywords','meta_title','url_canonical'));
     }
}
