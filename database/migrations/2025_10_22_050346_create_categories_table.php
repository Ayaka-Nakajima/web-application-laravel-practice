<?php
// migration file を走らせるにはphp artisan migrateコマンドを実行します。
// migration file を作成するにはphp artisan make:migration create_categories_tableコマンドを実行します。
//rollback（migrationの取り消し）するにはphp artisan migrate:rollbackコマンドを実行します。
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
