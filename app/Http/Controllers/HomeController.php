<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request) {
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
        ->where('product_status','1')->orderBy('product_id','desc')
        ->get();

        return view('pages.home')->with(compact('category','type','product','author','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function dashboard() {
        return view('admin-layout');
    }

    public function seach(Request $request) {
        $keywords = $request->keywords;
        $category = DB::table('tbl_category')->where('category_status','1')->orderBy('category_id','desc')->get();
        $type = DB::table('tbl_type')->where('type_status','1')->orderBy('type_id','desc')->get();
        $author = DB::table('tbl_author')->where('author_status','1')->orderBy('author_id','desc')->get();

        $product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_author','tbl_author.author_id','=','tbl_product.author_id')
        ->join('tbl_type','tbl_type.type_id','=','tbl_product.type_id')
        ->where('product_status','1')->orderBy('product_id','desc')
        ->get();

        $product_search = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_author','tbl_author.author_id','=','tbl_product.author_id')
        ->join('tbl_type','tbl_type.type_id','=','tbl_product.type_id')
        ->get();

        return view('pages.searchProduct')->with(compact('category','type','author','product_search','product'));
    }
}
