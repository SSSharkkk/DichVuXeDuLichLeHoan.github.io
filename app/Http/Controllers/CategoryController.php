<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{    
  public function AuthLogin() {
    $admin_id = Session::get('admin_id');
    if ($admin_id) {
       return Redirect::to('/dashboard');
    } else {
       return Redirect::to('/login')->send();
    }
}
     public function add_category() {
        $this->AuthLogin();
        return view('admin.category.addCategory');
     }
     public function save_category(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category')->insert($data);

       Session::put('message','Them Thanh Cong');

        return Redirect::to('/add-category');
 
     }

     public function all_category() {
       $this->AuthLogin();
       $all_category = DB::table('tbl_category')->get();
       $manage_category = view('admin.category.allCategory')->with('all_category',$all_category);
       return view('admin-layout')->with('admin.allCategory',$manage_category);
     }

     public function unactive_category($category_id) {
       DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>1]);
       Session::put('message','Cap Nhap Thanh Cong');
       
       return Redirect::to('/all-category');
     }
     public function active_category($category_id) {
       DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>0]);
       Session::put('message','Cap Nhap Thanh Cong');
       return Redirect::to('/all-category');
     }
     public function edit_category($category_id) {
       $edit_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
       $manage_edit = view('admin.category.editCategory')->with('edit_category',$edit_category);
       return view('admin-layout')->with('admin.category.editCategory',$manage_edit);
     }

     public function update_category(request $request,$category_id) {
      $this->AuthLogin();

      $data = array();
      $data['category_name'] = $request->category_name;
      $data['category_desc'] = $request->category_desc;

      DB::table('tbl_category')->where('category_id',$category_id)->update($data);
      Session::put('message','Cap Nhap Thanh Cong');
      
      return Redirect::to('/all-category');
     }

     public function delete_category($category_id) {
       DB::table('tbl_category')->where('category_id',$category_id)->delete();
       Session::put('message','xoa thanh cong');
       return Redirect::to('/all-category');
     }
// full product category
     public function category_full(Request $request,$category_id) {

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
      ->where('product_status','1')->where('tbl_product.category_id',$category_id)
      ->get();

      $category_name = DB::table('tbl_category')->where('category_id',$category_id)->get();

      return view('pages.showProduct')->with(compact('category','type','author','product','category_name','meta_desc','meta_keywords','meta_title','url_canonical'));
     }
}
