<?php
// to make a controller, run the command: php artisan make:controller HomeController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        //方法３：Eloquent ORMを使ってcategoriesテーブルから全てのカテゴリを取得
        $categories = Category::all();

        //方法２：ここでDBファサードを使ってcategoriesテーブルから全てのカテゴリを取得
        //$allCategories = DB::table('categories')->get();
        
        //方法１：hardcoded categories for demonstration; in a real app, these might come from a database
        //$allCategories = ['category1', 'category2', 'category3'];
        
        $cid = request('category_id');

        //全ての投稿を取得する場合のコード例
        // $posts = Post::latest()->get();

        //whenメソッドを使って、category_idパラメータが存在する場合にのみフィルタリングを適用
        //if文を使わずにクエリビルダをチェーンする形で条件付きクエリを実現できます
        $posts = Post::when($cid, function ($query) use ($cid) {
            return $query->where('category_id', $cid);
        })->latest()->get();

        //test code to verify Post model is working
        //$posts = Post::orderby('id', 'desc')->get();
        // print_r($posts);
        // die();

        //デバッグ用：リクエストパラメータの確認
        // ?=10のようにURLにパラメータを追加してアクセスすると、値が取得できます
        //die("the request id is " . request('category_id'));

        //ビューにデータを渡す方法２（compact関数を使う）
        return view('home',compact('posts', 'categories'));

        
        //ビューにデータを渡す方法１
        // return view('home', 
        // [
        //     'categories' => $allCategories,
        //     'posts' => $posts
        // ]);
    }
}
