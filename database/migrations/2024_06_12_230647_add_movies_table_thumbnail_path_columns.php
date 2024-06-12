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
        Schema::table('movies', function (Blueprint $table) {
            $table->renameColumn('path', 'movie_path');
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->string('movie_path')->comment('動画パス')->change();
            $table->string('thumbnail_path')->after('movie_path')->comment('サムネイルパス');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->renameColumn('movie_path', 'path');
            $table->dropColumn('thumbnail_path');
        });
    }
};
