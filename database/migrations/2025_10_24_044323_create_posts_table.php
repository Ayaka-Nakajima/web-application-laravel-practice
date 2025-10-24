<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            //外部キー制約を持つcategory_idカラムを追加
            //外部キーとは、あるテーブルのカラムが別のテーブルの主キーを参照するためのキーです。
            //constrained()メソッドは、外部キー制約を自動的に設定します。この場合、postsテーブルのcategory_idカラムがcategoriesテーブルのidカラムを参照するようになります。
            //onDelete('cascade')は、関連するカテゴリが削除された場合に、そのカテゴリに関連する投稿も自動的に削除されることを意味します。
            $table->foreignId('category_id')->constrained();//->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
