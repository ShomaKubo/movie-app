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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('タイトル');
            $table->string('sub_title')->nullable()->comment('サブタイトル');
            $table->string('path')->nullable()->comment('パス');
            $table->integer('uploader')->comment('アップロード実行者');
            $table->integer('delete_flg')->default(0)->comment('削除フラグ[0:未削除 1:削除済み]');
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->softDeletes();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
