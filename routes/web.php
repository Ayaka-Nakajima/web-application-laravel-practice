<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//controllerを使ってルーティングを設定
Route::get('/', [HomeController::class, 'index'])->name('home');

//controllerを使わない場合のルーティング設定例
// Route::get('/', function () {
//     $allCategories = ['category1', 'category2', 'category3'];
//     return view('home', ['categories' => $allCategories]);
// })->name('home');
// =>allCategories変数にカテゴリの配列を直接渡しています。categories変数としてビューで利用可能になります。

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// PostControllerのshowメソッドへのルーティング設定
//postIdパラメータをURLから受け取る
//nameでルートに名前を付けることで、後でURL生成やリダイレクトに便利に使えます
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
