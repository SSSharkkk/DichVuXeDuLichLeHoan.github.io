<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{   

    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
           return Redirect::to('/dashboard');
        } else {
           return Redirect::to('/login')->send();
        }
    }

    public function add_product() {
        $this->AuthLogin();
        $category_id = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $author_id = DB::table('tbl_author')->orderBy('author_id','desc')->get();
        $type_id = DB::table('tbl_type')->orderBy('type_id','desc')->get();

        return view('admin.product.addProduct')->with(compact('category_id','author_id','type_id'));
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['ceo_keywords'] = $request->ceo_keywords;
        $data['ceo_des'] = $request->ceo_des;
        $data['product_status'] = $request->product_status;
        $data['author_id'] = $request->author_id;
        $data['category_id'] = $request->category_id;
        $data['type_id'] = $request->type_id;
        
        $get_image = $request->file('product_images');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/uploads/',$new_image);
            $data['product_images'] = $new_image;
            DB::table('tbl_product')->insert($data);
            return Redirect('/add-product');
        }

        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);

        Session::put('message','Them Thanh Cong');

        return Redirect::to('/add-product');

    }

    public function all_product() {
        $this->AuthLogin();

        $all_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_author','tbl_author.author_id','=','tbl_product.author_id')
        ->join('tbl_type','tbl_type.type_id','=','tbl_product.type_id')
        ->get();

        $manager_product = view('admin.product.allProduct')->with('all_product',$all_product);

        return view('admin-layout')->with('manager_product',$manager_product);
    }

    public function content_product($product_id) {
        $all_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_author','tbl_author.author_id','=','tbl_product.author_id')
        ->join('tbl_type','tbl_type.type_id','=','tbl_product.type_id')
        ->where('product_id',$product_id)
        ->get();

        $manager_product = view('admin.product.detailsProduct')->with('all_product',$all_product);

        return view('admin-layout')->with('manager_product',$manager_product);
    }

    public function unactive_product($product_id) {
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);

        return Redirect::to('/all-product');

    }

    public function active_product($product_id) {
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);

        return Redirect::to('/all-product');
        
    }

    public function edit_product($product_id) {
        $this->AuthLogin();
        $category_id = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $author_id = DB::table('tbl_author')->orderBy('author_id','desc')->get();
        $type_id = DB::table('tbl_type')->orderBy('type_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_edit = view('admin.product.editProduct')->with(compact('category_id','author_id','type_id','edit_product'));

        return view('admin-layout')->with('manager_edit',$manager_edit);
    }

    public function update_product(Request $request, $product_id) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['ceo_keywords'] = $request->ceo_keywords;
        $data['ceo_des'] = $request->ceo_des;
        $data['product_status'] = $request->product_status;
        $data['author_id'] = $request->author_id;
        $data['category_id'] = $request->category_id;
        $data['type_id'] = $request->type_id;
        $get_image = $request->file('product_images');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/uploads',$new_image);
            $data['product_images'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập Nhập Sản Phẩm Thành Công');
            return Redirect::to('all-product');
            }
            
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập Nhập Sản Phẩm Thành Công');
            return Redirect::to('all-product');
    }

    public function delete_product($product_id) {
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('masage','xoa thanh cong ');

        return Redirect::to('/all-product');
    }

    // public product 

    public function details_blog(Request $request ,$product_id) {

        $category = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $author = DB::table('tbl_author')->orderBy('author_id','desc')->get();
        $type = DB::table('tbl_type')->orderBy('type_id','desc')->get();
       

        $details_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_author','tbl_author.author_id','=','tbl_product.author_id')
        ->join('tbl_type','tbl_type.type_id','=','tbl_product.type_id')
        ->where('product_id',$product_id)
        ->get();

        $new_blog = DB::table('tbl_product')->limit(3)->get();

        foreach($details_product as $val) {
            // seo
            $meta_desc = $val->ceo_des;
            $meta_keywords = $val->ceo_keywords;
            $meta_title = $val->product_name;
            $url_canonical = $request->url();
            // seo
            }

        return view('pages.details')->with(compact('category','author','type','details_product','meta_desc','meta_keywords','url_canonical','meta_title','new_blog'));
    }

   
}
