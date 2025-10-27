<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //仮にここが空でも、モデルの名前を単数テーブル名にしておくことでEloquentは自動的にテーブル名を推測しますが、
    //明示的に指定することもできます。
    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

