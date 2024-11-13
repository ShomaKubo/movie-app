<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieWatchLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'movie_id',
        'updated_at',
    ];

    /**
     * 全ての動画視聴ログデータを取得
     */
    public function findAllMovieWatchLogs()
    {
        return MovieWatchLog::all();
    }

    /**
     * ユーザーIDと動画IDで動画視聴済みか判定
     */
    public static function existMovieWatchLog($user_id, $movie_id)
    {
        return MovieWatchLog::where(['user_id' => $user_id, 'movie_id' => $movie_id])->exists();
    }

    /**
     * 動画視聴ログデータを登録
     */
    public function store($user_id, $movie_id)
    {
        // ユーザーIDと動画IDの組み合わせが存在しない場合は新規作成、存在する場合は更新
        return MovieWatchLog::updateOrCreate(
            ['user_id' => $user_id, 'movie_id' => $movie_id],
            ['user_id' => $user_id, 'movie_id' => $movie_id, 'updated_at' => now()]
        );
    }

    /**
     * ユーザーIDで動画視聴ログデータを削除
     */
    public function deleteMovieWatchLogByUserId($user_id)
    {
        MovieWatchLog::where('user_id', $user_id)->delete();
    }

    /**
     * 動画IDで動画視聴ログデータを削除
     */
    public function deleteMovieWatchLogByMovieId($movie_id)
    {
        MovieWatchLog::where('movie_id', $movie_id)->delete();
    }
}
