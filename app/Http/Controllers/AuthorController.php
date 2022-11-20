<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AuthorController extends Controller

{   
  public function AuthLogin() {
    $admin_id = Session::get('admin_id');
    if ($admin_id) {
       return Redirect::to('/dashboard');
    } else {
       return Redirect::to('/login')->send();
    }
}
    public function add_author(){
        $this->AuthLogin();
        return view('admin.author.addAuthor');
     }

     public function save_author(Request $request) {
        $this->AuthLogin();
       
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_desc'] = $request->author_desc;
        $data['author_status'] = $request->author_status;

        DB::table('tbl_author')->insert($data);

        Session::put('message','Them Thanh Cong');

        return Redirect::to('/add-author');
 
     }

     public function all_author() {
       $this->AuthLogin();

       $all_author = DB::table('tbl_author')->get();
       $manage_author = view('admin.author.allauthor')->with('all_author',$all_author);
       return view('admin-layout')->with('admin.allAuthor',$manage_author);
     }

     public function unactive_author($author_id) {
       DB::table('tbl_author')->where('author_id',$author_id)->update(['author_status'=>1]);
       Session::put('message','Cap Nhap Thanh Cong');
       
       return Redirect::to('/all-author');
     }
     public function active_author($author_id) {
       DB::table('tbl_author')->where('author_id',$author_id)->update(['author_status'=>0]);
       Session::put('message','Cap Nhap Thanh Cong');
       return Redirect::to('/all-author');
     }
     public function edit_author($author_id) {
      $this->AuthLogin();

       $edit_author = DB::table('tbl_author')->where('author_id',$author_id)->get();
       $manage_edit = view('admin.author.editauthor')->with('edit_author',$edit_author);
       return view('admin-layout')->with('admin.author.editAuthor',$manage_edit);
     }

     public function update_author(request $request,$author_id) {
      $this->AuthLogin();

      $data = array();
      $data['author_name'] = $request->author_name;
      $data['author_desc'] = $request->author_desc;

      DB::table('tbl_author')->where('author_id',$author_id)->update($data);
      Session::put('message','Cap Nhap Thanh Cong');
      
      return Redirect::to('/all-author');
     }

     public function delete_author($author_id) {
       DB::table('tbl_author')->where('author_id',$author_id)->delete();
       Session::put('message','xoa thanh cong');
       return Redirect::to('/all-author');
     }
}
