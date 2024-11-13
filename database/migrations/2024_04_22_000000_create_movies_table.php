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
            $table->string('summary')->nullable()->comment('概要');
            $table->string('chapter')->nullable()->comment('チャプター');
            $table->string('movie_path')->comment('動画パス');
            $table->string('thumbnail_path')->comment('サムネイルパス');
            $table->integer('uploader')->comment('アップロード実行者');
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
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
