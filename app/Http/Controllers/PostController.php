<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    //showメソッドを追加 $postIdパラメータを受け取る
    // public function show($postId)
    // {
    //     //IDで特定の投稿を取得 これはクエリをたたいている
    //     $post = Post::findOrFail($postId);
    //     //ビューにデータを渡す（compact関数を使う）
    //     return view('post', compact('post'));

    // }

    public function show(Post $post)
    {
        //これはmodel bindingを使っているので、IDで特定の投稿を自動的に取得してくれる
        return view('post', compact('post'));
    }
}
