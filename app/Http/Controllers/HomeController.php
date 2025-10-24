<?php
// to make a controller, run the command: php artisan make:controller HomeController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        //方法３：Eloquent ORMを使ってcategoriesテーブルから全てのカテゴリを取得
        $allCategories = Category::all();

        //方法２：ここでDBファサードを使ってcategoriesテーブルから全てのカテゴリを取得
        //$allCategories = DB::table('categories')->get();
        
        //方法１：hardcoded categories for demonstration; in a real app, these might come from a database
        //$allCategories = ['category1', 'category2', 'category3'];
        return view('home', ['categories' => $allCategories]);
    }
}
