<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    const CHAPTER = [
        0 => 'AI基礎編',
        // 1 => 'AI応用編',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'sub_title',
        'summary',
        'chapter',
        'movie_path',
        'thumbnail_path',
        'uploader',
    ];

    /**
     * 全ての動画データを取得
     */
    public function findAllMovies()
    {
        return Movie::all();
    }

    /**
     * 全ての動画タイトルと指定ユーザーの進捗状況を取得
     */
    public function findAllMoviesUserProgress($user_id)
    {
        return Movie::leftJoin('movie_watch_logs', function($join) use ($user_id){
            $join->on('movies.id', '=', 'movie_watch_logs.movie_id')
              ->where('movie_watch_logs.user_id', '=', $user_id);
            })
            ->get(['movies.title', 'movie_watch_logs.movie_id as watched_movie_id', 'movie_watch_logs.created_at as watched_at']);
    }

    /**
     * 動画データを登録
     */
    public function store($title, $sub_title, $summary, $chapter, $movie_path, $thumbnail_path)
    {
        Movie::create([
            'title' => $title,
            'sub_title' => $sub_title,
            'summary' => $summary,
            'chapter' => self::CHAPTER[$chapter],
            'movie_path' => $movie_path,
            'thumbnail_path' => $thumbnail_path,
            'uploader' => \Auth::user()->id,
        ]);
    }

    /**
     * 更新処理
     */
    public function updateMovie($request, $movie)
    {
        $movie->fill([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'summary' => $request->summary
        ])->save();
    }

    /**
     * 削除処理
     */
    public function deleteMovieById($id)
    {
        return $this->destroy($id);
    }
}
